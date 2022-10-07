<?php 
include("header.php");
?>

<!-- Common Area Top ------------------ -->







<!-- Search Bar -->
<?php

$City1="";
$City2="";
$Date1="";
$Date2="";
$cat1="";


$numQ = 0;
$Query1="";

$Q11 = "";

if(isset($_GET['City1']) ){
  $City1 = $_GET['City1'];
    if($City1!=''){  
      $Q11 .="&City1=$City1";
      $Query1 = " WHERE PCity='$City1' ";      
      $numQ++;
    }
}

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

if(isset($_GET['cat'])){
  $cat1 = $_GET['cat'];

  if($cat1!=''){ 
    $Q11 .="&cat=$cat1"; 
    if ($numQ==0){
      $Query1 = " WHERE product_cat='$cat1' ";
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
        
        <a class="h3 text-primary font-secondary form-group mx-sm-2" href="#">Advance Search</a>
        
        <form class="form-inline" action="Job_list.php" method="GET">

          <div class="form-group  mx-sm-2">
            
            <input type="text" class="form-control" style="width: 150px;" name="City1" value="<?php echo $City1 ?>" placeholder="Pickup City">
          </div>
          <div class="form-group mx-sm-2 ">
           
            <input type="text" class="form-control" style="width: 150px;" name="City2" value="<?php echo $City2 ?>" placeholder="Drop City">
          </div>
          <div class="form-group mx-sm-2 ">
            
            <input type="date" class="form-control" style="width: 180px;" name="Date1" value="<?php echo $Date1 ?>" placeholder="From Date">
          </div>
          <div class="form-group mx-sm-2 ">
            
            <input type="date" class="form-control" style="width: 180px;" name="Date2" value="<?php echo $Date2 ?>" placeholder="To Date">
          </div>
          <div class="form-group mx-sm-2 ">            
         <!--   <input type="text" class="form-control" style="width: 180px;" name="cat" value="<?php echo $cat1 ?>" placeholder="To Date"> -->
            <select class="form-control " style="width: 180px; height: 60px; " name="cat" value="<?php echo $cat1 ?>" placeholder="Category">
								<?php
				
								require('db.php');
								
								$sql1="SELECT * FROM categories" ;
								
								$result1 = $conn->query($sql1);

								echo "<option value=''>Category</option>";
								 while($row1 = $result1->fetch_assoc())
								 {
								  	//$id=$row1['cat_id'];
                    $cat=$row1['cat_title'];
                    if ($cat == $cat1)
                      echo "<option value='$cat' selected>$cat</option>";			
                    else
                      echo "<option value='$cat'>$cat</option>";								
								 }
									
							    ?>
								
            </select>
          
          </div>
          
          <button type="submit" style="width: 150px;" class="btn btn-primary  mx-sm-2">Search</button>
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
  
	
 $Query1 = " WHERE PDate<='$Date2' ";

			$sql1="SELECT * FROM products $Query1 ORDER BY product_id DESC Limit $record_index, $limit" ;
      //echo $sql1; 
			$result1 = $conn->query($sql1);

			
			 while($row1 = $result1->fetch_assoc())
			  {
        //  product_title, PCity, Pdate,   DCity,   DDate, product_cat, product_price, product_keywords, pweight, num_pack, product_desc, product_image, img2, img3, img4,  status1
			  	$pid1 =$row1['product_id'];
			  	$img1 =$row1['product_image'];
          $tit1 =$row1['product_title'];
          $pri1 =$row1['product_price'];

          $PCity =$row1['PCity'];
          $DCity =$row1['DCity'];
          $Pdate = $row1['PDate'];
          $theDate    = new DateTime($Pdate);
          $stringDate = $theDate->format('Y-M-d');
          list($year,$month,$day) = explode("-",$stringDate);
          
          $st1 =  $day;
          $st2 =  $month.'.'.$year;

          $desc =$row1['product_desc'];
          $desc1 = substr($desc,0,100);
				?>


            <!-- notice item -->
            <li class="d-md-table mb-4 w-100 border-bottom hover-shadow">
                <div class="d-md-table-cell text-center p-4 bg-primary text-white mb-4 mb-md-0" style="min-width: 150px;" ><span class="h2 d-block"><?php echo $st1; ?></span><?php echo $st2; ?></div>
                <div class="d-md-table-cell text-center p-4  text-white mb-4 mb-md-0"><img class="" src="assets/images/<?php echo $img1; ?>" style="width: 200px; height: 100px" ></div>
                <div class="d-md-table-cell px-4 vertical-align-middle mb-4 mb-md-0" style="min-width: 500px;">
                <a href="Job_detail.php?jobid=<?php echo $pid1; ?>" class="h4 mb-3 d-block"><?php echo $PCity; ?> - <?php echo $DCity; ?> </a>
                <p class="mb-0"><b><?php echo $tit1; ?></b></p>
                <p class="mb-0" ><?php echo $desc1; ?>..</p>
                
              </div>
              <div class="d-md-table-cell text-right pr-0 pr-md-4"><a href="Job_detail.php?jobid=<?php echo $pid1; ?>" class="btn btn-primary">read more</a></div>
            </li>

          <?php     }     ?>

            
          </ul>

          
          
<?php


$sql = "SELECT COUNT(*) FROM products $Query1"; 
$retval1 = mysqli_query($conn, $sql);  
$row = mysqli_fetch_row($retval1);  
$total_records = $row[0];
$total_pages = ceil($total_records / $limit); 
//echo "$page, $total_pages";


$link1 = "";
if ($page > 1){
  $prev1 = "Job_list.php?page=".($page-1);
}else{

  $link1 = " disabled ";
}

$link2 = "";
if ($page <  $total_pages){
  $next1 = "Job_list.php?page=".($page+1);
}else{

  $link2 = " disabled ";
}

//$pagLink = "<div class='pagination'>";  
/*
echo "<ul class='pagination justify-content-center'>";
echo "<li class='page-item'><a href='Job_list.php?page=".($page-1)."' class='button'>Previous</a></li>"; 
    for ($i=1; $i<=$total_pages; $i++) {  
        echo "<li><a href='Job_list.php?page=".$i."'>".$i."</a></li>";
    };  
echo "<li><a href='Job_list.php?page=".($page+1)."' class='button'>NEXT</a></li>";
echo"</ul>";    
*/
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