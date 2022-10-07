<?php

session_start();

if (isset($_SESSION["uname"]))	{
	
	$_SESSION["var3"] ="N";
	header('Location: checkout.php');
} else {
	
	
	$_SESSION["var3"] ="Y";
	header('Location: Login.php');
}
?>	