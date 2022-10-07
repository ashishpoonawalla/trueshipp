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
<section class="page-title-section overlay" style="background: url(images/backgrounds/tra1.jpg) no-repeat center center;" >
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        
        <a class="h3 text-primary font-secondary" href="#">Message</a>
        
        
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

if(!isset( $_SESSION["uname"]) && !isset( $_SESSION["username"])){
  include('warning.php');
}else{




  


?>
            <ul class="list-unstyled">

              <table class="table table-striped table-hover">
                  <!--
                  <thead>
                    <tr>
                      <!-- <th scope="col">#JobID</th> 
                      <th scope="col">Name</th>
                      <th scope="col">Details</th>
                      <th scope="col">#</th>
                    </tr>
                  </thead>

                  -->
                  <tbody>

<?php



require('db.php');


$limit = 5; 


if (isset($_GET["page"] )) 
    {
    $page  = $_GET["page"]; 
    } 
else 
   {
    $page=1; 
   };  

$record_index= ($page-1) * $limit;  




              if(isset( $_SESSION["uname"]))
                  $un24 =  $_SESSION["uname"];
              else if(isset( $_SESSION["username"]))
                  $un24 = $_SESSION["username"];			
						
							$sql1="SELECT DISTINCT psid FROM chat Where suid='$un24' OR ruid='$un24' ORDER BY cid DESC Limit $record_index, $limit" ;
							
							$result1 = $conn->query($sql1);

							$rowcnt=0;
							while($row1 = $result1->fetch_assoc())
							{
							  
								$rowcnt++;
							  
								$psid=$row1['psid'];
							  							
								
								$sql2="SELECT * FROM chat Where psid=$psid " ;
							
								$result2 = $conn->query($sql2);

							
								if($row2 = $result2->fetch_assoc())
								{
                    $jid1=$row2['jobid'];
                    $uid = $row2['suid'];
                    $fnm = $row2['sfnm']; 
                    $img = $row2['simg']; 
                    $img = $row2['simg']; 
                    $dt1 = $row2['date1']; 
                    $st12 = $row2['status1'];
                    


                    $ruid = "";

                    if ($uid == $un24)
                    {
                      $ruid1 = $uid = $row2['ruid'];                       
                      $fnm = $row2['rfnm']; 
                      $img = $row2['rimg']; 
                    }
                    
									  $sql3="SELECT * FROM products Where product_id=$jid1 " ;
							
								    $result3 = $conn->query($sql3);
                    if($row3 = $result3->fetch_assoc())
                    {
                        $titl=$row3['product_title'];
                        $desti=$row3['PCity']." - ".$row3['DCity'];
                        $typ = $row3['typepost'];
                    }
?>

                      <tr onclick="window.location.assign('messagechange.php?jobid=<?php echo $jid1; ?>&psid=<?php echo $psid; ?>&typ=<?php echo $typ; ?>');">
                          <!--<td><?php echo $jid1; ?></td>-->
                          <!-- <td style="width: 200px; font-size: 12px;"><a href='messagechange.php?jobid=<?php echo $jid1; ?>&psid=<?php echo $psid; ?>&typ=<?php echo $typ; ?>'> -->
                          <td style="width: 200px; font-size: 12px;">
                          
                          <!-- <img class="" src="assets/imagesu/<?php echo $uid; ?>.jpg" style="width: 25px; border-radius: 20px;" > -->
                          <img class="" src="assets/imagesu/<?php echo $uid; ?>.jpg?t=<?php echo filemtime('assets/imagesu/'.$uid.'.jpg'); ?>" style="margin-right: 5px; width: 25px; height: 25px;  object-fit: cover; border-radius: 30px;" >
                          <?php echo $fnm; ?></td>
                          
                          <td style="font-size: 12px;"><?php echo $titl; ?> , <?php echo $desti; ?></td>
                        <!--  <td><?php echo $dt1; ?></td> -->
                          <!-- <td style="width: 50px; font-size: 12px;"><a href='messagechange.php?jobid=<?php echo $jid1; ?>&psid=<?php echo $psid; ?>&typ=<?php echo $typ; ?>'>Chat</a>  -->


<?php
                $sql112="SELECT * FROM chat Where psid=$psid AND ruid='$un24' AND status1='N'" ;
                
							  $result112 = $conn->query($sql112);

                $cnt112=0;
                while($row112 = $result112->fetch_assoc())
                {
                  $cnt112++;
                }

?>

                          <?php if ($cnt112 > 0)
                                  {
                                      //echo "&nbsp; <img src='images/not1.png' style='width: 20px'>";
                                  }
                                  
                                 // echo "$ruid1 - $st12"; ?>
                          
                          
                          </td>
                      </tr>
                      
<?php                     

                }

              }   ?>






                    
                  </tbody>
                </table>



              </ul>
              
              <?php


$sql="SELECT DISTINCT psid FROM chat Where suid='$un24' OR ruid='$un24' " ;

$result9 = $conn->query($sql);

        $num9=0;
        while($row9 = $result9->fetch_assoc())
        {
            $num9++;
        }

//$retval1 = mysqli_query($conn, $sql);  
//$row = mysqli_fetch_row($retval1);  
$total_records = $num9;
$total_pages = ceil($total_records / $limit); 
//echo "$page, $total_pages";


$link1 = "";
if ($page > 1){
  $prev1 = "message.php?page=".($page-1);
}else{

  $link1 = " disabled ";
}

$link2 = "";
if ($page <  $total_pages){
  $next1 = "message.php?page=".($page+1);
}else{

  $link2 = " disabled ";
}


?>
        

          <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-center">

              <li class="page-item <?php echo $link1; ?>">
                <a class="page-link" href="<?php echo $prev1; ?>" tabindex="-1">Prev</a>
              </li>
              <!--                  <li class="page-item active"><a class="page-link" href="#">4</a></li>  -->

              <li class="page-item disabled"><a class="page-link" href="#"><?php echo $page.' of '.$total_pages; ?></a></li> 

              <li class="page-item <?php echo $link2; ?>">
                <a class="page-link" href="<?php echo $next1; ?>">Next</a>
              </li>
              

            </ul>
          </nav>
              
        </div>
<?php 
  if ($rowcnt < 8 )
  {
    for ($ff = 1; $ff<= (12-$rowcnt); $ff++){
      echo "<br><br>";
    }
  }
}  ?>



        <div class="col-3">
         
        <?php
        
        if (isset($_SESSION["sfnm"])){
          ?>

        <div style="padding: 5px; width: 350px; max-height:470px; overflow-y: scroll; border: solid 2px #ddd; position: fixed; right: 0;bottom: 0; background-color: white; z-index: 300;"    >
            
          <div id="records_contant"></div>
           
            <?php
              $jobid= $_SESSION["jobid"] ;

              $suid = $_SESSION["suid"];
              $sfnm = $_SESSION["sfnm"];
              $simg = $_SESSION["simg"];

              $ruid = $_SESSION["ruid"];
              $rfnm = $_SESSION["rfnm"];
              $rimg = $_SESSION["rimg"];


            ?>
            <!-- <textarea style="font-size: 11px; height: 70px;" name="chatmessage" id="chatmessage" autofocus="autofocus" class="form-control mb-3" placeholder=""></textarea> -->
            <textarea style="  font-size: 11px; height: 70px;" name="chatmessage" id="chatmessage" onkeypress="if(event.which === 13 && !event.shiftKey) addRecord();" class="form-control mb-3" autofocus="autofocus" placeholder="To <?php echo $rfnm; ?>"></textarea>
            <button style="font-size: 12px; border-radius: 10px; background:#333; float:right; padding: 4px 10px; margin-top: -10px ;" onClick="addRecord();" class="btn btn-sm btn-primary"  >Send</button>
              <input type="hidden" name="jobid" id="jobid" class="form-control mb-3" value="<?php echo $jobid; ?>"/>
              <input type="hidden" name="sender" id="sender" class="form-control mb-3" value="<?php echo $suid; ?>"/>
              <input type="hidden" name="reciever" id="reciever" class="form-control mb-3" value="<?php echo $ruid; ?>"/>            
             <!--<button type="button" class="btn btn-primary" onclick="addRecord()">Send</button>-->

             <span style="font-size: 12px;border-radius: 10px;  display:inline-block;    padding:4px 10px;    background:#333;  margin-top: -10px ; 
             color:#fff;" id='close' onclick='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;' >x</span>
        
        </div>
          <?php  
        
        
        
        }  ?>

        </div>
      </div>
    </div>
  </section>
  <!-- /notice -->



  <br><br><br><br>



<!-- Common Area Bottom ----------------------- -->
<!-- footer -->
<?php 
include("footer.php");
?>

<script>
  // if (!("autofocus" in document.createElement("input"))) {
  //   document.getElementById("chatmessage").focus();
  // }
  
  //// Load at start
    $(document).ready(function(){
    readRecords();
  });

  

   //// List of Chat
   function readRecords(){
    var readrecord = "readrecord";
    $.ajax({
      url:"messageCD.php",
      type:"post",
      data: {readrecord: readrecord},
      success:function(data, status){
        $('#records_contant').empty();
        $('#records_contant').html(data);
        //document.getElementById("chatmessage").focus();


        var elmnt = document.getElementById("chatmessage");
elmnt.scrollIntoView();

      }
    });
  }

  setInterval(readRecords, 10000);

  //// Add new Chat Message
  function addRecord(){
    
    var chatmessage = document.getElementById("chatmessage").value;
    var Regex = /\b[\+]?[(]?[0-9]{2,6}[)]?[-\s\.]?[-\s\/\.0-9]{3,15}\b/m;

    if (chatmessage.match(/([a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z0-9_-]+)/gi)){
      alert('Email not allow in chat..');
      return
    } else if (Regex.test(chatmessage)){
      alert('Phone not allow in chat..');
      return
    } else {
    
    
    var jobid = $('#jobid').val();
    var sender = $('#sender').val();
    var reciever = $('#reciever').val();

    $.ajax({
      url:"messageCD.php",
      type:'post',
      data: {         
        jobid: jobid,
        sender : sender ,
        reciever: reciever,
        chatmessage: chatmessage
      },

      success:function(data, status){
        document.getElementById("chatmessage").value="";
        //document.getElementById("records_contant").removeChild();
        readRecords(); 
        //document.getElementById("chatmessage").focus();


        var elmnt = document.getElementById("chatmessage");
elmnt.scrollIntoView();

      }

    });
   }
  }

</script>


</body>
</html>