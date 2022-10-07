<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "trueshipp";

/*
$servername = "localhost";
$username = "id16188829_ashish";
$password = "maucom007";
$db = "id16188829_trueshipp";
*/

// Create connection
//$conn = mysqli_connect($servername, $username, $password,$db);
$conn=new mysqli($servername, $username, $password,$db);	
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


?>