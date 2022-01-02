<?php
  include ('../connect/ConDb.php');
if(isset($_POST['submitLink'])){
	$a=$_POST['course'];
	$b=$_POST['level'];
	$c=$_POST['course_link'];

	if(!empty($c) && !empty($b) && !empty($c)){
	$found=mysqli_query($db,"SELECT * FROM course_link WHERE cid='$a' and level='$b'");
	$count=mysqli_num_rows($found);
	if($count=='0'){
	mysqli_query($db,"INSERT into course_link(cid,level,course_link)VALUES('$a','$b','$c')");
	header("location: course_link_update.php?status=success");
    }else{
    	header("location: course_link_update.php?status=found");
    }
	}else{
	header("location: course_link_update.php?status=error");
	}
}

if(isset($_POST['UpdateLink'])){
	$id=$_GET['id'];
	$d=$_POST['course_link'];
	mysqli_query($db,"UPDATE course_link set course_link='$d' where link_id='$id'");
	header("location: course_link_update.php?status=update");
}
?>