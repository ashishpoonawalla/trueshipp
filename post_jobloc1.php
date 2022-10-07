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
            <li class="list-inline-item"><a class="h3 text-primary font-secondary" href="#">Post Job - Set Pickup Location</a></li>
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
        <div class="col-lg-12 mb-4 mb-lg-0">
          
        	<?php
							//session_start();
							$pid = $_SESSION["pidIMG"];
						
						?>
                        
						
						
  				<!-- Pickup Location  ------------------------------------------ -->						
						
                        	
				

			<!-- <div id="myMap" style="position:relative;width:100%;height:350px;"></div>
			  <div id="pushpinDrag" style="display:none;"> drag</div>
              <div id="pushpinDragEnd" style="display:none;">dragend</div>
              <div id="pushpinDragStart" style="display:none;">dragstart</div>
             
            
              <form action="post_jobloc1_code.php" method="post">
                <input type="hidden" id="pid" name="pid" value="<?php echo $pid; ?>">
                <input type="text" id="lat1" name="lat1" required>
                <input type="text" id="lon1" name="lon1" required>

                <br><br>
                <button type="submit" value="send" class="btn btn-primary">Next -> Set Drop Location </button>
               
              </form> -->
           <!-- --------------------------------- New Map Code -------------- -->
		  
               

                <form action="post_jobloc1_code.php" method="post">

                  <div id='searchBoxContainer'>
                      <input type='text' id='searchBox' placeholder='address, city' required>
                  </div>

                  <div id="myMap" style="position:relative;width:100%; min-width: 300px; height:300px;"></div>


                  <input type="hidden" id="pid" name="pid" value="<?php echo $pid; ?>">
                  <input type="hidden" id="lat1" name="lat1" required>
                  <input type="hidden" id="lon1" name="lon1" required>


                  <button type="submit" value="send" class="btn btn-primary btn-sm">Next -> Set Drop Location </button>
                  <!-- <a href="post_jobfinish.php?jobid=<?php echo $pid; ?>" class="btn btn-primary">Next -> Set Drop Location </a> -->

                </form>

		  

		  
          
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

        function GetMap()
        {
            map = new Microsoft.Maps.Map('#myMap', {});

            var center = map.getCenter();    

          document.getElementById('lat1').value = center.latitude.toString();
          document.getElementById('lon1').value = center.longitude.toString();

            Microsoft.Maps.loadModule('Microsoft.Maps.AutoSuggest', function ()
            {
                var manager = new Microsoft.Maps.AutosuggestManager({ map: map });
                manager.attachAutosuggest('#searchBox', '#searchBoxContainer', suggestionSelected);
            });
                  

        }

        function suggestionSelected(result)
        {
            //Remove previously selected suggestions from the map.
            map.entities.clear();

            //Show the suggestion as a pushpin and center map over it.
            var pin = new Microsoft.Maps.Pushpin(result.location);
            document.getElementById('lat1').value = result.location.latitude.toString();
            document.getElementById('lon1').value = result.location.longitude.toString();

            map.entities.push(pin);

            map.setView({ bounds: result.bestView });
        }
    </script>
    <script type='text/javascript'
        src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=Alt4pMIelko3RclrRrokx2IhE1sFyoZen-iWXct9urb5G61DUVjMPPW8DzehK9fK'
        async defer></script>



<!-- <script type='text/javascript'>
    var map;

    function GetMap() {
        map = new Microsoft.Maps.Map('#myMap', {});

        var center = map.getCenter();
        
        var greenPin = new Microsoft.Maps.Pushpin(new Microsoft.Maps.Location(center.latitude, center.longitude ), { color: '#f00', draggable: true });
        map.entities.push(greenPin);

        document.getElementById('lat1').value = center.latitude.toString();
        document.getElementById('lon1').value = center.longitude.toString();


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
    <script type='text/javascript' src='https://www.bing.com/api/maps/mapcontrol?callback=GetMap&key=Alt4pMIelko3RclrRrokx2IhE1sFyoZen-iWXct9urb5G61DUVjMPPW8DzehK9fK' async defer></script> -->



</body>
</html>