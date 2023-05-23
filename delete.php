<?php
require_once('database/dbConnect.php');
if (!isset($_SESSION)) {
  session_start();
}
if(!isset($_SESSION['username'])){

  echo "<script> window.location.href='login.html';</script>";
  exit();
}




$btnValue = $_GET['id'];

    $db = new dbconnect();
    $query = "UPDATE `book` SET `Status` = 0 WHERE `id` = '".$btnValue."'";
      $db->insertIntoDb($query);
      echo "<script> window.location.href='deletebook.php';</script>";

?>