<?php
require_once("./layouts/header.php");
require_once("./mydb/databaseManager/DBEnter.db.php");

//$result = DB::queryFirstRow("");
?>

<style>
   /*change the colour of the SVG files */
  .icon:hover {
    fill:#3ca7d0;
    color:#3ca7d0;
  }

  /* this will align the images vertically */
  /* vendor prefixes omitted due to brevity */
  .align {
    position: relative;
    top: 50%;
    transform: translateY(-50%);
  }
</style>

<script>

  function imgOnClickChange(scr) {
    $('#mainImage').attr('src', scr);
  }

  $(document).ready(function() {
    //toggling the right side panel store location and deliveries
    $("#dropDownStore").click(function () {
      $("#stores").toggleClass("d-none");//toggle class on click
    });
    $("#dropDownDelivery").click(function () {
      $("#delivery").toggleClass("d-none");//toggle class on click
    });
  });
</script>

<main role="main" class="container" style="padding-top: 90px; margin-bottom: 50px;">
  <h1 itemprop="name">Game Name</h1>
  <a class="btn btn-link" style="color: gray;" href="#"><small itemprop="brand">Item location</small></a>

  <section class="row">
    <!-- left side Image selector -->
    <div class="col-md-8">
      <div>
        <img id="mainImage" class="w-75 d-block mx-auto rounded" src="img/gameImg/Prey.png" alt="Game Image">
      </div>

      <!-- carousel under the main image, also a selector -->
      <div id="imageCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" style="padding-left: 10%; padding-right: 10%;">
            <div class="row">
              <div class="col-3">
                <img class="d-block mx-auto align w-100 rounded" id="1" onclick="imgOnClickChange('img/gameImg/PreyIMG1.jpg')" src="img/gameImg/PreyIMG1.jpg" alt="First slide">
              </div>
              <div class="col-3">
                <img class="d-block mx-auto align w-100 rounded" id="2" onclick="imgOnClickChange('img/gameImg/PreyIMG2.jpg')" src="img/gameImg/PreyIMG2.jpg" alt="First slide">
              </div>
              <div class="col-3">
                <img class="d-block mx-auto align w-100 rounded" id="3" onclick="imgOnClickChange('img/gameImg/PreyIMG3.jpg')" src="img/gameImg/PreyIMG3.jpg" alt="First slide">
              </div>
              <div class="col-3">
                <img class="d-block mx-auto align w-100 rounded" id="4" onclick="imgOnClickChange('img/gameImg/Prey.png')" src="img/gameImg/Prey.png" alt="First slide">
              </div>
            </div>
          </div><!-- Carousel Item end -->
          <div class="carousel-item" style="padding-left: 10%; padding-right: 10%;">
          <div class="row">
            <div class=" col-3">
              <img class="d-block mx-auto w-100 align rounded" id="5" src="img/gameImg/PreyIMG1.jpg" alt="First slide">
            </div>
            <div class=" col-3">
              <img class="d-block mx-auto w-100 align rounded" id="6" src="img/gameImg/PreyIMG2.jpg" alt="First slide">
            </div>
            <div class=" col-3">
              <img class="d-block mx-auto w-100 align rounded" id="7" src="img/gameImg/PreyIMG3.jpg" alt="First slide">
            </div>
            <div class=" col-3">
              <img class="d-block mx-auto w-100 align rounded" id="8" src="img/gameImg/Prey.png" alt="First slide">
            </div>
          </div>
        </div><!-- Carousel Item end -->
        </div><!-- Carousel Inner end -->
        <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div><!-- Carousel end -->

    </div>

    <!-- right side Product saving and small information -->
    <div class="col-md-4 container">
      <!-- Price of the product -->
      <h2 itemprop="price">$500</h2>
      <hr>
      <div class="row">
        <div class="col-10">
          <h5 itemprop="location">Stores Available</h5>
        </div>
        <div class="col-2 icon" id="dropDownStore">
          <svg viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129">
            <g>
              <path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z"></path>
            </g>
          </svg>
        </div>
      </div>
      <div class="d-none" id="stores">Mt Gravat, Holland Pk, Garden City</div>
      <hr>
      <div class="row">
        <div class="col-10">
          <h5 itemprop="location">Deliveries</h5>
        </div>
        <div class="col-2 icon" id="dropDownDelivery">
          <svg viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129">
            <g>
              <path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z"></path>
            </g>
          </svg>
        </div>
      </div>
      <div class="d-none" id="delivery">Not Available</div>
      <hr>
      <button type="button" class="w-100 btn btn-outline-success">Save Item</button>
    </div>
  </section>

  <section class="container">
    <!-- title -->
    <h1 class="text-center">General Information</h1>
    <br>
    <div class="container" style="background-color: #f9f9f9">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- main section visible on load -->
        <a class="navbar-brand" href="#">Overview</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="#">Reviews</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Specifications</a>
            </li>
          </ul>
        </div>
      </nav>


      <div class="row" id="specifications">
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-4"></div><!-- empty dive to force kinda center -->
            <div class="col-md-4">
              <p><span style="color: #999;">Platform: </span><span>XBOX</span></p>
              <p><span style="color: #999;">Genre: </span><span>XBOX</span></p>
            </div><!-- col-md-4 end -->
            <div class="col-md-4"></div><!-- empty dive to force kinda center -->
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-4"></div><!-- empty dive to force kinda center -->
            <div class="col-md-4">
              <p><span style="color: #999;">Producer: </span><span>XBOX</span></p>
              <p><span style="color: #999;">Requirements: </span><span>XBOX</span></p>
            </div><!-- col-md-4 end -->
            <div class="col-md-4"></div><!-- empty dive to force kinda center -->
          </div>
        </div>
      </div>
    </div>
  </section>

</main>


<?php
require_once("./layouts/footer.php");
?>
