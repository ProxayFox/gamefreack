<?php
require_once("../../databaseManager/DBEnter.db.php");

if (!empty($_POST['comment'] && $_POST['CIID'])) {

  if (!empty($_POST['formUsername'])) {
    $username = $_POST['formUsername'];

    DB::insert('guestConsoleComments', array(
        'GCCID'   =>  NULL,
        'CIID'    =>  $_POST['CIID'],
        'username'=>  $username,
        'date'    =>  date('Y-m-d'),
        'comment' =>  $_POST['comment']
    ));
  } else {
    $username = rand(); //Assigning a random value as the name

    DB::insert('guestConsoleComments', array(
        'GCCID'   =>  NULL,
        'CIID'    =>  $_POST['CIID'],
        'username'=>  $username,
        'date'    =>  date('Y-m-d'),
        'comment' =>  $_POST['comment']
    ));
  }

  if (DB::affectedRows() == 1) {
    echo "success".DB::affectedRows();
  } else {
    echo "fail".DB::affectedRows();
  }

} else {
  echo "Missing Values";
}