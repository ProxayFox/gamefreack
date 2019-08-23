<?php
session_start();
//check if their is an existing session
if (!empty($_SESSION['user'] && $_SESSION['start'] && $_SESSION['cdid'] && $_SESSION['lid'])) {
  require_once("./layouts/header.php");
  require_once("./mydb/databaseManager/DBEnter.db.php");
  ?>
 <script>
   $(document).ready(function() {
     console.log( "ready!" );
     $("#overview").load("./mydb/profile/Overview.pro.php");

     $("#btnOverview").click(function () {
       $("#overview").removeClass("d-none");
       $("#accountSettings").addClass("d-none");
       $("#savedInventory").addClass("d-none");
       $("#help").addClass("d-none");
     });


   });
 </script>
 <main role="main" class="container" style="padding-top: 83px;">
   <div class="row">
     <!-- Left Side of Page -->
     <section class="col-3 border">
       <div>
         <!-- Users IMG -->
         <img src="img/profileIMG/11e79c5bd7cf103d.png" class="w-75 d-block mx-auto rounded" alt="Profile Image">
         <h5 class="text-center">Username</h5>
       </div>
       <div class="w-75 d-block mx-auto">
         <ul class="list-group">
           <li><a id="btnOverview" class="list-group-item btn btn-outline-primary">Overview</a></li>
           <li><a id="btnAccountSettings" class="list-group-item btn btn-outline-dark">Account Settings</a></li>
           <li><a id="btnSavedInventory" class="list-group-item btn btn-outline-dark">Saved Inventory</a></li>
           <li><a id="btnHelp" class="list-group-item btn btn-outline-info">Help</a></li>
         </ul>
       </div>
     </section>
     <!-- right side of page -->
     <section class="col-9 border">
       <div>
         <div id="overview" class="">
           <!-- overview section -->
         </div>
         <div id="accountSettings" class="d-none">
           <!-- Account Settings Section -->
         </div>
         <div id="savedInventory" class="d-none">
          <!-- Saved Inventory Section -->
         </div>
         <div id="help" class="d-none">
           <!-- help section -->
         </div>
       </div>
     </section>
   </div>
 </main>

  <?php
  require_once("./layouts/footer.php");
} else {
  //redirect the guest to login, as they are not meant to be on this page
  header("Location: login.php?placement=NULL");
}
?>
