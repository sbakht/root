<?php
  $str = "D, M d y";
  //echo date("D, d M y"); 
  $tomorrow  = mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"));
  $lastmonth = mktime(0, 0, 0, date("m")-1, date("d"),   date("Y"));
  $nextyear  = mktime(0, 0, 0, date("m"),   date("d"),   date("Y")+1);
  session_start();

  if(isset($_SESSION["authenticated"]) && $_SESSION["authenticated"]) {
    $file = simplexml_load_file("../todo.xml");

    $exists = 0;
    foreach($file->user as $user) {
      if(strcmp((string)$user['name'], $_SESSION["user"]) == 0) {
        $exists = 1;
      }
    }
    
    if($exists == 0) {
      $newUser = $file->addChild('user'); 
      $newUser->addAttribute('name', $_SESSION["user"]);
      $newDate = $newUser->addChild('date'); 
      $newDate->addAttribute('day', date($str));  
      //updates file to include new user and reopens so folowing code can run on new user
      $file->asXml("../todo.xml");
      $file = simplexml_load_file("../todo.xml");
    }
    
    $exists = 0;
    foreach($file->user as $user) {
      if(strcmp((string)$user['name'], $_SESSION["user"]) == 0) {
        foreach($user->date as $date) {
          if($date->attributes()->day == date($str)) {
            $exists = 1;
            $addstr = '';
            if(isset($_GET['today'])) {
              $today = $_GET['today'][0];
              foreach($today as $x) {
                $addstr = $addstr.'<li>'.$x.'</li>';
              }
            }
            $date->value = $addstr;
          }
        }
        if($exists == 0) {
          $newDate = $user->addChild('date'); 
          $newDate->addAttribute('day', date($str));         
        }  
      } 
    }
        
    

    
    //Saves updated xml file
    $file->asXml("../todo.xml");
  }
?>