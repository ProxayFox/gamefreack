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
      $(btnGeneral).removeClass("btn-primary");
      $(btnGeneral).addClass("btn-outline-primary");
      $(btnAddress).addClass("btn-primary");
      $(btnAddress).removeClass("btn-outline-primary");
    });
  });

  $(document).ready(function() {
    $("#btnNames").click(function () {
      $('#spinner').addClass('spinner-border spinner-border-sm');
      $.post("./mydb/profile/accountSettings.pro.db.php", {
          title: $("#fName").val(),
          info: $("#lName").val()
        },
        function (data, status) {
          $('#spinner').removeClass('spinner-border spinner-border-sm');
          $('#fName').val('');
          $('#lName').val('');
          console.log(data, status);
        }
      )
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
    <div class="form-group border" id="names">
      <div class="row">
        <div class="col-6">
          <label for="fName">First Name</label>
          <input class="form-control" id="fName" name="fName" type="text" placeholder="First Name..." >
        </div>
        <div class="col-6">
          <label for="lName">Last Name</label>
          <input class="form-control" id="lName" name="lName" type="text" placeholder="Last Name..." >
        </div>
      </div>
      <div style="padding-top: 10px;">
        <a class="btn btn-outline-primary" id="btnNames">Update<span style="height:15px; width:15px; margin-right: 10px;" id="spinner"></span></a>
      </div>
    </div>
    <hr>
    <div class="form-group" id="email">
      <label for="formEmail">Email</label>
      <input class="form-control" id="formEmail" name="email" type="email" placeholder="Email...">
      <div style="padding-top: 10px;">
        <a class="btn btn-outline-primary" id="threadUpdate">Update<span style="height:15px; width:15px; margin-right: 10px;" id="spinner"></span></a>
      </div>
    </div>
    <hr>
    <div class="form-group" id="displayName">
      <label for="formDisplayName">Display Name</label>
      <input class="form-control" id="formDisplayName" name="displayName" type="email" placeholder="Display Name...">
      <div style="padding-top: 10px;">
        <a class="btn btn-outline-primary" id="threadUpdate">Update<span style="height:15px; width:15px; margin-right: 10px;" id="spinner"></span></a>
      </div>
    </div>
    <hr>
    <div class="form-group" id="image">
      <label for="exampleFormControlFile1">Update Profile Image</label>
      <input type="file" class="form-control-file" id="exampleFormControlFile1">
      <div style="padding-top: 10px;">
        <a class="btn btn-outline-primary" id="threadUpdate">Update<span style="height:15px; width:15px; margin-right: 10px;" id="spinner"></span></a>
      </div>
    </div>
  </section>
  <section id="address" class="d-none">
    <div class="form-group border" id="names">
      <div class="row">
        <div class="col-6">
          <label for="street">Street Name</label>
          <input class="form-control" id="street" name="street" type="text" placeholder="Street Name..." >
        </div>
        <div class="col-6">
          <label for="suburb">Suburb</label>
          <input class="form-control" id="suburb" name="suburb" type="text" placeholder="Suburb..." >
        </div>
      </div>
      <div class="row">
        <div class="col-6">
          <label for="city">City/Town</label>
          <input class="form-control" id="city" name="city" type="text" placeholder="City/Town..." >
        </div>
        <div class="col-6">
          <label for="state">State</label>
          <input class="form-control" id="state" name="state" type="text" placeholder="State..." >
        </div>
      </div>
      <div style="padding-top: 10px;">
        <a class="btn btn-outline-primary" id="threadUpdate">Update<span style="height:15px; width:15px; margin-right: 10px;" id="spinner"></span></a>
      </div>
    </div>
  </section>
</div><!-- container end -->