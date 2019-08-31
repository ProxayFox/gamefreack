<?php
require_once("./layouts/header.php");
require_once("./mydb/databaseManager/DBEnter.db.php");
$resultMainImg = DB::queryFirstRow("
  SELECT IMG 
  FROM gameinventoryimg 
  WHERE GIID = '".$_GET['GIID']."'
    AND IMG REGEXP '^((?!IMG).)*$'
");

$resultCarouselImg = DB::query("
  SELECT IMG 
  FROM gameinventoryimg 
  WHERE GIID = '".$_GET['GIID']."'
    AND IMG REGEXP 'IMG'
");

$resultGameQuery = DB::queryFirstRow("
  SELECT *
  FROM gameinventory 
  WHERE GIID = '".$_GET['GIID']."'
");

$resultUserReview = DB::query("
  SELECT usergamecomment.date, usergamecomment.comment, clientprofile.displayName, clientprofile.UIMG
  FROM usergamecomment RIGHT JOIN clientprofile
    ON usergamecomment.CPID = clientprofile.CPID
  ORDER BY RAND() LIMIT 6
");

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

    // Overview Review and specification swapper
    $("#btnOverview").click(function () {
      $("#overview").removeClass('d-none');
      $("#reviews").addClass('d-none');
      $("#specification").addClass('d-none');
    });
    $("#btnReviews").click(function () {
      $("#overview").addClass('d-none');
      $("#reviews").removeClass('d-none');
      $("#specification").addClass('d-none');
    });
    $("#btnSpecification").click(function () {
      $("#overview").addClass('d-none');
      $("#reviews").addClass('d-none');
      $("#specification").removeClass('d-none');
    });


    $("#btnUserComment").click(function () {
      $('#spinner0').addClass('spinner-border spinner-border-sm');
      $.post("./mydb/content/gameContent.worker.php", {
        comment:     $("#userComment").val(),
        GIID:        $("#formGIID").val(),
      },
      function (data, status) {
        $('#spinner0').removeClass('spinner-border spinner-border-sm');
        $("#userComment").val("");
        console.log(data, status);
        if (data === "fail0") {
          $("#generalMessage").text("Server Error");
        } else if (data === "success1") {
          $("#generalMessage").text("Message Sent");
        } else {
          $("#generalMessage").text("Missing Values");
        }
      })
    });

  });
</script>

<main role="main" class="container" style="padding-top: 90px; margin-bottom: 50px;">
  <h1 itemprop="name"><?php echo $resultGameQuery['productName'] ?></h1>
  <a
      class="btn btn-link"
      style="color: gray;"
      href="<?php
        // make sure the user goes to the correct location of the device
        // 1 = PS4, 2 = xBox, 3 = Nintendo, 4 = Personal Computer
        // and anything bigger means it supports multiple devices
        if ($resultGameQuery['platForm'] == 1){
          echo "PS4.php";
        } elseif ($resultGameQuery['platForm'] == 2) {
          echo "xbox.php";
        }
        elseif ($resultGameQuery['platForm'] == 3) {
          echo "nintendo.php";
        }
        elseif ($resultGameQuery['platForm'] == 4) {
          echo "PC.php";
        } else {
          echo "index.php";
        }
      ?>"
  >
    <small itemprop="brand">Item location</small>
  </a>

  <section class="row">
    <!-- left side Image selector -->
    <div class="col-md-8">
      <div>
      <div>
        <img id="mainImage" class="w-75 d-block mx-auto rounded" src="img/gameImg/<?php echo $resultMainImg['IMG']; ?>" alt="Game Image">
      </div>

      <!-- carousel under the main image, also a selector -->
      <div id="imageCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <?php
          // Database query for game Images
          $resultCarouselImg = DB::query("
            SELECT IMG 
            FROM gameinventoryimg 
            WHERE GIID = '".$_GET['GIID']."'
              AND IMG REGEXP 'IMG'
            ORDER BY RAND()
          ");

          //assigning arrays
          $imageArrayGame = array();

          //pushing the array's
          foreach ($resultCarouselImg as $row) {
            array_push($imageArrayGame, $row['IMG']);
          }

          for ($counterGame = 0; $counterGame <= count($imageArrayGame)-1; $counterGame = $counterGame+=2) {
          if ($counterGame == 0){
            $activeGame = "active";
          } else {
            $activeGame = "";
          }
          ?>
          <div class="carousel-item <?php echo $activeGame;?>" style="padding-left: 10%; padding-right: 10%;">
            <div class="row">
              <div class="col-3">
                <img
                    class="d-block mx-auto align w-100 rounded"
                    id="1"
                    onclick="imgOnClickChange('img/gameImg/<?php echo $resultMainImg['IMG']; ?>')"
                    src="img/gameImg/<?php echo $resultMainImg['IMG']; ?>"
                    alt="First slide"
                >
              </div><!-- col-3 end -->
              <div class="col-3">
                <img
                    class="d-block mx-auto align w-100 rounded"
                    id="2"
                    onclick="imgOnClickChange('img/gameImg/<?php echo $imageArrayGame[$counterGame]; ?>')"
                    src="img/gameImg/<?php echo $imageArrayGame[$counterGame]; ?>"
                    alt="First slide"
                >
              </div><!-- col-3 end -->
              <div class="col-3">
                <img
                    class="d-block mx-auto align w-100 rounded"
                    id="3"
                    onclick="imgOnClickChange('img/gameImg/<?php echo $imageArrayGame[$counterGame + 1]; ?>')"
                    src="img/gameImg/<?php echo $imageArrayGame[$counterGame + 1]; ?>"
                    alt="First slide"
                >
              </div><!-- col-3 end -->
              <div class="col-3">
                <img
                    class="d-block mx-auto align w-100 rounded"
                    id="4"
                    onclick="imgOnClickChange('img/gameImg/<?php echo $imageArrayGame[$counterGame + 2]; ?>')"
                    src="img/gameImg/<?php echo $imageArrayGame[$counterGame + 2]; ?>"
                    alt="First slide"
                >
              </div><!-- col-3 end -->
            </div><!-- row end -->
          </div><!-- Carousel Item end-->
            <?php } ?>
        </div><!-- Carousel Inner end -->
        <a class="carousel-control-prev" href="#imageCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#imageCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
        </div>
      </div><!-- Carousel end -->
    </div><!--col-md-8 end--->
    </div><!-- For some reason having this stops the left side from sticking to the carousel-->

    <!-- right side Product saving and small information -->
    <div class="col-md-4 container">
      <!-- Price of the product -->
      <h2 itemprop="price">$<?php echo $resultGameQuery['price'] ?></h2>
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
        </div><!-- col-10 end -->
        <div class="col-2 icon" id="dropDownDelivery">
          <svg viewBox="0 0 129 129" xmlns:xlink="http://www.w3.org/1999/xlink" enable-background="new 0 0 129 129">
            <g>
              <path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z"></path>
            </g>
          </svg>
        </div><!-- col-2 end -->
      </div><!-- row end -->
      <div class="d-none" id="delivery">Not Available</div>
      <hr>
      <button type="button" class="w-100 btn btn-outline-success">Save Item</button>
    </div><!--col-md-4 end -->
  </section><!-- row end -->

  <section class="container">
    <!-- title -->
    <h1 class="text-center">General Information</h1>
    <br>
    <div class="container" style="background-color: #f9f9f9">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <!-- main section visible on load -->
        <a class="navbar-brand" id="btnOverview">Overview</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button><!-- Navbar toggle end -->


        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" id="btnReviews">Reviews</a>
            </li><!-- nav item end -->
            <li class="nav-item">
              <a class="nav-link" id="btnSpecification">Specifications</a>
            </li> <!-- nav item end -->
          </ul><!-- navbar nav end -->
        </div><!-- collapse end -->
      </nav><!-- navbar end -->

      <!-- Overview section -->
      <div id="overview" class="">
        <h3>Short Description</h3>
        <p><?php echo $resultGameQuery['briefDescription']; ?></p>
        <br>
        <h3>Long Description</h3>
        <h3>Long Description</h3>
        <p><?php echo $resultGameQuery['longDescription']; ?></p>
      </div><!-- overview end -->


      <!-- Reviews section -->
      <div id="reviews" class="d-none">
        <small style="color: #999;">Will Randomly select 6 Items</small>
        <div class="row">
        <div class="col-md-6">
          <h3>Users</h3><!-- random order and set amount -->
          <?php
          foreach ($resultUserReview as $row){
          ?>
          <div class="row">
            <div class="col-md-3">
              <img class="w-100 rounded" src="./img/profileIMG/<?php echo $row['UIMG']; ?>" alt="Profile Image">
            </div><!-- col-md-3 end -->
            <div class="col-md-5">
              <h5><span style="color: #999;">Name: </span><span><?php echo $row['displayName']; ?></span></h5>
            </div><!-- col-md-5 end -->
            <div class="col-md-4">
              <p><span style="color: #999;">Date: </span><span><?php echo $row['date']; ?></span></p>
            </div><!-- col-md-4 end -->
          </div><!--row end -->
          <div class="row">
            <div class="col-md-3">
              <h5>Comment: </h5>
            </div><!-- col-md-3 end -->
            <div class="col-md-9">
              <p><?php echo $row['comment']; ?></p>
            </div><!-- col-md-9 end -->
          </div><!-- row end -->
          <?php } ?>
        </div><!-- col-md-6 end -->
        <div class="col-md-6">
          <h3>Guests</h3><!-- random order and set amount -->
          <div class="row">
            <div class="col-md-3">
              <img class="w-100 rounded" src="./img/500px%20icon.png" alt="Profile Image">
            </div><!-- col-md-3 end -->
            <div class="col-md-5">
              <h5><span style="color: #999;">Name: </span><span>Ayden</span></h5>
            </div><!-- col-md-5 end -->
            <div class="col-md-4">
              <p><span style="color: #999;">Date: </span><span>09/08/2001</span></p>
            </div><!-- col-md-4 end -->
          </div><!-- row end -->
          <div class="row">
            <div class="col-md-3">
              <h5>Comment: </h5>
            </div><!-- col-md-3 end -->
            <div class="col-md-9">
              <p>great game</p>
            </div><!--col-md-9 end -->
          </div><!-- row end -->
        </div><!-- col-md-6 end -->
        <hr>
        <?php
          if (!empty($_SESSION['lid'] && $_SESSION['cdid'] && $_SESSION['cpid'] && $_SESSION['start'] && $_SESSION['user'])) {
            ?>
              <div class="container" id="userForm">
                <h4>Create a Review</h4>
                <div class="row">
                  <div class="col-2"></div><!-- empty div for centering -->
                  <div class="col-8 form-group">
                    <label for="userComment">Enter your comment</label>
                    <textarea type="text" id="userComment" style="margin-bottom: 5px;" class="form-control" placeholder="Enter Comment"></textarea>
                    <input id="formGIID" type="hidden" value="<?php echo $_GET['GIID']; ?>">
                    <a class="btn btn-outline-primary" id="btnUserComment">Update<span style="height:15px; width:15px; margin-right: 10px;" id="spinner0"></span></a>
                    <div id="generalMessage"></div>
                  </div><!-- col-8 end -->
                  <div class="col-2"></div>
                </div><!-- row end -->
              </div><!-- user Form end -->
            <?php
          } else {
            ?>
              <div class="container" id="guestForm">
                <h4>Create a Review</h4>
              </div><!-- guest Form end -->
            <?php
          }
        ?>
      </div><!-- row end -->
      </div><!-- reviews end -->


      <!-- Specification section -->
      <div id="specification" class="row d-none">
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-2"></div><!-- empty dive to force kinda center -->
            <div class="col-md-6">
              <p>
                <span style="color: #999;">Platform: </span>
                <span>
                  <?php
                    if ($resultGameQuery['platForm'] == 1){
                      echo "Play Station";
                    } elseif ($resultGameQuery['platForm'] == 2) {
                      echo "XBOX";
                    } elseif ($resultGameQuery['platForm'] == 3) {
                      echo "Nintendo";
                    } elseif ($resultGameQuery['platForm'] == 4) {
                      echo "Personal Computer";
                    } elseif ($resultGameQuery['platForm'] == 6) {
                      echo "Works on all systems";
                    } else {
                      echo "Google it";
                    }
                  ?>
                </span>
              </p>
              <p>
                <span style="color: #999;">Genre: </span><span><?php echo $resultGameQuery['genre']; ?></span></p>
            </div><!-- col-md-4 end -->
            <div class="col-md-2"></div><!-- empty dive to force kinda center -->
          </div>
        </div>
        <div class="col-md-6">
          <div class="row">
            <div class="col-md-2"></div><!-- empty dive to force kinda center -->
            <div class="col-md-6">
              <p><span style="color: #999;">Producer: </span><span><?php echo $resultGameQuery['producer']; ?></span></p>
              <p><span style="color: #999;">Requirements: </span><span><?php echo $resultGameQuery['Requirements']; ?></span></p>
            </div><!-- col-md-4 end -->
            <div class="col-md-2"></div><!-- empty dive to force kinda center -->
          </div>
        </div>
      </div>
    </div>
  </section>

</main>


<?php
require_once("./layouts/footer.php");
?>
