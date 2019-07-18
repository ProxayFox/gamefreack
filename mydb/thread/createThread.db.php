<?php
session_start();
require_once('../databaseManager/DBEnter.db.php');

if (!empty($_SESSION['cdid'] && $_POST['title'] && $_POST['info'])) {
  $CDID = $_SESSION['cdid'];
  $title = $_POST['title'];
  $info = $_POST['info'];
  $date = date("Y-m-d H:i:s");

  $result = DB::insert('thread', array(
      'TID' => NULL,
      'CDID' => $CDID,
      'title' => $title,
      'info' => $info,
      'created' => $date
  ));

  if (!$result) {
    // It had failed
    echo "<h1>fail</h1>";
  }else {
    // Info was updated successfully
    echo "<h1>success</h1>";
  }
} else {
  header("Location: ../../index.php?not_meant_to_be_here");
}
?>