<?php 
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




<!-- code for payumoney ------------------------------- -->
<?php

//---------- Use this for live 
//$MERCHANT_KEY = "11K7xv";
//$SALT = "IMDX6LJU";
//$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

//---------- Use this for test mode
$MERCHANT_KEY = "oZ7oo9";
$SALT = "UkojH5TS";
$PAYU_BASE_URL = "https://test.payu.in";		// For Sandbox Mode



$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  //|| empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>

<script>
   
    window.onload = function() {
      var hash = '<?php echo $hash ?>';
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>

<!-- code for payumoney ------------------------------- -->







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
                    <th scope="col">Bid Price</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Option</th>
                    <th scope="col">Payment</th>
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
                        <td><?php echo $stringDate; ?></td>
                        <td>
                            
                            <?php echo $stat; ?>
                        
                        </td>
                        <td>
                        <a href='my_awarded_detail.php?jobid=<?php echo $pid1; ?>' >Details</a> 
                        </td>
                        <td>
                        <?php 
                        if ($paystat1 == "no funded"){
?>
                        
                      
                        <!--  <a href='my_awarded_fund.php?jobid=<?php echo $pid1; ?>' >Fund Test</a>
                        <!-- --------------------- Rozarpay Code ------ 
                        
                        <a href="javascript:void(0)" class="btn btn-sm btn-primary float-right buy_now" data-amount="1000" data-id="1">Fund Now</a> 
                        
                        -->
 <!-- --------------------- payumoney  Code  Start------     -->

 <?php if($formError) { ?>
	
  <span style="color:red">Please fill all mandatory fields.</span>
  <br/>
  <br/>
<?php } 

$pid111 = md5($pid1, '123');

?>

 <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $pid111 ?>" />

      <input type="hidden" name="amount" value="<?php echo $tpri1111; ?>" />
      <input type="hidden" name="firstname" id="firstname" value="<?php echo $_SESSION['first_name']; ?>" />
      <input type="hidden" name="email" id="email" value="<?php echo $_SESSION['username']; ?>" />
      <input type="hidden" name="phone" value="<?php echo $_SESSION['mobile']; ?>" />
      
      <input type="hidden" name="productinfo" value="<?php echo $tit1; ?>" />
      <input type="hidden" name="surl" value="https://trueshipp.com/payusuccess.php" />
      <input type="hidden" name="furl" value="https://trueshipp.com/payufailure.php" size="64" />
      <!-- <input type="hidden" name="service_provider" value="payu_paisa" size="64" /> -->
       
      <!--  Optional Parameters-- -->
      <input type="hidden" name="lastname" id="lastname" value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>" />
      <input type="hidden" name="address1" value="<?php echo (empty($posted['address1'])) ? '' : $posted['address1']; ?>" />
      <input type="hidden" name="address2" value="<?php echo (empty($posted['address2'])) ? '' : $posted['address2']; ?>" />
      <input type="hidden" name="city" value="<?php echo (empty($posted['city'])) ? '' : $posted['city']; ?>" />
      
      <input type="hidden" name="state" value="<?php echo (empty($posted['state'])) ? '' : $posted['state']; ?>" />
      <input type="hidden" name="country" value="<?php echo (empty($posted['country'])) ? '' : $posted['country']; ?>" />
      <input type="hidden" name="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" />
      
      <input type="hidden" name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" />
      <input type="hidden" name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" />
      <input type="hidden" name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" />
      <input type="hidden" name="udf4" value="<?php echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" />
      <input type="hidden" name="udf5" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" />
      <input type="hidden" name="pg" value="<?php echo (empty($posted['pg'])) ? '' : $posted['pg']; ?>" />
      
      
    <input class="btn btn-sm btn-warning" style="border: 1px solid #aaa; border-radius: 5px;" type="submit" value="Fund Now" />
       
       
    </form>



 <!-- --------------------- payumoney  Code End------     -->

                          <?php } else {
                            echo $paystat1;
                          }?>

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