<!-- Main Sidebar Container -------------------------------------------------------->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="admin_dash.php" class="brand-link">
      <img src="../../assets/images/LogoMakr_7XVO4n.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">TrueShipp</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <!--
		<div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
		-->
        <div class="info">
          <a href="#" style="font-size: 20px;"  class="d-block"><?php echo $_SESSION["StoreNM"]; ?></a>
        </div>
      </div>



<!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
		  
		  <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
	 <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
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
			   
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              
              <p>
                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
          
          </li>
       

         
          
       <?php
		 for ($cn = 1; $cn <=13; $cn++)
          {
		  	$tlt = "";
			  if ($cn == 1)					$tlt = "Automotive Services";
			  if ($cn == 2)					$tlt = "Bike Accessories";
			  if ($cn == 3)					$tlt = "Bike Parts";
			  if ($cn == 4)					$tlt = "Car Accessories";
			  if ($cn == 5)					$tlt = "Car Parts";
			  if ($cn == 6)					$tlt = "Care";
			  if ($cn == 7)					$tlt = "Electronics";
			  if ($cn == 8)					$tlt = "Gifts and Accessories";
			  if ($cn == 9)					$tlt = "Riding Gear";
			  if ($cn == 10)				$tlt = "Safety";
			  if ($cn == 11)				$tlt = "Scooter Accessories";
			  if ($cn == 12)				$tlt = "Scooter Parts";
			  if ($cn == 13)				$tlt = "Tools and Machines";
			
		  
		  
		  ?>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-circle"></i><p><?php echo $tlt; ?><i class="right fas fa-angle-left"></i>              </p>
            </a>
            			
			<ul class="nav nav-treeview">
             
			 <?php
			
			require('db.php');
			
			
			$sql1="SELECT * FROM categories Where main_cat=$cn " ;
			
			$result1 = $conn->query($sql1);

			
			 while($row1 = $result1->fetch_assoc())
			  {
			  	$pid1=$row1['cat_id'];
			  	$tit1=$row1['cat_title'];
			

				?>
			 
			  <li class="nav-item">
                <a href="http://localhost/trueshipp/pages/admin/product_list.php?var=<?php echo $pid1 ?>&var1=<?php echo $tlt; ?>&var2=<?php echo $tit1; ?>" class="nav-link"> <i class="far fa-circle nav-icon"></i> <p><?php echo $tit1; ?></p> </a>
              </li>
			  
             <?php
			 }				
				?>
            </ul>
          </li>
         
		 <?php
		 }
		 ?>
		 
    	
         
		 
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
	  </div>
</aside>