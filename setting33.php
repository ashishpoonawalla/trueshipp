<?php
session_start();
$uname = $_SESSION["username"] ;
$target_file = "assets/imagesu/". $uname. "ID2.png";
$file111 =  $uname. "ID2.png";


$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
		header('Location: setting.php?Error=1');
        
    }
}


// Check if file already exists
//if (file_exists($target_file)) {
//    echo "Sorry, file already exists.";
//    $uploadOk = 0;
//    header('Location: Seller.ProductImg.php?Error=2');
//}


// Check file size
if ($_FILES["fileToUpload"]["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
    header('Location: setting.php?Error=3');
}


// Allow certain file formats
if(strtolower($imageFileType) != "jpg" && strtolower($imageFileType) != "png" && strtolower($imageFileType) != "jpeg" && strtolower($imageFileType) != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
    header('Location: setting.php?Error=4');
}


// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    header('Location: setting.php?Error=5');
    
    
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
       
	   		$pid = $_SESSION["pidIMG"];
			require('db.php');	
			$sql="UPDATE products SET product_image ='$file111' where product_id=$pid" ;

			if ($conn->query($sql) === TRUE) {
			    echo "Record updated successfully";
			
			}else {
				echo "Record updated failed...";
			}
	   
	   		header('Location: setting.php');
	   
	   
    } else {
        echo "Sorry, there was an error uploading your file...";
        header('Location: setting.php');
    }
}

?>