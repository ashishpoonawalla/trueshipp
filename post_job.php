<?php 
try{
  // echo "<br><br>";
  session_start();
}catch(Exception $e){

}
include("header.php");

?>

<!-- Common Area Top ------------------ -->




<!-- page title -->
<section class="page-title-section overlay" style="background: url(images/backgrounds/tra1.jpg) no-repeat center center;" >
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <ul class="list-inline custom-breadcrumb">
            <li class="list-inline-item"><a class="h3 text-primary font-secondary" href="#">Post New Job</a></li>
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
        <div class="col-lg-8 mb-4 mb-lg-0">

          <?php
                
                if (isset($_SESSION["username"])){
                ?>

               


          <form action="post_jobCode.php" method="post">
            <input type="text" class="form-control mb-3" name="title" placeholder="Your Job Title" maxlength="250" required style= "height: 40px; ">            
            <input type="text" class="form-control mb-3" name="paddress" placeholder="Pickup Full Address" style="width: 70%; float: right; height: 40px;" maxlength="300" required>
            <input type="text" class="form-control mb-3" name="pcity" placeholder="Pickup City" maxlength="100" style="width: 30%; height: 40px;" required>
           
              <!-- <div id="pushpinDrag" style="display:none;"> drag</div>
              <div id="pushpinDragEnd" style="display:none;">dragend</div>
              <div id="pushpinDragStart" style="display:none;">dragstart</div>
              <div>Pin Location: <span id="pushpinLocation"></span></div> 
              <input type="text" id="lat1" disabled="" required/>
              <input type="text" id="lon1" disabled="" required/>
              <button class="btn btn-primary btn-sm" >Pickup Map</button> -->
              
            <br>Packege Pickup Date:
            <input type="date" class="form-control mb-3" name="pdate" placeholder="Pickup Date" required style= "height: 40px; ">
            <input type="text" class="form-control mb-3" name="daddress" placeholder="Drop Full Address" style="width: 70%; float: right; height: 40px;" maxlength="300" required>
            <input type="text" class="form-control mb-3" name="dcity" placeholder="Drop City" style="width: 30%; height: 40px;" maxlength="100" required>

            Packege Delivery Date:
            <input type="date" class="form-control mb-3" name="ddate" placeholder="Drop Date" required style= "height: 40px; ">
            
            Category:
            <select class="form-control  mb-3" name="category" required="" placeholder="" style= "height: 40px; ">
								<?php
				
								require('db.php');
								
								$sql1="SELECT * FROM categories" ;
								
								$result1 = $conn->query($sql1);

								
								 while($row1 = $result1->fetch_assoc())
								 {
								  	$id=$row1['cat_id'];
                    $cat=$row1['cat_title'];
                    echo "<option value='$cat'>$cat</option>";									
								 }
									
							    ?>
								
            </select>
							
            <input type="number" min="500" max="49900" class="form-control mb-3" name="price" placeholder="Budget of delivery" maxlength="8" required style= "height: 40px; ">
            <input type="text" class="form-control mb-3" name="size" placeholder="Size (length x width x height)" maxlength="30" required style= "height: 40px; ">
            <input type="text" class="form-control mb-3" name="pweight" placeholder="Weight in KG" maxlength="20" required style= "height: 40px; ">
            <input type="text" class="form-control mb-3" name="num_pack" placeholder="Number of packages (1/2/3)" maxlength="10" required style= "height: 40px; ">
            
            <textarea name="desc" class="form-control mb-3" placeholder="Job Details" minlength="10" maxlength="30" required style= "height: 100px; "></textarea>
            
            <input type="checkbox" id="terms" name="terms" value="Terms" required>
            <label for="vehicle1"> I agree with the <a href='http://localhost/trueshipp/termsofuse.php'>Terms</a> 
            & <a href='http://localhost/trueshipp/privacy.php'>Privacy</a> of Trueshipp</label><br>
            
            <button type="submit" value="send" class="btn btn-primary" >Publish Job</button>
          </form>



          <?php   
                }else{
                 ?>

          <br />
          <div class="alert alert-danger" role="alert">
              Warning! you must be login to view this page..
          </div>
          <br/>                
          <a href="ULogin.php"  >User Login</a>
          <br/>
          <br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br /><br />  

                          <?php

                          }
                          ?>

                  </div>
        <div class="col-lg-4">

            
            <!-- <div id="myMap" style="position:relative;width:100%;height:300px;"></div> -->
            
          
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


<!--  ------------------------------------------- Map ------------------ 
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
  -->
  
</body>
</html>