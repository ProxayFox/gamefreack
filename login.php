<?php
require_once("./layouts/header.php");
 session_start();
 if (empty($_SESSION['user'])) {
 ?>

   <main role="main" style="padding-top: 83px;">



     <section class="container w-50">
       <h1 class="text-center">Time To Login or SignUp</h1>
       <div class="border" style="background-color: #E1E1E1;">
         <!-- Sign in -->
         <form id="signIn" class="login-form container w-75 pt-3" action="mydb/login/login.db.php" method="POST" role="form">
           <label for="userName" class="sr-only">Enter: Email address</label>
           <input type="text" id="userName" name="username" class="form-control" placeholder="Username" required autofocus>
           <label for="password" class="sr-only">Enter: Password</label>
           <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
           <button class="btn btn-primary btn-lg btn-block" type="submit" style="margin-top: 5px;">Sign In</button>
         </form><!-- Sign in end -->

         <!-- Sign up -->
         <form id="signUp" class="login-form hidden container w-75 pt-3" action="mydb/register/register.db.php" method="POST" role="form">
           <label for="userName" class="sr-only">Enter New: Username</label>
           <input type="text" id="userName" name="username" class="form-control" placeholder="Username" required autofocus>
           <label for="email" class="sr-only">Enter New: Email</label>
           <input type="text" id="email" name="email" class="form-control" placeholder="Email" required autofocus>
           <label for="password" class="sr-only">Enter New: Password</label>
           <input type="password" id="password" name="password"  class="form-control" placeholder="Password" required>
           <button class="btn btn-primary btn-lg btn-block" type="submit" style="margin-top: 5px;">Sign Up</button>
         </form><!-- Sign up End -->

         <!-- Buttons to swap from sign in to sign up -->
         <div class="container w-75 text-center pb-3">
           <button onclick="btn('signIn')" id="btnSignIn" class="btn btn-light  hidden" style="margin-top: 5px; text-align: center;">Sign In</button>
           <button onclick="btn('signUp')" id="btnSignUp" class="btn btn-light" style="margin-top: 5px; text-align: center;">Sign Up</button>
         </div><!-- text-center end -->
       </div>


     </section><!-- container end -->
   </main><!-- role main end -->

   <script src="https://code.jquery.com/jquery-3.4.0.min.js" integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg=" crossorigin="anonymous">
   </script><!-- jquery checking end -->
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
   </script><!-- class assigning script end -->

 <?php
 }else {
     header("Location: index.php?logout=notMeantToBeHere");
 }
require_once("./layouts/footer.php");
?>