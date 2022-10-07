<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Awarded - Transporter</title>
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
  <link rel="shortcut icon" href="./assets/images/LogoMakr_9qkixk.png" type="image/x-icon">
</head>
<body class="hold-transition sidebar-mini layout-fixed"layout-fixed">
<div class="wrapper">
<?php

session_start();

?>  
  
  


 

<!-- Main Sidebar Container -------------------------------------------------------->
  

      <?php
	  
	  include("./pages/transporter/menutop.php");
	  include("./pages/transporter/menuleft.php"); 
	   
	  ?>
 
    <!-- /.sidebar -->


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>My Jobs (Awarded)</h1>
          </div>

          <!--
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Orders</li>
            </ol>
          </div>
-->
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <!--<div class="card-header">
              <h3 class="card-title">Job List</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Job Title</th>
                  <th>Route</th>
                  <th>Bid</th>
                  <th>Date</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
                
				
				 <?php
			  
			  	require('db.php');
				  
          $Query1 = "Where status1='Awarded' AND tusername='".$_SESSION["uname"]."'";
						
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
                //list($year,$month,$day) = explode("-",$stringDate);
                
                //$st1 =  $day;
                //$st2 =  $month.'.'.$year;

                $desc =$row1['product_desc'];
                $desc1 = substr($desc,0,100);
                $stat =$row1['status1'];
								
								
									
									// $sql3="SELECT * FROM user_info Where user_id=$uid" ;								
									// $result3 = $conn->query($sql3);

									// $unm="";$city="";
									// if($row3 = $result3->fetch_assoc())
									// {
									//   	$unm=$row3['first_name']." ".$row3['last_name'];
									//   	$city=$row3['city']." - ".$row3['pin'];
									// }
								
							    
					 ?>
				
				
				
				
						<tr>
		                  <td><?php echo $tit1; ?></td>
		                  <td><?php echo $PCity; ?> - <?php echo $DCity; ?></td>
		                  <td><?php echo $tpri1; ?></td>
		                  <td><?php echo $Pdate; ?></td>
		                  <td>
						  
						  <a class="btn btn-info btn-sm" href="my_job_detail.php?var=<?php echo $pid1; ?>">
	                          <i class="fas fa-trophy">
	                          </i>
	                          <?php echo $stat; ?>
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

<!-- jQuery  https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js -->
<script src="./plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables -->
<script src="./plugins/datatables/jquery.dataTables.js"></script>
<script src="./plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
<!-- AdminLTE App -->
<script src="./dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
    });
  });
</script>
</body>
</html>
