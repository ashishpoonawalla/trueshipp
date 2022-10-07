<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>admin.Crunilance</title>
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
  <!-- <script type="text/javascript">
    function preventbackbutton(){window.history.forward();}
    setTimeout("preventbackbutton()", 0);
    window.onunload=function(){null};
  </script> -->
 


</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
<?php

session_start();

?>

<?php
/*
if (!isset($_SESSION["auname"])){
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
   <!--
      <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost/trueshipp/admin_dash.php" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost/trueshipp/pages/admin/users.php" class="nav-link">User</a>
      </li>
	    <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost/trueshipp/pages/admin/sellers.php" class="nav-link">Transporter</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost/trueshipp/pages/admin/jobs.php" class="nav-link">Jobs</a>
      </li>
	  <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost/trueshipp/pages/admin/awarded.php" class="nav-link">Awarded</a>
      </li>
	 
	  <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost/trueshipp/pages/admin/delivered.php" class="nav-link">Delivered</a>
      </li>
    <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost/trueshipp/pages/admin/transaction.php" class="nav-link">Transaction</a>
      </li>
	  <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost/trueshipp/pages/admin/withdrawl.php" class="nav-link">Withdrawl</a>
      </li>
	  <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost/trueshipp/pages/admin/profile.php" class="nav-link">Profile</a>
      </li>

      -->
    </ul>

    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
      
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
      <img src="./assets/images/LogoMakr_7XVO4n.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin.Crunilance</span>
    </a>



    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!--
		<div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
	
        <div class="info">
          <a href="#" style="font-size: 20px; color: #f27c00;"  class="d-block" ><?php echo $_SESSION["StoreNM"]; ?></a>
        </div>
        -->
      </div>



<!-- Sidebar Menu -->
  <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
		  
		<?php
    $path1 = "http://localhost/trueshipp/" ;
    ?>       

         
          
     <li class="nav-item  d-sm-inline-block">
        <a href="<?php echo $path1; ?>admin_dash.php" class="nav-link">Admin Home<i class="fas fa-angle-right right"></i></a>
        
      </li>
	 
      <li class="nav-item  d-sm-inline-block">
        <a href="<?php echo $path1; ?>pages/admin/users.php" class="nav-link">Users<i class="fas fa-angle-right right"></i></a>
      </li>
	  <li class="nav-item  d-sm-inline-block">
        <a href="<?php echo $path1; ?>pages/admin/transporter.php" class="nav-link">Transporters<i class="fas fa-angle-right right"></i></a>
      </li>
      <li class="nav-item  d-sm-inline-block">
        <a href="<?php echo $path1; ?>pages/admin/jobs_pending.php" class="nav-link">Pendings<i class="fas fa-angle-right right"></i></a>
      </li>
      <li class="nav-item  d-sm-inline-block">
        <a href="<?php echo $path1; ?>pages/admin/jobs_cancel.php" class="nav-link">Jobs Cancel<i class="fas fa-angle-right right"></i></a>
      </li>
      <li class="nav-item  d-sm-inline-block">
        <a href="<?php echo $path1; ?>pages/admin/vehicle_cancel.php" class="nav-link">Vehicle Cancel<i class="fas fa-angle-right right"></i></a>
      </li>
      <!-- <li class="nav-item  d-sm-inline-block">
        <a href="<?php echo $path1; ?>pages/admin/vehicle_pending.php" class="nav-link">Pending Vehicle<i class="fas fa-angle-right right"></i></a>
      </li> -->
      <li class="nav-item  d-sm-inline-block">
        <a href="<?php echo $path1; ?>pages/admin/edit_request.php" class="nav-link">Verification Requests<i class="fas fa-angle-right right"></i></a>
      </li>
	  <li class="nav-item  d-sm-inline-block">
        <a href="<?php echo $path1; ?>pages/admin/jobs.php" class="nav-link">Jobs Approved<i class="fas fa-angle-right right"></i></a>
      </li>
	  <li class="nav-item  d-sm-inline-block">
        <a href="<?php echo $path1; ?>pages/admin/awarded.php" class="nav-link">Awarded<i class="fas fa-angle-right right"></i></a>
      </li>
	  <li class="nav-item  d-sm-inline-block">
        <a href="<?php echo $path1; ?>pages/admin/shipping.php" class="nav-link">Shipping<i class="fas fa-angle-right right"></i></a>
      </li>
      <li class="nav-item  d-sm-inline-block">
        <a href="<?php echo $path1; ?>pages/admin/delivered.php" class="nav-link">Delivered<i class="fas fa-angle-right right"></i></a>
      </li>
      <li class="nav-item  d-sm-inline-block">
        <a href="<?php echo $path1; ?>pages/admin/transaction.php" class="nav-link">Transaction<i class="fas fa-angle-right right"></i></a>
      </li>
	  <li class="nav-item  d-sm-inline-block">
        <a href="<?php echo $path1; ?>pages/admin/withdrawl.php" class="nav-link">Withdrawl<i class="fas fa-angle-right right"></i></a>
      </li>
    <li class="nav-item  d-sm-inline-block">
        <a href="<?php echo $path1; ?>pages/admin/reports.php" class="nav-link">Report Issues<i class="fas fa-angle-right right"></i></a>
      </li>
	 <!--
    <li class="nav-item  d-sm-inline-block">
        <a href="<?php echo $path1; ?>pages/admin/profile.php" class="nav-link">Profile<i class="fas fa-angle-right right"></i></a>
      </li>
		--> 
    	<li class="nav-item d-sm-inline-block">
        <a href="<?php echo $path1; ?>Logout.php" class="nav-link">Logout</a>
      </li>

 <!-- 
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
</aside>



<?php
  $q_cnt=0;
	$o_cnt=0;
	$s_cnt=0;
	$d_cnt=0;





	require('db.php');
	
  
  $sql1="SELECT * FROM products Where status1='Posted'  " ;
  
  $result1 = $conn->query($sql1);

  
  while($row1 = $result1->fetch_assoc())
  {
    $o_cnt++;
  }
      
    			
						
  $sql1="SELECT * FROM seller_info Where status1<>'Admin' " ;						
	$result1 = $conn->query($sql1);							
	while($row1 = $result1->fetch_assoc())
	{	
		$s_cnt++;  	
	}
						
  $sql1="SELECT * FROM user_info " ;					
	$result1 = $conn->query($sql1);							
	while($row1 = $result1->fetch_assoc())
	{	
		$d_cnt++;  	
	}

  $sql1="SELECT * FROM transactions Where status1='Pending' ORDER BY tid DESC " ;
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
            <h1 class="m-0 text-dark">Admin Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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

                <p>Job Listed</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="http://localhost/trueshipp/pages/admin/jobs.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $s_cnt; ?><sup style="font-size: 20px"></sup></h3>

                <p>Transporters</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="http://localhost/trueshipp/pages/admin/transporter.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $d_cnt; ?></h3>

                <p>Users</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="http://localhost/trueshipp/pages/admin/users.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $q_cnt; ?></h3>

                <p>Withdrawl Request</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="http://localhost/trueshipp/pages/admin/withdrawl.php" class="small-box-footer">More Info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->


<!-- Main row -->
<div class="row">
<!-- -------------------------------------------------- Pending Job Lists -->
        <section class="col-lg-6 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <!--<i class="fas fa-chart-pie mr-1"></i>-->
                  <a href="<?php echo $path1; ?>pages/admin/jobs_pending.php"><b>Pending Jobs & Vehicles</b></a>
                </h3>
                
              </div><!-- /.card-header -->
              <div class="card-body">
              <table id="example2" class="table  table-hover">
                <!--<thead>
                <tr>
                  <th>Job Title</th>
                  <th>Route</th>                  
                  <th></th>
                </tr>
                </thead>-->
                <tbody>
                
				
				 <?php
			  
			  	require('db.php');
				  
          // $Query1 = "Where (status1='Pending' OR status1='Cancel - Pending') AND typepost='JOB' "; //AND tusername='".$_SESSION["uname"]."'";
					$Query1 = "Where (status1='Pending')  "; //AND tusername='".$_SESSION["uname"]."'";
						
          $sql1="SELECT * FROM products $Query1 ORDER BY product_id DESC " ;
							
							$result1 = $conn->query($sql1);
							
							while($row1 = $result1->fetch_assoc())
							{
							  $pid1 =$row1['product_id'];
                $img1 =$row1['product_image'];
                $tit1 =$row1['product_title'];
                $tpri1 =$row1['tprice'];

                $PCity =$row1['PCity'];
                $DCity =$row1['DCity'];
                $Pdate = $row1['PDate'];
                $theDate    = new DateTime($Pdate);
                $stringDate = $theDate->format('d-M-Y');              

                $desc =$row1['product_desc'];
                $desc1 = substr($desc,0,100);
                $stat =$row1['status1'];
                $amt =$row1['product_price'];
								
							    
					 ?>
				
						<tr>
		                  <td><?php echo $tit1; ?></td>
                      <td><?php echo $stat; ?></td>
		                  <!-- <td><?php echo $PCity; ?> - <?php echo $DCity; ?></td>		                   -->
		                  <td>
						  
						            <a class="btn btn-info btn-sm" href="pages/admin/job_detail.php?var=<?php echo $pid1; ?>">
	                          Detail
	                      </a>
						  
						          </td>
		                </tr>
                <?php
								
						}
				 ?>
          
                </tbody>
                <tfoot>
                
                </tfoot>
              </table>
            </div>
            </div>
            

           
          </section>




<!-- -------------------------------------------------- Edit Request Transporter List -->

          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-6 connectedSortable">

    <!-- Custom tabs (Charts with tabs)-->
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <!--<i class="fas fa-chart-pie mr-1"></i>-->
                  <a href="<?php echo $path1; ?>pages/admin/edit_request.php"><b>Verification request</b></a>
                </h3>
                
              </div><!-- /.card-header -->
              <div class="card-body">
              <table id="example2" class="table table-hover">
                <!--<thead>
                <tr>
                  <th>Job Title</th>
                  <th>Route</th>                  
                  <th></th>
                </tr>
                </thead>-->
                <tbody>
                
				
				 <?php
			  
			  	require('db.php');
				  
          $Query1 = " Where editrequest=2 "; //AND tusername='".$_SESSION["uname"]."'";
						
          $sql1="SELECT * FROM seller_info $Query1  " ;
							
							$result1 = $conn->query($sql1);
							
							while($row1 = $result1->fetch_assoc())
							{
                $email = $row1["username"] ;
                $store_name = $row1["store_name"] ;
                $gst_num = $row1["gst_num"] ;
                $full_name = $row1["full_name"];
                $phone = $row1["phone"];
                $address = $row1["address"];
                $city = $row1["city"];
                $pin = $row1["pin"];
                $edt = $row1["editrequest"];  
                
							    
					 ?>
				
				
				
				
						<tr>
                  <td><?php echo $full_name; ?></td>
                  <td><?php echo $email; ?> - <?php echo $phone; ?></td>		                  
                  <td>
						  <!--
						  <a class="btn btn-info btn-sm" href="pages/admin/job_detail.php?var=<?php echo $email; ?>">
	                          Detail
	                      </a>
						  -->
						  </td>
		                </tr>
                <?php
								
						}
				 ?>
          
                </tbody>
                <tfoot>
                
                </tfoot>
              </table>
            </div>
            </div>
            

		   
          </section>
          <!-- right col -->
        </div>



<div class="row">
<!-- -------------------------------------------------- Reprot Requests -->
        <section class="col-lg-6 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <!--<i class="fas fa-chart-pie mr-1"></i>-->
                  <a href="pages/admin/reports.php" class="float-right" style="color: red; "><img src="images/report1.png" >Report - All</a>
                  <!--<a href="<?php echo $path1; ?>pages/admin/jobs_pending.php"><b>Report Requests</b></a>-->
                </h3>
                
              </div><!-- /.card-header -->
              <div class="card-body">
              <table id="example2" class="table  table-hover">
                <thead>
                <tr>
                  <th>#ID</th>
                  <th>Comment</th>                  
                  <th>Username</th>
                </tr>
                </thead>
                <tbody>
                
				
				 <?php
			  
			  	require('db.php');
				  
          $Query1 = ""; //AND tusername='".$_SESSION["uname"]."'";
						
          $sql1="SELECT * FROM reportissues $Query1 ORDER BY rid DESC Limit 10" ;
							
							$result1 = $conn->query($sql1);
							
							while($row1 = $result1->fetch_assoc())
							{
							  $rpid =$row1['rpid'];
                $rtype =$row1['rtype'];
                $ruserid =$row1['ruserid'];
               
					 ?>
				
						<tr>
            
		                  <td><a href="pages/admin/job_detail.php?var=<?php echo $rpid; ?>"><?php if ($rpid != -1) echo $rpid ; ?></a></td>
		                  <td><?php echo $rtype; ?></td>	
                      <td><?php if ($rpid == -1) { ?>
                          <a href="pages/admin/transporterdetail.php?uid=<?php echo $ruserid; ?>">    <?php echo $ruserid; ?>    </a>

                            <?php
                      } else {
                          echo $ruserid; 
                      }?></td>		                  
		                  
						  <!--
						  <a class="btn btn-info btn-sm" href="pages/admin/job_detail.php?var=<?php echo $pid1; ?>">
	                          Detail
	                      </a>-->
						  
						  
		                </tr>
                <?php
								
						}
            
				 ?>
          
                </tbody>
                <tfoot>
                
                </tfoot>
              </table>
            </div>
            </div>
            

           
          </section>




<!-- -------------------------------------------------- Private Jobs -->

          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-6 connectedSortable">

    <!-- Custom tabs (Charts with tabs)-->
    <div class="card">
              <div class="card-header">
                <h3 class="card-title">
                  <!--<i class="fas fa-chart-pie mr-1"></i>-->
                  <!-- <a href="<?php echo $path1; ?>pages/admin/edit_request.php"> -->
                  <b>Private Jobs - Hire</b>
                  <!-- </a> -->
                </h3>
                
              </div><!-- /.card-header -->
              <div class="card-body">
              <table id="example2" class="table  table-hover">
                <!--<thead>
                <tr>
                  <th>Job Title</th>
                  <th>Route</th>                  
                  <th></th>
                </tr>
                </thead>-->
                <tbody>
                
				
				 <?php
			  
			  	require('db.php');
				  
          $Query1 = "Where status1='Hire' AND typepost='JOB' "; //AND tusername='".$_SESSION["uname"]."'";
						
          $sql1="SELECT * FROM products $Query1 ORDER BY product_id DESC " ;
							
							$result1 = $conn->query($sql1);
							
							while($row1 = $result1->fetch_assoc())
							{
							  $pid1 =$row1['product_id'];
                $img1 =$row1['product_image'];
                $tit1 =$row1['product_title'];
                $tpri1 =$row1['tprice'];

                $PCity =$row1['PCity'];
                $DCity =$row1['DCity'];
                $Pdate = $row1['PDate'];
                $theDate    = new DateTime($Pdate);
                $stringDate = $theDate->format('d-M-Y');              

                $desc =$row1['product_desc'];
                $desc1 = substr($desc,0,100);
                $stat =$row1['status1'];
                $amt =$row1['product_price'];
								
							    
					 ?>
				
						<tr>
		                  <td><?php echo $tit1; ?></td>
		                  <td><?php echo $PCity; ?> - <?php echo $DCity; ?></td>		                  
		                  <td>
						  
						  <a class="btn btn-info btn-sm" href="pages/admin/job_detail.php?var=<?php echo $pid1; ?>">
	                          Detail
	                      </a>
						  
						  </td>
		                </tr>
                <?php
								
						}
				 ?>
          
                </tbody>
                <tfoot>
                
                </tfoot>
              </table>
            </div>
            </div>
            

		   
          </section>
          <!-- right col -->
        </div>



        






        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
  
  
  
  <footer class="main-footer">
    <strong>Copyright &copy; Crunilance</strong>
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
