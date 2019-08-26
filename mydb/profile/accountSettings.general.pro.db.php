<?php
session_start();
require_once("../databaseManager/DBEnter.db.php");

if (!empty($_SESSION['lid'] && $_SESSION['cdid'] && $_SESSION['cpid'] && $_SESSION['start'] && $_SESSION['user'])) {
  if (!empty($_POST['fName'] && $_POST['lName'] && $_POST['email'] && $_POST['displayName'])) {

    $resultCD = DB::queryFirstRow("SELECT * FROM clientData WHERE CDID =" . $_SESSION['cdid']);
    $resultCP = DB::queryFirstRow("SELECT * FROM clientProfile WHERE CDID =" . $_SESSION['cpid']);

    DB::insertUpdate('clientData', array(
        'CDID' => $_SESSION['cdid'], //primary key
        'fName' => $resultCD['fName'],
        'lName' => $resultCD['lName'],
        'email' => $resultCD['email']
    ), array(
        'fName' => $_POST['fName'],
        'lName' => $_POST['lName'],
        'email' => $_POST['email']
    ));

    if (DB::affectedRows() == 2) {
      DB::insertUpdate('clientProfile', array(
          'CPID' => $_SESSION['cpid'], //primary key
          'CDID' => $_SESSION['cdid'],
          'displayName' => $resultCP['displayName'],
          'UIMG' => $resultCP['UIMG']
      ), array(
          'displayName' => $_POST['fName']
      ));

      if (DB::affectedRows() == 2) {
        echo "success";
      } else {
        echo "fail1".DB::affectedRows();
      }
    } else {
      echo "fail2".DB::affectedRows();
    }
  } else {
    echo "missing values";
  }
} else {
  header("Location: ../../index.php?notMeantToBeHere");
  exit;
}

?>
