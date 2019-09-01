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
    SELECT UIMG 
    FROM clientProfile 
    WHERE CPID = '".$_SESSION['cpid']."'
  ");

  $resultAddress = DB::queryFirstRow("
    SELECT address, suburb, city, state, postCode
    FROM clientaddress 
    WHERE CDID = ".$_SESSION['cdid']
  );
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

  $("#imageUpdate").click(function(){
    const fd = new FormData();
    const files = $('#image')[0].files[0];
    fd.append('file',files);

    $.ajax({
      url: './mydb/profile/accountSettingsWorker/accountSettings.image.pro.db.php',
      type: 'post',
      data: fd,
      contentType: false,
      processData: false,
      success: function(response){
        if(response != 0){
          $("#img").attr("src",response);
          $(".preview img").show(); // Display image element
          $("#imgMessage").text("uploaded");
        }else{
          alert('file not uploaded');
          $("#imgMessage").text("uploaded");
        }
      },
    });
  });

  $(document).ready(function() {
    $("#addressUpdate").click(function () {
      $('#spinner2').addClass('spinner-border spinner-border-sm');
      $.post("./mydb/profile/accountSettingsWorker/accountSettings.address.pro.db.php", {
          address:    $("#formAddress").val(),
          suburb:     $("#suburb").val(),
          city:       $("#city").val(),
          state:     $("#state").val(),
          postCode:   $("#postCode").val()
        },
        function (data, status) {
          $('#spinner2').removeClass('spinner-border spinner-border-sm');
          $("#formAddress").val("<?php echo $resultAddress['address']; ?>");
          $("#suburb").val("<?php echo $resultAddress['suburb'];?>");
          $("#city").val("<?php echo $resultAddress['city'];?>");
          $("#states").val("<?php
          if ($resultAddress['state'] === "QLD") {
            echo "Queensland";
          } elseif ($resultAddress['state'] === "NSW") {
            echo "New South Wales";
          } elseif ($resultAddress['state'] === "VIC") {
            echo "Victoria";
          } elseif ($resultAddress['state'] === "ACT") {
            echo "Australia Capital Territory";
          } elseif ($resultAddress['state'] === "NT") {
            echo "Northern Territory";
          } elseif ($resultAddress['state'] === "WA") {
            echo "Western Australia";
          } elseif ($resultAddress['state'] === "TAS") {
            echo "Tasmania";
          } else {
            echo "Please Select A State";
          } ?>");
          $("#postCode").val("<?php echo $resultAddress['postCode'];?>");
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
      ><!-- input end -->
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
      ><!-- input end -->
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
  ><!-- input end -->

  <!-- Display Name input -->
  <label for="formDisplayName">Display Name</label>
  <input
      class="form-control"
      id="formDisplayName"
      name="displayName"
      type="email"
      value="<?php if (!empty($resultGeneral['displayName'])){echo $resultGeneral['displayName'];} else { NULL; } ?>"
      placeholder="<?php if (!empty($resultGeneral['displayName'])){echo $resultGeneral['displayName'];} else { ?> Display Name... <?php } ?>"
  ><!-- input end -->

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
  <div class="row">
    <div class="col-md-4">
      <?php
        $resultImage = DB::queryFirstRow("SELECT UIMG FROM clientProfile WHERE CPID = ".$_SESSION['cpid']);
      ?>
      <img
          src="img/profileIMG/<?php if (!empty($resultImage['UIMG'])) { echo $resultImage['UIMG'];} else {echo "44fdc40.jpg";} ?>"
          id="img"
          class="w-75 d-block mx-auto rounded"
          alt="Profile Image"
      >
    </div>
    <div class="col-md-8">
      <form method="post" action="" enctype="multipart/form-data" id="imgForm">
        <div id="img">
          <label for="image">Update Profile Image</label>
          <input
              type="file"
              class="form-control-file"
              id="image"
          ><!-- input end -->
        </div>
      </form>
      <!-- submit for user profile image -->
      <div style="padding-top: 10px; padding-bottom: 10px;">
        <a class="btn btn-outline-primary" id="imageUpdate">Update<span style="height:15px; width:15px; margin-right: 10px;" id="spinner1"></span></a>
        <div id="imgMessage"></div>
      </div>
    </div>
  </div>


</section>

<section class="container d-none" id="address">
  <div class="row">
    <div class="col-6">
      <label for="formAddress">Address</label>
      <input
        class="form-control"
        id="formAddress"
        name="formAddress"
        type="text"
        value="<?php if (!empty($resultAddress['address'])) {echo $resultAddress['address'];} else {NULL;}?>"
        placeholder="Street Name..."
      ><!-- input end -->
    </div>
    <div class="col-6">
      <label for="suburb">Suburb</label>
      <input
        class="form-control"
        id="suburb"
        name="suburb"
        type="text"
        value="<?php if (!empty($resultAddress['suburb'])) {echo $resultAddress['suburb'];} else {NULL;}?>"
        placeholder="Suburb..."
      ><!-- input end -->
    </div>
  </div>
  <div class="row">
    <div class="col-6">
      <label for="city">City/Town</label>
      <input
        class="form-control"
        id="city"
        name="city"
        type="text"
        value="<?php if (!empty($resultAddress['city'])) {echo $resultAddress['city'];} else {NULL;}?>"
        placeholder="City/Town..."
      > <!-- input end -->
    </div>
    <div class="form-group col-6">
      <label for="states">Example multiple select</label>
      <select class="form-control" id="state" name="states">
        <option
            value="
              <?php if (!empty($resultAddress['state'])) {
              echo $resultAddress['state'];
            } else {
              NULL;
            } ?>
            "
        > <!-- option end -->
          <?php if (!empty($resultAddress['state'])) {
            if ($resultAddress['state'] === "QLD") {
              echo "Queensland";
            } elseif ($resultAddress['state'] === "NSW") {
              echo "New South Wales";
            } elseif ($resultAddress['state'] === "VIC") {
              echo "Victoria";
            } elseif ($resultAddress['state'] === "ACT") {
              echo "Australia Capital Territory";
            } elseif ($resultAddress['state'] === "NT") {
              echo "Northern Territory";
            } elseif ($resultAddress['state'] === "WA") {
              echo "Western Australia";
            } elseif ($resultAddress['state'] === "TAS") {
              echo "Tasmania";
            } else {
              echo "Please Select A State";
            }
          } else {
            echo "Please Select a State";
          } ?>
        </option>
        <option value="QLD">Queensland</option>
        <option value="NSW">New South Wales</option>
        <option value="VIC">Victoria</option>
        <option value="TAS">Tasmania</option>
        <option value="ACT">Australia Capital Territory</option>
        <option value="NT">Northern Territory</option>
        <option value="WA">Western Australia</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="postCode">Post Code</label>
    <input
        type="text"
        class="form-control"
        id="postCode"
        maxlength="4"
        value="<?php if (!empty($resultAddress['postCode'])) {echo $resultAddress['postCode'];} else {NULL;}?>"
    >
  </div>
  <div style="padding-top: 10px;">
    <a class="btn btn-outline-primary" id="addressUpdate">Update<span style="height:15px; width:15px; margin-right: 10px;" id="spinner2"></span></a>
  </div>
</section>