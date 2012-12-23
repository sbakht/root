<?php
 
  // Set default timezone
  date_default_timezone_set('UTC');
 
  try {
    /**************************************
    * Create databases and                *
    * open connections                    *
    **************************************/
 
    // Create (connect to) SQLite database in file
    $file_db = new PDO('sqlite:messaging.sqlite3');
    // Set errormode to exceptions
    $file_db->setAttribute(PDO::ATTR_ERRMODE, 
                            PDO::ERRMODE_EXCEPTION);
 
    /**************************************
    * Create tables                       *
    **************************************/
    
    // Create table messages
    $file_db->exec("CREATE TABLE IF NOT EXISTS databaseSummary (
                    id INTEGER PRIMARY KEY,
                    filename TEXT,
                    server TEXT, 
                    name TEXT, 
                    LastFullBackup TEXT,
                    DatabaseSize TEXT)");

 
 
    /**************************************
    * Set initial data                    *
    **************************************/
    
    $dir = 'stats/Database Test/';
    
    if ($handle = opendir($dir)) { //Gets files in directory
      while (false !== ($file = readdir($handle))) {
        if ($file != "." && $file != ".." && preg_match("/[0-9]+-[0-9]+-[0-9]*/",$file)) {
          $files[] = $file;
        }      
      }
      closedir($handle);
    }       
    
    foreach($files as $filename) {
      $file = file($dir.$filename); 

      $insert = "INSERT INTO databaseSummary (filename, server, name, LastFullBackup, DatabaseSize) 
                  VALUES (:filename, :server, :name, :LastFullBackup, :DatabaseSize)";
      $stmt = $file_db->prepare($insert);

      $stmt->bindParam(':filename', $filename);
      $stmt->bindParam(':server', $server);
      $stmt->bindParam(':name', $name);
      $stmt->bindParam(':LastFullBackup', $LastFullBackup); 
      $stmt->bindParam(':DatabaseSize', $DatabaseSize); 
      
      foreach($file as $line) {
        $splitted = preg_split("/\s+/", $line); //Beak each line in file by spaces
        
        $array1 = array("Recovery", "Test-RSG", "LMGRecovery"); #if statement checks if $splitted[1] equals any value(faster than bool)
        $array2 = array("Mailbox");
        $array3 = array("Recovery1");
        
        if ($splitted[1]) {             
          $server = $splitted[0];
          
          if (in_array( $splitted[1], $array1)) {
            $name = $splitted[1];                  
            $LastFullBackup = "";
            $DatabaseSize = $splitted[2]." ".$splitted[3]." ".$splitted[4]." ".$splitted[5]; 
            
          }else if (in_array( $splitted[1], $array2)) {
            $name = $splitted[1]." ".$splitted[2]." ".$splitted[3];                  
            $LastFullBackup = "";
            $DatabaseSize = $splitted[4]." ".$splitted[5]." ".$splitted[6]." ".$splitted[7]; 
          
          }else if (in_array( $splitted[1], $array3)) {
            $name = $splitted[1];                 
            $LastFullBackup = "";
            $DatabaseSize = "";
            
          }else{                     
            $name = $splitted[1];
            $LastFullBackup = $splitted[2]." ".$splitted[3]." ".$splitted[4];
            $DatabaseSize = $splitted[5]." ".$splitted[6]." ".$splitted[7]." ".$splitted[8];
          }
          $stmt->execute(); 
        }         
      }
    }
    $x = 'dbsummary 7-17-2012.txt';
    $result = $file_db->query("SELECT * FROM databaseSummary WHERE filename = '$x'");
    echo "<table class='table table-bordered table-striped table-condensed'>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Server</th>";
    echo "<th>Name</th>";
    echo "<th>Last Full Backup</th>";
    echo "<th>Database Size</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    foreach($result as $row) {
      echo "<tr>";
      echo "<td>".$row['filename']."</td>";
      echo "<td>".$row['server']."</td><td>".$row['name']."</td><td>".$row['LastFullBackup']."</td><td>".$row['DatabaseSize']."</td>";
    }
    
    $file_db->exec("DROP TABLE databaseSummary");
    
  }
  catch(PDOException $e) {
    // Print PDOException message
    echo $e->getMessage();
  }
?>