<?php
session_start();
//check if their is an existing session
if (!empty($_SESSION['user'] && $_SESSION['start'] && $_SESSION['cdid'] && $_SESSION['lid'])) {
  //requesting the header of the page
  require_once("./layouts/header.php");
  //database connection
  require_once("./mydb/databaseManager/DBEnter.db.php");

  $resultImage = DB::queryFirstRow("SELECT UIMG FROM clientProfile WHERE CPID = ".$_SESSION['cpid']);
  ?>
 <script>
   $(document).ready(function() {
     //loading overview as the default
     $("#leftSection").load("./mydb/profile/Overview.pro.show.php");

     $("#btnOverview").click(function () {
       //loading the Overview page/section
       $("#leftSection").load("./mydb/profile/Overview.pro.show.php");
     });//btn Overview trigger end

     $("#btnAccountSettings").click(function () {
       //loading the account settings page/section
       $("#leftSection").load("./mydb/profile/accountSettings.pro.show.php");
     });//btn account settings trigger end

     $("#btnSavedInventory").click(function () {
       //loading the saved Inventory page/section
       $("#leftSection").load("./mydb/profile/savedInventory.pro.show.php");
     });//btn saved inventory trigger end

     $("#btnHelp").click(function () {
       //loading the Help page/section
       $("#leftSection").load("./mydb/profile/help.pro.show.php");
     });//btn help trigger end
   });//document.ready end
 </script>
 <main role="main" class="container" style="padding-top: 83px;">
   <div class="row">
     <!-- Left Side of Page -->
     <section class="col-3 border border-dark">
       <div>
         <!-- Users IMG -->
         <img
             src="img/profileIMG/<?php if (!empty($resultImage['UIMG'])) { echo $resultImage['UIMG'];} else {echo "44fdc40.jpg";} ?>"
             class="w-75 d-block mx-auto rounded"
             alt="Profile Image"
         >
         <h5 class="text-center">Username</h5>
       </div>
       <!-- buttons that will activate the right side of the page -->
       <div class="w-75 d-block mx-auto">
         <ul class="list-group">
           <li><a id="btnOverview" class="list-group-item btn btn-outline-primary">Overview</a></li>
           <li><a id="btnAccountSettings" class="list-group-item btn btn-outline-dark">Account Settings</a></li>
           <li><a id="btnSavedInventory" class="list-group-item btn btn-outline-dark">Saved Inventory</a></li>
           <li><a id="btnHelp" class="list-group-item btn btn-outline-info">Help</a></li>
         </ul><!-- list-group end -->
       </div><!-- w-75 d-block mx-auto end -->
     </section><!-- col-3 end -->
     <!-- right side of page -->
     <section class="col-9 border border-dark">
       <div id="leftSection" class="">
         <!-- Section loader -->
       </div><!-- leftSection End -->
     </section><!-- col-9 end -->
   </div><!-- row end -->
 </main><!-- main container end -->

  <?php
  require_once("./layouts/footer.php");
} else {
  //redirect the guest to login, as they are not meant to be on this page
  header("Location: login.php?placement=NULL");
}
?>
