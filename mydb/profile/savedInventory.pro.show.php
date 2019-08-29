<?php
session_start();
require_once("../databaseManager/DBEnter.db.php");

  //Query the data base for data
  $resultSavedGame = DB::query("SELECT GIID FROM savedgameinventory WHERE CDID = ".$_SESSION['cdid']);
  //Assign a veriable to a string
  $GIID = array();

  foreach ($resultSavedGame as $row) {
    echo $row['GIID'].", ";
    array_push($GIID, $row['GIID']);
  }

  $gameArray = join($GIID, ", " );
  echo $gameArray."<br>";
  echo "WHERE GIID IN (".$gameArray.")";
  $resultGameInventory = DB::query("
    SELECT GIID, productName, releaseDates
    FROM gameInventory
    WHERE GIID IN (.$gameArray.)
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
