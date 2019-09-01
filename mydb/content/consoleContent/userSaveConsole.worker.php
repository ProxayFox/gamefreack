<?php
session_start();
require_once("../../databaseManager/DBEnter.db.php");

if (!empty($_SESSION['lid'] && $_SESSION['cdid'] && $_SESSION['cpid'] && $_SESSION['start'] && $_SESSION['user'])) {
  if (!empty($_POST['CIID'])) {

    DB::insertUpdate('savedConsoleInventory', array(
      'CDID'   =>  $_SESSION['cdid'],
      'CIID'    =>  $_POST['CIID']
    ));

    if (DB::affectedRows() == 1) {
      echo "success".DB::affectedRows();
    } elseif (DB::affectedRows() == 0) {
      echo "fail".DB::affectedRows();
    }

  }else {
    echo "Missing Values";
  }
} else {
  header("Location: ../../index.php?notMeantToBeHere");
  exit;
}