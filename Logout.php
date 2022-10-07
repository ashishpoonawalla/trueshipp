<?php
session_start();




$_SESSION["uname"] = "";
$_SESSION["username"] = "";
$_SESSION["user_id"]="";
$_SESSION["auname"] = "";
// remove all session variables
session_unset();
setcookie("USER", "", time() - 3600); // 86400 = 1 day


//logout.php
include('config.php');

//Reset OAuth access token
try{
$google_client->revokeToken();
}
catch(Exception $e){

}

//Destroy entire session data.
session_destroy();
  

header('Location: index.php');

?>