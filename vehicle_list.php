<?php 
try{
  // echo "<br><br>";
  session_start();
}catch(Exception $e){

}
include("header.php");
?>

<!-- Common Area Top ------------------ -->







<!-- Search Bar -->
<?php

$City1="";
$Date1="";
$cat1="";


$numQ = 1;
$Query1=" Where status1='Posted' AND typepost='BOOK' ";


$Q11 = "";

if(isset($_GET['City1']) ){
  $City1 = $_GET['City1'];
    if($City1!=''){  
      $Q11 .="&City1=$City1";
      $Query1 = " $Query1 AND PCity='$City1' ";      
      $numQ++;
    }
}

/*
if(isset($_GET['City2'])){
  $City2 = $_GET['City2'];

  if($City2!=''){  
    $Q11 .="&City2=$City2";
    if ($numQ==0){
      $Query1 = " WHERE DCity='$City2' ";
      $numQ++;
    }else{
      $Query1 .= " AND DCity='$City2' ";
      $numQ++;
    }
  }
}
*/

/*
if(isset($_GET['Date1'])){
  $Date1 = $_GET['Date1'];

  if($Date1!=''){  
    $Q11 .="&Date1=$Date1";
    if ($numQ==0){
      $Query1 = " WHERE PDate>='$Date1' ";
      $numQ++;
    }else{
      $Query1 .= " AND PDate>='$Date1' ";
      $numQ++;
    }
  }

}
*/


/*
if(isset($_GET['Date2'])){
  $Date2 = $_GET['Date2'];

  if($Date2!=''){  
    $Q11 .="&Date2=$Date2";
    if ($numQ==0){
      $Query1 = " WHERE PDate<='$Date2' ";
      $numQ++;
    }else{
      $Query1 .= " AND PDate<='$Date2' ";
      $numQ++;
    }
  }

}
*/

if(isset($_GET['cat'])){
  $cat1 = $_GET['cat'];

  if($cat1!=''){ 
    $Q11 .="&cat=$cat1"; 
    if ($numQ==0){
      $Query1 = " $Quert1 AND product_cat='$cat1' ";
      $numQ++;
    }else{
      $Query1 .= " AND product_cat='$cat1' ";
      $numQ++;
    }
  }

}


?>

<section class="page-title-section overlay" style="background: url(images/backgrounds/tra1.jpg) no-repeat center center;" >
  <div class="container">
    <div class="row">
      
      
      <div class="col-md-12">
        
        <a class="h3 text-info font-secondary form-group mx-sm-2" href="#">Vehicle Search</a>
        
        <form class="form-inline" action="vehicle_list.php" method="GET">

          <div class="form-group  mx-sm-2">
            
            <input type="text" class="form-control" style="width: 150px; height: 40px;" name="City1" value="<?php echo $City1 ?>" placeholder="City">
          </div>
          <!--
          <div class="form-group mx-sm-2 ">
            
            <input type="date" class="form-control" style="width: 180px;" name="Date1" value="<?php echo $Date1 ?>" placeholder="From Date">
          </div>
         -->
          <div class="form-group mx-sm-2 ">            
         <!--   <input type="text" class="form-control" style="width: 180px;" name="cat" value="<?php echo $cat1 ?>" placeholder="To Date"> -->
            <select class="form-control " style="width: 150px; height: 40px; " name="cat" value="<?php echo $cat1 ?>" placeholder="Category">
								<?php
				
								require('db.php');
								
								$sql1="SELECT * FROM vehicle_cat" ;
								
								$result1 = $conn->query($sql1);

								echo "<option value=''>Category</option>";
								 while($row1 = $result1->fetch_assoc())
								 {
								  	//$id=$row1['cat_id'];
                                    $cat=$row1['vcat'];
                                    if ($cat == $cat1)
                                        echo "<option value='$cat' selected>$cat</option>";			
                                    else
                                        echo "<option value='$cat'>$cat</option>";								
								 }
									
							    ?>
								
            </select>
          
          </div>
          <div class="form-group mx-sm-2">
              &nbsp;<button type="submit" class="btn btn-info  mx-sm-3" style="height: 40px; padding-top: 11px;"><i class="ti-search mr-1 "></i></button>
          </div>
        </form>
        
      </div>
    </div>
  </div>
</section>
<!-- /Search Bar -->

  
  <!-- notice -->
  <section class="section">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <ul class="list-unstyled">



          <?php
			
			require('db.php');


      $limit = 10; 


      if (isset($_GET["page"] )) 
          {
          $page  = $_GET["page"]; 
          } 
      else 
         {
          $page=1; 
         };  
  
      $record_index= ($page-1) * $limit;      
  
  
  
      //$sql = "SELECT * FROM brands LIMIT $record_index, $limit";

 //  $sql1="SELECT * FROM products $Query1 ORDER BY product_id DESC Limit 10" ;		


			$sql1="SELECT * FROM products $Query1 ORDER BY product_id DESC Limit $record_index, $limit" ;
      //echo $sql1; 
			$result1 = $conn->query($sql1);

			
			 while($row1 = $result1->fetch_assoc())
			  {
        //  product_title, PCity, Pdate,   DCity,   DDate, product_cat, product_price, product_keywords, pweight, num_pack, product_desc, product_image, img2, img3, img4,  status1
			  	  $pid1 =$row1['product_id'];			  
            $tit1 =$row1['product_title'];                
            $paddress = $row1['PAddress'];
            $PCity = $row1['PCity'];

            $dtime = $row1['dtime'];
            $dfreekm = $row1['dfreekm'];            
            $doverkm = $row1['doverkm'];
            $dovertime = $row1['dovertime'];
            $dselfdriving = $row1['dselfdriving'];
            $dwithdriver = $row1['dwithdriver'];
            $dfueltype = $row1['dfueltype'];
            $dfuel = $row1['dfuel'];            
			      $dgps = $row1['dgps'];
            $dpermission = $row1['dpermission'];
            $dinsurance = $row1['dinsurance'];

            $mtime = $row1['mtime'];
            $mfreekm = $row1['mfreekm'];
            $moverkm = $row1['moverkm'];
            $movertime = $row1['movertime'];
            $mselfdriving = $row1['mselfdriving'];
            $mwithdriver = $row1['mwithdriver'];

				?>

<?php
           /*             
      $sql222="SELECT product_id FROM product_seller Where product_id=$pid1" ;
      $result222 = $conn222->query($sql222);

        $num222=0;
        while($row222 = $result222->fetch_assoc())
        {
            $num222++;
        }
        */
        ?>

            <!-- notice item -->
            <li class="d-md-table mb-4 w-100 border-bottom hover-shadow">
                <!-- <div class="d-md-table-cell text-center p-4 bg-primary text-white mb-4 mb-md-0" style="min-width: 150px;" ><span class="h2 d-block"><?php echo $st1; ?></span><?php echo $st2; ?></div> -->
                <!--<div style="background:center no-repeat url(assets/images/<?php echo $img1; ?>);background-size:contain;width:500px;height:auto;" class="d-md-table-cell text-center p-4  text-white mb-4 mb-md-0"></div> -->
                
              <div class="d-md-table-cell text-left p-4  text-white mb-4 mb-md-0">
                <img class="" src="assets/images/<?php echo $pid1; ?>_1.png?t=<?php echo filemtime('assets/images/'.$pid1.'_1.png'); ?>" style="width: 200px; height: auto;" alt="trueshipp">
                <br><img style="position:relative; top: -19px; width: 100px;" src="images/logo50.png">  
              </div> 
              
                
              <div class="d-md-table-cell px-4 vertical-align-middle mb-4 mb-md-0" style="min-width: 300px;">
                <h4 class="mb-0"><?php echo $tit1; ?></h4>
                <b><?php echo $PCity; ?></b><br><br>
                
                Fuel - <?php echo $dfueltype; ?><br>
               
              </div>

              <div class="d-md-table-cell px-4 vertical-align-middle mb-4 mb-md-0" style="min-width: 200px;">
               
                <?php echo $dselfdriving; ?> per day<br>
                <?php echo $mselfdriving; ?> per month<br><br>
       
                GPS - <?php echo $dgps; ?><br>
               
              </div>
              <div class="d-md-table-cell text-right pr-0 pr-md-4"><a href="vehicle_detail.php?jobid=<?php echo $pid1; ?>" class="btn btn-info">read more</a></div>
            </li>

          <?php     }     ?>

            
          </ul>

          
          
<?php



$sql = "SELECT COUNT(*) FROM products $Query1 "; 
$retval1 = mysqli_query($conn, $sql);  
$row = mysqli_fetch_row($retval1);  

$total_records = $row[0];
$total_pages = ceil($total_records / $limit); 
//echo "$page, $total_pages";


$link1 = "";
if ($page > 1){
  $prev1 = "vehicle_list.php?page=".($page-1);
}else{

  $link1 = " disabled ";
}

$link2 = "";
if ($page <  $total_pages){
  $next1 = "vehicle_list.php?page=".($page+1);
}else{

  $link2 = " disabled ";
}

?>
        

          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">

              <li class="page-item <?php echo $link1; ?>">
                <a class="page-link" href="<?php echo $prev1; ?><?php echo $Q11; ?>" tabindex="-1">Prev</a>
              </li>
              <!--                  <li class="page-item active"><a class="page-link" href="#">4</a></li>  -->

              <li class="page-item disabled"><a class="page-link" href="#"><?php echo $page.' of '.$total_pages; ?></a></li> 

              <li class="page-item <?php echo $link2; ?>">
                <a class="page-link" href="<?php echo $next1; ?><?php echo $Q11; ?>">Next</a>
              </li>
              

            </ul>
          </nav>
  
        </div>
      </div>
    </div>
  </section>
  <!-- /notice -->










<!-- Common Area Bottom ----------------------- -->
<!-- footer -->
<?php 
include("footer.php");
?>




</body>
</html>