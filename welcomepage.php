<?php include("defaultnav.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="mycss.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>welcome page</title>
</head>



<body>
<div class="slideshow-container">

<div class="mySlides fade">
  <!-- <div class="numbertext">  <h1>Hay, welcome to Dashlane clinic</h1></div> -->
  <img src="assets/image1.png" style="width:90%">
  <!-- <div class="text">Hay, welcome to Dashlane clinic</div> -->
</div>

<div class="mySlides fade">
  <img src="assets/img4.png" style="width:80%">
  <!-- <div class="text">Caption Two</div> -->
</div>

<div class="mySlides fade">
<div class="numbertext"><h1 style="text-align:right;">Hay, try our lab services today</h1></div>
  <img src="assets/image7.png" style="width:90% margin top:auto" >
  <!-- <div class="text">Caption Three</div> -->
</div>
<!-- javascript page -->
<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>
<br>
<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
<div class="section2">
  <p><b> Dash Lane has all sorts of drugs for you and from different coutries like India, United Kingdom, China, United States of America to mention but a few.</b></p>

  <img src="assets/img2.png" alt="image" width = "500" height = "300">
</div>
<div class="section2">
<img src="assets/img6.png" alt="image" width = "300" height = "300">
  <p><b>Book or buy different medical equipment and Drugs from Dash Lane at the most friendly
    prices. 
    </b>
  </p>
</div>
<div>
  <p style=" text-align:center; "><a href="welcomepage.php" style="font-size:24px; text-decoration:none; color:rgb(21, 10, 66) text-align:center; "><big>Back  | Home</big></a></p>
</div>
<!-- java script page -->
<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  if (n > slides.length) {slideIndex = 1}    
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
}
</script>
<!-- javascript page -->
</body>
</html>