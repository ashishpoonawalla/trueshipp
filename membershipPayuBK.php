<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Membershio</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="shortcut icon" href="../../assets/images/LogoMakr_9qkixk.png" type="image/x-icon">

  <!-- <script type="text/javascript" charset="utf-8">
    document.addEventListener('contextmenu', event => event.preventDefault());
  </script> --> 
</head>
<body class="hold-transition sidebar-mini layout-fixed"layout-fixed">
<div class="wrapper">
  
 <?php

session_start();

?> 







<!-- Main Sidebar Container -------------------------------------------------------->
  

      <?php
	  
    include("menutop.php");
	  
	include("menuleft.php");
	   
$tit = $_REQUEST['tit'];
$pri = $_REQUEST['pri'];

	  ?>
 
    <!-- /.sidebar -->


<!-- code for payumoney ------------------------------- -->
<?php

//---------- Use this for live 
// $MERCHANT_KEY = "11K7xv";
// $SALT = "IMDX6LJU";
// $PAYU_BASE_URL = "https://secure.payu.in";			// For Production Mode

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


<?php
//$pid111 = md5($var);
//$pid111 = $var;
$pid111 = rand(1000000,9900000);
?>





<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
		  		<h2><?php echo $tit; ?></h2>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
				           
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
     <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">



<form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $pid111 ?>" />

      <input type="text" name="amount" value="<?php echo $pri; ?>" />
      <input type="hidden" name="firstname" id="firstname" value="<?php echo $_SESSION['full_name']; ?>" />
      <input type="hidden" name="email" id="email" value="<?php echo $_SESSION['uname']; ?>" />
      <input type="hidden" name="phone" value="<?php echo $_SESSION['mobile']; ?>" />
      
      <input type="text" name="productinfo" value="<?php echo $tit; ?>" />

      <!-- <input type="hidden" name="surl" value="https://trueshipp.com/pages/transporter/membershippayusuccess.php" />
      <input type="hidden" name="furl" value="https://trueshipp.com/pages/transporter/membershippayufailure.php" size="64" /> -->

      <input type="hidden" name="surl" value="https://trueshipp.com/memberpayusuccess.php" />
      <input type="hidden" name="furl" value="https://trueshipp.com/memberpayufailure.php" size="64" />
      <!-- <input type="hidden" name="service_provider" value="payu_paisa" size="64" /> -->
       
      <!--  Optional Parameters-- -->
      <input type="hidden" name="lastname" id="lastname" value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>" />
      <input type="hidden" name="address1" value="<?php echo (empty($posted['address1'])) ? '' : $posted['address1']; ?>" />
      <input type="hidden" name="address2" value="<?php echo (empty($posted['address2'])) ? '' : $posted['address2']; ?>" />
      <input type="hidden" name="city" value="<?php echo (empty($posted['city'])) ? '' : $posted['city']; ?>" />
      
      <input type="hidden" name="state" value="<?php echo (empty($posted['state'])) ? '' : $posted['state']; ?>" />
      <input type="hidden" name="country" value="<?php echo (empty($posted['country'])) ? '' : $posted['country']; ?>" />
      <input type="hidden" name="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" />
      
      <input type="hidden" name="udf1" value="<?php echo $var; ?>" />
      <input type="hidden" name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" />
      <input type="hidden" name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" />
      <input type="hidden" name="udf4" value="<?php echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" />
      <input type="hidden" name="udf5" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" />
      <input type="hidden" name="pg" value="<?php echo (empty($posted['pg'])) ? '' : $posted['pg']; ?>" />
            
    <input class="btn btn-sm btn-warning" style="border: 1px solid #aaa; border-radius: 5px;" type="submit" value="Confirm & Pay Now Rs. <?php echo $pri; ?>" />
              
</form>




            </div>
        </div>
    </div>
</section >
     
</div>





     <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; TrueShipp</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>

var $input = $('input:text'), 
    $register = $('#register');    
$register.attr('disabled', true);

$input.keyup(function() {
    var trigger = false;
    $input.each(function() {
        if (!$(this).val()) {
            trigger = true;
        }
    });
    trigger ? $register.attr('disabled', true) : $register.removeAttr('disabled');
});



  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>