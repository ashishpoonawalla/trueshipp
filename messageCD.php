<?php
session_start();

require('db.php');


            if(isset( $_SESSION["uname"]))
                  $un24 =  $_SESSION["uname"];
              else
                  $un24 = $_SESSION["username"];

extract($_POST);


//--------------------------------- Insert Record ----------------------------------
if (isset($_POST['chatmessage']) && $_POST['chatmessage']!="" && isset($_POST['jobid']) && isset($_POST['sender']) && isset($_POST['reciever']) ){

    $suid = $_SESSION["suid"];
    $sfnm = $_SESSION["sfnm"];
    $simg = $_SESSION["simg"];

    $ruid = $_SESSION["ruid"];
    $rfnm = $_SESSION["rfnm"];
    $rimg = $_SESSION["rimg"];

    $psid = $_SESSION["psid"];

    $sql33="INSERT INTO chat(chatmessage, jobid, suid, sfnm, simg, ruid, rfnm, rimg, psid) Values('$chatmessage','$jobid','$suid','$sfnm','$simg','$ruid','$rfnm','$rimg', $psid) " ;
    $conn->query($sql33) ;

    //$query = " INSERT INTO `chat` (`jobid`, `sender`, `reciever`, `chatmessage`) VALUES ('$jobid', '$sender', '$reciever', '$chatmessage') ";
    
    //mysqli_query($conn,$query);

} else {




// --------------------------------- Record List ----------------------------
    if (isset($_POST['readrecord'])){

        $jobid1  = $_SESSION["jobid"];
        $psid  = $_SESSION["psid"];

        $suid1 = $_SESSION["suid"];
        
        $ruid1 = $_SESSION["ruid"];


        $sql1="SELECT * FROM chat Where psid=$psid AND (suid='$suid1' OR suid='$ruid1') AND (ruid='$suid1' OR ruid='$ruid1')" ;
        //$sql1="SELECT * FROM chat Where jobid=$jobid1 AND (suid='$suid1' OR suid='$ruid1') AND (ruid='$suid1' OR ruid='$ruid1')" ;

        $result = $conn->query($sql1);
        $data = "";
        while ($row2 = mysqli_fetch_array($result)){


            $msg = $row2['chatmessage'];
            $uid = $row2['suid'];
            $fnm = $row2['sfnm']; 
            $img = $row2['simg']; 
            $dt1 = $row2['date1']; 
            

            $ruid = $row2['suid'];
            if ($ruid == $un24)
            {
                $uid = $row2['ruid'];
                $fnm = $row2['rfnm']; 
                $img = $row2['rimg']; 
            }

            if ($ruid != $un24){
                $imgrr = "./assets/imagesu/$uid.jpg?t=".filemtime('./assets/imagesu/'.$uid.'.jpg');
                $data .= "<div class='containerchat'>
                    <img src='$imgrr' style='width: 30px; height: 30px;  object-fit: cover;' >
                    <p style='font-size: 11px; '><pre>$msg</pre></p>
                   <!-- <span style='font-size: 11px; ' class='time-rightchat'>11:02</span> -->
                    </div>";
            
       
            }
            else {
                $imgrr = "./assets/imagesu/$un24.jpg?t=".filemtime('./assets/imagesu/'.$un24.'.jpg');
                $data .= "<div class='containerchat darkerchat' style='text-align: right;'>
                    <img src='$imgrr' style='width: 32px; height: 32px;  object-fit: cover;'  class='right'>
                    <p style='font-size: 11px; ' ><pre>$msg</pre></p>
                 <!--   <span style='font-size: 11px; ' class='time-leftchat'>11:05</span> -->
                    </div>";
            }
        
            /*
            if ($ruid != $un24){
                $data .= "<div class='containerchat'>
                    <img src='assets/imagesu/$uid.jpg' style='width: 30px; height: 30px;' >
                    <p style='font-size: 11px; '><pre>$msg</pre></p>
                   <!-- <span style='font-size: 11px; ' class='time-rightchat'>11:02</span> -->
                    </div>";
            
       
            }
            else {
                $data .= "<div class='containerchat darkerchat' style='text-align: right;'>
                    <img src='assets/imagesu/$un24.jpg' style='width: 32px; height: 32px;'  class='right'>
                    <p style='font-size: 11px; ' ><pre>$msg</pre></p>
                 <!--   <span style='font-size: 11px; ' class='time-leftchat'>11:05</span> -->
                    </div>";
            }
        
           */
            
       

        

    }
    $sql12="UPDATE chat SET status1='Y' Where psid=$psid AND ruid='$un24' " ;       
    $conn->query($sql12);

    echo $data;
    }
}

?>