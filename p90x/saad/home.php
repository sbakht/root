<?php 
    /**
     * home.php
     *
     * A simple home page for these login demos.
     *
     * Computer Science E-75
     * David J. Malan
     */

    // enable sessions
    session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Home</title>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <?php include("navigation.php"); ?>    
  </head>
  <body>
    <h1>Home</h1>
    <h3>
      <?php if (isset($_SESSION["authenticated"]) && $_SESSION["authenticated"]) { ?>
        <?php echo "Welcome Back, ".$_SESSION["user"]."!" ?>
        <br />
        <a href="logout.php">log out</a>
      <?php } else { ?>
        You are not logged in!
      <?php } ?>
    </h3>
    
      <div class='span4'>
        <img src="Images/shaun-t.jpg" height="150px" width="100px" align="middle">
        <h3 style="text-align:center;">Workout!</h3>
        <p>Pick your favorite P90X workout routine and DO IT!</p>
      </div>
      <div class='span4'>
        <img src="http://placehold.it/300x150">
        <h3 style="text-align:center;">Record!</h3>
        <p>Come here and record your data. Track your gains!</p>
      </div>
      <div class='span4'>
        <img src="http://placehold.it/300x150">
        <h3 style="text-align:center;">Grow!</h3>
        <p>Upload your before and after results!</p>
      </div>
   <script src="http://code.jquery.com/jquery-latest.js"></script>
   <script src="../js/bootstrap.min.js"></script>    
  </body>
</html>
