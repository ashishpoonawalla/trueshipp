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
            <li class="list-inline-item"><a class="h3 text-primary font-secondary" href="#">User Login</a></li>
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
        
        
            <form action="ULoginCH.php" method="POST" data-form-title="Signup User">              
              
                <div class="form-group">
                    <input type="text" class="form-control" id="uemail" name="uemail" placeholder="Email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" id="upassword" name="upassword" placeholder="Password" required>
                </div>
                
                    <button type="submit" class="btn btn-primary"  >Login</button>

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
                      
                      <a href="USignup.php"  >New User Signup</a>
                      <br/>
                      <br/>
                      <a href="UForgetPassword.php"  >Change or forgot password</a>
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
include('config.php');

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
 $login_button = '<a  href="'.$google_client->createAuthUrl().'"><img style="width: 300px; " src="'. $img23 .'"></a>';
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
		
      $sql="SELECT * FROM user_info WHERE email='$Gemail' " ;
      $result = $conn->query($sql);

      if($row = $result->fetch_assoc())
      {
         //------------ If user already in database -------------------
            $_SESSION["username"] = $Gemail;							$_SESSION["uname"] = null;
						$_SESSION["first_name"] = $Gfirst;
						$_SESSION["mobile"] = $row["mobile"];
						$_SESSION["user_id"] = $row["user_id"];
						$_SESSION["uimage"] = $Gimage;

            //header('Location: index.php');
            //exit();

      }else{



        //------------ If user not in database -------------------

        $uemail = $Gemail;        
        $ufullname = $Gfirst;
               
                  
        require('db.php');
		
				$sql="INSERT INTO user_info(email, first_name) Values('$uemail','$ufullname') " ;
		
				if ($conn->query($sql) === TRUE) {
          $last_id = $conn->insert_id;


            $_SESSION["username"] = $Gemail;							$_SESSION["uname"] = null;
						$_SESSION["first_name"] = $Gfirst;
						$_SESSION["mobile"] = "";
						$_SESSION["user_id"] = $last_id;
         //------------ Pro image
          //$imagePath = "assets/imagesu/pro2.jpg";
          $newPath = "assets/imagesu/";
          $ext = '.jpg';
          $newName  = $newPath.$uemail.$ext;
          
          file_put_contents($newName, file_get_contents($Gimage));
          
          //$copied = copy($imagePath , $newName);


          //------------ ID Image 1
          $imagePath = "assets/imagesu/noimg.png";
          $newPath = "assets/imagesu/";
          $ext = '.png';
          $newName  = $newPath.$uemail."ID1".$ext;
          $copied = copy($imagePath , $newName);

          //------------ ID Image 2
          $imagePath = "assets/imagesu/noimg.png";
          $newPath = "assets/imagesu/";
          $ext = '.png';
          $newName  = $newPath.$uemail."ID2".$ext;
          $copied = copy($imagePath , $newName);
          //header('Location: index.php');
          //exit();
        }
       

      }
      //echo "<a href='index.php' > Login Successfully ".$_SESSION['user_first_name'].", Click here to goto home page </a>";
      //header('Location: index.php', false, 301);
      
      
      
      
      //------------- Send to Home page
      $url = "index.php";

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
  <!-- <a href='#'><img src="images/fb2.png" style="width: 300px; height: 48px; " ></a> -->
  </div>
          <p class="mb-5"><br><br><br><br><br><br><br><br><br><br><br><br></p>
          
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