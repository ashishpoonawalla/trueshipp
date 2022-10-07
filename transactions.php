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
          
          <a class="h3 text-primary font-secondary" href="#">My Transactions</a> <br />
          
          
          
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

<!--
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Active Jobs</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Pending Jobs</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Delivered</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Completed</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Cancelled</a>
                </li>
              </ul>
  -->            
              

  <!-- <table class="table table-success table-striped table-hover"> -->
  <table class="table  table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
            <!--        <th scope="col">Image</th>     -->
                    <th scope="col">Date</th>
                    <th scope="col">DR</th>
                    <th scope="col">CR</th>
                    <!-- <th scope="col">Status</th> -->
                    <th scope="col">Details</th>
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
  

            $un24 = $_SESSION['username'];
            $Query1 = " Where username='$un24' ";

			$sql1="SELECT * FROM transactions $Query1 ORDER BY tid DESC Limit $record_index, $limit" ;
      //echo $sql1; 
			$result1 = $conn->query($sql1);

			$rowcnt=0;
			 while($row1 = $result1->fetch_assoc())
			  {
          $rowcnt++;
         	        $tid1=$row1['tid'];
                    $amt1=$row1['amount'];
                    $det1=$row1['details'];
                    $dt1 =$row1['date'];
                    $drcr =$row1['DRCR'];
                    $dtt = explode(" ",$dt1 );
                    $dt1 = $dtt[0];
                    $dt2 = $dtt[1];
                    $status1 = $row1['status1'];



				?>

              
               
<tr>
                  <td>#<?php echo $tid1; ?></td>
                 
                  <td><?php echo $dt1; ?><br>T: <?php echo $dt2; ?></td>
                  <?php
				  	if($drcr == "DR"){
						?>
						<td style="text-align: right;"><?php echo $amt1; ?></td>
						<td></td>
						<?php
					}
					else
					{
						?>
						<td></td>
						<td style="text-align: right;"><?php echo $amt1; ?></td>
						
						<?php
					}
				  ?>
				  
				  
				  <!-- <td><?php echo $status1; ?></td> -->
                  <td><b><?php echo $status1; ?></b><br><?php echo $det1; ?></td>
                </tr>
				
                     
                  
                    <?php     }     ?>       
                    




                </tbody>
              </table>


          </ul>



          <?php


$sql = "SELECT COUNT(*) FROM transactions $Query1"; 
$retval1 = mysqli_query($conn, $sql);  
$row = mysqli_fetch_row($retval1);  
$total_records = $row[0];
$total_pages = ceil($total_records / $limit); 
//echo "$page, $total_pages";


$link1 = "";
if ($page > 1){
  $prev1 = "transactions.php?page=".($page-1);
}else{

  $link1 = " disabled ";
}

$link2 = "";
if ($page <  $total_pages){
  $next1 = "transactions.php?page=".($page+1);
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