<?php
if (!isset($_SESSION)) {
    session_start();
}
session_destroy();
echo "<script> window.location.href='login.html';</script>";
exit();

?>