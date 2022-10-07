
<!-- Design by foolishdeveloper.com -->

<!DOCTYPE html>
<html lang="en">
<head>
  
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
 
  <style>
 

#slider {
  position: relative;
  width: 1000px;
  height: auto;
 
  overflow: hidden;
  
}
#slider ul {
  position: relative;
  list-style: none;
  height: 100%;
  width: 10000%;
  padding: 0;
  margin: 0;
  transition: all 750ms ease;
  left: 0;
}
#slider ul li {
  position: relative;
  height: 100%;
 
  float: left;
}
#slider ul li img{
  width: 1000px;
  height: auto;
}
 
#slider #prev, #slider #next {
  width: 50px;
  line-height: 50px;
  border-radius: 50%;
  font-size: 2rem;
  text-shadow: 0 0 20px rgba(0, 0, 0, 0.6);
  text-align: center;
  color: white;
  text-decoration: none;
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  transition: all 150ms ease;
}
#slider #prev:hover, #slider #next:hover {
  background-color: rgba(0, 0, 0, 0.5);
  text-shadow: 0;
}
#slider #prev {
  left: 10px;
}
#slider #next {
  right: 10px;
}
  </style>
</head>
<body>
  <div id="slider">
    <ul id="slideWrap"> 
      <li><img src="images/slider1.png" alt="" ></li>
      <li><img src="images/slider2.png" alt=""></li>
      <li><img src="images/slider3.png" alt=""></li>
      <li><img src="images/slider4.png" alt=""></li>
      <li><img src="images/slider5.png" alt=""></li>
    </ul>
    <a id="prev" href="#">&#8810;</a>
    <a id="next" href="#">&#8811;</a>
  </div>


  <script>
    var responsiveSlider = function() {

var slider = document.getElementById("slider");
var sliderWidth = slider.offsetWidth;
var slideList = document.getElementById("slideWrap");
var count = 1;
var items = slideList.querySelectorAll("li").length;
var prev = document.getElementById("prev");
var next = document.getElementById("next");

window.addEventListener('resize', function() {
  sliderWidth = slider.offsetWidth;
});

var prevSlide = function() {
  if(count > 1) {
    count = count - 2;
    slideList.style.left = "-" + count * sliderWidth + "px";
    count++;
  }
  else if(count = 1) {
    count = items - 1;
    slideList.style.left = "-" + count * sliderWidth + "px";
    count++;
  }
};

var nextSlide = function() {
  if(count < items) {
    slideList.style.left = "-" + count * sliderWidth + "px";
    count++;
  }
  else if(count = items) {
    slideList.style.left = "0px";
    count = 1;
  }
};

next.addEventListener("click", function() {
  nextSlide();
});

prev.addEventListener("click", function() {
  prevSlide();
});

setInterval(function() {
  nextSlide()
}, 5000);

};

window.onload = function() {
responsiveSlider();  
}


  </script>
</body>
</html>