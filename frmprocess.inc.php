<?php
//for teacher form registration
session_start();
include ("connect/ConDb.php");
ob_start();
if(isset($_POST['btnSubmit'])){
	$fname=trim(ucfirst($_POST['fname']));
	$lname=trim(ucfirst($_POST['lname']));
	$gender=trim($_POST['gender']);
	$mname=trim($_POST['mname']);
	$staff_id=trim($_POST['staff_id']);
	$email=trim($_POST['email']);
	$dept=trim($_POST['dept']);
	$pass=trim($_POST['password']);
	$conPass=trim($_POST['conPass']);
	$target='profile_pics/'.$_FILES['image']['name'];
    $image=$_FILES['image']['name'];

  if (filter_var($email, FILTER_VALIDATE_EMAIL)){

 $check=mysqli_query($db,"SELECT * FROM teacher_tbl where email='$email' and staff_id='$staff_id'");
 $count=mysqli_num_rows($check);
 if($count==0){

//insert after image upload
if(move_uploaded_file($_FILES['image']['tmp_name'],$target )){ 
$saveQuery = "INSERT into teacher_tbl(fname,mname,lname,gender,email,staff_id,dept,image,password)values('$fname','$mname','$lname','$gender','$email','$staff_id','$dept','$image','$pass')";

 

if(mysqli_query($db,$saveQuery)){
	$teacerUid = mysqli_insert_id($db);
	$_SESSION['teacherUid']=$teacerherUid;
	

	header("location: main.php?status=success");
}
}
}else{
	header("location: treg.php?status=error");
}
}else{
header("location: treg.php?email=invalidEmail");
}
}
ob_end_flush();
?>