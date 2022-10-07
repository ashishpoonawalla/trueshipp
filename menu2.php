
<!-- Slide Menu ------------------------------------------ -->
<div id="mySidenav" class="sidenav" style="z-index: 200; font-size: 12px;">
<br><br><br>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

<?php
		    session_start();
			// session_start();
			require('db.php');
			
			$sql2="SELECT * FROM Categories " ;
			
			$result2 = $conn->query($sql2);

			
			//while($row2 = $result2->fetch_assoc())
			  {
			  	//$cid=$row2['cat_id'];
			  	//$tit=$row2['cat_title'];
				//echo "<a href='ProductCat.php?var=$cid&var1=$tit'>$tit</a>";
			 }
			 
			
?>
<a style="font-size: 18px;" href='Category.php?var=1&var1=Automotive Services'>Automotive Services</a>
<a style="font-size: 18px;" href='Category.php?var=2&var1=Bike Accessories'>Bike Accessories</a>
<a style="font-size: 18px;" href='Category.php?var=3&var1=Bike Parts'>Bike Parts</a>
<a style="font-size: 18px;" href='Category.php?var=4&var1=Car Accessories'>Car Accessories</a>
<a style="font-size: 18px;" href='Category.php?var=5&var1=Car Parts'>Car Parts</a>
<a style="font-size: 18px;" href='Category.php?var=6&var1=Care'>Care</a>
<a style="font-size: 18px;" href='Category.php?var=7&var1=Electronics'>Electronics</a>
<a style="font-size: 18px;" href='Category.php?var=8&var1=Gifts and Accessories'>Gifts and Accessories</a>
<a style="font-size: 18px;" href='Category.php?var=9&var1=Riding Gear'>Riding Gear</a>
<a style="font-size: 18px;" href='Category.php?var=10&var1=Safety'>Safety</a>
<a style="font-size: 18px;" href='Category.php?var=11&var1=Scooter Accessories'>Scooter Accessories</a>
<a style="font-size: 18px;" href='Category.php?var=12&var1=Scooter Parts'>Scooter Parts</a>
<a style="font-size: 18px;" href='Category.php?var=13&var1=Tools & Machines'>Tools & Machines</a>

</div>

 
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "350px";

}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";

}
</script>
 

<!-- Menu ------------------------------------------ -->
<section class="mbr-navbar mbr-navbar--freeze mbr-navbar--absolute mbr-navbar--sticky mbr-navbar--auto-collapse" id="index-ext_menu-0" >

<?php
	
			require('db.php');	
			
			$un1 = session_id();
			
			$sql="SELECT qty FROM cart WHERE ip_add='$un1' " ;
			
			$result = $conn->query($sql);

			$ss=0;
			while($row = $result->fetch_assoc())
			{
			 	$ss++;
			}
			//echo $ss;

?>




    <div class="mbr-navbar__section mbr-section" >
        <div class="mbr-section__container container">
            <div class="mbr-navbar__container" >
                <div class="mbr-navbar__column mbr-navbar__column--s mbr-navbar__brand">
                    <span class="mbr-navbar__brand-link mbr-brand mbr-brand--inline">
                        <span class="mbr-brand__logo" onclick="openNav()"><img style="height:35px; padding-top: 10px; " src="assets/images/LogoMakr_7XVO4n.png" class="mbr-navbar__brand-img mbr-brand__img" alt="Mobirise"></span>&nbsp; &nbsp; &nbsp; &nbsp; 
                        <span class="mbr-brand__name"><a class="mbr-brand__name text-white" href="index.php"><img style="height:30px; padding-left: 20px; "src="assets/images/motorod.png" class="mbr-navbar__brand-img mbr-brand__img" > </a></span>
						
                    </span>
                </div>
                <div class="mbr-navbar__hamburger mbr-hamburger"><span class="mbr-hamburger__line"></span></div>
                
			
				
				
			<!--	
				<input type="text" placeholder="Search.." class="form-control">
				-->
				
			
				
				<div class="mbr-navbar__column mbr-navbar__menu">
				
				
                    <nav class="mbr-navbar__menu-box mbr-navbar__menu-box--inline-right">
					<div class="mbr-navbar__column ">
				
						<form class="example" action="ProductSearch.php" method="GET" style="margin:auto;max-width:400px;">
  							<input type="text" style="padding: 6px; align: right; " placeholder="Search.." name="search" class="form-control" >
  						<!--	<button type="submit"><i class="fa fa-search" class="form-control"></i></button> -->
						</form>
						
						
					</div>
                        &nbsp;&nbsp;&nbsp;
						<div class="mbr-navbar__column">
                            
						<?php
						if (isset($_SESSION["uname"])){
							$cc = "lightgreen";
							}
							else
							{
								$cc = "white";
							}
						?>	
						
							<ul class="mbr-navbar__items mbr-navbar__items--right float-left mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-decorator mbr-buttons--active"> <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="Login1.php"><i class="fa fa-user" style="font-size: 30px; color: <?php echo $cc; ?> ;" class="form-control"></i></a></li></ul>                            
                         	<ul class="mbr-navbar__items mbr-navbar__items--right float-left mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse btn-decorator mbr-buttons--active"> <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="Cart.php"><i class="fa fa-shopping-bag" style="font-size: 30px;" class="form-control"></i><?php if ($ss > 0) echo "($ss)"; ?></a></li></ul>   
                            <!-- <ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item"><a class="mbr-buttons__btn btn btn-default" href="Cart.php"><i class="fa fa-shopping-bag" style="font-size: 30px;" class="form-control"></i>(<?php echo $ss; ?>)</a></li></ul> -->
                        </div>
                    </nav>
                </div>
				
				
            </div>
        </div>
    </div>
</section>

