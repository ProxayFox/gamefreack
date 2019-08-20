<?php
require_once('../databaseManager/meekrodb.2.3.class.php');
require_once('../databaseManager/DBEnter.db.php');
//	require_once("../databaseManager/o-db.php");
if (!empty($_POST['username']) && $_POST['email'] && $_POST['password']) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $pwd = $_POST['PWD'];
  //hashing the password using sha512
  $hashedPWD = hash('sha512', $pwd);

  @$emailTest = DB::query("SELECT email FROM clientData WHERE email = '".$email."'");
  // checking for duplicate email
  if (DB::affectedRows() == 0) { // if $emailTest is not empty than insert into the database
    @$usernameTest = DB::query("SELECT UName FROM login WHERE UName = '".$username."'");
    if (DB::affectedRows() == 0) {
      DB::insertIgnore('clientData', array(
        'CDID' => NULL,
        'email' => $email
      ));

      $getCPID = DB::query("SELECT CDID FROM clientData WHERE email = '".$email."'");
      foreach ($getCPID as $row) {
        $cdid = $row['CDID'];

        DB::insert('login', array(
            'LID' => NULL,
            'CDID' => $cdid,
            'UName' => $username,
            'PWD' => $hashedPWD
        ));
      }
      header('location: ../../login.php?signUp=success');
      exit;
      } else {
      header("Location: ../../login.php?signUp=username");
      exit;
      }
    } else {
      header("Location: ../../login.php?signUp=email");
    exit;
    }
  } else {
  header("Location: ../../login.php?not_meant_to_be_here");
  exit;
}
?>