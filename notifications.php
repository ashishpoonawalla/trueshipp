<?php 
try{
  // echo "<br><br>";
  session_start();
}catch(Exception $e){

}
include_once("header.php");
?>

<!-- Common Area Top ------------------ -->





<!-- Search Bar -->
<section class="page-title-section overlay" style="background: url(images/backgrounds/tra1.jpg) no-repeat center center;" >
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          
          <a class="h3 text-primary font-secondary" href="#">Notifications</a> <br />
          
          
          
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
            if (isset($_SESSION["username"]) || isset($_SESSION["uname"])){            
        
                if (isset($_SESSION["username"])){
                    $unm11 = $_SESSION["username"];
                }  
                
                if (isset($_SESSION["uname"])){
                    $unm11 = $_SESSION["uname"];
                }  
?>



        <ul class="list-unstyled">              

            <table class="table table-striped table-hover">
                <!--
                <thead>
                  <tr>
                    <th scope="col">Sender</th>    
                    <th scope="col">Message</th>
                    <th scope="col" class= "d-none d-sm-block">Date</th>                   
                    <th scope="col">Option</th>
                  </tr>
                </thead>
                -->
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
  


 $Query1 = "Where ruid='$unm11'";

			$sql1="SELECT * FROM notifications $Query1 ORDER BY nid DESC Limit $record_index, $limit" ;
      //echo $sql1; 
			$result1 = $conn->query($sql1);

			$rowcnt=0;
			while($row1 = $result1->fetch_assoc())
			{
                $rowcnt++;
                $nid =$row1['nid'];
                $jobid =$row1['jobid'];
                $nmessage =$row1['nmessage'];
                $suid =$row1['suid'];
                 $sfnm =$row1['sfnm'];
                 $ntype =$row1['ntype'];
                 $status1 =$row1['status1'];
                
			  
                $date1 = $row1['date1'];             
                $theDate    = new DateTime($date1);
                $stringDate = $theDate->format('d-M-Y');  
                
                
                // $sql12="SELECT * FROM products Where product_id=$jobid" ;
                // //echo $sql1; 
                // $result12 = $conn->query($sql12);
          
                
                // if($row12 = $result12->fetch_assoc())
                // {
                         
                //           $typepost =$row12['typepost'];
                // }

				?>

              
               
                    <tr>
                        <td><img src='./assets/imagesu/<?php echo $suid; ?>.jpg' style="height: 30px; border-radius: 15px;" /> <?php echo $sfnm; ?></td>  

                        <td>
                            <a href='notifications1.php?nid=<?php echo $nid; ?>&jobid=<?php echo $jobid;?>&ntype=<?php echo $ntype; ?>' >
                            <?php echo $nmessage; ?> - <?php echo $ntype; ?> #<?php echo $jobid; ?>
                            <?php if ($status1 =='N')
                                    {
                                        echo "&nbsp; <img src='images/not1.png' style='width: 20px'>";
                                    }
                                    
                                    // echo "$ruid1 - $st12"; ?>
                            </a>
                        </td>
                        
                        <td class= "d-none d-sm-block"><?php echo $stringDate; ?></td>
                        
                        <td>
                          <a href='notifications_del.php?nid=<?php echo $nid; ?>' onclick="return confirm('Are you sure you want to delete this job?');">
                                <img src="img/trash4.png" style="width: 22px;"/>
                          </a>

                        </td>
                    </tr>
                     
                  
                    <?php     }     ?>       
                    




                </tbody>
              </table>


          </ul>



          <?php


$sql = "SELECT COUNT(*) FROM notifications $Query1"; 
$retval1 = mysqli_query($conn, $sql);  
$row = mysqli_fetch_row($retval1);  
$total_records = $row[0];
$total_pages = ceil($total_records / $limit); 
//echo "$page, $total_pages";


$link1 = "";
if ($page > 1){
  $prev1 = "notifications.php?page=".($page-1);
}else{

  $link1 = " disabled ";
}

$link2 = "";
if ($page <  $total_pages){
  $next1 = "notifications.php?page=".($page+1);
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



}   else { 

include('warning.php');
}
?>

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