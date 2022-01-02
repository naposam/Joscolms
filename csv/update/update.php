<?php
if(isset($_POST['update'])){
	
	$gender=trim($_POST['gender']);
	$password=trim($_POST['password']);
	$user_id=trim($_POST['user_id']);

if(!empty($password)&& !empty($gender))
{
   $update="UPDATE student_tbl set  gender='$gender', password='$password' WHERE user_id='$user_id'";
   if(mysqli_query($conn,$update)){
   	header("location: ../records.php?status=success");

   }else{
   	header("location:../records.php?status=failed_update");
   }
    
	}else{
		header("location:../records.php?status=failed");
	}

}

?>