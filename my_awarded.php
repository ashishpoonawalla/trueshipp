<?php 
try{
  // echo "<br><br>";
  session_start();
}catch(Exception $e){

}
include_once("header.php");
?>

<!-- Common Area Top ------------------ -->

<?php

//------------------------------- Cookies

$uname11 = $_SESSION["username"];
$fname11 = $_SESSION["first_name"];
$mobile1 = $_SESSION["mobile"];
$user_id = $_SESSION["user_id"];
						
//session_start();

$cookie_name = "username";
$cookie_value = $_SESSION["username"] ;
//setcookie("username", $cookie_value, time() + (86400 * 30), "/"); 


$cookie_name = "first_name";
$cookie_value = $_SESSION["first_name"] ;
//setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 


$cookie_name = "mobile";
$cookie_value = $_SESSION["mobile"] ;
//setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 


$cookie_name = "user_id";
$cookie_value = $_SESSION["user_id"] ;
//setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); 




?>










<!-- Search Bar -->
<section class="page-title-section overlay" style="background: url(images/backgrounds/tra1.jpg) no-repeat center center;" >
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          
          <a class="h3 text-primary font-secondary" href="#">My Awarded Jobs</a> <br />
          
          
          
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
              ?>
                  <br />
                  <div class="alert alert-danger" role="alert">
                      Warning! login as user to view your job (projects).
                  </div>
                  <div style="min-height: 400px;"></div>
                    <?php
          }else{

?>



          <ul class="list-unstyled">

              

          <!-- <table class="table table-success table-striped table-hover"> -->
          <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">Job</th>
            <!--        <th scope="col">Image</th>     -->
                    <th scope="col">Bid</th>
                    <!-- <th scope="col">Date</th> -->
                    <th scope="col">Status</th>
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
  


 $Query1 = "Where (status1<>'Posted' AND status1<>'Delivered') AND userID=".$_SESSION["user_id"];

			$sql1="SELECT * FROM products $Query1 ORDER BY product_id DESC Limit $record_index, $limit" ;
      //echo $sql1; 
			$result1 = $conn->query($sql1);

			$rowcnt =0;
			 while($row1 = $result1->fetch_assoc())
			  {
          $rowcnt++;
         	$pid1 =$row1['product_id'];
			  	$img1 =$row1['product_image'];
          $tit1 =$row1['product_title'];
          $pri1 =$row1['product_price'];

          $PCity =$row1['PCity'];
          $DCity =$row1['DCity'];
          $Pdate = $row1['PDate'];
          $theDate    = new DateTime($Pdate);
          $stringDate = $theDate->format('d-M-Y');
          //list($year,$month,$day) = explode("-",$stringDate);
          
          //$st1 =  $day;
          //$st2 =  $month.'.'.$year;

          $desc =$row1['product_desc'];
          $desc1 = substr($desc,0,100);
          $stat =$row1['status1'];
          $tpri1 =$row1['tprice'];
          $paystat1 =$row1['paystatus'];
          $tpri1111 = $tpri1; // "1";
				?>

              
               
                    <tr>
                        <td scope="row"><?php echo $tit1; ?></td>
                <!--        <td><img src='./assets/images/<?php echo $pig1; ?>_1.png' style="height: 50px;" /></td>  -->
                        <td><?php echo $tpri1; ?></td>
                        <!-- <td><?php echo $stringDate; ?></td> -->
                        <td>
                            
                            <?php echo $stat; ?>
                        
                        </td>
                        <td>
                        <a href='my_awarded_detail.php?jobid=<?php echo $pid1; ?>' >Details</a>
                        
                        
                        <?php 
                        if ($stat != "Cancel" && $stat != "Cancel - Pending" ){
                          ?>
                         |  
                        <a href='my_awarded_cancel.php?jobid=<?php echo $pid1; ?>' onclick="return confirm('Are you sure you want to cancel this job? Note- It will take min 3 days to confirm from transporter to job cancel.');" >Cancel</a> 
                        <?php } ?>


                        </td>
                        
                       
                        
                    </tr>
                    
                  
                    <?php     }     ?>       
                    

                </tbody>
              </table>


          </ul>

          <?php


$sql = "SELECT COUNT(*) FROM products $Query1"; 
$retval1 = mysqli_query($conn, $sql);  
$row = mysqli_fetch_row($retval1);  
$total_records = $row[0];
$total_pages = ceil($total_records / $limit); 
//echo "$page, $total_pages";


$link1 = "";
if ($page > 1){
  $prev1 = "Job_list.php?page=".($page-1);
}else{

  $link1 = " disabled ";
}

$link2 = "";
if ($page <  $total_pages){
  $next1 = "Job_list.php?page=".($page+1);
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

<!-- RazorPay Script ----------------------- -->
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>

  $('body').on('click', '.buy_now', function(e){
    var totalAmount = $(this).attr("data-amount");
    var product_id =  $(this).attr("data-id");
    var options = {
    "key": "rzp_live_ILgsfZCZoFIKMb",
    "amount": (1*100), // 2000 paise = INR 20
    "name": "TrueShipp",
    "description": "Payment",
    "image": "https://trueshipp.epizy.com/images/favicon.png",
    "handler": function (response){
          $.ajax({
            url: 'http://localhost/trueshipp/payment-proccess.php',
            type: 'post',
            dataType: 'json',
            data: {
                razorpay_payment_id: response.razorpay_payment_id , totalAmount : totalAmount ,product_id : product_id,
            }, 
            success: function (msg) {

               window.location.href = 'http://localhost/trueshipp/success.php';
            }
        });
     
    },

    "theme": {
        "color": "#528FF0"
    }
  };
  var rzp1 = new Razorpay(options);
  rzp1.open();
  e.preventDefault();
  });

</script>


</body>
</html>