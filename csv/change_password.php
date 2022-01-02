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
	mysqli_query($db,"UPDATE student_tbl set password='$password' where suid='$id'");
	header("location: manage_student_password.php?status=change");
	
}else{
	header("location: manage_password.php?status=notMatch");
	}
}else{
header("location: manage_password.php?status=required");
}
}
?>