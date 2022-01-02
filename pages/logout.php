<?php
session_start();
include '../connect/ConDb.php';
if(isset($_SESSION['uid'])){
	$user_id=$_SESSION['uid'];
mysqli_query($db,"UPDATE teacher_tbl set status='0' where tuid='$user_id'");
}
session_destroy();
header("location: ../main.php");

?>