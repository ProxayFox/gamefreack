<?php
require_once("./layouts/header.php");
require_once("./mydb/databaseManager/DBEnter.db.php");

?>

<main role="main" class="container" style="padding-top: 90px;">
  <h1 itemprop="name">Game Name</h1>
  <a class="btn btn-link" style="color: gray;" href="#"><small itemprop="brand">Item location</small></a>

  <section class="row">
    <div class="col-8">
      <img class="w-75 d-block mx-auto rounded" src="img/gameImg/Prey.png" alt="Game Image">
    </div>
    <div class="col-4 container">
      <h2 itemprop="price">$500</h2>
      <hr>
      <div class="row">
        <div class="col-10">
          <h5 itemprop="location">Stores Available</h5>
        </div>
        <svg class="col-2" >
          <?php require_once("./img/SVG/down-arrow.svg"); ?>
        </svg>
      </div>
      <hr>
      <h5 itemprop="delivery">Delivery Unavalable</h5>
      <hr>
      <button type="button" class="w-100 btn btn-outline-success">Save Item</button>
    </div>
  </section>

</main>


<?php
require_once("./layouts/footer.php");
?>
