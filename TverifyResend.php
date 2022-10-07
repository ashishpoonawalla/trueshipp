<?php
session_start();
$uname1 = $_SESSION["vusername"];
$temail = $_SESSION["vusername"];
$tfullname = $_SESSION["full_name1"];


$verifycode = rand(10000000,99999999);
require('db.php');
		
$sql="UPDATE seller_info SET verifycode='$verifycode' WHERE username='$uname1'" ;
echo $sql;     
if ($conn->query($sql) === TRUE) {
//------------------ Send email ------------------------

    $_SESSION["eml_to"] = $temail;
    $_SESSION["eml_sub"] = "Account created successfully.";
    $_SESSION["eml_mes"] = "Dear $tfullname, <br><br>Your trueshipp transporter account created succesfully.<br>Your code for verify on trueshipp: $verifycode<br><br><a href='https://trueshipp.com/ULogin.php'>Click here to login</a>";
    $_SESSION["eml_bcc"] = "trueshipp@gmail.com";

include_once("emailsend.php");
    }
   header('Location: Tverify.php?var=Email verify code send succesfully. Check email!');
?>