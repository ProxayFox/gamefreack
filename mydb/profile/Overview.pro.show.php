<?php
  session_start();
  require_once("../databaseManager/DBEnter.db.php");

  $consoleResult = DB::query("
    SELECT userConsoleComment.date, userConsoleComment.comment, consoleInventory.productName, consoleInventoryIMG.IMG
    FROM userConsoleComment
      RIGHT JOIN consoleInventory
        ON userConsoleComment.CIID = consoleInventory.CIID
      RIGHT JOIN consoleInventoryIMG
        ON consoleInventory.CIID = consoleInventoryIMG.CIID
    WHERE userConsoleComment.CPID = '".$_SESSION['cpid']."' AND consoleInventoryIMG.IMG REGEXP '^((?!IMG).)*$'"
  );

  $gameResult = DB::query("
    SELECT userGameComment.date, userGameComment.comment, gameInventory.productName, gameInventoryIMG.IMG
    FROM userGameComment
      RIGHT JOIN gameInventory
        ON userGameComment.GIID = gameInventory.GIID
      RIGHT JOIN gameInventoryIMG
        ON gameInventory.GIID = gameInventoryIMG.GIID
    WHERE userGameComment.CPID = '".$_SESSION['cpid']."' AND gameInventoryIMG.IMG REGEXP '^((?!IMG).)*$'"
  );
?>

    <script>
      $(document).ready(function() {
        $("#btnConsole").click(function () {
          const btnConsole = $("#btnConsole");
          const btnGame = $("#btnGame");
          $("#console").removeClass("d-none");
          $("#game").addClass("d-none");
          $(btnConsole).addClass("btn-primary");
          $(btnConsole).removeClass("btn-outline-primary");
          $(btnGame).removeClass("btn-primary");
          $(btnGame).addClass("btn-outline-primary");
          console.log("console show");
        });

        $("#btnGame").click(function () {
          const btnConsole = $("#btnConsole");
          const btnGame = $("#btnGame");
          $("#console").addClass("d-none");
          $("#game").removeClass("d-none");
          $(btnConsole).removeClass("btn-primary");
          $(btnConsole).addClass("btn-outline-primary");
          $(btnGame).addClass("btn-primary");
          $(btnGame).removeClass("btn-outline-primary");
          console.log("game show");
        });
      });
    </script>
    <div class="row">
      <div class="col-2">
        <a id="btnConsole" class="btn btn-lg btn-primary">Console</a>
      </div>
      <div class="col-2">
        <a id="btnGame" class="btn btn-lg btn-outline-primary">Games</a>
      </div>
      <div class="col-8"></div>
    </div>

    <div class="row" id="console">
      <?php foreach ($consoleResult as $row) { ?>
      <div class="col-2">
        <img src="./img/consoleimg/<?php echo $row['IMG']?>" class="w-75 d-block mx-auto rounded" alt="product image">
      </div>
      <div class="col-10">
        <div class="row">
          <!-- Product Name -->
          <h5><?php echo $row['productName']?></h5>
          <!-- Date the comment was made -->
          <p style="padding-left: 10px;"><small><?php echo $row['date'] ?></small></p>
        </div><!-- row end -->
        <!-- user comment -->
        <p><?php echo $row['comment'] ?></p>
      </div><!-- col-10 end -->
      <?php } ?>
    </div><!-- row end -->

    <div class="row d-none" id="game">
      <?php foreach ($gameResult as $row) { ?>
        <div class="col-2">
          <img src="./img/gameImg/<?php echo $row['IMG']?>" class="w-75 d-block mx-auto rounded" alt="product image">
        </div>
        <div class="col-10">
          <div class="row">
            <!-- Product Name -->
            <h5><?php echo $row['productName']?></h5>
            <!-- Date the comment was made -->
            <p style="padding-left: 10px;"><small><?php echo $row['date'] ?></small></p>
          </div><!-- row end -->
          <!-- user comment -->
          <p><?php echo $row['comment'] ?></p>
        </div><!-- col-10 end -->
      <?php }?>
    </div>