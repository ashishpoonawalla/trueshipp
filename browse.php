<?php 
try{
  // echo "<br><br>";
  session_start();
}catch(Exception $e){

}
include("header.php");
?>

<!-- Common Area Top ------------------ -->






<!-- Search Bar -->
<section class="page-title-section overlay" style="background: url(images/backgrounds/tra1.jpg) no-repeat center center;" >
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        
        <a class="h3 text-primary font-secondary" href="#">Browse Category</a>
        
        
      </div>
    </div>
  </div>
</section>
<!-- /Search Bar -->

  
  <!-- Shipping Category -->
  <section class="section">
    <div class="container">


        <div class="col-12 mb-4">
            
            <div class="col-12 px-0">
            <h4 class="h4 text-default font-secondary" >Shippling Category</h4><br>
            <div class="row">
              <div class="col-md-2">
                  <h5 class="mb-3">Automobiles</h5>
                  <ul class="list-styled">
                    
                      <?php
              
                      require('db.php');
                      
                      $sql1="SELECT * FROM categories where main_cat=1" ;
                      
                      $result1 = $conn->query($sql1);

                      
                      while($row1 = $result1->fetch_assoc())
                      {
                          $id=$row1['cat_id'];
                          $cat=$row1['cat_title'];
                          echo "<li><a style='color:#5c5c77;' href='Job_list.php?cat=$cat' >$cat</a></li>";							
                      }
                        
                      ?>
                  
                    
                  </ul>
                </div>

                <div class="col-md-2">
                  <h5 class="mb-3">Big Items</h5>
                  <ul class="list-styled">

              <?php
              
                    require('db.php');
                    
                    $sql1="SELECT * FROM categories where main_cat=2" ;
                    
                    $result1 = $conn->query($sql1);

                    
                    while($row1 = $result1->fetch_assoc())
                    {
                        $id=$row1['cat_id'];
                        $cat=$row1['cat_title'];
                        echo "<li><a style='color:#5c5c77;' href='Job_list.php?cat=$cat' >$cat</a></li>";										
                    }
                
              ?>
                    
                  </ul>
                </div>

                <div class="col-md-2">
                  <h5 class="mb-3">Furniture</h5>
                  <ul class="list-styled">

                  
                  <?php
              
                    require('db.php');
                    
                    $sql1="SELECT * FROM categories where main_cat=3" ;
                    
                    $result1 = $conn->query($sql1);

                    
                    while($row1 = $result1->fetch_assoc())
                    {
                        $id=$row1['cat_id'];
                        $cat=$row1['cat_title'];
                        echo "<li><a style='color:#5c5c77;' href='Job_list.php?cat=$cat' >$cat</a></li>";										
                    }
                
                  ?>                  
                    
                  </ul>
                </div>

                <div class="col-md-2">
                  <h5 class="mb-3">Machinery</h5>
                  <ul class="list-styled">
                    
                  <?php
              
                      require('db.php');
                      
                      $sql1="SELECT * FROM categories where main_cat=4" ;
                      
                      $result1 = $conn->query($sql1);

                      
                      while($row1 = $result1->fetch_assoc())
                      {
                          $id=$row1['cat_id'];
                          $cat=$row1['cat_title'];
                          echo "<li><a style='color:#5c5c77;' href='Job_list.php?cat=$cat' >$cat</a></li>";										
                      }
                  
                ?>
                  


                    
                  </ul>
                </div>

                <div class="col-md-2">
                  <h5 class="mb-3">House Items</h5>
                  <ul class="list-styled">
                  
                  
                  <?php
              
                        require('db.php');
                        
                        $sql1="SELECT * FROM categories where main_cat=5" ;
                        
                        $result1 = $conn->query($sql1);

                        
                        while($row1 = $result1->fetch_assoc())
                        {
                            $id=$row1['cat_id'];
                            $cat=$row1['cat_title'];
                            echo "<li><a style='color:#5c5c77;' href='Job_list.php?cat=$cat' >$cat</a></li>";										
                        }
                    
                  ?>

                    
                  </ul>
                </div>

                <div class="col-md-2">
                  <h5 class="mb-3">Pets</h5>
                  <ul class="list-styled">
                  
                  
                  <?php
              
                        require('db.php');
                        
                        $sql1="SELECT * FROM categories where main_cat=6" ;
                        
                        $result1 = $conn->query($sql1);

                        
                        while($row1 = $result1->fetch_assoc())
                        {
                            $id=$row1['cat_id'];
                            $cat=$row1['cat_title'];
                            echo "<li><a style='color:#5c5c77;' href='Job_list.php?cat=$cat' >$cat</a></li>";										
                        }
                    
                  ?>                  
                
                    
                  </ul>
                </div>

                          
             
            </div>
            
            </div>
          </div>

<!-- ------------------------------ Booking Category ----------------------- -->
 

        <div class="col-12 mb-4">
            
            <div class="col-12 px-0">
            <hr>
            <h4 class="h4 text-default font-secondary" >Rent Category</h4><br>
            <div class="row">
              
                    
                      <?php
              
                      require('db.php');
                      
                      $sql1="SELECT * FROM vehicle_cat ORDER BY vcat " ;
                      
                      $result1 = $conn->query($sql1);

                      
                      while($row1 = $result1->fetch_assoc())
                      {
                         ?>
                          <div class="col-md-2">
                            <ul class="list-styled">
                        <?php 
                            $cat=$row1['vcat'];
                            
                            echo "<li><a style='color:#5c5c77;' href='vehicle_list.php?cat=$cat' >$cat</a></li>";
                          ?>
                            </ul>
                          </div>
                          <?php
                      }
                        
                      ?>
                  
                    
                 

           
            
              </div>
            </div>
        </div>

<!-- ------------------------------ Sale Category ----------------------- -->
 

<div class="col-12 mb-4">
            
            <div class="col-12 px-0">
            <hr>
            <h4 class="h4 text-default font-secondary" >Sale Category</h4><br>
            <div class="row">
              
                    
                      <?php
              
                      require('db.php');
                      
                      $sql1="SELECT * FROM vehicle_cat ORDER BY vcat " ;
                      
                      $result1 = $conn->query($sql1);

                      
                      while($row1 = $result1->fetch_assoc())
                      {
                         ?>
                          <div class="col-md-2">
                            <ul class="list-styled">
                        <?php 
                            $cat=$row1['vcat'];
                            
                            echo "<li><a style='color:#5c5c77;' href='#' >$cat</a></li>";
                          ?>
                            </ul>
                          </div>
                          <?php
                      }
                        
                      ?>
                  
                    
                 

           
            
              </div>
            </div>
        </div>


    </div>
    
  </section>
  <!-- / shippingcategory -->





<!-- banner -->
<section class="section">
  <div class="container">
    <div class="row align-items-center">
      
      <div class="col-md-12 order-1 order-md-2 mb-8 mb-md-0">
        <img class="img-fluid w-100" src="images/bannerBrowse.png" alt="about image">
      </div>
    </div>
  </div>
</section>
<!-- /banner us -->

<br /><br /><br />  <br />

<!-- Common Area Bottom ----------------------- -->
<!-- footer -->
<?php 
include("footer.php");
?>

</body>
</html>