<?php 
session_start();				

$pid = $_POST['pid'];
$lat2 = $_POST['lat1'];
$lon2 = $_POST['lon1'];

try {
	  
        require('db.php');
            
        $sql="UPDATE products SET drop_lat='$lat2', drop_lon='$lon2' WHERE product_id=$pid " ;

        if ($conn->query($sql) === TRUE) {

            echo "-- Success <br> $sql";
            
        } else {
            
            echo "Error Inserting record: $sql<br>". $conn->error;;
        }
	
	
        
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
    $conn1 = null;


  header('Location: post_jobfinish.php?jobid='.$pid);	


?>