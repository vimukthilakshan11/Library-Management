
<?php
require_once('database/dbConnect.php');
  $db = new dbconnect();

  $query = "UPDATE `book` SET `bookName`='aaa',`author`='bbb',`price`='1050',`edition`='7',`date`='2000/04/11',`note`='cv',`activeStatus`='active' WHERE id='2'";
    $db->insertIntoDb($query);
?>