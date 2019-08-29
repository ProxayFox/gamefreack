<?php
session_start();
require_once("../databaseManager/DBEnter.db.php");

$resultGameInventory = DB::query("
    SELECT GIID, productName, releaseDates
    FROM gameInventory
    WHERE GIID IN (SELECT GIID FROM savedGameInventory WHERE CDID = '".$_SESSION['cdid']."')
");
?>

  <section class="container">
    <div class="row">
      <div class="col-6"><!-- Left Side -->
        <?php
          foreach ($resultGameInventory as $row2){
            echo $row2['GIID'].", ";
            echo $row2['productName'].", ";
            echo $row2['releaseDates']."<br>";
          };
        ?>
      </div><!-- col-6 end -->
      <div class="col-6"><!-- Right Side -->
        <?php
          foreach ($resultGameInventory as $row2){
            echo $row2['GIID'].", ";
            echo $row2['productName'].", ";
            echo $row2['releaseDates']."<br>";
          };
        ?>
      </div><!-- col-6 end -->
    </div> <!-- row end -->
  </section><!-- container end -->
