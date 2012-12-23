<?php
    // enable sessions
    session_start();
	
	//allow the use of the createxml function from newxml file
	include('newXML.php');
	$usernameSet=false;
	if (isset($_COOKIE["username"])){
		$usernameSet=true;
	}else{
		$usernameSet=false;
    }
	// if username and password were submitted, check them
    if ( isset($_POST["user"]) && isset($_POST["pass"]) && strlen($_POST["user"]) >= 2 && strlen($_POST["pass"]) >= 4 ) {
      
      $username = $_POST["user"];
      $password = $_POST["pass"];
      
      // Create a 256 bit (64 characters) long random salt
      // Let's add 'something random' and the username
      // to the salt as well for added security
      $salt = hash('sha256', uniqid(mt_rand(), true) . 'something random' . strtolower($username));

      // Prefix the password with the salt
      $hash = $salt . $password;

      // Hash the salted password a bunch of times
      for ( $i = 0; $i < 100000; $i ++ ) {
        $hash = hash('sha256', $hash);
      }

      // Prefix the hash with the salt so we can find it back later
      $hash = $salt . $hash;

      $fileName = "secure.txt";
      $secure = file_get_contents($fileName);
      
      //Add username/password combination if the username does not already exist
      if (strpos($secure, $username."|||@|||") === false) {  
        file_put_contents($fileName, $username."|||@|||".$hash."\n",FILE_APPEND);
		//createXML($username);
		//createXML();
        echo "<script language=javascript>alert('Account Successfully Created')</script>";
		//echo '<script language=javascript type="text/javascript">successAcc();</script>';
		//echo '<script language=javascript type="text/javascript">var expiredate= new Date;expiredate.setMonth(expiredate.getMonth() + 6);document.cookie="username="+$username+";expires= "+expiredate.toGMTString();alert("working");</script>';
		echo setcookie("username", $username, time()+1000);
      }else{
        echo "<span style='color:red;'>That username is already in use.</span>";
      }
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <script src="p90xjs.js" language="javascript" type="text/javascript"></script>
    <title>Create New Account</title>
    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
  </head>
  <body onload="checkCookie()">
    <div><b>Create New Account</b></div>
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
      <table>
        <tr>
          <td>Username:</td>
          <td><input name="user" type="text" onkeyup="checkChar(this.value)"/></td>
		  <td><span id="errorcheck" style="color:red;"></span></td>
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
    <a href="login.php">Return To Login Screen</a>
    
   <script src="http://code.jquery.com/jquery-latest.js"></script>
   <script src="../js/bootstrap.min.js"></script>
  </body>
</html>
