<?php
    // enable sessions
    session_start();
    
    if (isset($_COOKIE["username"])){
      $usernameSet=true;
    }else{
      $usernameSet=false;
    }
    
    // if username and password were submitted, check them
    if (isset($_POST["user"]) && isset($_POST["pass"]) && strlen($_POST["user"]) >= 2 && strlen($_POST["pass"]) >= 4 )
    {
      $fileName = "../xml/secure.txt";
      $file = file($fileName, FILE_IGNORE_NEW_LINES);
      
      foreach($file as $line) {
        $stored = preg_split("/\|\|\|@\|\|\|/", $line);
        $storedUser = $stored[0];
        //Checks if entered username exists
        if ($_POST["user"] == $storedUser) {
          // The first 64 characters of the hash is the salt
          $salt = substr($stored[1], 0, 64);

          $hash = $salt . $_POST["pass"];

          // Hash the password as we did before
          for ( $i = 0; $i < 100000; $i ++ ) {
            $hash = hash('sha256', $hash);
          }

          $hash = $salt . $hash;
          
          //Checks if password is correct
          if ( $hash == $stored[1] ) {
            
            $_SESSION["authenticated"] = True;
            $_SESSION["user"] = $storedUser;
            setcookie("workoutStat", $storedUser, time()+1000);

            
            // redirect user to home page, using absolute path, per
            // http://us2.php.net/manual/en/function.header.php
            $host = $_SERVER["HTTP_HOST"];
            $path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
            header("Location: http://$host$path/home.php");
            exit;
          }
        }
      }
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Log In</title>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet"> 
    <?php include("navigation.php"); ?>
  </head>
  <body>
    <div><b>Login</b></div>
    <?php if (count($_POST) > 0) echo "<span style='color:red;'>Incorrect Username/Password Combination</span>"; ?>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
      <table>
        <tr>
          <td>Username:</td>
          <td><input name="user" type="text" value="<?php if (isset($_POST["user"])) echo $_POST["user"]; ?>" /></td>
        </tr>
        <tr>
          <td>Password:</td>
          <td><input name="pass" type="password" /></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="submit" value="Log In" /></td>
        </tr>
      </table>      
    </form>
    <a href="register.php">Create New Account</a>
    
   <script src="http://code.jquery.com/jquery-latest.js"></script>
   <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
