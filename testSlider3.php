<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

<style>
    // CSS code
*
{
box-sizing: border-box;
}
body
{
font-family: Verdana, sans-serif;
}

.image-sliderfade
{
display: none;
}

img
{
vertical-align: middle;
}

/* Slideshow container */
.container
{
max-width: 1000px;
position: relative;
margin: auto;
}

/* Caption text */
/* .text
{
color: #f2f2f2;
font-size: 15px;
padding: 20px 15px;
position: absolute;
right: 10px;
bottom: 10px;
width: 40%;
background: rgba(0, 0, 0, .7);
text-align: left;
} */

/* The dots/bullets/indicators */
.dot
{
height: 15px;
width: 15px;
margin: 0 2px;
background-color: transparent;
border-color: #ddd;
border-width: 5 px;
border-style: solid;
border-radius: 50%;
display: inline-block;
transition: border-color 0.6s ease;
}

.active
{
border-color: #666;
}

/* Animation */
.fade
{
-webkit-animation-name: fade-image;
-webkit-animation-duration: 1.5s;
animation-name: fade-image;
animation-duration: 1.5s;
}

@-webkit-keyframes fade-image
{
from {opacity: .4}
to {opacity: 1}
}

@keyframes fade-image
{
from {opacity: .4}
to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px)
{
.text {font-size: 11px}
}

</style>
</head>
<body>
    <!--HTML Code-->
<!-- Slideshow Container Div -->
<div class="container">

<!-- Full-width images with caption text -->
    <div class="image-sliderfade fade">
        <img src="images/slider1.png" style="width:100%">
        <!-- <div class="text">Image caption 1</div> -->
    </div>

    <div class="image-sliderfade fade">
        <img src="images/slider2.png" style="width:100%">
        <!-- <div class="text">Image caption 2</div> -->
    </div>

    <div class="image-sliderfade fade">
        <img src="images/slider3.png" style="width:100%">
        <!-- <div class="text">Image caption 3</div> -->
    </div>

    <div class="image-sliderfade fade">
        <img src="images/slider4.png" style="width:100%">
        <!-- <div class="text">Image caption 4</div> -->
    </div>

    <div class="image-sliderfade fade">
        <img src="images/slider5.png" style="width:100%">
        <!-- <div class="text">Image caption 5</div> -->
    </div>

</div>
<br>

<!-- The dots/circles -->
<div style="text-align:center">
<span class="dot"></span>
<span class="dot"></span>
<span class="dot"></span>
<span class="dot"></span>
<span class="dot"></span>
</div>



<script>
var slideIndex = 0;
showSlides(); // call showslide method

function showSlides()
{
	var i;

	// get the array of divs' with classname image-sliderfade
	var slides = document.getElementsByClassName("image-sliderfade");
	
	// get the array of divs' with classname dot
	var dots = document.getElementsByClassName("dot");

	for (i = 0; i < slides.length; i++) {
		// initially set the display to
		// none for every image.
		slides[i].style.display = "none";
	}

	// increase by 1, Global variable
	slideIndex++;

	// check for boundary
	if (slideIndex > slides.length)
	{
		slideIndex = 1;
	}

	for (i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.
							replace(" active", "");
	}

	slides[slideIndex - 1].style.display = "block";
	dots[slideIndex - 1].className += " active";

	// Change image every 2 seconds
	setTimeout(showSlides, 2000);

   
}

</script>
</body>
</html>