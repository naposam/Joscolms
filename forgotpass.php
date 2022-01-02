<head>
  <link rel="icon" href="img/logo.jpg" type="image/icon" sizes="16x16">
</head>
<?php
include ("connect/ConDb.php");
if(isset($_POST['changePass'])){
	$user=$_POST['email'];
	$password=$_POST['password'];
	$conPas=$_POST['conpassword'];
	if(!empty($user) && !empty($password) && !empty($conPas)){
  if($password===$conPas){
	$select=mysqli_query($db,"SELECT * FROM users where email='$user' ");
	$count=mysqli_num_rows($select);
	if($count=='1'){
		$row=mysqli_fetch_array($select);
		$user_id=$row['user_id'];
		$email=$row['email'];
	mysqli_query($db,"UPDATE users set password='$password' where user_id='$user_id'");
	header("location: main.php?status=change");
	}else{
		header("location: forgot_password.php?status=failed");
	}
}else{
	header("location: forgot_password.php?status=notMatch");
	}
}else{
header("location: forgot_password.php?status=required");
}
}
?>