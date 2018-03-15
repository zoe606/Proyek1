<?php

/* @var $this yii\web\View */

$this->title = 'Servis Komputer';
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Theme Made By www.w3schools.com - No Copyright -->
  <title>Bootstrap Theme Simply Me</title>
  <meta charset="utf-8">

  <style>
  body {
      font: 20px Montserrat, sans-serif;
      line-height: 1.8;
      color: #f5f6f7;
  }
  p {font-size: 16px;}
  .margin {margin-bottom: 45px;}
  .bg-1 {
      background-color: #white; /* Green */
      color: #ffffff;
  }
  .bg-2 {
      background-color: #474e5d; /* Dark Blue */
      color: #ffffff;
  }
  .bg-3 {
      background-color: #ffffff; /* White */
      color: #555555;
  }
  .bg-4 {
      background-color: #2f2f2f; /* Black Gray */
      color: #fff;
  }
  .container-fluid {
      padding-top: 70px;
      padding-bottom: 70px;
  }
  .navbar {
      padding-top: 15px;
      padding-bottom: 15px;
      border: 0;
      border-radius: 0;
      margin-bottom: 0;
      font-size: 12px;
      letter-spacing: 5px;
  }
  .navbar-nav  li a:hover {
      color: #1abc9c !important;
  }
  </style>
</head>
<body>


<!-- First Container -->
<div class="container-fluid bg-1 text-center">
  <img src="img/index-2.jpg" class="img-responsive" style="display:inline" alt="Bird" >
</div>

<!-- Second Container -->
<div class="container-fluid bg-2 text-center">
  <h3 class="margin">Siapa Kami?</h3>
  <p>Specta Servis merupakan sebuah tempat servis Komputer yang handal dan terpecaya</p>
  <a href="index.php?r=site%2Fabout" class="btn btn-default btn-lg">
    <span class="glyphicon glyphicon-search"></span> About Us
  </a>
</div>

<!-- Footer -->
<footer class="container-fluid bg-4 text-center">
  <p>Specta Servis Komputer <a href="">www.spectaservis.com</a></p>
</footer>

</body>
