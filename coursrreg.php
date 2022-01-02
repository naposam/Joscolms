<?php 
//for course registration by student
session_start();
$uid = $_SESSION['uid'];
include 'connect/ConDb.php';

if (isset($_POST['add'])) {
	
	$course = $_POST['course'];
$reultSet=mysqli_query($db,"SELECT * FROM course_reg where cid='$course' and uid='$uid'");
$count=mysqli_num_rows($reultSet);
	 if($count==0){
mysqli_query($db,"INSERT INTO course_reg(cid,uid)VALUES('$course','$uid')");

}else{
	header("location: course.php?status=error");
}
}
?>