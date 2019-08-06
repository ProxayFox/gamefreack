<?php
  require_once("./layouts/header.php");
?>

    <style>
      .icon:hover {
        fill:#3ca7d0;
        color:#3ca7d0;
      }
    </style>

    <script>
      $(document).ready(function(

      ))
    </script>

<main role="main" style="padding-top: 83px; background-color: #d2d6dc;">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
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
      <div class="col-lg-3"></div>
      <div class="col-lg-2 text-center">
        <div class="icon">
          <svg class="col-lg-12">
            <?php include_once("img/svg/PlayStation_4.svg") ?>
          </svg>
          <h4>Playstation</h4>
        </div>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-2 text-center">
        <div class="icon">
          <svg class="col-lg-12">
            <?php include_once("img/svg/nintendo.svg") ?>
          </svg>
          <h4>Nintendo</h4>
        </div>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-2 text-center">
        <div class="icon">
          <svg class="col-lg-12">
            <?php include_once("img/svg/xboxSymbol.svg") ?>
          </svg>
          <h4>Xbox</h4>
        </div>
      </div><!-- /.col-lg-4 -->
      <div class="col-lg-3"></div>
    </div><!-- /.row -->


    <div class="text-left" style="padding-top: 25px;">
      <h4>Recommended for you</h4>
    </div>

    <div id="demo" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#demo" data-slide-to="0" class="active"></li>
        <li data-target="#demo" data-slide-to="1"></li>
        <li data-target="#demo" data-slide-to="2"></li>
      </ol><!-- Carousel-indicators end -->

      <!-- recommended carousel start -->
      <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active" href="#">
          <div class="row">
            <div class="col-md-2"></div><!-- empty div to force content center -->
            <div class="col-md-4" style="padding-right: 5px;">
              <div class="border border-dark rounded" style="background-color: #e5e5e5;">
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
              <div class="border border-dark rounded" style="background-color: #e5e5e5;">
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
              <div class="border border-dark rounded" style="background-color: #e5e5e5;">
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
              <div class="border border-dark rounded" style="background-color: #e5e5e5;">
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
              <div class="border border-dark rounded" style="background-color: #e5e5e5;">
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
              <div class="border border-dark rounded" style="background-color: #e5e5e5;">
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


        <a class="carousel-control-prev" href="#demo" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#demo" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div><!-- carousel-slider end -->


      <!-- Start of the individual identities -->

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">First featurette heading. <span class="text-muted">It'll blow your mind.</span>
          </h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod
            semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus
            commodo.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-fluid mx-auto"
               src="img/Flat%20Gradient%20Social%20Media%20Icons/80/500px%20icon.png" alt="Generic placeholder image"
               style="height: 250px; width: 250px;">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7 order-md-2">
          <h2 class="featurette-heading">Oh yeah, it's that good. <span class="text-muted">See for yourself.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod
            semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus
            commodo.</p>
        </div>
        <div class="col-md-5 order-md-1">
          <img class="featurette-image img-fluid mx-auto"
               src="img/Flat%20Gradient%20Social%20Media%20Icons/80/500px%20icon.png" alt="Generic placeholder image"
               style="height: 250px; width: 250px;">
        </div>
      </div>

      <hr class="featurette-divider">

      <div class="row featurette">
        <div class="col-md-7">
          <h2 class="featurette-heading">And lastly, this one. <span class="text-muted">Checkmate.</span></h2>
          <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod
            semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus
            commodo.</p>
        </div>
        <div class="col-md-5">
          <img class="featurette-image img-fluid mx-auto"
               src="img/Flat%20Gradient%20Social%20Media%20Icons/80/500px%20icon.png" alt="Generic placeholder image"
               style="height: 250px; width: 250px;">
        </div>
      </div>

      <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->

    </div><!-- /.container -->


    <!-- FOOTER -->
    <footer class="container">
      <p class="float-right"><a href="#">Back to top</a></p>
      <p>&copy; 2017-2018 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
    </footer>
  </div>
</main>

<?php
  require_once("./layouts/footer.php");
?>
