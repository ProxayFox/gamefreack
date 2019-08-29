<?php
session_start();
require_once("../../databaseManager/DBEnter.db.php");

print_r($_FILES);

if (!empty($_SESSION['lid'] && $_SESSION['cdid'] && $_SESSION['cpid'] && $_SESSION['start'] && $_SESSION['user'])) {
  if (!empty($_POST['imageName'])) {

    // Image Variable
    $img = $_FILES['imageName'];
    //image Array Assessment
    //imgTempName = the temp location of the file
    $imgName = $img['name'];
    $imgTmpName = $img['tmp_name'];
    $imgSize = $img['size'];
    $imgError = $img['error'];
    $imgType = $img['type'];
    //Finding the Image Extension
    $imgExt = explode('.', $imgName);
    $imgActualExt = strtolower(end($imgExt));
    //image extensions that are allowed
    $allowedExt = array('jpg', 'jpeg', 'png', 'gif', 'webp');

    if (in_array($imgActualExt, $allowedExt)) {
      if ($imgError === 0) {
        if ($imgSize < 3000000) {
          // 3000000bytes = 3 Megga bytes
          $fileNameNew = uniqid('', true) . "." . $imgActualExt;
          $fileDestination = '../../../img/profileIMG/' . $fileNameNew;

          $resultCP = DB::queryFirstRow("SELECT * FROM clientProfile WHERE CDID =" . $_SESSION['cpid']);

          DB::insertUpdate('clientProfile', array(
              'CPID' => $_SESSION['cpid'], //primary key
              'CDID' => $_SESSION['cdid'],
              'displayName' => $resultCP['displayName'],
              'UIMG' => $resultCP['UIMG']
          ), array(
              'UIMG' => $fileNameNew
          ));

          if (DB::affectedRows() == 2) {
            move_uploaded_file($imgTmpName, $fileDestination);
            echo "success" . DB::affectedRows();
          } else {
            echo "fail" . DB::affectedRows();
          }
        } else {
          echo "Image to Large";
        }
      } else {
        echo "Error While Uploading";
      }
    } else {
      echo "Wrong File Type ".$img;
    }
  } else {
    echo "Missing Values";
  }
} else {
  header("Location: ../../login.php?placement=NULL");
}

?>
