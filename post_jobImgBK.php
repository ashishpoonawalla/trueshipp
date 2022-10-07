<?php 
include("header.php");
?>

<!-- Common Area Top ------------------ -->




<!-- page title -->
<section class="page-title-section overlay" style="background: url(images/backgrounds/tra1.jpg) no-repeat center center;" >
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb">
            <li class="list-inline-item"><a class="h3 text-primary font-secondary" href="#">Post Job - Image Upload</a></li>
          </ul>
          
        </div>
      </div>
    </div>
</section>
  <!-- /page title -->
  
  <!-- contact -->
<section class="section bg-gray">
    <div class="container">
      
      <div class="row">
        <div class="col-lg-6 mb-4 mb-lg-0">
          
        	<?php
							//session_start();
							$pid = $_SESSION["pidIMG"];
							require('db.php');	
							$sql="SELECT * FROM products where product_id=$pid" ;
			
							$result = $conn->query($sql);
			
							if($row = $result->fetch_assoc())
			  				{
							  	
							  	$img1= $row['product_image'];
								$img2= $row['img2'];
								$img3= $row['img3'];
								$img4= $row['img4'];
							}
							
						?>
                        
						
						
  				<!-- Main Image1 ------------------------------------------ -->						
						
                        	
							<div class="form-group">
								<label for="exampleInputEmail1">Main Image</label><br>
							    <img alt="140x140" width="200px" src="assets/images/<?php echo $img1; ?>?t=<?php echo filemtime('assets/images/'.$img1); ?>">
                                
                            </div>
							
                             <form action="post_jobImg11.php?img_num=1"  method="post" enctype="multipart/form-data">

								    <div class="form-group">								      
								      <input type="file" onchange="this.form.submit()"  class="form-control" name="fileToUpload" id="fileToUpload"  onkeypress="unsetnameError(false);" >
								    </div>

								    <!-- <button type="submit" class="btn btn-primary">Upload Image</button> -->
								 
								     <br />						    
						     </form>                       
						<br>
						
						
  					<!-- Img 2 ------------------------------------------ 	-->			
						
                        	
							<div class="form-group">
								<label for="exampleInputEmail1">Image 2</label><br>
							    <img alt="140x140" width="150px" src="assets/images/<?php echo $img2; ?>?t=<?php echo filemtime('assets/images/'.$img2); ?>">
                                
                            </div>
							
                             <form action="post_jobImg11.php?img_num=2"  method="post" enctype="multipart/form-data">

								    <div class="form-group">
								      
								      <input type="file" onchange="this.form.submit()"  class="form-control" name="fileToUpload" id="fileToUpload"  onkeypress="unsetnameError(false);" >
								    </div>

								    <!-- <button type="submit" class="btn btn-primary">Upload Image</button> -->
								 
								     <br />						    
						     </form>
						<br>						
  					<!-- Img 3 ------------------------------------------ 		-->	
						
                        	
							<div class="form-group">
								<label for="exampleInputEmail1">Image 3</label><br>
							    <img alt="140x140" width="150px" src="assets/images/<?php echo $img3; ?>?t=<?php echo filemtime('assets/images/'.$img3); ?>">
                                
                            </div>
							
                             <form action="post_jobImg11.php?img_num=3"  method="post" enctype="multipart/form-data">

								    <div class="form-group">
								      
								      <input type="file" onchange="this.form.submit()" class="form-control" name="fileToUpload" id="fileToUpload"  onkeypress="unsetnameError(false);" >
								    </div>

								    <!-- <button type="submit" class="btn btn-primary">Upload Image</button> -->
								 
								     <br />						    
						     </form>
						<br>						

  					<!-- Img 3 ------------------------------------------ 		-->		
						
                        	
							<div class="form-group">
								<label for="exampleInputEmail1">Image 4</label><br>
							    <img alt="140x140" width="150px" src="assets/images/<?php echo $img4; ?>?t=<?php echo filemtime('assets/images/'.$img4); ?>">
                                
                            </div>
							
                             <form action="post_jobImg11.php?img_num=4"  method="post" enctype="multipart/form-data">

								    <div class="form-group">
								      
								      <input type="file" onchange="this.form.submit()" class="form-control" name="fileToUpload" id="fileToUpload"  onkeypress="unsetnameError(false);" >
								    </div>

								    <!-- <button type="submit" class="btn btn-primary">Upload Image</button> -->
								 
								     <br />						    
						     </form>
						<br>						
							
						
						


        </div>



        <div class="col-lg-6">
		  
		  	

			<b>Pickup Location:</p>
			<div id="myMap" style="position:relative;width:100%;height:250px;"></div>
			  <div id="pushpinDrag" style="display:none;"> drag</div>
              <div id="pushpinDragEnd" style="display:none;">dragend</div>
              <div id="pushpinDragStart" style="display:none;">dragstart</div>
              <!-- <div>Pin Location: <span id="pushpinLocation"></span></div> -->
              <input type="text" id="lat1" disabled="" required/>
              <input type="text" id="lon1" disabled="" required/>
              
           


		  <hr>
		  ** Upload image and submit job for verification.<br><br>
          <p class="mb-5">
		  	<a href="post_jobfinish.php?jobid=<?php echo $pid; ?>" class="btn btn-primary">Submit to verify</a>
		  </p>

		  
          
        </div>
      </div>
    </div>
  </section>
  <!-- /contact -->











<!-- Common Area Bottom ----------------------- -->
<!-- footer -->
<?php 
include("footer.php");
?>

<!--  ------------------------------------------- Map Pickup Location ------------------ -->
<script type='text/javascript'>
    var map;

    function GetMap() {
        map = new Microsoft.Maps.Map('#myMap', {});

        var center = map.getCenter();
        
        var greenPin = new Microsoft.Maps.Pushpin(new Microsoft.Maps.Location(center.latitude, center.longitude ), { color: '#f00', draggable: true });
        map.entities.push(greenPin);

        Microsoft.Maps.Events.addHandler(greenPin, 'drag', function (e) { highlight('pushpinDrag', e); });
        Microsoft.Maps.Events.addHandler(greenPin, 'dragend', function (e) { highlight('pushpinDragEnd', e); });
        Microsoft.Maps.Events.addHandler(greenPin, 'dragstart', function (e) { highlight('pushpinDragStart', e); });

        
    }

    function highlight(id, event) {
        //Highlight the mouse event div to indicate that the event has fired.
        document.getElementById(id).style.background = 'LightGreen';

        //document.getElementById('pushpinLocation').innerText = event.target.getLocation().toString();
        document.getElementById('lat1').value = event.target.getLocation().latitude.toString();
        document.getElementById('lon1').value = event.target.getLocation().longitude.toString();

        //Remove the highlighting after a second.
        setTimeout(function () { document.getElementById(id).style.background = 'white'; }, 1000);
    }
    </script>
    <script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=Alt4pMIelko3RclrRrokx2IhE1sFyoZen-iWXct9urb5G61DUVjMPPW8DzehK9fK' async defer></script>



</body>
</html>