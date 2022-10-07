<?php
session_start();
$img_num = $_REQUEST['img_num'];
$target_file = "assets/images/" . $_SESSION["pidIMG"] . "_$img_num.png";
//$target_file1 = "assets/images/". $_SESSION["pidIMG"]. "_$img_numthumb.png";
$file111 =  $_SESSION["pidIMG"] . "_$img_num.png";




$path11 = "uploads";
$fileName = $_FILES["fileToUpload"]["name"]; // The file name
$fileTmpLoc = $_FILES["fileToUpload"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["fileToUpload"]["type"]; // The type of file it is
$fileSize = $_FILES["fileToUpload"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["fileToUpload"]["error"]; // 0 for false... and 1 for true
$kaboom = explode(".", $fileName); // Split file name into an array using the dot
$fileExt = end($kaboom); // Now target the last array element to get the file extension

// START PHP Image Upload Error Handling --------------------------------------------------
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    header('Location: post_jobImg.php?Error=6');
    exit();
} else if ($fileSize > 50242880) { // if file size is larger than 50 Megabytes
    echo "ERROR: Your file was larger than 5 Megabytes in size.";
    unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
    header('Location: post_jobImg.php?Error=6');
    exit();
} else if (!preg_match("/.(gif|jpg|png)$/i", $fileName)) {
    // This condition is only if you wish to allow uploading of specific file types    
    echo "ERROR: Your image was not .gif, .jpg, or .png.";
    unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
    header('Location: post_jobImg.php?Error=6');
    exit();
} else if ($fileErrorMsg == 1) { // if file upload error key is equal to 1
    echo "ERROR: An error occured while processing the file. Try again.";
    header('Location: post_jobImg.php?Error=6');
    exit();
}

// END PHP Image Upload Error Handling ---------------------------------
// Place it into your "uploads" folder mow using the move_uploaded_file() function
$moveResult = move_uploaded_file($fileTmpLoc, "$path11/$fileName");
// Check to make sure the move result is true before continuing
if ($moveResult != true) {
    echo "ERROR: File not uploaded. Try again.";
    unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
    header('Location: post_jobImg.php?Error=6');
    exit();
}
unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
// ---------- Include Adams Universal Image Resizing Function --------
include_once("ak_php_img_lib_1.0.php");
$target_tmp = "$path11/$fileName";
$resized_file = "$path11/$fileName";
//$resized_file = "uploads/resized_$fileName";
$wmax = 640;
$hmax = 640;
ak_img_resize($target_tmp, $resized_file, $wmax, $hmax, $fileExt);


// ----------- End Adams Universal Image Resizing Function ----------
// ------ Start Adams Universal Image Thumbnail(Crop) Function ------
$target_tmp = "$path11/$fileName";
//$target_tmp = "uploads/resized_$fileName";
//$thumbnail = "uploads/thumb_$fileName";


/*
$thumbnail = "uploads/thumb_$fileName";
$wthumb = 500;
$hthumb = 500;
ak_img_thumb($target_tmp, $thumbnail, $wthumb, $hthumb, $fileExt);
*/

//-------------------------------------------------------------------- Watermark

// Load the stamp and the photo to apply the watermark to

$stamp = imagecreatefrompng('images/watermark1.png');

$ext = strtolower($fileExt);
if ($ext == "gif") {
    $im = imagecreatefromgif($target_tmp);
} else if ($ext == "png") {
    $im = imagecreatefrompng($target_tmp);
} else {
    $im = imagecreatefromjpeg($target_tmp);
}
//$stamp = imagecreatefrompng('img/image2.png');
//$im = imagecreatefrompng('img/14.png');

$marge_right = 10;
$marge_bottom = 10;
$sx = imagesx($stamp);
$sy = imagesy($stamp);

imagecopy($im, $stamp, imagesx($im) - $sx - $marge_right, imagesy($im) - $sy - $marge_bottom, 0, 0, imagesx($stamp), imagesy($stamp));

header('Content-type: image/png');
imagepng($im, $target_file);
//imagedestroy($im);

//----------------------------------------------------- Watermark End


//copy("$path11/$fileName" , $target_file);
unlink("$path11/$fileName");

$pid = $_SESSION["pidIMG"];
require('db.php');

$sql = "UPDATE products SET product_image ='$file111' where product_id=$pid";

if ($img_num > 1) {
    $sql = "UPDATE products SET img$img_num='$file111' where product_id=$pid";
}


if ($conn->query($sql) === TRUE) {
    //echo "Record updated successfully";

} else {
    //echo "Record updated failed...";
}

header('Location: post_jobImg.php');
