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
<body style="background-color: #c6c6c6;">
<style>
  .hidden {
    display: none !important;
  }
</style>
<?php
  if (array_key_exists("user", $_SESSION)) {
    require_once("./layouts/accountOrNot/userHead.php");
  } else {
    require_once("./layouts/accountOrNot/guestHead.php");
  }
?>
