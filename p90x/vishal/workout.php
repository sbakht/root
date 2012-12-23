<?php
  $workouts = simplexml_load_file("workouts.xml");
  $exercises = simplexml_load_file("exercises.xml");
  
  session_start();
?>

<!DOCTYPE html>

<html>
  <head>
    <title>Workout</title>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body>

  
    <?php 
      if(isset($_GET["get_workout"])) {
        echo "<b>".$_GET["get_workout"]."</b>";
        $listOfTables = array();
        foreach($workouts->workout as $workout) {
          if((string)$workout["name"] == $_GET["get_workout"]) {  
            echo "<table class='table' border='1'>";
            echo "<th>Exercise</th>";
            echo "<th>Amount</th>";
            echo "<th>Comments</th>";
            
            //removes space from "Week #" and lowercases to match xml tag
            $getWeek = strtolower(str_replace(' ','',$_GET["get_week"]));
            
            foreach($workout->$getWeek as $day) {
              foreach($day as $dayWorkout) {
                //Displays each day's video for specified week in a table
                echo "<tr><td>".$dayWorkout."</td>";
                echo "<td><input type='text' size='5'></td>";
                echo "<td><input type='text'></td>";
                
                foreach($exercises->routine as $routine) {
                  //Need string for comparing xml elements/attributes
                  if((string)$routine["name"] == $dayWorkout) {
                    echo "<b>".$dayWorkout."</b><br>";
                    
                    $table = "<table>";
                    foreach($routine as $exercise) {
                      $table = $table."<tr><td>".$exercise."</td></tr>";
                    }
                    $table = $table."</table>";
                    echo $table;
                    $listOfTables[] = $table;
                  }
                }
              }
            }
            echo "</table>";
          }
        }
        
      }
    ?>
  
    <form class="navbar-form" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="get">
      <?php
          echo "<select name='get_workout'>";
          foreach($workouts->workout as $workout) {
            echo "<option>".$workout["name"]."</option>";
          }
          echo "</select>";
          
          echo "<select name='get_week'>";
          echo "<option>Week 1</option>";
          echo "<option>Week 2</option>";
          echo "<option>Week 3</option>";
          echo "<option>Week 4</option>";
          echo "<option>Week 5</option>";
          echo "<option>Week 6</option>";
          echo "<option>Week 7</option>";
          echo "<option>Week 8</option>";
          echo "<option>Week 9</option>";
          echo "</select>";          
      ?>
      <input type="submit" value="Submit" />
    </form>

    <h3><a href="home.php">Home</a></h3>
    
   <script src="http://code.jquery.com/jquery-latest.js"></script>
   <script src="../js/bootstrap.min.js"></script>
  </body>
</html>