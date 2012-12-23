<?php
  if($_GET["workout"] == 'null' ||$_GET["week"] == 'null') {
    exit;
  }
  
  $workouts = simplexml_load_file("../xml/workouts.xml");
  $exercises = simplexml_load_file("../xml/exercises.xml");
  
  session_start();

      if(isset($_GET["workout"])) {
        $listOfTables = array();
        $dayWorkoutSidebar = "<div class='tabbable tabs-left'><ul id='sidebar' class='nav nav-tabs'>";

        foreach($workouts->program->workout as $workout) {
          if(strcasecmp((string)$workout["name"], $_GET["workout"]) == 0) {  
            $getWeek = $_GET["week"];

            foreach($workout->$getWeek as $day) {
              //Appends to id to relate to corresponding exercise table for collapsing ability
              $x = 1;
              foreach($day as $dayWorkout) {
                //Displays each day's video for specified week in a table
                $collapseId = '#collapse'.$x;
                $id = 'sidebar'.$x;
                $link = '#day'.$x;
                $dayWorkoutSidebar = $dayWorkoutSidebar."<li><a href=$link id=$id>"."Day ".$x.": ".$dayWorkout."</a></li>";
                //$x++;
                
                foreach($exercises->routine as $routine) {
                  //Need string for comparing xml elements/attributes
                  if(strcasecmp((string)$routine["name"], $dayWorkout) == 0) {
                    
                    $table = "<table class='table table-striped table-condensed table-hover' style='width:40%;font-size:12px'>";
                    $table = $table."<tr><th>".$dayWorkout."</th><th>Amount</th><th>Comments</th></tr>";
                    $amount = 1;
                    foreach($routine as $exercise) {
                      $class = 'amount'.$amount.'day'.$x;
                      $comment = 'comment'.$amount.'day'.$x;
                      $table = $table."<tr><td>".$exercise."</td><td><input type='text' class=$class style='width:30px'></td><td><input type='text' class=$comment></td></tr>";
                      $amount++;
                    }
                    $table = $table."</table>";
                    $listOfTables[] = $table;
                  }
                }
                $x++;
              }
            }
           
            $dayWorkoutSidebar = $dayWorkoutSidebar."</ul></div>";
          }
        }
      
    echo "<div class='container-fluid'>";
      echo "<div class='row-fluid'>";
      echo "<input type='submit' id='save' value='Save'>";
        echo "<div class='span2  nav-list bs-docs-sidenav affix'>";
          echo $dayWorkoutSidebar;
        echo "</div>";
        
        echo "<div id='collapse1'class='span10 offset2' style='display:table'>";
          echo $listOfTables[0];
        echo "</div>";
        
        echo "<div id='collapse2'class='span10 offset2'style='display:none'>";
          echo $listOfTables[1];
        echo "</div>";
        
        echo "<div id='collapse3'class='span10 offset2'style='display:none'>";
          echo $listOfTables[2];
        echo "</div>";        

        echo "<div id='collapse4'class='span10 offset2'style='display:none'>";
          echo $listOfTables[3];
        echo "</div>";

        echo "<div id='collapse5'class='span10 offset2' style='display:none'>";
          echo $listOfTables[4];
        echo "</div>";

        echo "<div id='collapse6'class='span10 offset2' style='display:none'>";
          echo $listOfTables[5];
        echo "</div>";

        echo "<div id='collapse7'class='span10 offset2' style='display:none'>";
          echo $listOfTables[6];
        echo "</div>";    
        
      echo "</div>";
    echo "</div>";
    

      }
    ?>
