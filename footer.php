<!-- Common Area Bottom ----------------------- -->


<div  style="z-index: 199;  overflow: hidden; position: fixed;  width: 70px;  right: 16px;     bottom: 18px; "
onMouseOver="this.style.width='80px'"
        onMouseOut="this.style.width='70px'" 
 >
 
  <!-- <a href='post_job.php'><img src='images/Post.gif' class="plus11" style="width: 100%; " ></a> -->

  <audio id="sound1" src="images/click.mp3" preload="auto"></audio>
  <!-- <button onclick="document.getElementById('sound1').play();">Play
  it</button> -->
  
  <a onclick="document.getElementById('sound1').play();" href="#" data-toggle="modal" data-target="#postModal"><img src='images/Post.gif' class="plus11" style="width: 100%; " ></a>
  
</div>

<!-- Login Modal -->
<div class="modal fade" id="postModal" tabindex="-1" role="dialog" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document" style="margin-top: 100px; width:390px;  ">
        <div class="modal-content rounded-5 border-0 p-4"  >
            <!--
            <div class="modal-header border-0">
                <h3>Login</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            -->
            <div class="modal-body">

        <?php

          if (isset($_SESSION["uname"])){
        ?>

            <div onclick="javascript:window.location.href='pages/transporter/vehicleNew.php'; document.getElementById('sound1').play();" style="float:left; cursor: pointer; width: 150px;" onMouseOver="this.style.width='140px'"         onMouseOut="this.style.width='150px'" >
                <img src="images/CAR.png" style="width: 100%;"  >
            </div>
        <?php
            }else{
        ?>

            <div onclick="javascript:window.location.href='TLogin.php'; document.getElementById('sound1').play();" style="float:left; cursor: pointer; width: 150px;" onMouseOver="this.style.width='140px' "         onMouseOut="this.style.width='150px'" >
                <img src="images/CAR.png" style="width: 100%;"  >
            </div>

        <?php
            }
        ?>




            <div onclick="javascript:window.location.href='post_job.php'; document.getElementById('sound1').play();" style="float: right; cursor: pointer; width: 150px;" onMouseOver="this.style.width='140px'"         onMouseOut="this.style.width='150px'">
                <img src="images/BOX.png" style="width: 100%;"  >
            </div>
             
            </div>
        </div>
    </div>
</div>
<!-- Common Area Top ------------------ -->

<!-- ---------------------- Mobile bottom menu ------------------- -->

<?php 
            //--------------------------------------------------------- Email            
              $cnt112=0;

              if(isset( $_SESSION["uname"]))
                  $un24 =  $_SESSION["uname"];
              else if(isset( $_SESSION["username"]))
                  $un24 = $_SESSION["username"];	
              else
                  $un24 = "";

                if ($un24 != ""){
                  ?>

                  

                  <?php
                    require('db.php');

                    if ($un24 != ""){
                    $sql112="SELECT DISTINCT psid FROM chat Where ruid='$un24' AND status1='N'" ;
                    //$sql112="SELECT DISTINCT psid FROM chat Where ruid='$un24' AND status1='N'" ;
                  
                  $result112 = $conn->query($sql112);

                    $cnt112=0;
                    while($row112 = $result112->fetch_assoc())
                    {
                      $cnt112++;
                      
                    }

                  
                  } 
                }   ?>


<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <nav class="nav12" style="z-index: 198; background-color: #eee; overflow: hidden; position: fixed;   left: 0;   bottom: 0;  width: 100%;  ">
      <!-- <a href="index.php" class="nav__link--active"> -->
      <a href="index.php" class="nav__link">
        <i class="material-icons nav__icon">home</i>
        <span class="nav__text" style="font-size: 10px;">HOME</span>
      </a>
      <a href="message.php" class="nav__link nav__link">
        <i class="material-icons nav__icon">question_answer</i>

        <?php if ( $cnt112>0 ){ ?>  
        <span   class="badge badge-success"  style="position:absolute ;margin-top: -35px; margin-left: 18px; font-size: 10px;  border-radius: 15px; color: green; padding-top:6px;"> </span>
        <?php } ?>

        <span class="nav__text"style="font-size: 10px;">CHAT</span>
      </a>
      <a href="my_jobs.php" class="nav__link">
        <i class="material-icons nav__icon">cases</i>
        <span class="nav__text"style="font-size: 10px;">MY JOBS</span>
      </a>
      <a href="setting.php" class="nav__link">
        <i class="material-icons nav__icon">manage_accounts</i>
        <span class="nav__text"style="font-size: 10px;">SETTING</span>
      </a>
      <a href="post_job.php" class="nav__link" style="width: 40px;">
        <i class="material-icons nav__icon"></i>
        <span class="nav__text"style="font-size: 10px;"></span>
      </a>
    </nav>


<!-- ---------------------------- footer -->
<footer >
    
  <!-- copyright -->
  <div class="copyright py-4 bg-footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-7 text-sm-left text-center">
          
          <p class="mb-0" style="color: #ffffff;"><img class="" src="images/Watermark.png" style="width: 30px;" > 
            
            © True Shipp 
            <script>
              var CurrentYear = new Date().getFullYear()
              document.write(CurrentYear)
            </script> 
             | <a href='privacy.php' style="color: #aaa; ">Privacy</a> | <a href='termsofuse.php' style="color: #aaa; ">Terms</a> | <a href='refund.php' style="color: #aaa; ">Refund</a> | <a href='about.php' style="color: #aaa; ">About</a> | <a href='contact.php' style="color: #aaa; ">Contact</a></p>
        </div>
        <div class="col-sm-5 text-sm-right text-center">
          <ul class="list-inline">
            <li class="list-inline-item"><a class="d-inline-block p-2" href="https://www.facebook.com/trueshipp/" target="_blank" ><i class="ti-facebook text-primary" ></i></a></li>
            <li class="list-inline-item"><a class="d-inline-block p-2" href="https://twitter.com/TrueShipp?s=08" target="_blank" ><i class="ti-twitter-alt text-primary"></i></a></li>
            <!-- ---- <li class="list-inline-item"><a class="d-inline-block p-2" href="#" target="_blank" ><i class="ti-linkedin text-primary"></i></a></li> -->
            <li class="list-inline-item"><a class="d-inline-block p-2" href="https://instagram.com/trueshipp?igshid=14sfttfs55wj2" target="_blank" ><i class="ti-instagram text-primary"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- /footer -->

<!-- jQuery -->
<script src="plugins/jQuery/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="plugins/bootstrap/bootstrap.min.js"></script>
<!-- slick slider -->
<script src="plugins/slick/slick.min.js"></script>
<!-- aos -->
<script src="plugins/aos/aos.js"></script>
<!-- venobox popup -->
<script src="plugins/venobox/venobox.min.js"></script>
<!-- filter -->
<script src="plugins/filterizr/jquery.filterizr.min.js"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBu5nZKbeK-WHQ70oqOWo-_4VmwOwKP9YQ"></script>
<script src="plugins/google-map/gmap.js"></script>

<!-- Main Script -->

<script src="js/script.js"></script>
