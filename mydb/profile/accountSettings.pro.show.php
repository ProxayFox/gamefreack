<?php
  session_start();
  require_once("../databaseManager/DBEnter.db.php");

  $resultGeneral = DB::queryFirstRow("
    SELECT clientData.fName, clientData.lName, clientData.email, clientProfile.displayName
    FROM clientData RIGHT JOIN clientProfile
      ON clientData.CDID = clientProfile.CDID
    WHERE clientData.CDID = '".$_SESSION['cdid']."' AND clientProfile.CPID = '".$_SESSION['cpid']."'
  ");

  $resultImage = DB::queryFirstRow("
    SELECT UIMG FROM clientProfile WHERE CPID = '".$_SESSION['cpid']."'
  ");
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
    $("#generalUpdate").click(function () {
      $('#spinner0').addClass('spinner-border spinner-border-sm');
      $.post("./mydb/profile/accountSettingsWorker/accountSettings.general.pro.db.php", {
          fName:        $("#fName").val(),
          lName:        $("#lName").val(),
          email:        $("#formEmail").val(),
          displayName:  $("#formDisplayName").val()
        },
        function (data, status) {
          $('#spinner0').removeClass('spinner-border spinner-border-sm');
          $("#fName").val("<?php echo $resultGeneral['fName']; ?>");
          $("#lName").val("<?php echo $resultGeneral['lName']; ?>");
          $("#formEmail").val("<?php echo $resultGeneral['email']; ?>");
          $("#formDisplayName").val("<?php echo $resultGeneral['displayName']; ?>");
          console.log(data, status);
          if (data === "fail20") {
            $("#generalMessage").text("No New Values");
          } else if (data === "success2") {
            $("#generalMessage").text("Data Updated");
          } else {
            $("#generalMessage").text("Server Error");
          }
        }
      )
    });
  });

  $(document).ready(function() {
    $("#imageUpdate").click(function () {
      $('#spinner1').addClass('spinner-border spinner-border-sm');
      $.post("./mydb/profile/accountSettingsWorker/accountSettings.image.pro.db.php", {
            imageName: $("#image").val()
          },
          function (data, status) {
            $('#spinner1').removeClass('spinner-border spinner-border-sm');
            $("#image").val("");
            console.log(data, status);
          }
      )
    });
  });

  $(document).ready(function() {
    $("#addressUpdate").click(function () {
      $('#spinner2').addClass('spinner-border spinner-border-sm');
      $.post("./mydb/profile/accountSettingsWorker/accountSettings.address.pro.db.php", {
          address: $("#address").val(),
          suburb: $("#suburb").val(),
          city: $("#city").val(),
          states: $("#states").val()
        },
        function (data, status) {
          $('#spinner2').removeClass('spinner-border spinner-border-sm');
          $("#address").val("");
          $("#suburb").val("");
          $("#city").val("");
          $("#states").val("");
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

<section class="container" id="general">

  <!-- first and last name input -->
  <div class="row">
    <div class="col-6">
      <label for="fName">First Name</label>
      <input
          class="form-control"
          id="fName"
          name="fName"
          type="text"
          value="<?php if (!empty($resultGeneral['fName'])){echo $resultGeneral['fName'];} else { NULL; } ?>"
          placeholder="<?php if (!empty($resultGeneral['fName'])){echo $resultGeneral['fName'];} else { ?> First Name... <?php } ?>"
      >
    </div><!-- col-6 end -->
    <div class="col-6">
      <label for="lName">Last Name</label>
      <input
          class="form-control"
          id="lName"
          name="lName"
          type="text"
          value="<?php if (!empty($resultGeneral['lName'])){echo $resultGeneral['lName'];} else { NULL; } ?>"
          placeholder="<?php if (!empty($resultGeneral['lName'])){echo $resultGeneral['lName'];} else { ?> Last Name... <?php } ?>"
      >
    </div><!-- col-6 end -->
  </div><!-- row end -->

  <!-- Email Input -->
  <label for="formEmail">Email</label>
  <input
      class="form-control"
      id="formEmail"
      name="email"
      type="email"
      value="<?php if (!empty($resultGeneral['email'])){echo $resultGeneral['email'];} else { NULL; } ?>"
      placeholder="<?php if (!empty($resultGeneral['email'])){echo $resultGeneral['email'];} else { ?> Email... <?php } ?>"
  >

  <!-- Display Name input -->
  <label for="formDisplayName">Display Name</label>
  <input
      class="form-control"
      id="formDisplayName"
      name="displayName"
      type="email"
      value="<?php if (!empty($resultGeneral['displayName'])){echo $resultGeneral['displayName'];} else { NULL; } ?>"
      placeholder="<?php if (!empty($resultGeneral['displayName'])){echo $resultGeneral['displayName'];} else { ?> Display Name... <?php } ?>"
  >

  <!-- submit button for general account settings -->
  <div class="row">
    <div class="col2">
      <div style="padding-top: 10px;">
        <a class="btn btn-outline-primary" id="generalUpdate">Update<span style="height:15px; width:15px; margin-right: 10px;" id="spinner0"></span></a>
      </div>
    </div>
    <div class="col-2" id="generalMessage"></div>
  </div>

  <hr>

  <!-- user profile image input -->
  <div id="img">
    <label for="image">Update Profile Image</label>
    <input
        type="file"
        value="./img/profileImg/<?php echo $resultImage['UIMG']; ?>"
        class="form-control-file"
        id="image"
    >
  </div>

  <!-- submit for user profile image -->
  <div style="padding-top: 10px; padding-bottom: 10px;">
    <a class="btn btn-outline-primary" id="imageUpdate">Update<span style="height:15px; width:15px; margin-right: 10px;" id="spinner1"></span></a>
  </div>

</section>

<section class="container d-none" id="address">
  <div class="row">
    <div class="col-6">
      <label for="street">Address</label>
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
    <div class="form-group col-6">
      <label for="states">Example multiple select</label>
      <select class="form-control" id="states" name="states">
        <option>Queensland</option>
        <option>New South Wales</option>
        <option>Victoria</option>
        <option>Tasmania</option>
        <option>Australia Capital Territory</option>
        <option>Northern Territory</option>
        <option>Western Australia</option>
      </select>
    </div>
  </div>
  <div style="padding-top: 10px;">
    <a class="btn btn-outline-primary" id="addressUpdate">Update<span style="height:15px; width:15px; margin-right: 10px;" id="spinner2"></span></a>
  </div>
</section>