<?php
require_once("./layouts/header.php");
require_once("./mydb/databaseManager/DBEnter.db.php");

//$result = DB::queryFirstRow("");
?>

<style>
  .icon:hover {
    fill:#3ca7d0;
    color:#3ca7d0;
  }
</style>

<script>

  $(document).ready(function() {
    $("#dropDownStore").click(function () {
      $("#stores").toggleClass("d-none");
    });
    $("#dropDownDelivery").click(function () {
      $("#delivery").toggleClass("d-none");
    });
  });
</script>

<main role="main" class="container" style="padding-top: 90px;">
  <h1 itemprop="name">Game Name</h1>
  <a class="btn btn-link" style="color: gray;" href="#"><small itemprop="brand">Item location</small></a>

  <section class="row">
    <!-- left side Image selector -->
    <div class="col-8">
      <img class="w-75 d-block mx-auto rounded" src="img/gameImg/Prey.png" alt="Game Image">
    </div>

    <!-- right side Product saving and small information -->
    <div class="col-4 container">
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
              <path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z"/>
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
              <path d="m121.3,34.6c-1.6-1.6-4.2-1.6-5.8,0l-51,51.1-51.1-51.1c-1.6-1.6-4.2-1.6-5.8,0-1.6,1.6-1.6,4.2 0,5.8l53.9,53.9c0.8,0.8 1.8,1.2 2.9,1.2 1,0 2.1-0.4 2.9-1.2l53.9-53.9c1.7-1.6 1.7-4.2 0.1-5.8z"/>
            </g>
          </svg>
        </div>
      </div>
      <div class="d-none" id="delivery">Not Available</div>
      <hr>
      <button type="button" class="w-100 btn btn-outline-success">Save Item</button>
    </div>
  </section>

</main>


<?php
require_once("./layouts/footer.php");
?>
