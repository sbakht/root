<?php
$usernameSet=false;
if (isset($_COOKIE["workoutStat"])){
$usernameSet=true;
}else{
$usernameSet=false;
    }
if($usernameSet==false){
echo '<script language=javascript type="text/javascript">window.location="login.php"</script>';
}
?>