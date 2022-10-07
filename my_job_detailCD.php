<?php 
try{
  // echo "<br><br>";
  session_start();
}catch(Exception $e){

}
include("header.php");
?>


<!-- code for payumoney ------------------------------- -->
<?php

//---------- Use this for live 
$MERCHANT_KEY = "11K7xv";
$SALT = "IMDX6LJU";
$PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

//---------- Use this for test mode
// $MERCHANT_KEY = "oZ7oo9";
// $SALT = "UkojH5TS";
// $PAYU_BASE_URL = "https://test.payu.in";		// For Sandbox Mode



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


<section class="page-title-section overlay" style="background: url(images/backgrounds/tra1.jpg) no-repeat center center;" >
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb">
            <li class="list-inline-item"><a class="h3 text-primary font-secondary" href="#">Payment</a></li>
            
          </ul>
        </div>
      </div>
    </div>
  </section>
  <!-- /page title -->
  
  <!-- section -->
  <section class="section-sm">
    <div class="container">
   
      <div class="row">
          <div class="col-md-6 mb-4">


<?php

//session_start();
if (isset($_POST["jobid"])){
    $_SESSION['pid2'] = $_POST["jobid"];
    $_SESSION['sid2'] = $email80 = $sid2 = $_POST["tusername"];
    $_SESSION['fnm2'] = $name80 = $fnm2 = $_POST["tname"];
    $img2 = $_POST["timage"];
    $_SESSION['tpri1111'] = $tpri1111 = $rat2 = $_POST["tprice"];
    $_SESSION['tit1'] = $tit1 = $_POST["tit1"];

    $fname80 = $_SESSION["first_name"];
    $unme80  = $_SESSION["username"];



    $pid2 = $_POST["jobid"];
    $email80 = $sid2 = $_POST["tusername"];
    $name80 = $fnm2 = $_POST["tname"];
    $img2 = $_POST["timage"];
    $tpri1111 = $rat2 = $_POST["tprice"];
    $tit1 = $_POST["tit1"];

    $fname80 = $_SESSION["first_name"];
    $unme80  = $_SESSION["username"];



    require('db.php');
        
    $sql="Update products SET tusername='$sid2', tname='$fnm2', tprice=$rat2 Where product_id=$pid2 " ;
    //$sql="Update products SET tusername='$sid2', tname='$fnm2', tprice=$rat2, status1='Awarded' Where product_id=$pid2 " ;



    if ($conn->query($sql) === TRUE) {


        //------------------ Send notifications ------------------------     
        // try {

        //     $conn1 = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
        //     // set the PDO error mode to exception
        //     $conn1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        //     $ntype = "job";   
        //     $nmessage = "Job award";
        //     $stmt12 = $conn1->prepare("INSERT INTO notifications (nmessage, jobid, suid, sfnm, ruid, rfnm, ntype) 
        //     VALUES (:nmessage, :jobid, :suid, :sfnm, :ruid, :rfnm, :ntype) ");

        //     $stmt12->bindParam(':nmessage', $nmessage);
        //     $stmt12->bindParam(':jobid', $pid1);
        //     $stmt12->bindParam(':suid', $unme80 );
        //     $stmt12->bindParam(':sfnm', $fname80);
        //     $stmt12->bindParam(':ruid', $sid2);                
        //     $stmt12->bindParam(':rfnm', $fnm2);
        //     $stmt12->bindParam(':ntype', $ntype);
        //     $stmt12->execute();

        // }
        // catch(Exception $ex){

        // }
        // //------------------ Send email ------------------------
        //     //session_start();
        //     $_SESSION["eml_to"] = $email80;
        //     $_SESSION["eml_sub"] = "Booking request on your vehicle: $tit1 ";
        //     $_SESSION["eml_mes"] = "Dear $name80, <br><br>$fname80 is awardedjob to you. job#$pid2 <br>.
        //                             <br><a target='_blank' href='https://trueshipp.com/my_job_detail.php?jobid=$pid1'>Click here to Open</a>";

        //     $_SESSION["eml_bcc"] = "trueshipp@gmail.com";

        //     //include_once("emailsend.php");
                      
        // //------------- End send email -------------------------

    }
    else
    {
        echo "Error Inserting record: " . $conn->error;
    }

}
// header('Location: my_awarded.php');

?>


<!-- --------------------- payumoney  Code  Start------     -->

<?php if($formError) { ?>	
    <!-- <span style="color:red">Please fill all mandatory fields.</span> -->
    <br/>
    <br/><br/><br/><br/>

  <?php } 
  
  // $pid111 = md5($pid1, '1233');
    $pid111 = $_SESSION['txid'];
  
  ?>
  
  <?php
    $path1 = "http://localhost/trueshipp/" ;
?> 


  <form action="<?php echo $action; ?>" method="post" name="payuForm">

  <!-- <form action="my_job_detailCCC.php" method="post" name="payuForm"> -->
        <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
        <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
        <input type="hidden" name="txnid" value="<?php echo $pid111; ?>" />

        <!-- ------------- PayuCode --------- -->
  
        <!-- <input type="hidden" name="amount" value="1" /> -->
        <input type="hidden" name="amount" value="<?php echo $_SESSION['tpri1111']; ?>" />

        <input type="hidden" name="firstname" id="firstname" value="<?php echo $_SESSION['first_name']; ?>" />
        <input type="hidden" name="email" id="email" value="<?php echo $_SESSION['username']; ?>" />
        <input type="hidden" name="phone" value="<?php echo $_SESSION['mobile']; ?>" />
        
        <input type="hidden" name="productinfo" value="<?php echo $_SESSION['tit1']; ?>" />
        <input type="hidden" name="surl" value="<?php echo $path1; ?>payusuccess.php" />
        <input type="hidden" name="furl" value="<?php echo $path1; ?>payufailure.php" size="64" />
        <!-- <input type="hidden" name="service_provider" value="payu_paisa" size="64" /> -->
         
        <!--  Optional Parameters-- -->
        <input type="hidden" name="lastname" id="lastname" value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>" />
        <input type="hidden" name="address1" value="<?php echo (empty($posted['address1'])) ? '' : $posted['address1']; ?>" />
        <input type="hidden" name="address2" value="<?php echo (empty($posted['address2'])) ? '' : $posted['address2']; ?>" />
        <input type="hidden" name="city" value="<?php echo (empty($posted['city'])) ? '' : $posted['city']; ?>" />
        
        <input type="hidden" name="state" value="<?php echo (empty($posted['state'])) ? '' : $posted['state']; ?>" />
        <input type="hidden" name="country" value="<?php echo (empty($posted['country'])) ? '' : $posted['country']; ?>" />
        <input type="hidden" name="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" />
        
        <input type="hidden" name="udf1" value="<?php echo $_SESSION['pid2']; ?>" />
        <input type="hidden" name="udf2" value="<?php echo $_SESSION['sid2']; ?>" />
        <input type="hidden" name="udf3" value="<?php echo $_SESSION['fnm2']; ?>" />
        <input type="hidden" name="udf4" value="<?php echo $_SESSION['tpri1111']; ?>" />
        <input type="hidden" name="udf5" value="<?php echo $_SESSION['tit1']; ?>" />
        <input type="hidden" name="pg" value="<?php echo (empty($posted['pg'])) ? '' : $posted['pg']; ?>" />
        
        <input class="btn btn-sm btn-warning" style="border: 1px solid #aaa; border-radius: 5px;" type="submit" value="Fund Now Rs. <?php echo $_SESSION['tpri1111']; ?>" />
        
      <!-- <button class="btn btn-sm btn-warning" style="border: 1px solid #aaa; border-radius: 5px;"  > Fund Now Rs. <?php echo $_SESSION['tpri1111']; ?></button> -->
         
         
      </form>
  
      <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
  
   <!-- --------------------- payumoney  Code End------     -->

  
      </div>
    </div>
  </div>
</section>
   
   
   <!-- Common Area Bottom ----------------------- -->



<!-- footer -->
<?php 
include("footer.php");
?>




</body>
</html>