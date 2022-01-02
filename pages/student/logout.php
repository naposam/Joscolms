
<?php
include 'connect/ConDb.php';
session_start();
   ///$email=$_SESSION['email'];
 	$name=$_SESSION['name'];
 	//$image=$_SESSION['image'];
 	//$course=$_SESSION['role'];
 	$level=$_SESSION['level'];
 	$session_id=$_SESSION['uid'];
mysqli_query($db,"UPDATE student_tbl set status='0' where suid='$session_id'");

session_destroy();
header("location: ../../index.php");;

?>