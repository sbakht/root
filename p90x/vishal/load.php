<?php
//ob_start(); 
  session_start();

  if(isset($_SESSION["authenticated"]) && $_SESSION["authenticated"]) {
    echo "Logged in";
    $file = simplexml_load_file("users/".$_SESSION['user'].".xml");
    
    foreach($file->program->workout as $workout) {
      if(strcasecmp((string)$workout["name"],$_GET["workout"]) == 0) {  //compare ignoring casing
        $getWeek = $_GET["week"];
        foreach($workout->$getWeek->routine as $routine) {
          if(strcasecmp((string)$routine["name"], str_replace('&amp;', '&', $_GET["name"])) == 0) {
            $userData = array();
            $i = 0;
            foreach($routine->children() as $exercise) {
              //Fetches user's exercise data
              $userData[$i] = $exercise->amt;
              
              //echo $userData[$i];
              $i++;
            }
            //Return loaded data
            //ob_end_clean();
            echo json_encode($userData, JSON_NUMERIC_CHECK | JSON_FORCE_OBJECT);
          }
        }
      }
    }
  }

?>