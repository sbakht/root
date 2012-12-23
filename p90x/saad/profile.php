<?php
  clearstatcache(); 
  //include("redirecttologin.php");
  $workouts = simplexml_load_file("../xml/workouts.xml");
  
  session_start();
?>

<!DOCTYPE html>

<html>
  <head>
    <title>User Profile</title>
    <script src="p90xjs.js" language="javascript" type="text/javascript"></script>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <?php include("navigation.php"); ?>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
      $('button').click(function() {
        alert($('pictureBefore').img());
      });
    });
    </script>
  
  </head>
  <body>   
    
    <div id="profile">
      <div id="firstName">
        <b>First Name</b>
        <input type="text" />
      </div>
      
      <div id="lastName">
        <b>Last Name</b>
        <input type="text" />
      </div>
      
      <div id="pictureBefore">
        <b>Before Picture</b>
        <input type="file" />
      </div>
      
      <div id="pictureAfter">
        <b>After Picture</b>
        <input type="file" />
      </div>
      
      <button>Submit</button>
      <div id="test">
      </div>
    </div>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script src="../js/bootstrap.min.js"></script>
  </body>
</html>	