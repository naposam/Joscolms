<?php
session_start();
include 'connect/ConDb.php';
if(isset($_POST['submit'])){
	$staff_id=trim($_POST['staff_id']);
	if(!empty($staff_id)){
    $dataCheck= mysqli_query($db,"SELECT * FROM teacher_tbl where staff_id='$staff_id'");
    $count=mysqli_num_rows($dataCheck);
    if($count==0){
    $select="SELECT * FROM list_staff where staff_id='$staff_id'";
    $dataSet=mysqli_query($db,$select);
   if(mysqli_num_rows($dataSet)==1){
    $row=mysqli_fetch_array($dataSet);
    $fname=$row['fname'];
    $lname=$row['lname'];
    $staff_id=$row['staff_id'];
    //session variable
    $_SESSION['fname']=$fname;
    $_SESSION['lname']=$lname;
    $_SESSION['mname']=$row['mname'];
    $_SESSION['staff_id']=$staff_id;
    header("location: treg.php?status=checked");
  }else{
   header("location: staffid.php?status=staff_error");
  }
}else{
  header("location: staffid.php?status=staff_duplicate");
}
	}else{
		header("location: staffid.php?status=staff_id");
	}
}

?>