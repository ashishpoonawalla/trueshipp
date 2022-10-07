<?php 
try{
  // echo "<br><br>";
  session_start();
}catch(Exception $e){

}
include_once("header.php");
// try{
//    echo "<br><br>";
//   session_start();
// }catch(Exception $e){

// }
?>

<!-- Common Area Top ------------------ -->









<!-- Search Bar -->
<section class="page-title-section overlay" style="background: url(images/backgrounds/tra1.jpg) no-repeat center center;" >
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          
          <a class="h3 text-primary font-secondary" href="#">My Posted Jobs</a> <br />
          
          
          
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


<?php
            if (!isset($_SESSION["username"])){
              include('warning.php');
          }else{

?>



          <ul class="list-unstyled">

              

            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                    <th scope="col">Job</th>
            <!--        <th scope="col">Image</th>     -->
                    <th scope="col">Budget</th>
                    <th scope="col" class="d-none d-sm">Date</th>
                    <th scope="col" class="d-none d-sm">Quotes</th>
                    <th scope="col" class="d-none d-sm">Status</th>
                    <th scope="col">Bid/View</th>
                    
                    <th scope="col" style="width: 160px;">Option</th>
                  </tr>
                </thead>
                <tbody>
               
               
               


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
  


 $Query1 = "Where (status1='Posted' Or status1='Pending' Or status1='Hire') AND userID=".$_SESSION["user_id"];

			$sql1="SELECT * FROM products $Query1 ORDER BY product_id DESC Limit $record_index, $limit" ;
      //echo $sql1; 
			$result1 = $conn->query($sql1);

			$rowcnt=0;
			 while($row1 = $result1->fetch_assoc())
			  {
          $rowcnt++;
         	$pid1 =$row1['product_id'];
			  	$img1 =$row1['product_image'];
          $tit1 =$row1['product_title'];
          $pri1 =$row1['product_price'];

          $PCity =$row1['PCity'];
          $DCity =$row1['DCity'];
          $Pdate = $row1['PDate'];
          $stat = $row1['status1'];
          $theDate    = new DateTime($Pdate);
          $stringDate = $theDate->format('d-M-Y');
          //list($year,$month,$day) = explode("-",$stringDate);
          
          //$st1 =  $day;
          //$st2 =  $month.'.'.$year;

          $desc =$row1['product_desc'];
          $view =$row1['viewcount'];
          $desc1 = substr($desc,0,100);
				?>

              <!-- --------------------------------- bid count -------------------- -->
              <?php
                        
                        $sql222="SELECT product_id FROM product_seller Where product_id=$pid1" ;
                        $result222 = $conn222->query($sql222);
                  
                          $num222=0;
                          while($row222 = $result222->fetch_assoc())
                          {
                              $num222++;
                          }
                          ?>
               
                    <tr>
                        <td scope="row"><?php echo $tit1; ?>&nbsp;<b><?php if ( $stat == "Hire") { echo  $stat; } ?></b></td>
                <!--        <td><img src='./assets/images/<?php echo $img1; ?>' style="height: 50px;" /></td>  -->
                        <td><?php echo $pri1; ?></td>
                        <td class="d-none d-sm"><?php echo $stringDate; ?></td>



                        <td class="d-none d-sm"><?php echo $num222; ?></td>
                        
                        <?php if($stat == "Pending"){ $col4 ="Red";  } else { $col4 ="grey";} ?>
                        <td class="d-none d-sm" style="color: <?php  echo $col4;  ?>"><?php echo $stat; ?></td>
                        <td><b><?php echo $num222; ?></b>&nbsp;/&nbsp;<?php echo $view; ?></td>
                        <td><a href='my_job_detail.php?jobid=<?php echo $pid1; ?>' >Detail</a> |

                          <a href='post_job_edit.php?jobid=<?php echo $pid1; ?>' >Edit</a>

                          | <a href='my_job_delete.php?jobdelid=<?php echo $pid1; ?>' onclick="return confirm('Are you sure you want to delete this job?');">
                                <img src="img/trash4.png" style="width: 22px;"/>
                          </a>

                        </td>
                    </tr>
                     
                  
                    <?php     }     ?>       
                    




                </tbody>
              </table>


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


<?php  
    if ($rowcnt < 8 )
    {
      for ($ff = 1; $ff<= (10-$rowcnt); $ff++){
        echo "<br><br>";
      }
    }



}    ?>

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