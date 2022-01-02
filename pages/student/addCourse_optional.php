<?php
include 'connect/ConDb.php';
if(isset($_POST['add'])){

	  $course = $_POST['course'];
	  $uid = $_SESSION['uid'];
	  // $dept = $_SESSION['dept'];
	  $lid = $_SESSION['level'];
$reultSet=mysqli_query($db,"SELECT * FROM reg_opttbl where course_code='$course' and uid='$uid'");
	 $count=mysqli_num_rows($reultSet);
	 if($count==0){
mysqli_query($db,"INSERT INTO reg_opttbl(course_code,level,uid) VALUES('$course','$lid','$uid')");
$cid = mysqli_insert_id($db);
mysqli_query($db," UPDATE course_reg_st SET status='1' WHERE rid='$cid'");
header("location: course_reg.inc_optional.php?message=success");
}else{
	header("location: course_reg.inc_optional.php?status=error");
}

}
