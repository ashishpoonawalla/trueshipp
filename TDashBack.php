<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Transporter</title>
    <link rel="shortcut icon" href="assets/images/LogoMakr_9qkixk.png" type="image/x-icon">
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
 
  <!-- <script type="text/javascript" charset="utf-8">
    document.addEventListener('contextmenu', event => event.preventDefault());
  </script> -->
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php

session_start();

?>
<?php
/*
if (!isset($_SESSION["uname"])){
  header('Location: http://localhost/trueshipp/Error.php');  
  
}
*/
?>
  <!-- Navbar ------------------------------------------------------------------------->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!--
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Transporter</a>
      </li>
    
      <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost/trueshipp/pages/transporter/products.php" class="nav-link">My Products</a>
      </li>
	  <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost/trueshipp/pages/transporter/orders.php" class="nav-link">Orders</a>
      </li>
	  <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost/trueshipp/pages/transporter/my_shipping.php" class="nav-link">Shipping</a>
      </li>
	  <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost/trueshipp/pages/transporter/my_delivered.php" class="nav-link">Delivered</a>
      </li>
	  <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost/trueshipp/pages/transporter/transaction.php" class="nav-link">Transaction</a>
      </li>
	  <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost/trueshipp/pages/transporter/withdrawl.php" class="nav-link">Withdrawl</a>
      </li>
	  <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost/trueshipp/pages/transporter/setting.php" class="nav-link">Profile</a>
      </li>
      
    </ul>

    <?php

              require('db.php');

              $un24 = '';
              $cnt112=0;

              if(isset( $_SESSION["uname"]))
                  $un24 =  $_SESSION["uname"];
              else if(isset( $_SESSION["username"]))
                  $un24 = $_SESSION["username"];			
              if ($un24 != ''){
                $sql112="SELECT * FROM chat Where ruid='$un24' AND status1='N'" ;
                //$sql112="SELECT DISTINCT psid FROM chat Where ruid='$un24' AND status1='N'" ;
							
							$result112 = $conn->query($sql112);

                $cnt112=0;
                while($row112 = $result112->fetch_assoc())
                {
                  $cnt112++;
                }
              }
              ?>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link"  href="http://localhost/trueshipp/Job_list.php">
          <i class="far fa-bell"></i>
          Job List 
        </a>
        
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link"  href="http://localhost/trueshipp/message.php">
          <i class="far fa-envelope"></i>
          <span class="badge badge-warning navbar-badge"><?php echo $cnt112; ?></span>
        </a>
        
      </li>
     <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost/trueshipp/Logout.php" class="nav-link">Logout</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->




  <!-- Main Sidebar Container -------------------------------------------------------->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="assets/images/LogoMakr_7XVO4n.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">TrueShipp</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!--
		<div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
		-->
        <div class="info">
          <a href="#" style="font-size: 20px; color:#f27c00;" class="d-block"><?php echo $_SESSION["StoreNM"]; ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
  <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
		  
 <?php
    $path1 = "http://localhost/trueshipp/" ;
    ?>  
       

         
          
     <li class="nav-item d-sm-inline-block">
        <a href="<?php echo $path1; ?>TDash.php" class="nav-link ">Home<i class="fas fa-angle-right right "></i></a>
        
      </li>
	 
      <li class="nav-item d-sm-inline-block">
        <a href="<?php echo $path1; ?>pages/transporter/my_quotes.php" class="nav-link">My Quotes<i class="fas fa-angle-right right"></i></a>
      </li>
	  <li class="nav-item d-sm-inline-block">
        <a href="<?php echo $path1; ?>pages/transporter/my_jobs.php" class="nav-link">My Jobs<i class="fas fa-angle-right right"></i></a>
      </li>
	  <li class="nav-item d-sm-inline-block">
        <a href="<?php echo $path1; ?>pages/transporter/my_shipping.php" class="nav-link">Shipping<i class="fas fa-angle-right right"></i></a>
      </li>
	  <li class="nav-item d-sm-inline-block">
        <a href="<?php echo $path1; ?>pages/transporter/my_delivered.php" class="nav-link">Delivered<i class="fas fa-angle-right right"></i></a>
      </li>
	  <li class="nav-item d-sm-inline-block">
        <a href="<?php echo $path1; ?>pages/transporter/transaction.php" class="nav-link">Transaction<i class="fas fa-angle-right right"></i></a>
      </li>
	  <li class="nav-item d-sm-inline-block">
        <a href="<?php echo $path1; ?>pages/transporter/withdrawl.php" class="nav-link">Withdrawl<i class="fas fa-angle-right right"></i></a>
      </li>
	  <li class="nav-item d-sm-inline-block">
        <a href="<?php echo $path1; ?>pages/transporter/setting.php" class="nav-link">Settings<i class="fas fa-angle-right right"></i></a>
      </li>
      <li class="nav-item d-sm-inline-block">
        <a href="<?php echo $path1; ?>Logout.php" class="nav-link">Logout</a>
      </li>
    	

 <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library 
               <li class="nav-item has-treeview">
            <a href="#" class="nav-link active">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Mailbox
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/mailbox/mailbox.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inbox</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Compose</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/read-mail.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Read</p>
                </a>
              </li>
            </ul>
          </li>		   
			   
-->

         
		 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

<?php
  $q_cnt=0;
	$o_cnt=0;
	$s_cnt=0;
	$d_cnt=0;





	require('db.php');
	
    
  $un24 =  $_SESSION["uname"];
  
				$sql2="SELECT * FROM product_seller where username='$un24'" ;
			
				$result2 = $conn->query($sql2);

				while($row2 = $result2->fetch_assoc())
  			{

					  $pid = $row2['product_id'];
						
						$sql1="SELECT * FROM products Where product_id=$pid AND status1='Posted'" ;
						
						$result1 = $conn->query($sql1);

						
						if($row1 = $result1->fetch_assoc())
						{
              $o_cnt++;
            }
            
        }
  
  
  
  
  
  
	
	/*					
	$sql1="SELECT * FROM product_seller where username='$un24' AND " ;						
	$result1 = $conn->query($sql1);							
	while($row1 = $result1->fetch_assoc())
	{	
		$o_cnt++;  	
	}
	*/					
						
  $sql1="SELECT * FROM products Where status1='Awarded' AND tusername='".$_SESSION["uname"]."'" ;						
	$result1 = $conn->query($sql1);							
	while($row1 = $result1->fetch_assoc())
	{	
		$s_cnt++;  	
	}
						
  $sql1="SELECT * FROM products Where status1='Shipping' AND tusername='".$_SESSION["uname"]."'" ;					
	$result1 = $conn->query($sql1);							
	while($row1 = $result1->fetch_assoc())
	{	
		$d_cnt++;  	
	}

  $sql1="SELECT * FROM products Where status1='Delivered' AND tusername='".$_SESSION["uname"]."'" ;					
	$result1 = $conn->query($sql1);							
	while($row1 = $result1->fetch_assoc())
	{	
		$q_cnt++;  	
	}
						

	
?>								



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Transporter Dashboard - <img src='./assets/imagesu/<?php echo $_SESSION["uname"]; ?>.jpg?t=<?php echo filemtime('./assets/imagesu/'.$_SESSION["uname"].'.jpg'); ?>' style="height: 40px; border-radius:30px; pointer-events: none;" /> 
            <?php 
            if ($_SESSION["verify"]=="Verify"){
              
              ?>
              <img src='./images/verify.png' style="height: 30px; " />
              <?php
              
            }
            echo $_SESSION["verify"];
            ?>
            </h1>
          </div><!-- /.col 
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Transporter Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $o_cnt; ?></h3>

                <p>Quotes</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-list-outline"></i>
              </div>
              <a href="http://localhost/trueshipp/pages/transporter/my_quotes.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
		  
		  
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $s_cnt; ?><sup style="font-size: 20px"></sup></h3>

                <p>Awarded Jobs</p>
              </div>
              <div class="icon">
                <i class="ion ion-trophy"></i>
              </div>
              <a href="http://localhost/trueshipp/pages/transporter/my_jobs.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php echo $d_cnt; ?></h3>

                <p>Shipping</p>
              </div>
              <div class="icon">
                <i class="ion ion-android-car"></i>
              </div>
              <a href="http://localhost/trueshipp/pages/transporter/my_shipping.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $q_cnt; ?></h3>

                <p>Delivered</p>
              </div>
              <div class="icon">
                <i class="ion ion-cube"></i>
              </div>
              <a href="http://localhost/trueshipp/pages/transporter/my_delivered.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-6 connectedSortable">
            <!-- Custom tabs (Charts with tabs)
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <i class="fas fa-chart-pie mr-1"></i>
                 ...
                </h3>
                
              </div>
             
              </div>
            </div>
            <!-- /.card -->

           
          </section>



        
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
  
  
  <footer class="main-footer">
    <strong>Copyright &copy; trueshipp</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
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
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
