<?php
  require_once("./layouts/header.php");
?>

<style>
  .icon:hover {
    fill:#3ca7d0;
    color:#3ca7d0;
  }
</style>





<main role="main" style="padding-top: 83px; background-color: #c6c6c6;">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <a class="carousel-item active" href="#">
        <img class="d-block w-100" src="img/index/HH_20190726_WeeklyDeal.jpg" alt="First slide" id="slide1">
      </a>
      <a class="carousel-item" href="#">
        <img class="d-block w-100" src="img/index/HH_20190730_Fortnite.jpg" alt="Second slide" id="slide2">
      </a>
      <a class="carousel-item" href="#">
        <img class="d-block w-100" src="img/index/HH_20190731_SaleMustEnd.jpg" alt="Third slide" id="slide3">
      </a>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>





  <!-- Marketing messaging and features -->
  <div class="container marketing" style="padding-top: 10px;">
    <!-- Three columns of text below the carousel -->
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-2 text-center">
        <div class="icon" onclick="window.location.href='PS4.php';">
          <svg class="col-lg-12">
            <?php include_once("img/indexSVG/PlayStation_4.svg") ?>
          </svg>
          <h4>Playstation</h4>
        </div>
      </div><!-- /.col-lg-2 -->
      <div class="col-lg-2 text-center">
        <div class="icon" onclick="window.location.href='nintendo.php';">
          <svg class="col-lg-12">
            <?php include_once("img/indexSVG/nintendo.svg") ?>
          </svg>
          <h4>Nintendo</h4>
        </div>
      </div><!-- /.col-lg-2 -->
      <div class="col-lg-2 text-center">
        <div class="icon" onclick="window.location.href='xbox.php';">
          <svg class="col-lg-12">
            <?php include_once("img/indexSVG/xboxSymbol.svg") ?>
          </svg>
          <h4>Xbox</h4>
        </div>
      </div><!-- /.col-lg-2 -->
      <div class="col-lg-2 text-center">
        <div class="icon" onclick="window.location.href='PC.php';">
          <svg class="col-lg-12">
            <?php include_once("img/indexSVG/PCSymbol.svg") ?>
          </svg>
          <h4>Personal Computer</h4>
        </div>
      </div><!-- /.col-lg-2 -->
      <div class="col-lg-2"></div>
    </div><!-- /.row -->





    <!-- Recommended Games -->
    <div class="text-left" style="padding-top: 25px;">
      <h4>Recommended Games for you</h4>
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


    <hr>


  <!-- console recommendations -->
  <div class="text-left" style="padding-top: 25px;">
    <h4>Recommended Consoles for you</h4>
  </div>

  <div id="Consoles" class="carousel slide" data-ride="carousel">
    <!-- recommended carousel start -->
    <div class="carousel-inner">
      <!-- Slide 1 -->
      <div class="carousel-item active" href="#">
        <div class="row">
          <div class="col-md-2"></div><!-- empty div to force content center -->
          <div class="col-md-4" style="padding-right: 5px;">
            <div class="border border-dark rounded" style="background-color: #f5f5f5;">
              <div class="thumbnail" style="padding: 25px;">
                <img src="img/consoleimg/XBOXOneSBlackIMG1.webp" alt="ALT NAME" class="img-responsive" style="width: 320px;"/>
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
                <img src="img/consoleimg/XBOXOneSWhiteIMG1.jpg" alt="ALT NAME" class="img-responsive"
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
                <img src="img/consoleimg/NintendoSwitchBlack.webp" alt="ALT NAME" class="img-responsive" style="width: 320px;"/>
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
                <img src="img/consoleimg/NintendoSwitchRed.webp" alt="ALT NAME" class="img-responsive" style="width: 320px;"/>
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
                <img src="img/consoleimg/PS4BlackIMG1.jpg" alt="ALT NAME" class="img-responsive" style="width: 320px;"/>
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
                <img src="img/consoleimg/PS4WhiteIMG1.webp" alt="ALT NAME" class="img-responsive"
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


      <a class="carousel-control-prev" href="#Consoles" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#Consoles" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div><!-- carousel-slider end -->
  </div><!-- container -->
  </div><!-- container marketing end -->
</main>

<?php
  require_once("./layouts/footer.php");
?>