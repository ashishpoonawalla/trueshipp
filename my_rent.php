<?php 
try{
  // echo "<br><br>";
  session_start();
}catch(Exception $e){

}
include_once("header.php");
?>

<!-- Common Area Top ------------------ -->









<!-- Search Bar -->
<section class="page-title-section overlay" style="background: url(images/backgrounds/tra1.jpg) no-repeat center center;" >
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          
          <a class="h3 text-info font-secondary" href="#">Vehicle > Rent / Sale Booking</a> <br />
          
          
          
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


<?php
            if (!isset($_SESSION["username"])){
              include('warning.php');
          }else{

?>



          <ul class="list-unstyled">

              

            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">Vehicle</th>
                    <!-- <th scope="col">Action</th>    -->
                    <th scope="col">Budget</th>
                    <th scope="col">Book from</th>
                    <!-- <th scope="col">Location</th> -->
            <!--        <th scope="col">View</th>       -->
                    
                    <th scope="col">Option</th>
                  </tr>
                </thead>
                <tbody>
               
               
               


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
  


 $Query1 = " Where username='".$_SESSION["username"]."' ";

			$sql1="SELECT * FROM product_seller $Query1 ORDER BY psid DESC Limit $record_index, $limit" ;
      //echo $sql1; 
			$result1 = $conn->query($sql1);

			$rowcnt=0;
			 while($row1 = $result1->fetch_assoc())
			  {
                $rowcnt++;
         	      $psid1 =$row1['psid'];
                $pid1 =$row1['product_id'];
			  	      $rat1 =$row1['rate'];
                $withdriver =$row1['withdriver'];
                $pickupdate =$row1['pickupdate'];
                $daymonth =$row1['daymonth'];
                $accept_reject = $row1['accept_reject'];

            
				
                        
            $sql222="SELECT * FROM products Where product_id=$pid1" ;
            $result222 = $conn222->query($sql222);

               
                if($row222 = $result222->fetch_assoc())
                {                                       
                    $tit1 =$row222['product_title'];
                    $pri1 =$row222['product_price'];
        
                    $PCity =$row222['PCity'];
                    $PAddress =$row222['PAddress'];
                    $Pdate = $row222['PDate'];
                    $stat = $row222['status1'];                    
                    $typepost =$row222['typepost'];
                    $status1 =$row222['status1'];
                    $paystatus =$row222['paystatus'];
                }
        ?>
                    <tr>
                        <td scope="row"><?php echo $tit1; ?>, <?php echo $PCity; ?>
                        <?php
                            if ($accept_reject =="Accept"){
                              ?>
                              <a href='message.php?jobid=<?php echo $pid1; ?>&psid=<?php echo $psid1;?>' style="Color: red;" ><b>Chat</b></a>
                              
                              <?php
                              if ($status1 == 'Cancel - Pending')
                              {
                                echo "<br><span style='color: red;'>$status1</span>";
                              }
                            }
                        ?>
                        </td>
                        <!-- <td scope="row"><?php echo $accept_reject; ?></td> -->
                        <td><?php echo $rat1; ?> <?php if($typepost == "BOOK") {echo "Per ". $daymonth;} ?></td>
                        <td><?php if($typepost == "BOOK") {echo $pickupdate;} else {echo "<i>Sale</i>";} ?></td>
                        <!--<td><?php echo $num222; ?></td>-->
                        
                        
                        <!-- <td><?php echo $PCity; ?></td> -->
                        <!--<td><?php echo $view; ?></td> -->
                        
                        <td>

                          
                          <?php
                            if ($accept_reject =="Accept"){
                              $txid = rand(1000000, 9999999);
                              ?>
                              <a href='vehicle_detail_pay.php?jobid=<?php echo $pid1; ?>&psid=<?php echo $psid1; ?>&txid=<?php echo $txid; ?>' >Detail</a>

                              <?php
                            }else{
                        ?>
                         
                           <a href='vehicle_detail.php?jobid=<?php echo $pid1; ?>' >Details</a>

                        <?php
                            }
                        ?>
                          | <a href='my_rent_delete.php?psid=<?php echo $psid1; ?>' onclick="return confirm('Are you sure you want to delete this job?');">
                                <img src="img/trash4.png" style="width: 22px;"/>
                          </a>

                        </td>
                    </tr>
                     
                  
                    <?php     }     ?>       
                    




                </tbody>
              </table>


          </ul>



          <?php


$sql = "SELECT COUNT(*) FROM product_seller $Query1"; 
$retval1 = mysqli_query($conn, $sql);  
$row = mysqli_fetch_row($retval1);  
$total_records = $row[0];
$total_pages = ceil($total_records / $limit); 
//echo "$page, $total_pages";


$link1 = "";
if ($page > 1){
  $prev1 = "my_rent.php?page=".($page-1);
}else{

  $link1 = " disabled ";
}

$link2 = "";
if ($page <  $total_pages){
  $next1 = "my_rent.php?page=".($page+1);
}else{

  $link2 = " disabled ";
}


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


<?php  
    if ($rowcnt < 8 )
    {
      for ($ff = 1; $ff<= (10-$rowcnt); $ff++){
        echo "<br><br>";
      }
    }



}    ?>

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