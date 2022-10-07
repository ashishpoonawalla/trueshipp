<?php
session_start();			
require('db.php');

$jobid  = $_GET["jobid"]; 
$psid = $_GET["psid"];
$typ = $_GET["typ"];

$_SESSION["jobid"] = $jobid;
$_SESSION["psid"] = $psid;
$_SESSION["typ"] = $typ;
//--------- If User
if (isset($_SESSION["username"])){

  $_SESSION["suid"] = $_SESSION["username"] ;  
  $_SESSION["sfnm"] = $_SESSION["first_name"];
  $_SESSION["simg"] = $_SESSION["uimage"];

  if ($typ == 'JOB'){ //------------------- JOB
    
    $sql222="SELECT * FROM product_seller Where psid=$psid" ;
    $result222 = $conn222->query($sql222);

    if($row222 = $result222->fetch_assoc())
    {
    
      
        $sid222=$row222['username'];   
        $fnm222=$row222['full_name'];
        $img222=$row222['proImg'];
      
    }

  }else{ //------------------- BOOK/SALE

    $sql222="SELECT * FROM products Where product_id=$jobid" ;
    $result222 = $conn222->query($sql222);

    if($row222 = $result222->fetch_assoc())
    {
          
        $userEmail=$row222['userEmail'];   

        $sql223="SELECT * FROM seller_info Where username='$userEmail'" ;
        $result223 = $conn222->query($sql223);

        if($row223 = $result223->fetch_assoc()){
          $sid222=$row223['username'];   
          $fnm222=$row223['full_name'];
          $img222=$row223['proImg'];
        }
      
    }

  }
  $_SESSION["ruid"] = $sid222; 
  $_SESSION["rfnm"] = $fnm222;
  $_SESSION["rimg"] = $img222;
}

//--------- If Transporter
if (isset($_SESSION["uname"])){

  $_SESSION["suid"] = $_SESSION["uname"] ;  
  $_SESSION["sfnm"] = $_SESSION["full_name"];
  $_SESSION["simg"] = $_SESSION["proimg"];



  $sql222="SELECT * FROM product_seller Where psid=$psid" ;
  $result222 = $conn222->query($sql222);

   

  if($row222 = $result222->fetch_assoc())
  {
    $sid2228=$row222['username'];   
    $fnm2228=$row222['full_name'];
    $img2228=$row222['proImg'];

    $pid=$row222['product_id'];   
    
    $sql3="SELECT * FROM products Where product_id=$pid" ;
    $result3 = $conn222->query($sql3);

    if($row3 = $result3->fetch_assoc())
    {
    
      $uid3=$row3['userID'];   

      if ($uid3 == null){

        $sid222=$sid2228;   
        $fnm222=$fnm2228;
        $img222=$img2228;

      }else{
          $sql4="SELECT * FROM user_info Where user_id=$uid3" ;
          $result4 = $conn222->query($sql4);

          if($row4 = $result4->fetch_assoc())
          {     
          

            $sid222=$row4['email'];   
            $fnm222=$row4['first_name'];
            $img222=$row4['uimage'];
          // $sid222= $uid3;
          }
      }
    }
  }

  $_SESSION["ruid"] = $sid222; 
  $_SESSION["rfnm"] = $fnm222;
  $_SESSION["rimg"] = $img222;
  }






  
echo "<br>".$psid; 
echo "<br>".$_SESSION["suid"]; 
echo "<br>".$_SESSION["sfnm"]; 
echo "<br>".$_SESSION["simg"]; 

echo "<hr>".$_SESSION["ruid"]; 
echo "<br>".$_SESSION["rfnm"]; 
echo "<br>".$_SESSION["rimg"]; 


  header('Location: message.php');

  ?>
  <hr>
  <a href='message.php' >NEXT STEP </a>









  <?php
/*
session_start();			
require('db.php');

$jobid  = $_GET["jobid"]; 
$psid = $_GET["psid"];

$_SESSION["jobid"] = $jobid;
$_SESSION["psid"] = $psid;

$_SESSION["suid"] = $_SESSION["username"] ;  
$_SESSION["sfnm"] = $_SESSION["first_name"];
$_SESSION["simg"] = $_SESSION["uimage"];


$sql222="SELECT * FROM product_seller Where psid=$psid" ;
$result222 = $conn222->query($sql222);

  if($row222 = $result222->fetch_assoc())
  {
  
    $sid222=$row222['username'];
    $rat222=$row222['rate'];
    $fnm222=$row222['full_name'];
    $img222=$row222['proImg'];
    $let222=$row222['coverLetter'];
  }

  $_SESSION["ruid"] = $sid222; 
  $_SESSION["rfnm"] = $fnm222;
  $_SESSION["rimg"] = $img222;

  if ($_SESSION["username"] == $sid222){

    $_SESSION["suid"] = $sid222;
    $_SESSION["sfnm"] = $fnm222;
    $_SESSION["simg"] = $img222; 
  
    $_SESSION["ruid"] = $_SESSION["username"] ;  
    $_SESSION["rfnm"] = $_SESSION["first_name"];
    $_SESSION["rimg"] = $_SESSION["uimage"];

  
  }
 
echo "<br>".$_SESSION["suid"]; 
echo "<br>".$_SESSION["sfnm"]; 
echo "<br>".$_SESSION["simg"]; 

echo "<hr>".$_SESSION["ruid"]; 
echo "<br>".$_SESSION["rfnm"]; 
echo "<br>".$_SESSION["rimg"]; 


header('Location: message.php');
*/
?>