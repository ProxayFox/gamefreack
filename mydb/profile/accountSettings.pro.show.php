<?php
  session_start();
  require_once("../databaseManager/DBEnter.db.php");
?>

<script>
  $(document).ready(function() {
    $("#btnGeneral").click(function () {
      const btnGeneral = $("#btnGeneral");
      const btnAddress = $("#btnAddress");
      $("#general").removeClass("d-none");
      $("#address").addClass("d-none");
      $(btnGeneral).addClass("btn-primary");
      $(btnGeneral).removeClass("btn-outline-primary");
      $(btnAddress).removeClass("btn-primary");
      $(btnAddress).addClass("btn-outline-primary");
    });
    $("#btnAddress").click(function () {
      const btnGeneral = $("#btnGeneral");
      const btnAddress = $("#btnAddress");
      $("#general").addClass("d-none");
      $("#address").removeClass("d-none");
      $(btnGeneral).addClass("btn-primary");
      $(btnGeneral).removeClass("btn-outline-primary");
      $(btnAddress).removeClass("btn-primary");
      $(btnAddress).addClass("btn-outline-primary");
    });
  });
</script>

<div class="row">
  <div class="col-2">
    <a id="btnGeneral" class="btn btn-lg btn-primary">General</a>
  </div>
  <div class="col-2">
    <a id="btnAddress" class="btn btn-lg btn-outline-primary">Address</a>
  </div>
  <div class="col-8"></div>
</div>

<div class="container">
  <section id="general" class="">
    <div id="names">

    </div>
    <div id="email">

    </div>
    <div id="displayName">

    </div>
    <div id="image">

    </div>
  </section>
  <section id="address" class="d-none">

  </section>
</div><!-- container end -->