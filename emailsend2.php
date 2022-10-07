
<?php
//session_start();

$msg1 = $_SESSION["eml_mes"];
$bcc = $_SESSION["eml_bcc"];

$to = $_SESSION["eml_to"];
$subject = $_SESSION["eml_sub"];

$message = "
<html>
<head>
<title>HTML email</title>
</head>
<body>
<p>$msg1</p>

</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= "From: <trueshipp@gmail.com>" . "\r\n";
$headers .= "Bcc: $bcc" . "\r\n";

mail($to,$subject,$message,$headers);
?>




