<link rel="stylesheet" href="./css/guestHeader.css">
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
        <a class="navbar-brand" href="index.php" style="text-transform: uppercase;"> gamefreack.COM</a>
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
              <a class="nav-link" href="PS4.php">Playstation 4</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="xbox.php">Xbox One</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="nintendo.php">Nintendo Switch</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="PC.php">PC Gaming</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="loot.php">Loot</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" data-toggle="modal" data-target="#exampleModal">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Lets Login</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- Sign in -->
          <form id="signIn" class="login-form" action="mydb/login/login.db.php" method="POST" role="form">
            <label for="username" class="sr-only">Enter: Email address</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
            <label for="password" class="sr-only">Enter: Password</label>
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            <button class="btn btn-primary btn-lg btn-block" type="submit" style="margin-top: 5px;">Sign In</button>
          </form><!-- Sign in end -->

          <!-- Sign up -->
          <form id="signUp" class="login-form hidden" action="mydb/register/register.db.php" method="POST" role="form">
            <label for="username" class="sr-only">Enter New: Username</label>
            <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus>
            <label for="email" class="sr-only">Enter New: Email</label>
            <input type="text" id="email" name="email" class="form-control" placeholder="Email" required autofocus>
            <label for="password" class="sr-only">Enter New: Password</label>
            <input type="password" id="password" name="PWD" class="form-control" placeholder="Password" required>
            <button class="btn btn-primary btn-lg btn-block" type="submit" style="margin-top: 5px;">Sign Up</button>
          </form><!-- Sign up End -->

          <!-- Buttons to swap from sign in to sign up -->
          <div class="text-center">
            <button onclick="btn('signIn')" id="btnSignIn" class="btn text-center hidden" style="margin-top: 5px; text-align: center;">Sign In</button>
            <button onclick="btn('signUp')" id="btnSignUp" class="btn text-center" style="margin-top: 5px; text-align: center;">Sign Up</button>
          </div>


        </div>
      </div>
    </div>
  </div>
</section>
<script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous">
</script>
<script>

  //Script to pick sign up form or sign in form
  function btn(formChange) {
    const signIn = $("#signIn");
    const signUp = $("#signUp");
    const btnSignIn = $("#btnSignIn");
    const btnSignUp = $("#btnSignUp");

    if (formChange === 'signIn') {
      signIn.removeClass("hidden");
      btnSignUp.removeClass("hidden");
      signUp.addClass("hidden");
      btnSignIn.addClass("hidden");
      console.log("sign in shown")
    } else if(formChange === "signUp") {
      signIn.addClass("hidden");
      btnSignUp.addClass("hidden");
      signUp.removeClass("hidden");
      btnSignIn.removeClass("hidden");
      console.log("sign up shown")
    } else {
      throw("Function btn: No match found");
    }
  }
</script>