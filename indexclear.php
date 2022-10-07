<?php

session_start();

unset($_SESSION["searchid11"]);
unset($_SESSION["lat11"]);
unset($_SESSION["lon11"]);
unset($_SESSION["searchBox11"]);

header('Location: index.php');
?>