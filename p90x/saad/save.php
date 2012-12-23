<?php
  session_start();

  if(isset($_SESSION["authenticated"]) && $_SESSION["authenticated"]) {
    echo "Logged in";
    $file = simplexml_load_file("../xml/Users/".$_SESSION['user'].".xml");
    
    foreach($file->program->workout as $workout) {
      if(strcasecmp((string)$workout["name"],$_GET["workout"]) == 0) {  //compare ignoring casing
        $getWeek = $_GET["week"];
        foreach($workout->$getWeek->routine as $routine) {
          if(strcasecmp((string)$routine["name"], str_replace('&amp;', '&', $_GET["name"])) == 0) {
            $userAmount = $_GET["useramount"];
            $userComment = $_GET["usercomment"];
            $i = 0;
            foreach($routine->children() as $exercise) {
              //updating xml file
              $exercise->amt = $userAmount[$i];
              $exercise->com = $userComment[$i];
              $i++;
            }
            //Saves updated xml file
            $file->asXml("../xml/Users/".$_SESSION['user'].".xml");
             clearstatcache();
          }
        }
      }
    }
  }

?>