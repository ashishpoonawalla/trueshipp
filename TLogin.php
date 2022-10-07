<?php 
include("header.php");
?>

<!-- Common Area Top ------------------ -->




<!-- page title -->
<section class="page-title-section overlay" style="background: url(images/backgrounds/tra1.jpg) no-repeat center center;" >
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb">
            <li class="list-inline-item"><a class="h3 text-primary font-secondary" href="#">Transporter Login</a></li>
          </ul>
          
        </div>
      </div>
    </div>
  </section>
  <!-- /page title -->
  
  <!-- contact -->
  <section class="section bg-gray">
    <div class="container">
      
      <div class="row">
        <div class="col-md-6">
        <br /><br />
        
        
                        <form method="post" action="TLoginCH.php"  data-form-title="Seller Login">
                            <input type="hidden" value="3DBsNCkcbhhdGtZUMdviVh7RUmLDH4NeGn6gs0u4E1koEpsQjDvFCEiDgC2TH4KZzy57aEPcfbp1OkfiqgAA5gy6xGcUXaAeLs69hIcU+ik9UE0k90bVe+r2gd1BxHKh" data-form-email="true">
                            <div class="form-group">
                                <input type="email" class="form-control" name="email" required="" placeholder="Email*" data-form-field="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password" required="" placeholder="Passward*" data-form-field="Password">
                            </div>
                            
                            <div class="mbr-buttons mbr-buttons--right"><button type="submit" class="mbr-buttons__btn btn btn-lg btn-primary">Login</button></div>
                        </form>
						
                        <br />
                        
  
                            <?php if (isset($_REQUEST['var'])){ 
                              ?>
                              <div class="alert alert-danger" role="alert">
                                <?php
                              echo $_REQUEST['var']; 
                              ?>
                              </div>
                              <?php                               } ?>
					
                  
                      <br/>
                      
                      <a href="TSignup.php"  >Transporter Signup</a>
                      <br/>
                      <br/>
                      <a href="TForgetPassword.php"  >Change or forgot password</a>
                      <br/>
                      <br/>      
        
        
        
        
        <!--
        <form action="#">
            <input type="email" class="form-control mb-3" id="tEmail" name="tEmail" placeholder="Email" required>            
            <input type="password" class="form-control mb-3" id="tPassword" name="tPassword" placeholder="Password" required>
            
            <button type="submit" value="send" class="btn btn-primary">Login</button>
          </form>
-->
        </div>

        <div class="col-md-6">
            




            
<!-- -----------------------  Google Login ----->    
<?php

//index.php

//Include Configuration File
include('configT.php');

$login_button = '';


if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];
  $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();

 
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}


if(!isset($_SESSION['access_token']))
{
 $img23 = "images/signin-google2.png";
 $login_button = '<a  href="'.$google_client->createAuthUrl().'"><img style="width: 300px; height: 48px;" src="'. $img23 .'"</a>';
}

?>

<br />
<br />
   
   <div class="panel panel-default">
   <?php
   if($login_button == '')
   {
     
      $Gemail = $_SESSION['user_email_address'];
      $Gfirst = $_SESSION['user_first_name'].' '.$_SESSION['user_last_name'];
      $Gimage = $_SESSION["user_image"];
    
      require('db.php');
		
      $sql="SELECT * FROM seller_info WHERE username='$Gemail' " ;
      $result = $conn->query($sql);

      if($row = $result->fetch_assoc())
      {
         //------------ If user already in database -------------------
         $_SESSION["uname"] =  $Gemail; 					$_SESSION["username"] = null;
         $_SESSION["proimg"] = $row["proImg"];					
         $_SESSION["StoreNM"] = $row["store_name"];
         $_SESSION["GST"]=$row["gst_num"];					
         $_SESSION["full_name"] = $row["full_name"];
         $_SESSION["city"] = $row["city"];
         $_SESSION["verify"] = $row["status1"];
         $_SESSION["mobile"] = $row["phone"];
         $_SESSION["membership"] = $row["membership"];

      }else{



        //------------ If user not in database -------------------

        
        $temail = $Gemail;
        $tfullname =  $Gfirst;
              
                  
        require('db.php');
		
				$sql="INSERT INTO seller_info(username, full_name) Values('$temail','$tfullname') " ;
		
				if ($conn->query($sql) === TRUE) {
          $last_id = $conn->insert_id;


          $_SESSION["uname"] = $temail; 					$_SESSION["username"] = null;
          $_SESSION["proimg"] = "";					
          $_SESSION["StoreNM"] = "";
          $_SESSION["GST"]="";					
          $_SESSION["full_name"] = $tfullname;
          $_SESSION["city"] = "";
          $_SESSION["verify"] =  "";
          $_SESSION["membership"] = "FREE";
         //------------ profile Image
          //$imagePath = "assets/imagesu/pro2.jpg";
          $newPath = "assets/imagesu/";
          $ext = '.jpg';
          $newName  = $newPath.$temail.$ext;
          
          file_put_contents($newName, file_get_contents($Gimage));
          
          //$copied = copy($imagePath , $newName);


          
          //------------ ID Image 1
          $imagePath = "assets/imagesu/noimg.png";
          $newPath = "assets/imagesu/";
          $ext = '.png';
          $newName  = $newPath.$temail."ID1".$ext;
          $copied = copy($imagePath , $newName);

          //------------ ID Image 2
          $imagePath = "assets/imagesu/noimg.png";
          $newPath = "assets/imagesu/";
          $ext = '.png';
          $newName  = $newPath.$temail."ID2".$ext;
          $copied = copy($imagePath , $newName);

          //------------ RC Image 
          $imagePath = "assets/imagesu/noimg.png";
          $newPath = "assets/imagesu/";
          $ext = '.png';
          $newName  = $newPath.$temail."ID3".$ext;
          $copied = copy($imagePath , $newName);
          //------------ Vehicle Image
          $imagePath = "assets/imagesu/noimg.png";
          $newPath = "assets/imagesu/";
          $ext = '.png';
          $newName  = $newPath.$temail."ID4".$ext;
          $copied = copy($imagePath , $newName);
          //------------ Vehicle Image 2
          $imagePath = "assets/imagesu/noimg.png";
          $newPath = "assets/imagesu/";
          $ext = '.png';
          $newName  = $newPath.$temail."ID5".$ext;
          $copied = copy($imagePath , $newName);
          
        }
       

      }
      //echo "<a href='index.php' > Login Successfully ".$_SESSION['user_first_name'].", Click here to goto home page </a>";
      //header('Location: index.php', false, 301);
      
      
      
      
      //------------- Send to Home page
      $url = "TDash.php";

      if (!headers_sent())
      {
        header('Location: '.$url);
        exit;
      }
      else
      {
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; 
        exit;
      }

/*
      echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
      echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
      echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
      echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
      echo '<h3><a href="logout.php">Logout</h3></div>';
*/     

   }
   else
   {
    echo '<div align="center">'.$login_button . '</div>';
   }
   ?>

<br>
  <div align="center">
  <!-- <a href='#' ><img src="images/fb2.png" style="width: 300px; height: 48px; " ></a> -->
  </div>




         <br><br><br><br><br><br><br><br><br><br><br>
          
        </div>


      </div>
    </div>
  </section>
  <!-- /contact -->











<!-- Common Area Bottom ----------------------- -->
<!-- footer -->
<?php 
include("footer.php");
?>


</body>
</html>