<link rel="stylesheet" href="./css/userHeader.css">

<script>
  $(document).ready(function() {
    $('[data-toggle="popover"]').popover();

    $("#postUpdate").click(function () {
      window.location.href = "mydb/login/logout.db.php";
    });
  });
</script>

<section>
  <!-- Navigation -->
  <div class="fixed-top">
    <header class="topbar">
      <div class="container">
        <div class="row">
          <!-- social icon-->
          <div class="col-sm-12">
            <ul class="social-network">
              <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-linkedin"></i></a></li>
              <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-pinterest"></i></a></li>
              <li><a class="waves-effect waves-dark" href="#"><i class="fa fa-google-plus"></i></a></li>
            </ul>
          </div>

        </div>
      </div>
    </header>
    <nav class="navbar navbar-expand-lg navbar-dark mx-background-top-linear">
      <div class="container">
        <a class="navbar-brand" href="index.php" style="text-transform: uppercase;">gamefreack.com</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">

          <ul class="navbar-nav ml-auto">

            <li class="nav-item active">
              <a class="nav-link" href="index.php">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="PS4.php">PS4</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="xbox.php">Xbox One</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="nintendo.php">Nintendo Switch</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="PC.php">PC</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="profile.pro.php">Profile</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="mydb/login/logout.db.php">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>
</section>