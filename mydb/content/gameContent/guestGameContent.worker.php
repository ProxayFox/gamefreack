<?php
require_once("../../databaseManager/DBEnter.db.php");

if (!empty($_POST['comment'] && $_POST['GIID'])) {

  if (!empty($_POST['formUsername'])) {
    $username = $_POST['formUsername'];

    DB::insert('guestGameComments', array(
        'GGCID'   =>  NULL,
        'GIID'    =>  $_POST['GIID'],
        'username'=>  $username,
        'date'    =>  date('Y-m-d'),
        'comment' =>  $_POST['comment']
    ));
  } else {
    $username = rand(); //Assigning a random value as the name

    DB::insert('guestGameComments', array(
        'GGCID'   =>  NULL,
        'GIID'    =>  $_POST['GIID'],
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