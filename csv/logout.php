<?php
session_start();
session_destroy();
unset($_SESSION['sess_user_id']);
unset($_SESSION['sess_user_name']);
header("location: login.php");

?>