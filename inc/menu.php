
<!-- Slide Menu ------------------------------------------ -->
<div id="mySidenav" class="sidenav" style="z-index: 200;">
<br><br><br><br>
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

<?php
		    session_start();
			require('db.php');
			
			$sql1="SELECT * FROM Categories " ;
			
			$result1 = $conn->query($sql1);

			
			 while($row1 = $result1->fetch_assoc())
			  {
			  	$cid=$row1['cat_id'];
			  	$tit=$row1['cat_title'];
				echo "<a href='ProductCat.php?var=$cid&var1=$tit'>$tit</a>";
			 }
	
?>

</div>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";

}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";

}
</script>


<!-- Menu ------------------------------------------ -->
<section class="mbr-navbar mbr-navbar--freeze mbr-navbar--absolute mbr-navbar--sticky mbr-navbar--auto-collapse" id="index-ext_menu-0">
    <div class="mbr-navbar__section mbr-section">
        <div class="mbr-section__container container">
            <div class="mbr-navbar__container">
                <div class="mbr-navbar__column mbr-navbar__column--s mbr-navbar__brand">
                    <span class="mbr-navbar__brand-link mbr-brand mbr-brand--inline">
                        <span class="mbr-brand__logo" onclick="openNav()"><img src="assets/images/logomakr-0fo8xg-128x128-14.png" class="mbr-navbar__brand-img mbr-brand__img" alt="Mobirise"></span>
                        <span class="mbr-brand__name"><a class="mbr-brand__name text-white" href="index.php">motorod</a></span>
                    </span>
                </div>
                <div class="mbr-navbar__hamburger mbr-hamburger"><span class="mbr-hamburger__line"></span></div>
                <div class="mbr-navbar__column mbr-navbar__menu">
                    <nav class="mbr-navbar__menu-box mbr-navbar__menu-box--inline-right">
                        <div class="mbr-navbar__column">
                            <ul class="mbr-navbar__items mbr-navbar__items--right float-left mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-decorator mbr-buttons--active"> <li class="mbr-navbar__item"><a class="mbr-buttons__link btn text-white" href="Login.php">Login</a></li></ul>                            
                            <ul class="mbr-navbar__items mbr-navbar__items--right mbr-buttons mbr-buttons--freeze mbr-buttons--right btn-inverse mbr-buttons--active"><li class="mbr-navbar__item"><a class="mbr-buttons__btn btn btn-default" href="Cart.php">CART (<?php require('function.php'); countCart(); ?>)</a></li></ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
