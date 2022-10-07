<?php 
session_start();				

$pid = $_POST['pid'];
$lat1 = $_POST['lat1'];
$lon1 = $_POST['lon1'];

try {
	  
        require('db.php');
            
        $sql="UPDATE products SET pick_lat='$lat1', pick_lon='$lon1' WHERE product_id=$pid " ;

        if ($conn->query($sql) === TRUE) {

            echo "-- Success <br> $sql";
            
        } else {
            
            echo "Error Inserting record: $sql<br>". $conn->error;;
        }
	
	
        
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
    
    $conn1 = null;


  header('Location: post_jobloc2.php');	


?>