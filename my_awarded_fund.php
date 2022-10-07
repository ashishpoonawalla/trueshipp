




<?php
session_start();
$pid2 = $_GET["jobid"] ;
$unm2 = $_SESSION["username"] ;

require('db.php');
		
$sql="Update products SET paystatus='Funded' Where product_id=$pid2 " ;
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
        $tpri1 =$row1['tprice'];
        $paystat1 =$row1['paystatus'];
        $dtl = "CR Fund - job id: $pid2 | $PCity - $DCity | Transaction ID: xyz123";
        
        $sql2="INSERT INTO transactions (username, amount, details, DRCR, status1, job_id ) Values('$unm2',$tpri1,'$dtl','CR',' ',$pid2)" ;
        echo $sql2;
        $conn->query($sql2) ;

    }

}
else
{
    echo "Error Inserting record: " . $conn->error;
}
header('Location: my_awarded.php');

?>