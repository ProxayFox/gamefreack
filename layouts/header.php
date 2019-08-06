<!DOCTYPE html>
<?php session_start() ?>
<html lang="en">
<head>
	<title>GameFreacks</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- image on tab -->
  <link rel="icon" href="./img/Flat%20Gradient%20Social%20Media%20Icons/80/500px%20icon.png">
  <!-- CSS -->

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="./js/popper.js"></script>
  <script src="./js/tooltip.js"></script>
  <!-- Fonts -->
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
  <!-- Colour palate -->
  <!-- https://www.color-hex.com/color-palette/191 -->


</head>
<body>
<?php
  if (array_key_exists("user", $_SESSION)) {
?>
    <link rel="stylesheet" href="./css/userHeader.css">
    <section>
      <!-- Navigation -->
      <div class="fixed-top">
        <header class="topbar">
          <div class="container">
            <div class="row">
              <!-- social icon-->
              <div class="col-sm-12">
                <ul class="social-network">
                  <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-pinterest"></i></a></li>
                  <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-google-plus"></i></a></li>
                </ul>
              </div>

            </div>
          </div>
        </header>
        <nav class="navbar navbar-expand-lg navbar-dark mx-background-top-linear">
          <div class="container">
            <a class="navbar-brand" href="index.php" style="text-transform: uppercase;">gamefreack.com</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">

              <ul class="navbar-nav ml-auto">

                <li class="nav-item active">
                  <a class="nav-link" href="index.php">Home
                    <span class="sr-only">(current)</span>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#">About</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#">login</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#">Contact</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </section>
<?php
  } else {
?>
    <link rel="stylesheet" href="./css/guestHeader.css">
    <section>
      <!-- Navigation -->
      <div class="fixed-top">
        <header class="topbar">
          <div class="container">
            <div class="row">
              <!-- social icon-->
              <div class="col-sm-12">
                <ul class="social-network">
                  <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-pinterest"></i></a></li>
                  <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-google-plus"></i></a></li>
                </ul>
              </div>

            </div>
          </div>
        </header>
        <nav class="navbar navbar-expand-lg navbar-dark mx-background-top-linear">
          <div class="container">
            <a class="navbar-brand" href="index.html" style="text-transform: uppercase;"> LACODEID.COM</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">

              <ul class="navbar-nav ml-auto">

                <li class="nav-item active">
                  <a class="nav-link" href="#">Home
                    <span class="sr-only">(current)</span>
                  </a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#">About</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#">Fruits</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#">Sea food</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#">Vegetables</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#">Blog</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="#">Contact</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </section>
<?php
  }
?>
