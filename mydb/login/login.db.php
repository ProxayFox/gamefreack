<?php
// starting the session
session_start();
//getting information inner working from meekroDB
require_once('../databaseManager/DBEnter.db.php');

// checking if a post was sent
if (!empty($_POST['username'] && $_POST['password'])) {
  //getting the post from the login form
  $username = $_POST['username'];
  $pwd = $_POST['password'];
  // hashing the password to be checked
  $hashedPWD = hash('sha512', $pwd);
  //starting the session

  $loginResult = DB::queryFirstRow("
    SELECT login.LID, login.CDID, clientprofile.CPID
FROM login RIGHT JOIN clientprofile ON login.CDID = clientprofile.CDID
WHERE login.UName='".$username."' AND login.PWD='".$hashedPWD."'
  ");

  if ($loginResult != null) {
      //getting values and assigning them
      $lid = $loginResult['LID'];
      $cdid = $loginResult['CDID'];
      $cpid = $loginResult['CPID'];

      //creating session values
      $_SESSION['lid'] = $lid;
      $_SESSION['cdid'] = $cdid;
      $_SESSION['cpid'] = $cpid;
      $_SESSION['start']=1;
      $_SESSION['user'] = $username;

    //take the user back to index with a signing success
    header('location: ../../index.php?login=success');
    exit;
  } else {
    //login failed take user back to index with a get request string of fail
    header('location: ../../login.php?login=fail');
    exit;
  }
} else {
  // redirect the user back to the index with a message of they aren't meant to be here
  header("Location: ../../login.php?placement=NULL");
  exit;
}