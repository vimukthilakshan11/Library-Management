<?php

if (!isset($_SESSION)) {
    session_start();
}

require_once ('database/dbconnect.php');


if(isset($_POST['submit'])){

    $db = new dbConnect();
    $con = $db->getConnection();
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $stmt = $con->prepare("SELECT userName, password FROM user WHERE username=? AND  password=?");
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $stmt->bind_result($username, $password);
    $stmt->store_result();
    if($stmt->num_rows == 1)  //To check if the row exists
        {
            while($stmt->fetch()) //fetching the contents of the row

              {$_SESSION['Logged'] = 1;
               $_SESSION['username'] = $username;


               echo "<script> window.location.href='index.php';</script>";
               exit();
               }
        }
        else {
            echo "<script type='text/javascript'>

      window.alert('INVALID USERNAME/PASSWORD...!')
      
      </script>";

      session_destroy();
      echo "<script> window.location.href='login.html';</script>";
        }
        $stmt->close();
    }
    else 
    {   

    }
    $con->close();


?>