<?php
session_start();
require_once("../../databaseManager/DBEnter.db.php");

if (!empty($_SESSION['lid'] && $_SESSION['cdid'] && $_SESSION['cpid'] && $_SESSION['start'] && $_SESSION['user'])) {
  if (!empty($_POST['UIMG'])) {

    // for the image
    $target = "../img/profileIMG/";
    $cTarget = $target . basename($_FILES["imageName"]["name"]);
    $imageName = ($_FILES["imageName"]["name"]);
    $imgType = pathinfo($cTarget,PATHINFO_EXTENSION);

    // Check File Type
    if($imgType != "jpg" && $imgType != "png" && $imgType != "jpeg" && $imgType != "gif" ) {
      $imgError ='Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>The file entered is a '.$imgType.' type';
      $_SESSION['img_error'] = $imgError;
      echo $imgError;
    }
    else {
      $_SESSION['img_error'] = '';
      // Save Uploaded Files
      move_uploaded_file($_FILES["imageName"]["tmp_name"], $cTarget);
    }

    $resultCP = DB::queryFirstRow("SELECT * FROM clientProfile WHERE CDID =" . $_SESSION['cpid']);

    DB::insertUpdate('clientProfile', array(
        'CPID' => $_SESSION['cpid'], //primary key
        'CDID' => $_SESSION['cdid'],
        'displayName' => $resultCP['displayName'],
        'UIMG' => $resultCP['UIMG']
    ), array(
        'UIMG' => $imageName
    ));
  }

  if (DB::affectedRows() == 2){
    echo "success".DB::affectedRows();
  } else {
    echo "fail".DB::affectedRows();
  }
}

?>
