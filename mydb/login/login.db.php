<?php
// starting the session
session_start();
//getting information inner working from meekroDB
require_once('../databaseManager/meekrodb.2.3.class.php');
require_once('../databaseManager/DBEnter.db.php');

// checking if a post was sent
if (!empty($_POST['userName'] && $_POST['password'])) {
  //getting the post from the login form
  $userName = $_POST['userName'];
  $pwd = $_POST['password'];
  // hashing the password to be checked
  $hashedPWD = hash('sha512', $pwd);
  //starting the session

  $loginResult = DB::queryFirstRow("SELECT LID, CDID FROM login WHERE UName='".$userName."' AND PWD='".$hashedPWD."'");

  if ($loginResult != null) {
      //getting values and assigning them
      $lid = $loginResult['LID'];
      $cdid = $loginResult['CDID'];

      //creating session values
      $_SESSION['lid'] = $lid;
      $_SESSION['cdid'] = $cdid;
      $_SESSION['start']=1;
      $_SESSION['user'] = $userName;
    //take the user back to index with a signing success
    header('location: ../../index.php?login=success');
    exit;
  } else {
    //login failed take user back to index with a get request string of fail
    header('location: ../../index.php?login=fail');
    exit;
  }
} else {
  // redirect the user back to the index with a message of they aren't meant to be here
  header("Location: ../../index.php?not_meant_to_be_here");
  exit;
}