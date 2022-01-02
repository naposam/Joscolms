<head>
  <link rel="icon" href="img/logo.jpg" type="image/icon" sizes="16x16">
</head>
<?php
include ("../connect/ConDb.php");
 if(isset($_GET['pid'])){
 $id=$_GET['pid'];
$rs=mysqli_query($db,"SELECT * FROM option_tbl where id='$id'");
$row=mysqli_fetch_array($rs);
$course=$row['course'];
}

if(isset($_POST['btnUpdate'])){
	 $id=$_GET['pid'];
	$edit=$_POST['update'];
	if(!empty($edit)){
  
	mysqli_query($db,"UPDATE option_tbl set course='$edit' where id='$id'");
	header("location: optional_courses_list.php?status=change");
}else{
header("location: courseUpdate.php?status=required");
}
}
?>