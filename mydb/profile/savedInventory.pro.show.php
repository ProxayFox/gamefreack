<?php
session_start();
require_once("../databaseManager/DBEnter.db.php");

$resultGameInventory = DB::query("
    SELECT gameInventory.GIID, gameInventory.productName, gameInventory.releaseDates, gameInventoryImg.IMG
    FROM gameInventory RIGHT JOIN gameInventoryImg 
      ON gameInventory.GIID = gameInventoryImg.GIID
    WHERE gameInventory.GIID IN (SELECT GIID FROM savedGameInventory WHERE CDID = '".$_SESSION['cdid']."') AND gameInventoryImg.IMG REGEXP '^((?!IMG).)*$'
    ORDER BY RAND()
");

$resultConsoleInventory = DB::query("
  SELECT consoleInventory.CIID, consoleInventory.productName, consoleInventory.releaseDates, consoleInventoryImg.IMG
  FROM consoleInventory RIGHT JOIN consoleInventoryImg 
    ON consoleInventory.CIID = consoleInventoryImg.CIID
  WHERE consoleInventory.CIID IN (SELECT CIID FROM savedConsoleInventory WHERE CDID = 1) AND consoleInventoryImg.IMG REGEXP '^((?!IMG).)*$'
  ORDER BY RAND()
");
?>

  <section class="container">
    <div class="row">
      <div class="col-6"><!-- Left Side -->
        <?php foreach ($resultGameInventory as $row2){ ?>
          <div class="border border-dark rounded" style="background-color: #f5f5f5; margin: 10px;">
            <div class="thumbnail" style="padding: 25px;">
              <img src="img/gameImg/<?php echo $row2['IMG']; ?>" alt="Game IMG" class="img-responsive"
                   style="width: 320px;"/>
              <div class="caption">
                <h4 class="text-center"><?php echo $row2['productName']; ?></h4>
                <p><a href="#" class="btn btn-primary btn-block">Open</a></p>
              </div><!-- caption end -->
            </div><!-- thumbnail end -->
          </div><!-- Border end -->
        <?php } ?>
      </div><!-- col-6 end -->
      <div class="col-6"><!-- Right Side -->
        <?php foreach ($resultConsoleInventory as $row2){ ?>
        <div class="border border-dark rounded" style="background-color: #f5f5f5; margin: 10px;">
          <div class="thumbnail" style="padding: 25px;">
            <img src="img/consoleImg/<?php echo $row2['IMG']; ?>" alt="Game IMG" class="img-responsive"
                 style="width: 320px;"/>
            <div class="caption">
              <h4 class="text-center"><?php echo $row2['productName']; ?></h4>
              <p><a href="" class="btn btn-primary btn-block">Open</a></p>
            </div><!-- caption end -->
          </div><!-- thumbnail end -->
        </div><!-- Border end -->
        <?php } ?>
      </div><!-- col-6 end -->
    </div> <!-- row end -->
  </section><!-- container end -->
