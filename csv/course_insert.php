<?php
  include ('../connect/ConDb.php');
if(isset($_POST['submit'])){
	$a=$_POST['course'];
	$b=$_POST['led'];
	$c=$_POST['dept'];

	if(!empty($a) && !empty($b) && !empty($c)){
	$found=mysqli_query($db,"SELECT * FROM course_select_tbl WHERE cid='$a' and levid='$b' and deid='$c'");
	$count=mysqli_num_rows($found);
	if($count<1){
	$query="INSERT INTO course_select_tbl(cid,deid,levid)VALUES('$a','$c','$b')";
	if(mysqli_query($db,$query)){
	header("location: selectDeptCourse.php?status=success");	
}else{
	header("location: selectDeptCourse.php?status=Error");
}
	
    }else{
    	header("location: selectDeptCourse.php?status=found");
    }
	}else{
	header("location: selectDeptCourse.php?status=error");
	}
}


?>