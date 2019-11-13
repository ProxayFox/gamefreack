<?php
session_start();
require_once("../../databaseManager/DBEnter.db.php");

if (!empty($_SESSION['lid'] && $_SESSION['cdid'] && $_SESSION['cpid'] && $_SESSION['start'] && $_SESSION['user'])) {
  if (!empty($_POST['comment'] && $_POST['CIID'])) {

    DB::insert('userConsoleComment', array(
        'UCCID'   =>  NULL,
        'CPID'    =>  $_SESSION['cdid'],
        'CIID'    =>  $_POST['CIID'],
        'date'    =>  date('Y-m-d'),
        'comment' =>  $_POST['comment']
    ));

    if (DB::affectedRows() == 1) {
      echo "success".DB::affectedRows();
    } else {
      echo "fail".DB::affectedRows();
    }

  } else {
  echo "Missing Values";
}
} else {
  header("Location: ../../index.php?notMeantToBeHere");
  exit;
}