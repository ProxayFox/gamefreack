<?php
require_once("./layouts/header.php");

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
    <header role="banner">
      <img class="w-100" src="img/consoleBanner/PS4IMG2.jpg" alt="Banner for PS4">
    </header>




    <!-- PlayStation Accessories -->
    <section class="container">
      <section>
        <div class="text-left" style="padding-top: 25px;">
          <h4>PlayStation Accessories!</h4>
        </div>

        <div id="Game" class="carousel slide" data-ride="carousel">
          <!-- recommended carousel start -->
          <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active" href="#">
              <div class="row">
                <div class="col-md-2"></div><!-- empty div to force content center -->
                <div class="col-md-4" style="padding-right: 5px;">
                  <div class="border border-dark rounded" style="background-color: #f5f5f5;">
                    <div class="thumbnail" style="padding: 25px;">
                      <img src="img/gameImg/FarCry5.webp" alt="ALT NAME" class="img-responsive" style="width: 320px;"/>
                      <div class="caption">
                        <h3>Header Name</h3>
                        <p>Description</p>
                        <p><a href="http://bootsnipp.com/" class="btn btn-primary btn-block">Open</a></p>
                      </div><!-- caption end -->
                    </div><!-- thumbnail end -->
                  </div><!-- Border end -->
                </div><!-- col-md-4 end -->

                <div class="col-md-4" style="padding-left: 5px;">
                  <div class="border border-dark rounded" style="background-color: #f5f5f5;">
                    <div class="thumbnail" style="padding: 25px;">
                      <img src="img/gameImg/WolfensteinTheOldBlood.webp" alt="ALT NAME" class="img-responsive"
                           style="width: 320px;"/>
                      <div class="caption">
                        <h3>Header Name</h3>
                        <p>Description</p>
                        <p><a href="http://bootsnipp.com/" class="btn btn-primary btn-block">Open</a></p>
                      </div><!-- caption end -->
                    </div><!-- thumbnail end -->
                  </div><!-- Border end -->
                </div><!-- col-md-4 end -->
                <div class="col-md-2"></div><!-- empty div to force content center -->
              </div><!-- row end -->
            </div><!-- carousel item end -->

            <!-- Slide 2 -->
            <div class="carousel-item" href="#">
              <div class="row">
                <div class="col-md-2"></div><!-- empty div to force content center -->
                <div class="col-md-4" style="padding-right: 5px;">
                  <div class="border border-dark rounded" style="background-color: #f5f5f5;">
                    <div class="thumbnail" style="padding: 25px;">
                      <img src="img/gameImg/MetroExodus.webp" alt="ALT NAME" class="img-responsive" style="width: 320px;"/>
                      <div class="caption">
                        <h3>Header Name</h3>
                        <p>Description</p>
                        <p><a href="http://bootsnipp.com/" class="btn btn-primary btn-block">Open</a></p>
                      </div><!-- caption end -->
                    </div><!-- thumbnail end -->
                  </div><!-- Border end -->
                </div><!-- col-md-4 end -->

                <div class="col-md-4" style="padding-left: 5px;">
                  <div class="border border-dark rounded" style="background-color: #f5f5f5;">
                    <div class="thumbnail" style="padding: 25px;">
                      <img src="img/gameImg/Prey.png" alt="ALT NAME" class="img-responsive" style="width: 320px;"/>
                      <div class="caption">
                        <h3>Header Name</h3>
                        <p>Description</p>
                        <p><a href="http://bootsnipp.com/" class="btn btn-primary btn-block">Open</a></p>
                      </div><!-- caption end -->
                    </div><!-- thumbnail end -->
                  </div><!-- Border end -->
                </div><!-- col-md-4 end -->
                <div class="col-md-2"></div><!-- empty div to force content center -->
              </div><!-- row end -->
            </div><!-- carousel item end -->

            <!-- Slide 3 -->
            <div class="carousel-item" href="#">
              <div class="row">
                <div class="col-md-2"></div><!-- empty div to force content center -->
                <div class="col-md-4" style="padding-right: 5px;">
                  <div class="border border-dark rounded" style="background-color: #f5f5f5;">
                    <div class="thumbnail" style="padding: 25px;">
                      <img src="img/gameImg/FarcryNewDawn.jpg" alt="ALT NAME" class="img-responsive" style="width: 320px;"/>
                      <div class="caption">
                        <h3>Header Name</h3>
                        <p>Description</p>
                        <p><a href="http://bootsnipp.com/" class="btn btn-primary btn-block">Open</a></p>
                      </div><!-- caption end -->
                    </div><!-- thumbnail end -->
                  </div><!-- Border end -->
                </div><!-- col-md-4 end -->

                <div class="col-md-4" style="padding-left: 5px;">
                  <div class="border border-dark rounded" style="background-color: #f5f5f5;">
                    <div class="thumbnail" style="padding: 25px;">
                      <img src="img/gameImg/WolfensteinTheNewOrder.webp" alt="ALT NAME" class="img-responsive"
                           style="width: 320px;"/>
                      <div class="caption">
                        <h3>Header Name</h3>
                        <p>Description</p>
                        <p><a href="http://bootsnipp.com/" class="btn btn-primary btn-block">Open</a></p>
                      </div><!-- caption end -->
                    </div><!-- thumbnail end -->
                  </div><!-- Border end -->
                </div><!-- col-md-4 end -->
                <div class="col-md-2"></div><!-- empty div to force content center -->
              </div><!-- row end -->
            </div><!-- carousel item end -->


            <a class="carousel-control-prev" href="#Game" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#Game" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div><!-- carousel-slider end -->
        </div><!-- container -->
      </section><!-- PlayStation Accessories end -->




      <!-- PlayStation 4 Console Deals -->
      <section>
        <div class="text-left" style="padding-top: 25px;">
          <h4>PlayStation 4 Console Deals!</h4>
        </div>

        <div id="Game" class="carousel slide" data-ride="carousel">
          <!-- recommended carousel start -->
          <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active" href="#">
              <div class="row">
                <div class="col-md-2"></div><!-- empty div to force content center -->
                <div class="col-md-4" style="padding-right: 5px;">
                  <div class="border border-dark rounded" style="background-color: #f5f5f5;">
                    <div class="thumbnail" style="padding: 25px;">
                      <img src="img/gameImg/FarCry5.webp" alt="ALT NAME" class="img-responsive" style="width: 320px;"/>
                      <div class="caption">
                        <h3>Header Name</h3>
                        <p>Description</p>
                        <p><a href="http://bootsnipp.com/" class="btn btn-primary btn-block">Open</a></p>
                      </div><!-- caption end -->
                    </div><!-- thumbnail end -->
                  </div><!-- Border end -->
                </div><!-- col-md-4 end -->

                <div class="col-md-4" style="padding-left: 5px;">
                  <div class="border border-dark rounded" style="background-color: #f5f5f5;">
                    <div class="thumbnail" style="padding: 25px;">
                      <img src="img/gameImg/WolfensteinTheOldBlood.webp" alt="ALT NAME" class="img-responsive"
                           style="width: 320px;"/>
                      <div class="caption">
                        <h3>Header Name</h3>
                        <p>Description</p>
                        <p><a href="http://bootsnipp.com/" class="btn btn-primary btn-block">Open</a></p>
                      </div><!-- caption end -->
                    </div><!-- thumbnail end -->
                  </div><!-- Border end -->
                </div><!-- col-md-4 end -->
                <div class="col-md-2"></div><!-- empty div to force content center -->
              </div><!-- row end -->
            </div><!-- carousel item end -->

            <!-- Slide 2 -->
            <div class="carousel-item" href="#">
              <div class="row">
                <div class="col-md-2"></div><!-- empty div to force content center -->
                <div class="col-md-4" style="padding-right: 5px;">
                  <div class="border border-dark rounded" style="background-color: #f5f5f5;">
                    <div class="thumbnail" style="padding: 25px;">
                      <img src="img/gameImg/MetroExodus.webp" alt="ALT NAME" class="img-responsive" style="width: 320px;"/>
                      <div class="caption">
                        <h3>Header Name</h3>
                        <p>Description</p>
                        <p><a href="http://bootsnipp.com/" class="btn btn-primary btn-block">Open</a></p>
                      </div><!-- caption end -->
                    </div><!-- thumbnail end -->
                  </div><!-- Border end -->
                </div><!-- col-md-4 end -->

                <div class="col-md-4" style="padding-left: 5px;">
                  <div class="border border-dark rounded" style="background-color: #f5f5f5;">
                    <div class="thumbnail" style="padding: 25px;">
                      <img src="img/gameImg/Prey.png" alt="ALT NAME" class="img-responsive" style="width: 320px;"/>
                      <div class="caption">
                        <h3>Header Name</h3>
                        <p>Description</p>
                        <p><a href="http://bootsnipp.com/" class="btn btn-primary btn-block">Open</a></p>
                      </div><!-- caption end -->
                    </div><!-- thumbnail end -->
                  </div><!-- Border end -->
                </div><!-- col-md-4 end -->
                <div class="col-md-2"></div><!-- empty div to force content center -->
              </div><!-- row end -->
            </div><!-- carousel item end -->

            <!-- Slide 3 -->
            <div class="carousel-item" href="#">
              <div class="row">
                <div class="col-md-2"></div><!-- empty div to force content center -->
                <div class="col-md-4" style="padding-right: 5px;">
                  <div class="border border-dark rounded" style="background-color: #f5f5f5;">
                    <div class="thumbnail" style="padding: 25px;">
                      <img src="img/gameImg/FarcryNewDawn.jpg" alt="ALT NAME" class="img-responsive" style="width: 320px;"/>
                      <div class="caption">
                        <h3>Header Name</h3>
                        <p>Description</p>
                        <p><a href="http://bootsnipp.com/" class="btn btn-primary btn-block">Open</a></p>
                      </div><!-- caption end -->
                    </div><!-- thumbnail end -->
                  </div><!-- Border end -->
                </div><!-- col-md-4 end -->

                <div class="col-md-4" style="padding-left: 5px;">
                  <div class="border border-dark rounded" style="background-color: #f5f5f5;">
                    <div class="thumbnail" style="padding: 25px;">
                      <img src="img/gameImg/WolfensteinTheNewOrder.webp" alt="ALT NAME" class="img-responsive"
                           style="width: 320px;"/>
                      <div class="caption">
                        <h3>Header Name</h3>
                        <p>Description</p>
                        <p><a href="http://bootsnipp.com/" class="btn btn-primary btn-block">Open</a></p>
                      </div><!-- caption end -->
                    </div><!-- thumbnail end -->
                  </div><!-- Border end -->
                </div><!-- col-md-4 end -->
                <div class="col-md-2"></div><!-- empty div to force content center -->
              </div><!-- row end -->
            </div><!-- carousel item end -->


            <a class="carousel-control-prev" href="#Game" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#Game" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div><!-- carousel-slider end -->
        </div><!-- container -->
      </section>
    </section><!-- PlayStation 4 Console Deals end -->
  </main>


<?php
require_once("./layouts/footer.php");
?>