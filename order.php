<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Transporter | Orders</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="./plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed"layout-fixed">
<div class="wrapper">
<?php

session_start();

?>  
  
  <!-- Navbar ------------------------------------------------------------------------->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost/trueshipp/TDash.php" class="nav-link">Home</a>
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

    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
     <li class="nav-item d-none d-sm-inline-block">
        <a href="http://localhost/trueshipp/Logout.php" class="nav-link">Logout</a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->


 

<!-- Main Sidebar Container -------------------------------------------------------->
  

      <?php
	  
	  include("menuleft.php")
	   
	  ?>
 
    <!-- /.sidebar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Orders</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Order List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Order ID</th>
                  <th>Name</th>
                  <th>City</th>
                  <th>Date</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                
				
				 <?php
			  
			  	require('db.php');
				$un24 =  $_SESSION["uname"];	
						
							$sql1="SELECT  DISTINCT order_id FROM orders_detail Where username='$un24' AND status1='Pending' " ;
							
							$result1 = $conn->query($sql1);

							
							while($row1 = $result1->fetch_assoc())
							{
							  	$id1="";//$row1['id'];
								$oid1=$row1['order_id'];
							  	$pid1="";//$row1['p_id'];								
								$psid="";//$row1['psid'];
								
								
								
								
								$sql2="SELECT * FROM orders Where order_id=$oid1 And order_status='Pending' " ;
							
								$result2 = $conn->query($sql2);

							
								if($row2 = $result2->fetch_assoc())
								{
								  	$uid=$row2['user_id'];
									$sta=$row2['order_status'];
								  	$dt1=$row2['date1'];								
									$pmd=$row2['payment_mod'];
									$pst=$row2['payment_status'];
									$dtt = explode(" ",$dt1 );
									$dt1 = $dtt[0];
									
									
									$sql3="SELECT * FROM user_info Where user_id=$uid" ;
								
									$result3 = $conn->query($sql3);

									$unm="";$city="";
									if($row3 = $result3->fetch_assoc())
									{
									  	$unm=$row3['first_name']." ".$row3['last_name'];
										$city=$row3['city']." - ".$row3['pin'];
									}
								
							    
					 ?>
				
				
				
				
						<tr>
		                  <td><a href="http://localhost/trueshipp/pages/transporter/order_details.php"><?php echo $oid1; ?></a></td>
		                  <td><?php echo $unm; ?></td>
		                  <td><?php echo $city; ?></td>
		                  <td><?php echo $dt1; ?></td>
		                  <td>
						  
						  <a class="btn btn-info btn-sm" href="order_details.php?var=<?php echo $oid1; ?>">
	                          <i class="fas fa-pencil-alt">
	                          </i>
	                          <?php echo $sta; ?>
	                      </a>
						  
						  </td>
		                </tr>
                <?php
								}
						}
				?>
          
                </tbody>
                <tfoot>
                
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

          
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; trueshipp</strong> All rights
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
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="./plugins/datatables/jquery.dataTables.js"></script>
<script src="./plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="./dist/js/demo.js"></script>
<!-- page script -->
<script>
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
