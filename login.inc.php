 <?php
session_start();
include ('connect/ConDb.php');
if(isset($_POST['btnLogin'])){
 $username=trim($_POST['username']);
 $pass=trim($_POST['password']);

 $query="SELECT * FROM teacher_tbl where email='$username' AND password='$pass'";
 $result=mysqli_query($db,$query);
 if(mysqli_num_rows($result)==1){
 	$row=mysqli_fetch_array($result);
 	//start here
 	if($row['active']==='1'){
 	$_SESSION['uid']=$row['tuid'];
 	$_SESSION['name']=$row['fname'].' '.$row['lname'];
 	$_SESSION['image']=$row['image'];
 	$_SESSION['email']=$row['email'];
 	$_SESSION['dept']=$row['dept'];
 	$_SESSION['last_login_time_teacher']= time();
 	//$lgid=$row['user_id'];
 	//resigning
 	$email=$_SESSION['email'];
 	$name=$_SESSION['name'];
 	$image=$_SESSION['image'];
 	$session_id=$_SESSION['uid'];
 header('location: pages/index.php');
 //activate this later
 }else{
 $_SESSION['fuid']=$row['tuid'];
 header('location: pages/fChange.php');	
 }	
 }else{
 $query="SELECT * FROM student_tbl where index_number='$username' AND password='$pass'";
 $result=mysqli_query($db,$query);
 if(mysqli_num_rows($result)==1){
 	$row=mysqli_fetch_array($result);
 	//start here
 	if($row['active']==='1'){
 	if($row['account']==='0'){
 	$_SESSION['uid']=$row['suid'];
 	$_SESSION['name']=$row['fname'].' '.$row['lname'];
 	$_SESSION['level']=$row['level'];
 	$_SESSION['image']=$row['image'];
 	$_SESSION['index_number']=$row['index_number'];
 	$_SESSION['dept']=$row['dept'];
 	$_SESSION['last_login_time_student']= time();
 	$lgid=$row['suid'];
 	//resigning
 	$email=$_SESSION['email'];
 	$name=$_SESSION['name'];
 	$image=$_SESSION['image'];
 
 	$level=$_SESSION['level'];
 	$session_id=$_SESSION['uid'];
 	mysqli_query($db,"UPDATE student_tbl set status='1' where suid='$lgid'");
 	
 header('location: pages/student/index.php');
 //activate this later
 }else{
 header("location: main.php?status=Block");	
 }	

 }else{
 $_SESSION['duid']=$row['suid'];
 header('location: pages/iChange.php');	
 }	
 
 }else{
 	header("location: main.php?status=error");
 }

}
}
?>