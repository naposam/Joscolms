<?php 
 ob_start();
//for course registration by Teacher
// session_start();
$uid = $_SESSION['uid'];
$dept=$_SESSION['dept'];
include '../connect/ConDb.php';

if (isset($_POST['add'])) {
	
	$course = $_POST['course'];
	 $level=$_POST['level'];
$reultSet=mysqli_query($db,"SELECT * FROM course_reg where cid='$course' and uid='$uid'");
$count=mysqli_num_rows($reultSet);
if($count==0){

mysqli_query($db,"INSERT INTO course_reg(cid,deptid,levelid,uid)VALUES('$course','$dept','$level','$uid')");
$cid = mysqli_insert_id($db);
mysqli_query($db," UPDATE course_reg SET status='1' WHERE rid='$cid'");
echo '<script>window.location.href = window.location.href</script>';
//header("location:AddCourses.php?message=success");

}
// else{
// 	header("location: AddCourses.php?status=error");
// }
}
ob_end_flush();
?>