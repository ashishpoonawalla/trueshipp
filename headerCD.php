<?php
session_start();

    $conn = mysqli_connect('localhost','root',"",'trueshipp');
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        die();
    }
   // extract($_POST);


//--------------------------------- Insert Record ----------------------------------
   if (isset($_POST['signupEmail']) && isset($_POST['signupPassword']) && isset($_POST['signupName']) && isset($_POST['signupPhone']) ){

        $signupEmail=$_POST['signupEmail'];
        $signupPassword1=$_POST['signupPassword'];
        $signupName=$_POST['signupName'];
        $signupPhone=$_POST['signupPhone'];
        $signupPassword= md5($signupPassword1);
        
        $query = " INSERT INTO `user_info` (`user_email`, `password`, `fullname`, `mobile`) VALUES ('$signupEmail', '$signupPassword', '$signupName', '$signupPhone') ";
       
        if (mysqli_query($conn,$query)){
            session_start();
            $_SESSION["userid"] = $signupEmail;
            $_SESSION["fullname"] = $signupName;
            $_SESSION["profile"] = "/images/basic/profile.jpg";

            //echo "un - $loginEmail, $loginPassword , $loginPassword1  ";
            header('Location: a1.php');
        }else{
            header('Location: a2.php');
        }
        

    }



//--------------------------------- GET Row for Edit/Update----------------------------------
    if (isset($_POST['loginEmail']) && isset($_POST['loginPassword'])){
        $loginEmail = $_POST['loginEmail'];
        $loginPassword1 = $_POST['loginPassword'];
        $loginPassword = md5($loginPassword1);

    

        $query = " SELECT * FROM `user_info` WHERE user_email='$loginEmail' AND password='$loginPassword'"; 
        $result = mysqli_query($conn, $query);    

        if (mysqli_num_rows( $result) > 0 ){
            
            $row = mysqli_fetch_assoc($result);

            session_start();
            $_SESSION["userid"] = $loginEmail;
            $_SESSION["fullname"] = $row['fullname'];
            $_SESSION["profile"] = $row['proImage'];
            


            header('Location: a1.php');
            
        }else{
            header('Location: a2.php');
        }

        //echo json_encode($response);

    }


/*
//--------------------------------- Delete Record ----------------------------------
if (isset($_POST['deleteid'])){
    $userid = $_POST['deleteid'];
    $deletequery = " DELETE FROM crudtable WHERE id='$userid' ";
    mysqli_query($conn,$deletequery);

}

//--------------------------------- Update Record ----------------------------------
if (isset($_POST['hidden_user_id']) ){

    $uid = $_POST['hidden_user_id'];
    $firstname = $_POST['update_firstname'];
    $lastname = $_POST['update_lastname'];
    $email = $_POST['update_email'];
    $mobile = $_POST['update_mobile'];


    $query = " UPDATE `crudtable` SET `firstname`='$firstname',  `lastname`='$lastname', `email`='$email', `mobile`='$mobile' WHERE id='$uid' ";
    mysqli_query($conn,$query);

}
*/

?>