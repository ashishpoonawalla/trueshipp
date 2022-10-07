<?php 
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
        <div class="col-9">
         
<?php

if(!isset( $_SESSION["uname"]) && !isset( $_SESSION["username"])){
  include('warning.php');
}else{


?>
            <ul class="list-unstyled">

              <table class="table table-hover">
                  <thead>
                    <tr>
                      <!-- <th scope="col">#JobID</th> -->
                      <th scope="col">Name</th>
                      <th scope="col">Details</th>
                      <th scope="col">#</th>
                    </tr>
                  </thead>
                  <tbody>

<?php



              require('db.php');


              if(isset( $_SESSION["uname"]))
                  $un24 =  $_SESSION["uname"];
              else if(isset( $_SESSION["username"]))
                  $un24 = $_SESSION["username"];			
						
							$sql1="SELECT DISTINCT psid FROM chat Where suid='$un24' OR ruid='$un24' ORDER BY cid DESC" ;
							
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
                    
                    if ($uid == $un24)
                    {
                      $uid = $row2['ruid'];
                      $fnm = $row2['rfnm']; 
                      $img = $row2['rimg']; 
                    }
                    
									  $sql3="SELECT * FROM products Where product_id=$jid1 " ;
							
								    $result3 = $conn->query($sql3);
                    if($row3 = $result3->fetch_assoc())
                    {
                        $titl=$row3['product_title'];
                        $desti=$row3['PCity']." - ".$row3['DCity'];
                       
                    }
?>

                      <tr>
                          <!--<td><?php echo $jid1; ?></td>-->
                          <td><a href='messagechange.php?jobid=<?php echo $jid1; ?>&psid=<?php echo $psid; ?>'>
                          
                          <!-- <img class="" src="assets/imagesu/<?php echo $uid; ?>.jpg" style="width: 25px; border-radius: 20px;" > -->
                          <img class="" src="assets/imagesu/<?php echo $uid; ?>.jpg?t=<?php echo filemtime('assets/imagesu/'.$uid.'.jpg'); ?>" style="width: 25px; border-radius: 20px;" >
                          
                          &nbsp;&nbsp;<?php echo $fnm; ?></a></td>
                          
                          <td><?php echo $titl; ?> , <?php echo $desti; ?></td>
                        <!--  <td><?php echo $dt1; ?></td> -->
                          <td><a href='messagechange.php?jobid=<?php echo $jid1; ?>&psid=<?php echo $psid; ?>'>Chat</a></td>
                      </tr>
                      
<?php                     

                }

              }   ?>






                    
                  </tbody>
                </table>



              </ul>
              
              <!--
              <nav aria-label="Page navigation example">
              <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                  <a class="page-link" href="#">Next</a>
                </li>
              </ul>
              </nav>
              -->
              
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

        <div style="padding: 10px; width: 380px; height:470px; overflow-y: scroll; border: solid 3px #ddd; position: fixed; right: 0;bottom: 0; background-color: white; z-index: 100;"    >
            
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
            <textarea style="font-size: 11px; height: 70px;" name="chatmessage" id="chatmessage" onkeypress="if(event.which === 13 && !event.shiftKey) addRecord();" class="form-control mb-3" autofocus="autofocus" placeholder="To <?php echo $rfnm; ?>"></textarea>
            <button style="padding: 5px; margin-top: -10px ;" onClick="addRecord();" class="btn btn-sm btn-primary"  >Send</button>
              <input type="hidden" name="jobid" id="jobid" class="form-control mb-3" value="<?php echo $jobid; ?>"/>
              <input type="hidden" name="sender" id="sender" class="form-control mb-3" value="<?php echo $suid; ?>"/>
              <input type="hidden" name="reciever" id="reciever" class="form-control mb-3" value="<?php echo $ruid; ?>"/>            
            <!--  <button type="button" class="btn btn-primary" onclick="addRecord()">Send</button> -->
            <!-- <span style="float:right;
    display:inline-block;
    padding:2px 5px;
    background:#333;
    color:#fff;" id='close' onclic='this.parentNode.parentNode.parentNode.removeChild(this.parentNode.parentNode); return false;'>x</span>
        -->
        </div>
          <?php  
        
        
        
        }  ?>

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