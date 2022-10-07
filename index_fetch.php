<?php
session_start();
if(isset($_POST["limit"], $_POST["start"]))
{


//  require('db.php');
//  $sql1= "SELECT * FROM tbl_posts ORDER BY id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
//  $result1 = $conn->query($sql1);

//  while ($row = $result1->fetch_assoc()) 
//  {
//   echo '
//   <h3>'.$row["title"].'</h3>
//   <p>'.$row["content"].'</p>
//   <p class="text-muted" align="right">By - '.$row["link"].'</p>
//   <hr />
//   ';
//  }
//}


if (isset($_SESSION["searchid11"] ) && isset($_SESSION["lat11"] )  && isset($_SESSION["lon11"] )  && isset($_SESSION["searchBox11"] )  ){
  
  //$searchid = $_SESSION["searchid11"];
  $lat1 = $_SESSION["lat11"];
  $lon1 =  $_SESSION["lon11"];
  //$searchBox = $_SESSION["searchBox11"];

}



if ($_SESSION["first_time"] == "Y"){
  $_SESSION["first_time"] = "N";
?>

<!-- ------------------------------ Vehicle List -------------------------------- -->
<!-- <div class="row justify-content-center" style="margin-left: -3px; margin-right: -2px; margin-top: 6px;"> -->

<?php
}


//   if (isset($_REQUEST['pgcntplus'])) {
//     $_SESSION['pgcnt'] += 12;
//   } else {
//     $_SESSION['pgcnt'] = 12;
//   }

  $pgcnt = $_POST["limit"];

  require('db.php');
  
  $Query21 = $_SESSION["Query21"];
  $Query1 = $_SESSION["Query1"];
  $searchid = $_SESSION["searchid"];
  $n1 = $n2 = $n3 = $n4 = "";
  if($_SESSION["featured"]=="0"){

        //============================ Featured ======================

        $date22 = date("Y/m/d");

        $Feature22 = "Y"; 
        $Query22 = " Where featured_till > '$date22' AND status1='Posted' ". $Query21;

        $sql1 = "SELECT * FROM products $Query22 ORDER BY product_id DESC Limit 4";

        if ($searchid == "map") {
            $sql1 = "SELECT
            *, (
                3959 * acos (
                cos ( radians($lat1) )
                * cos( radians( pick_lat ) )
                * cos( radians( pick_lon ) - radians($lon1) )
                + sin ( radians($lat1) )
                * sin( radians( pick_lat ) )
                )
            ) AS distance
            FROM products 
            $Query22 
            HAVING distance < 50
            ORDER BY product_id DESC
            LIMIT 4";
        }

        $result1 = $conn->query($sql1);



        $n1 = $n2 = $n3 = $n4 = "";

        $cccnt = 0;
        while ($row1 = $result1->fetch_assoc()) {
            $cccnt++;

            
            //  product_title, PCity, Pdate,   DCity,   DDate, product_cat, product_price, product_keywords, pweight, num_pack, product_desc, product_image, img2, img3, img4,  status1
            $pid1 = $row1['product_id'];
            
            if ($cccnt == 1) $n1 = $pid1;
            if ($cccnt == 2) $n2 = $pid1;
            if ($cccnt == 3) $n3 = $pid1;
            if ($cccnt == 4) $n4 = $pid1;
            
            
            $img1 = $row1['product_image'];
            $tit1 = $row1['product_title'];
            $tit1 = substr($tit1,0,20);
            $pri1 = $row1['product_price'];
            $PCity = $row1['PCity'];
            $DCity = $row1['DCity'];
            $Pdate = $row1['PDate'];
            $typepost = $row1['typepost'];

            $mselfdriving = $row1['mselfdriving'];
            $dselfdriving = $row1['dselfdriving'];
            $sale_amt = $row1['sale_amt'];

            $sql222 = "SELECT product_id FROM product_seller Where product_id=$pid1";
            $result222 = $conn222->query($sql222);

            $num222 = 0;
            while ($row222 = $result222->fetch_assoc()) {
            $num222++;
            }
                // ---------- index_list.php --------------
                include('index_list.php');
        } 
        $_SESSION["featured"]="1";
        $_SESSION["featuredcnt"] = $cccnt;
    }


//================================== normal list ======================


$Feature22 = "N"; 
$date22 = date("Y/m/d");
//$Query1 = " Where featured_till = '0000-00-00' AND status1='Posted' ";
//$sql1 = "SELECT * FROM products $Query1 ORDER BY product_id DESC Limit $pgcnt";
$sql1 = "SELECT * FROM products $Query1 ORDER BY product_id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]."";

if ($searchid == "map") {
  $sql1 = "SELECT
      *, (
        3959 * acos (
        cos ( radians($lat1) )
        * cos( radians( pick_lat ) )
        * cos( radians( pick_lon ) - radians($lon1) )
        + sin ( radians($lat1) )
        * sin( radians( pick_lat ) )
      )
  ) AS distance
  FROM products 
  $Query1 
  HAVING distance < 50
  ORDER BY product_id DESC
  LIMIT ".$_POST["start"].", ".$_POST["limit"]."";
}

$result1 = $conn->query($sql1);

$cccnt = 0;
while ($row1 = $result1->fetch_assoc()) {
  $cccnt++;
  //  product_title, PCity, Pdate,   DCity,   DDate, product_cat, product_price, product_keywords, pweight, num_pack, product_desc, product_image, img2, img3, img4,  status1
  $pid1 = $row1['product_id'];
  $img1 = $row1['product_image'];
  $tit1 = $row1['product_title'];
  $tit1 = substr($tit1,0,20);
  $pri1 = $row1['product_price'];
  $PCity = $row1['PCity'];
  $DCity = $row1['DCity'];
  $Pdate = $row1['PDate'];
  $typepost = $row1['typepost'];

  $mselfdriving = $row1['mselfdriving'];
  $dselfdriving = $row1['dselfdriving'];
  $dwithdriver =$row1['dwithdriver'];
  $sale_amt = $row1['sale_amt'];

  $sql222 = "SELECT product_id FROM product_seller Where product_id=$pid1";
  $result222 = $conn222->query($sql222);

  $num222 = 0;
  while ($row222 = $result222->fetch_assoc()) {
    $num222++;
  }
  // ------------------ index_list.php --------------
  if ($n1 == $pid1 || $n2 == $pid1 || $n3 == $pid1 || $n4 == $pid1){
    //-----------
  }else{
    include('index_list.php');
  }
  


}
?>



<!-- </div> -->

<?php } ?>

