<?php
if(isset($_POST['update'])){
	$email=trim($_POST['email']);
	$gender=trim($_POST['gender']);
	$level=trim($_POST['level']);
	$password=trim($_POST['password']);
	$user_id=trim($_POST['user_id']);

if(!empty($email)&& !empty($gender))
{
   $update="UPDATE teacher_tbl set email='$email' , gender='$gender', password='$password' WHERE tuid='$user_id'";
   if(mysqli_query($conn,$update)){
   	header("location: ../teacherUpdate.php?status=success");

   }else{
   	header("location:../teacherUpdate.php?status=failed_update");
   }
    
	}else{
		header("location:../teacherUpdate.php?status=failed");
	}

}

?>