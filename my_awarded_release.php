<?php
session_start();
$pid2 = $_GET["jobid"] ;
$unm2 = $_SESSION["username"] ;
$fnm2 = $_SESSION["first_name"] ;

require('db.php');
		
$sql="Update products SET paystatus='Fund Released' Where product_id=$pid2 " ;
//$sql="INSERT INTO seller_info('username', 'password', 'store_name' ) Values('$email','$pass','$snm')" ;

if ($conn->query($sql) === TRUE) {
    
    
    $sql1="SELECT * FROM products Where product_id=$pid2" ;

    $result1 = $conn->query($sql1);

    
    if($row1 = $result1->fetch_assoc())
    {

        $pid1 =$row1['product_id'];
        $PCity =$row1['PCity'];
        $DCity =$row1['DCity'];

        //$Pdate = $row1['PDate'];
        //$theDate    = new DateTime($Pdate);
        //$stringDate = $theDate->format('d-M-Y');
        
        //$desc =$row1['product_desc'];
        //$desc1 = substr($desc,0,100);
        //$stat =$row1['status1'];

        $tunm =$row1['tusername'];
        $tfnm = $row1['tname'];
        $tpri1 =$row1['tprice'];
        $paystat1 =$row1['paystatus'];


        //--------------------- Amount DR from sender
        $dtl = "-DR Fund Release - job id: $pid2 | $PCity - $DCity";
        $sql2="INSERT INTO transactions (username, amount, details, DRCR, status1, job_id ) Values('$unm2',$tpri1,'$dtl','DR',' ',$pid2)" ;
        //echo $sql2;
        $conn->query($sql2) ;

        $tamt = ($tpri1 * 93) / 100;
        $aamt = ($tpri1 * 7) / 100;

        //--------------------- Amount CR to reciever
        $dtl = "CR Fund Release from - job id: $pid2 | $PCity - $DCity";
        $sql2="INSERT INTO transactions (username, amount, details, DRCR, status1, job_id ) Values('$tunm',$tamt,'$dtl','CR',' ',$pid2)" ;
        //echo '<hr>'.$sql2;
        $conn->query($sql2) ;



        //--------------------- Amount CR to Admin
        $dtl = "CR to ADMIN Fund Release - job id: $pid2 | $PCity - $DCity | 7% commission.";
        $sql2="INSERT INTO transactions (username, amount, details, DRCR, status1, job_id ) Values('Admin',$aamt,'$dtl','CR',' ',$pid2)" ;
        //echo '<hr>'.$sql2;
        $conn->query($sql2) ;




            //------------------ Send notifications ------------------------     
            $ntype = "job";   
            $nmessage = "Fund released";

            $sql11="INSERT INTO notifications (nmessage, jobid, suid, sfnm, ruid, rfnm, ntype) 
                                     VALUES ('$nmessage', $pid2, '$unm2', '$fnm2', '$tunm', '$tfnm', '$ntype') ";

            $conn->query($sql11);

            //------------------ Send notifications End------------------------  



    }

}
else
{
    echo "Error Inserting record: " . $conn->error;
}
header('Location: my_delivered.php');

?>








