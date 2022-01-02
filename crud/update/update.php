<?php
if(isset($_POST['update'])){
	$email=trim($_POST['email']);
	$gender=trim($_POST['gender']);
	$level=trim($_POST['level']);
	$password=trim($_POST['password']);
	$user_id=trim($_POST['user_id']);

if(!empty($email)&& !empty($gender))
{
   $update="UPDATE users set email='$email' , gender='$gender', password='$password', level='$level' WHERE user_id='$user_id'";
   if(mysqli_query($conn,$update)){
   	header("location: ../index.php?status=success");

   }else{
   	header("location:../index.php?status=failed_update");
   }
    
	}else{
		header("location:../index.php?status=failed");
	}

}

?>