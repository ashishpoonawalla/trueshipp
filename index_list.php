<?php



if ($typepost == "JOB") {

?>

<!-- ------------------------------ JOB -------------------- -->
<div onclick="javascript:window.location.href='Job_detail.php?jobid=<?php echo $pid1; ?>' " class="col-lg-3 col-sm-6 mb-5" style="margin: 0px; padding: 2px;">
  <div class="card p-0 border-primary rounded-0 hover-shadow">
    <img class="card-img-top rounded-0 watermark" style="height: auto; width: 100%; object-fit: cover;  height:180px; " src="assets/images/<?php echo $pid1; ?>_1.png?t=<?php echo filemtime('assets/images/' . $pid1 . '_1.png'); ?>" alt="trueshipp">
    <!-- <img style="position:relative; top: -15px; width: 80px; margin-bottom: -25px;" src="images/logo50.png"> -->
    <div class="card-body">
      <a>
        <ul class="list-inline mb-2" style="font-size: 11px;">
          <li class="list-inline-item"><i class="ti-calendar mr-1 text-color"></i><?php echo $Pdate; ?></li>
          <li class="list-inline-item">₹. <?php echo $pri1; ?></li>
        </ul>

        <p style="font-size: 11px; margin: 2px;">
          <img src="images/location3.png" style="width: 12px;"><?php echo $PCity; ?> to <?php echo $DCity; ?>
          <br><span style="font-size: 8px; "><?php echo $tit1; ?></span>
        </p>
        <a style="background-color:#FADCD9; color: Red; padding:5px; max-width: 150px; border-radius: 5px; font-size: 11px;">
          <?php echo $num222; ?> Applications
        </a>
      </a>

    </div>
  </div>
</div>

<?php } else if ($typepost == "BOOK") {  ?>

<!-- ------------------------------ BOOK -------------------- -->

<div onclick="javascript:window.location.href='vehicle_detail.php?jobid=<?php echo $pid1; ?>' " class="col-lg-3 col-sm-6 mb-5" style="margin: 0px; padding: 2px;">
  <div class="card p-0 border-primary rounded-0 hover-shadow">
    
    <?php 
    if ($Feature22 == "Y"){
        ?>
            <!-- <img style="position:relative; top: 0px; width: 100px; margin-bottom: -100px;" src="images/featured2.png"> -->
            <img style="position:relative; top: 0px; width: 80px; margin-left: 10px; margin-bottom: -17px;" src="images/featured.png">
        <?php
    }
    ?>
    
    <img class="card-img-top rounded-0 watermark" style="height: auto; width: 100%; object-fit: cover;  height:180px; " src="assets/images/<?php echo $pid1; ?>_1.png?t=<?php echo filemtime('assets/images/' . $pid1 . '_1.png'); ?>" alt="trueshipp">
    
    
    <!-- <img style="position:relative; top: -15px; width: 80px; margin-bottom: -25px;" src="images/logo50.png"> -->
    <div class="card-body">
      <a>
        <ul class="list-inline mb-2" style="font-size: 11px;">
          <li class="list-inline-item">₹.<?php if ($dselfdriving > 0) {echo $dselfdriving;} else {echo $dwithdriver;} ?> per Day</li><br>
          <!--<li class="list-inline-item">Monthly <?php echo $mselfdriving; ?></li> -->
        </ul>
        <p class="card-title" style="font-size: 11px;  margin: 2px;">
          <img src="images/location3.png" style="width: 12px;"><?php echo $PCity; ?>
          <br><span style="font-size: 8px; "><?php echo $tit1; ?></span>
        </p>

        <a style="background-color:#75E6DA; color: #05445E; padding:5px; max-width: 150px; border-radius: 5px; font-size:11px;">
          <?php echo $num222; ?> Rent request
        </a>

        <!-- <a href="vehicle_detail.php?jobid=<?php echo $pid1; ?>" class="btn btn-info btn-sm">Book Vehicle</a> -->

      </a>
    </div>
  </div>
</div>

<?php } else {  ?>

<!-- ------------------------------ SALE -------------------- -->

<div onclick="javascript:window.location.href='vehicle_detail.php?jobid=<?php echo $pid1; ?>' " class="col-lg-3 col-sm-6 mb-5" style="margin: 0px; padding: 2px;">
  <div class="card p-0 border-primary rounded-0 hover-shadow">
    
    <?php 
    if ($Feature22 == "Y"){
        ?>
            <img style="position:relative; top: 0px; width: 80px; margin-left: 10px; margin-bottom: -17px;" src="images/featured.png">
        <?php
    }
    ?>

    
    <img class="card-img-top rounded-0 watermark" style="height: auto; width: 100%; object-fit: cover;  height:180px; " src="assets/images/<?php echo $pid1; ?>_1.png?t=<?php echo filemtime('assets/images/' . $pid1 . '_1.png'); ?>" alt="trueshipp">
    
   
    <!-- <img style="position:relative; top: -15px; width: 80px; margin-bottom: -25px;" src="images/logo50.png"> -->
    <div class="card-body">
      <a>
        <ul class="list-inline mb-2" style="font-size: 11px;">
          <li class="list-inline-item">₹.<?php echo $sale_amt; ?></li><br>
          <!--<li class="list-inline-item">Monthly <?php echo $mselfdriving; ?></li> -->
        </ul>
        <p class="card-title" style="font-size: 11px;  margin: 2px;">
          <img src="images/location3.png" style="width: 12px;"><?php echo $PCity; ?>
          <br><span style="font-size: 8px; "><?php echo $tit1; ?></span>
        </p>

        <a style="background-color:#ffcc29; color: #05445E; padding:5px; max-width: 150px; border-radius: 5px; font-size:11px;">
          <?php echo $num222; ?> Buy offers
        </a>

        <!-- <a href="vehicle_detail.php?jobid=<?php echo $pid1; ?>" class="btn btn-info btn-sm">Book Vehicle</a> -->

      </a>
    </div>
  </div>
</div>


<?php
    
}
?>