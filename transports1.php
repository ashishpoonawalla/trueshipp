<?php 
try{
  // echo "<br><br>";
  session_start();
}catch(Exception $e){

}
include("header.php");
?>

<!-- Common Area Top ------------------ -->







<!-- Search Bar -->
<?php

$City1="";

$numQ = 0;
$Query1="";

$Q11 = "";

$Query1 = "";   
$Query1 = " WHERE status1<>'Admin' AND status1<>'Blocked' ";  

if(isset($_GET['City1']) ){

  $City1 = $_GET['City1'];

    if($City1!=''){  
      $Q11 .="&City1=$City1";
      //$Query1 = " WHERE city='$City1' AND status1='Run' ";   
      $Query1 = " WHERE city='$City1' AND status1<>'Admin' AND status1<>'Blocked' ";      
      $numQ++;
    }
}



?>

<section class="page-title-section overlay" style="background: url(images/backgrounds/tra1.jpg) no-repeat center center;" >
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        
        <a class="h3 text-primary font-secondary form-group mx-sm-2" href="#">Transporter Search</a>
        
        <form class="form-inline" action="transports.php" method="GET">

          <div class="form-group  mx-sm-2">
            
            <input type="text" class="form-control"  name="City1" value="<?php echo $City1 ?>" placeholder="City">
          </div>
          &nbsp;
          <div class="form-group  mx-sm-2">
          <button type="submit" style="width: 150px;" class="btn btn-primary  mx-sm-2">Search</button>
          </div>
        </form>
        
      </div>
    </div>
  </div>
</section>
<!-- /Search Bar -->

  
  <!-- notice -->
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <ul class="list-unstyled">



          <?php
			
			require('db.php');


      $limit = 10; 


      if (isset($_GET["page"] )) 
          {
          $page  = $_GET["page"]; 
          } 
      else 
         {
          $page=1; 
         };  
  
      $record_index= ($page-1) * $limit;      
  
  
  
      //$sql = "SELECT * FROM brands LIMIT $record_index, $limit";

 //  $sql1="SELECT * FROM seller_info $Query1 ORDER BY product_id DESC Limit 10" ;		


			$sql1="SELECT * FROM seller_info $Query1 Order By rating desc Limit $record_index, $limit" ;
      //echo $sql1; 
			$result1 = $conn->query($sql1);

			$cnt=0;
			 while($row1 = $result1->fetch_assoc())
			  {
          $cnt++;
        //  product_title, PCity, Pdate,   DCity,   DDate, product_cat, product_price, product_keywords, pweight, num_pack, product_desc, product_image, img2, img3, img4,  status1
			  	$unm1 =$row1['username'];
			  	$img1 =$row1['proImg'];
          $snm1 =$row1['store_name'];
          $fnm1 =$row1['full_name'];
          $city =$row1['city'];
          $verify=$row1['status1'];
          $rating=$row1['rating'];
          $numjob=$row1['numjob'];
          $status1=$row1['status1'];
				?>


        <!-- notice item -->
            <li li class="d-md-table mb-4 w-100 border-bottom hover-shadow">
                <div class="d-md-table-cell text-center p-4  text-white mb-4 mb-md-0" style="width: 160px; ">
                <img src='./assets/imagesu/<?php echo $unm1; ?>.jpg?t=<?php echo filemtime('./assets/imagesu/'.$unm1.'.jpg'); ?>' style="height: 100px; " /></div>
                
                <div class="d-md-table-cell px-4 vertical-align-middle mb-4 mb-md-0" style="width: 360px;">
                <h4><?php echo $fnm1; ?><?php 
                                  if ($verify=="Verify"){
                                    ?>
                                    <img src='./images/verify.png' style="height: 30px; " />
                                    <?php            }       ?></h4>
                <p class="mb-0"><?php echo $snm1; ?> <b><?php echo $city; ?></b></p>
              </div>
              <?php
              if ($rating > 0 ) { ?>
              <div class="d-md-table-cell px-4 vertical-align-middle mb-4 mb-md-0">
                <!-- 
                  <h4 style='color: orange'><?php
                 if ($rating>0 && $rating<=5){
                                echo "Rating: ";
                                      for ($s = 1; $s <=  $rating; $s++){
                                        echo "☆";
                                      }
                                     
                                    }
                                    ?></h4>
                                    -->

                                    <h4 style='color: orange'><?php
                 if ($rating>0 && $rating<=5){
                                echo "<img style='width:147px;' src='images/rat$rating.jpg'>";
                                     
                 }?></h4>
                <p class="mb-0">Project Deliverd: <b><?php echo $numjob; ?></b></p>
              </div>
              <?php } ?>
              <div class="d-md-table-cell text-right pr-0 pr-md-4">
                
            <?php 
            if ($status1== "Verify"){
            ?>

             
            <!-- ---------------------------- Popup Model ------------- -->

            <a href="#" data-toggle="modal" data-target="#id4Modal<?php echo $cnt;?>" class="btn btn-primary">Vehicle Detail</a></div>
            
            <div class="modal fade" id="id4Modal<?php echo $cnt;?>" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content rounded-5 border-0 p-4">
                      <div class="modal-header border-0">
                          <h3>Vehicle Image</h3>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">
                          
                      <img src='./assets/imagesu/<?php echo $unm1; ?>ID4.png?t=<?php echo filemtime('./assets/imagesu/'.$unm1.'ID4.png'); ?>' style="Width: 100%; " />
                          
                      </div>
                  </div>
              </div>
          </div>
            <!-- ---------------------------- Popup Model End------------- -->
            
          <?php
            }else{

          ?>

          <!-- ---------------------------- Popup Not Verified Transporter ------------- -->

          <a href="#" data-toggle="modal" data-target="#verifyModal<?php echo $cnt;?>" class="btn btn-primary">Vehicle Detail</a></div>
          
          <div class="modal fade" id="verifyModal<?php echo $cnt;?>" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content rounded-5 border-0 p-4" style="margin-top: 100px;">
            
            <!--
              <div class="modal-header border-0">
                  <h3>Warning!</h3>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              -->
              <div class="modal-body" style="text-align: center;">
                  
    
  
                      <img src="images/Sad-E1.png" style="width: 70px; text-align: center;" ><br><br>
                      <h4 style="text-align: center;">Transporter not verified by True Shipp</h4>
                      
                      
                 
              
             
              </div>
  
  
  
          </div>
              </div>
          </div>
            <!-- ---------------------------- Popup Not Verified Transporter  End------------- -->
            


          <?php
            }
          ?>  

          </li>




            

          <?php     }     ?>

            
          </ul>

          
          
<?php



$sql = "SELECT COUNT(*) FROM seller_info $Query1"; 
$retval1 = mysqli_query($conn, $sql);  
$row = mysqli_fetch_row($retval1);  
$total_records = $row[0];
$total_pages = ceil($total_records / $limit); 
//echo "$page, $total_pages";


$link1 = "";
if ($page > 1){
  $prev1 = "transports.php?page=".($page-1);
}else{

  $link1 = " disabled ";
}

$link2 = "";
if ($page <  $total_pages){
  $next1 = "transports.php?page=".($page+1);
}else{

  $link2 = " disabled ";
}

//$pagLink = "<div class='pagination'>";  
/*
echo "<ul class='pagination justify-content-center'>";
echo "<li class='page-item'><a href='transports.php?page=".($page-1)."' class='button'>Previous</a></li>"; 
    for ($i=1; $i<=$total_pages; $i++) {  
        echo "<li><a href='transports.php?page=".$i."'>".$i."</a></li>";
    };  
echo "<li><a href='transports.php?page=".($page+1)."' class='button'>NEXT</a></li>";
echo"</ul>";    
*/
?>
        

          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">

              <li class="page-item <?php echo $link1; ?>">
                <a class="page-link" href="<?php echo $prev1; ?><?php echo $Q11; ?>" tabindex="-1">Prev</a>
              </li>
              <!--                  <li class="page-item active"><a class="page-link" href="#">4</a></li>  -->

              <li class="page-item disabled"><a class="page-link" href="#"><?php echo $page.' of '.$total_pages; ?></a></li> 

              <li class="page-item <?php echo $link2; ?>">
                <a class="page-link" href="<?php echo $next1; ?><?php echo $Q11; ?>">Next</a>
              </li>
              

            </ul>
          </nav>
  
        </div>
      </div>
    </div>
  </section>
  <!-- /notice -->















<!-- Common Area Bottom ----------------------- -->
<!-- footer -->
<?php 
include("footer.php");
?>


</body>
</html>