<?php
session_start();
include 'connect/ConDb.php';
if(isset($_POST['submit'])){
	$index_number=trim($_POST['index_no']);
	if(!empty($index_number)){
   $dataCheck= mysqli_query($db,"SELECT * FROM student_tbl where index_number='$index_number'");
   $count=mysqli_num_rows($dataCheck);
   if($count==0){
    $select="SELECT * FROM `student_list` where index_number='$index_number'";
    $dataSet=mysqli_query($db,$select);
   if(mysqli_num_rows($dataSet)==1){
    $row=mysqli_fetch_array($dataSet);
    $fname=$row['fname'];
    $lname=$row['lname'];
    $mname=$row['mname'];
    $index_number=$row['index_number'];
    //session
    $_SESSION['fname']=$fname;
    $_SESSION['lname']=$lname;
    $_SESSION['mname']= $mname;
    $_SESSION['index_number']=$index_number;
  
    header("location: registration.php?status=checked");
  }else{
   header("location: stu_index.php?status=staff_error");
  }

  }else{
    header("location: stu_index.php?status=indexNo");
  }

	}else{
		header("location: stu_index.php?status=staff_id");
	}

}

?>