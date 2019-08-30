<?php
require_once("./layouts/header.php");
require_once("./mydb/databaseManager/DBEnter.db.php");

// Database query for game data
$resultGame = DB::query('
  SELECT gameInventory.GIID, gameInventory.productName, gameInventoryIMG.IMG
  FROM gameInventory RIGHT JOIN gameInventoryIMG
    ON gameInventory.GIID = gameInventoryIMG.GIID
  WHERE gameInventoryIMG.IMG REGEXP \'^((?!IMG).)*$\'
  ORDER BY RAND() LIMIT 6
');

// Database query for console data
$resultConsoles = DB::query('
  SELECT consoleInventory.CIID, consoleInventory.productName, consoleInventoryImg.IMG
  FROM consoleInventory RIGHT JOIN consoleInventoryImg
    ON consoleInventory.CIID = consoleInventoryImg.CIID
  WHERE consoleInventoryImg.IMG REGEXP \'^((?!IMG).)*$\'
  ORDER BY RAND() LIMIT 6
');
?>

  <main role="main" style="padding-top: 83px; background-color: #c6c6c6;">
    <!-- top of the page banner -->
    <header role="banner">
      <img class="w-100" src="img/consoleBanner/PS4IMG2.jpg" alt="Banner for PS4">
    </header><!-- banner end -->

    <!-- after the banner material -->
    <section class="container">
      <div class="text-left" style="padding-top: 25px;">
        <h4>Recommended PS4 Console Deals for you</h4>
      </div>

      <!-- PS4 Games Carousel 1 start-->
      <div id="Game" class="carousel slide" data-ride="carousel">
        <!-- recommended carousel start -->
        <div class="carousel-inner">
          <?php
          //assigning Game arrays
          $imageArrayConsoles = array();
          $namesArrayConsoles = array();

          //pushing the data into the game arrays
          foreach ($resultConsoles as $row2) {
            array_push($imageArrayConsoles, $row2['IMG']);
            array_push($namesArrayConsoles, $row2['productName']);
          }

          //looping the data and adding 1 to separate each row
          for ($counterConsoles = 0; $counterConsoles <= count($imageArrayConsoles)-1; $counterConsoles = $counterConsoles+=2) {
            if ($counterConsoles == 0) {
              //Making sure the carousel only shows one item at a time by making the fist slide active
              $activeConsoles = "active";
            } else {
              // making sure if the slide is greater than on to deactivate active
              $activeConsoles = "";
            }
          ?>
          <div class="carousel-item <?php echo $activeConsoles; ?>" href="#">
            <div class="row">
              <div class="col-md-2"></div><!-- empty div to force content center -->
              <div class="col-md-4" style="padding-right: 5px;">
                <div class="border border-dark rounded" style="background-color: #f5f5f5;">
                  <div class="thumbnail" style="padding: 25px;">
                    <img src="img/consoleimg/<?php echo $imageArrayConsoles[$counterConsoles] ?>" alt="ALT NAME" class="img-responsive"
                         style="width: 320px;"/>
                    <div class="caption">
                      <h4 class="text-center"><?php echo $namesArrayConsoles[$counterConsoles]; ?></h4>
                      <p><a href="http://bootsnipp.com/" class="btn btn-primary btn-block">Open</a></p>
                    </div><!-- caption end -->
                  </div><!-- thumbnail end -->
                </div><!-- Border end -->
              </div><!-- col-md-4 end -->

              <div class="col-md-4" style="padding-left: 5px;">
                <div class="border border-dark rounded" style="background-color: #f5f5f5;">
                  <div class="thumbnail" style="padding: 25px;">
                    <img src="img/consoleimg/<?php echo $imageArrayConsoles[$counterConsoles + 1] ?>" alt="ALT NAME" class="img-responsive"
                         style="width: 320px;"/>
                    <div class="caption">
                      <h4 class="text-center"><?php echo $namesArrayConsoles[$counterConsoles + 1]; ?></h4>
                      <p><a href="http://bootsnipp.com/" class="btn btn-primary btn-block">Open</a></p>
                    </div><!-- caption end -->
                  </div><!-- thumbnail end -->
                </div><!-- Border end -->
              </div><!-- col-md-4 end -->
              <div class="col-md-2"></div><!-- empty div to force content center -->
            </div><!-- row end -->
          </div><!-- carousel item end -->
          <?php } ?>
        </div><!-- Carousel-inner end -->
        <!-- Controllers for carousel -->
        <a class="carousel-control-prev" href="#Game" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#Game" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div><!-- carousel-slider end -->
      <!-- Carousel 1 end -->


      <hr>


      <!-- PS4 games start carousel 1 start -->
      <!-- Recommended Games Carousel 1 start-->
      <div class="text-left" style="padding-top: 25px;">
        <h4>Recommended PS4 Comparable Games for you</h4>
      </div>

      <div id="Game" class="carousel slide" data-ride="carousel">
        <!-- recommended carousel start -->
        <div class="carousel-inner">
          <!-- Slide 1 -->
          <?php
          // Database query for game data
          $resultGame = DB::query('
              SELECT gameInventory.GIID, gameInventory.productName, gameInventoryIMG.IMG
              FROM gameInventory RIGHT JOIN gameInventoryIMG
                ON gameInventory.GIID = gameInventoryIMG.GIID
              WHERE gameInventoryIMG.IMG REGEXP \'^((?!IMG).)*$\'
              ORDER BY RAND() LIMIT 6
            ');

          //assigning arrays
          $imageArrayGame = array();
          $namesArrayGame = array();

          //pushing the array's
          foreach ($resultGame as $row) {
            array_push($imageArrayGame, $row['IMG']);
            array_push($namesArrayGame, $row['productName']);
          }

          for ($counterGame = 0; $counterGame <= count($imageArrayGame)-1; $counterGame = $counterGame+=2) {
            if ($counterGame == 0){
              $activeGame = "active";
            } else {
              $activeGame = "";
            }
            ?>
            <div class="carousel-item <?php echo $activeGame;?>" href="#">
              <div class="row">
                <div class="col-md-2"></div><!-- empty div to force content center -->
                <div class="col-md-4" style="padding-right: 5px;">
                  <div class="border border-dark rounded" style="background-color: #f5f5f5;">
                    <div class="thumbnail" style="padding: 25px;">
                      <img src="img/gameImg/<?php echo $imageArrayGame[$counterGame]; ?>" alt="ALT NAME" class="img-responsive"
                           style="width: 320px;"/>
                      <div class="caption">
                        <h4 class="text-center"><?php echo $namesArrayGame[$counterGame]; ?></h4>
                        <p><a href="#" class="btn btn-primary btn-block">Open</a></p>
                      </div><!-- caption end -->
                    </div><!-- thumbnail end -->
                  </div><!-- Border end -->
                </div><!-- col-md-4 end -->

                <div class="col-md-4" style="padding-left: 5px;">
                  <div class="border border-dark rounded" style="background-color: #f5f5f5;">
                    <div class="thumbnail" style="padding: 25px;">
                      <img src="img/gameImg/<?php echo $imageArrayGame[$counterGame + 1]; ?>" alt="Game IMG" class="img-responsive"
                           style="width: 320px;"/>
                      <div class="caption">
                        <h4 class="text-center"><?php echo $namesArrayGame[$counterGame + 1]; ?></h4>
                        <p><a href="#" class="btn btn-primary btn-block">Open</a></p>
                      </div><!-- caption end -->
                    </div><!-- thumbnail end -->
                  </div><!-- Border end -->
                </div><!-- col-md-4 end -->
                <div class="col-md-2"></div><!-- empty div to force content center -->
              </div><!-- row end -->
            </div><!-- carousel item end -->
            <?php
          }
          ?>
        </div><!-- Carousel-inner end -->
        <!-- Controllers for carousel -->
        <a class="carousel-control-prev" href="#Game" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#Game" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div><!-- carousel-slider end -->
      <!-- carousel 1 end -->
    </section>
  </main>


<?php
require_once("./layouts/footer.php");
?>