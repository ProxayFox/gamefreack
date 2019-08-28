<?php
session_start();
require_once("../../databaseManager/DBEnter.db.php");

if (!empty($_SESSION['lid'] && $_SESSION['cdid'] && $_SESSION['cpid'] && $_SESSION['start'] && $_SESSION['user'])) {
  if (!empty($_POST['address'] && $_POST['suburb'] && $_POST['city'] && $_POST['state'] && $_POST['postCode'])) {

    $resultAddress = DB::queryFirstRow("SELECT * FROM clientaddress WHERE CDID = ".$_SESSION['cdid']);

    DB::insertUpdate('clientAddress', array(
      'CAID' => $resultAddress['CAID'], //primary key
      'CDID' => $_SESSION['cdid'],
      'address' => $resultAddress['address'],
      'suburb' => $resultAddress['suburb'],
      'city' => $resultAddress['city'],
      'state' => $resultAddress['state'],
      'postCode' => $resultAddress['postCode']
    ), array(
      'CAID' => $resultAddress['CAID'], //primary key
      'CDID' => $_SESSION['cdid'],
      'address' => $_POST['address'],
      'suburb' => $_POST['suburb'],
      'city' => $_POST['city'],
      'state' => $_POST['state'],
      'postCode' => $_POST['postCode']
    ));

    if (DB::affectedRows() == 2) {
      echo "success".DB::affectedRows();
    } else {
      echo "fail1".DB::affectedRows();
      exit;
    }
  } else {
    echo "missing values";
    echo "Address = ".$_POST['address']."<br>";
    echo "suburb = ".$_POST['suburb']."<br>";
    echo "city = ".$_POST['city']."<br>";
    echo "state = ".$_POST['state']."<br>";
    echo "postCode = ".$_POST['postCode']."<br>";
    exit;
  }
} else {
  header("Location: ../../index.php?notMeantToBeHere");
  exit;
}
?>
