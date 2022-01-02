<head>
  <link rel="icon" href="img/logo.jpg" type="image/icon" sizes="16x16">
</head>
<?php
include ("../connect/ConDb.php");
if(isset($_POST['changePass'])){
	 $id=$_GET['pid'];
	$password=$_POST['password'];
	$conPas=$_POST['conpassword'];
	if(!empty($password) && !empty($conPas)){
  if($password===$conPas){
	mysqli_query($db,"UPDATE teacher_tbl set password='$password' where tuid='$id'");
	header("location: manage_teacher_password.php?status=change");
	
}else{
	header("location: manage_password_teacher.php?status=notMatch");
	}
}else{
header("location: manage_password_teacher.php?status=required");
}
}
?>