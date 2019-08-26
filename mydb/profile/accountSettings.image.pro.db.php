<?php
session_start();
require_once("../databaseManager/DBEnter.db.php");

if (!empty($_POST['fName'] && $_POST['lName'])) {

  $result = DB::queryFirstRow("SELECT * FROM clientData WHERE CDID =".$_SESSION['cdid']);

  DB::insertUpdate('clientData', array(
      'CDID' => $_SESSION['cdid'], //primary key
      'fName' => $result['fName'],
      'lName' => $result['lName'],
      'email' => $result['email']
  ), array(
      'fName' => $_POST['fName'],
      'lName' => $_POST['lName']
  ));
} elseif (!empty($_POST['email'])) {

  $result = DB::queryFirstRow("SELECT * FROM clientData WHERE CDID =".$_SESSION['cdid']);

  DB::insertUpdate('clientData', array(
      'CDID' => $_SESSION['cdid'], //primary key
      'fName' => $result['fName'],
      'lName' => $result['lName'],
      'email' => $result['email']
  ), array(
      'email' => $_POST['email']
  ));
} elseif (!empty($_POST['displayName'])) {

  $result = DB::queryFirstRow("SELECT * FROM clientProfile WHERE CPID =".$_SESSION['cpid']);

  DB::insertUpdate('clientProfile', array(
      'CPID' => $_SESSION['cpid'], //primary key
      'CDID' => $_SESSION['cdid'],
      'displayName' => $result['displayName'],
      'UIMG' => $result['UIMG']
  ), array(
      'displayName' => $_POST['displayName']
  ));
}

?>
