<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	  <link rel="icon" href="../img/logo.jpg" type="image/icon" sizes="16x16">
	 <meta charset="utf-8">
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/ico" href="../img/favicon.ico"/>
    <meta name="description" content="Coming soon, Bootstrap, Bootstrap 3.0, Free Coming Soon, free coming soon, free template, coming soon template, Html template, html template, html5, Code lab, codelab, codelab coming soon template, bootstrap coming soon template">
    <title>Upload Data Files</title>

    <script type="text/javascript" src="../dist/js/jquery-ui.js"></script>
    <script type="text/javascript" src="../dist/js/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="../dist/js/jquery.js"></script>
    <script type="text/javascript" src="../dist/js/bootstrap.js"></script> 
    <link rel="stylesheet" type="text/css" href="message/css/toastr.min.css">
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../message/css/toastr.min.css">
    <link href="../dist/css/my_style.css" rel="stylesheet" type="text/css" />
    <link href="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
    <!-- <link href="../dist/css/font-awesome.css" rel="stylesheet" type="text/css" /> -->
   <!--  <link rel="stylesheet" href="css/font-awesome.min.css"> -->
   <style type="text/css">
   	#mainmain {
	margin: 50px auto;
	text-align: center;
	width: 980px;
}
#mainmain a {
	text-decoration: none;
	padding-top:15px;
	padding-bottom:5px;
	padding-left:15px;
	padding-right:15px;
	border-radius:10px;
	margin:10px;
	box-shadow:0 5px 5px 2px #484848;
	-moz-box-shadow:0 5px 5px 2px #484848;
	-webkit-box-shadow:0 5px 5px 2px #484848;
	border:1px solid #000;
	background: #fff;
	color: #222222;
	font-size:20px;
	display: inline-block;
	width: 265px;
	height: 85px;
	text-align: center;
	margin-bottom: 5px;
}
body{
	background: #8E2DE2;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #4A00E0, #8E2DE2);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #4A00E0, #8E2DE2); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}
   </style>

</head>
<body>
	 <?php
	if (! isset ($_SESSION['sess_user_id'])) {
	 header("location: login.php");
	} else {
if((time()-$_SESSION['last_login_time'])>1800){
    header("location: logout.php");
}else{

         ?>
<?php include ('topnav.php');?>


<div class="container">


<div id="mainmain">
<div class="row">
<div class="col-md-12 col-sm-12">
<a href="index.php" ><i class="icon-cloud-upload icon-2x"></i><br>Upload Student Data</a>               
<a href="loadTeacherData.php" style="background:#FF0099;color: #ffffff;"><i class="icon-archive icon-2x"></i><br>Upload Teacher Data</a>               
<a href="ass_all_new.php" style="background:#990033;color: #ffffff;"><i class="icon-plus-sign icon-2x"></i><br>All Assignment</a>      
<a href="optional_courses_list.php" style="background:#3333FF;color: #ffffff;"><i class="icon-list icon-2x"></i><br>Optional Courses</a>     
<a href="teachers.php" style="background:red;color: #ffffff;"><i class="icon-book icon-2x"></i><br> Manage Teacher</a>     
<a href="records.php" style="background:violet;color: #ffffff;"><i class="icon-bar-chart icon-2x"></i><br> Manage Student</a>
<a href="courseupload.php"  style="background:slateblue;color: #ffffff;"><i class="icon-upload-alt icon-2x"></i><br>Course Upload</a>               
<a href="course_link_update.php" style="background:#999933;color: #ffffff;"><i class="icon-lightbulb icon-2x"></i><br>Course Stream Link</a>               
<a href="selectDeptCourse.php" style="background:#0000FF;color: #ffffff;"><i class="icon-list-alt icon-2x"></i><br>Register Courses</a>      
<a href="list_courses.php" style="background:#6D4C41;color: #ffffff;"><i class="icon-bar-chart icon-2x"></i><br>List Of Courses</a>     
<a href="courseupload_optional.php" style="background:#FF6633;color: #ffffff;"><i class="icon-cloud-upload icon-2x"></i><br>Upload Optional Courses</a>     
<a href="Dept_courses.php" style="background:#336633;color: #ffffff;"><i class="icon-bar-chart icon-2x"></i><br>Departmental Courses</a>
<a href="manage_student_password.php" style="background:#FFE300;color: #ffffff;"><i class="icon-book icon-2x"></i><br>Student Passwords</a>
<a href="manage_teacher_password.php" style="background:#6D4C41;color: #ffffff;"><i class="icon-lock icon-2x"></i><br>Teacher Passwords</a>
<a href="gallery.php" style="background:#6D4C41;color: #ffffff;"><i class="icon-picture icon-2x"></i><br>Pictures</a>
<a href="all_resources.php" style="background:#4EDEF4;color: white;"><i class="icon-file icon-2x"></i><br>All Resources</a>	
<!-- <a href="https://meet.google.com/" style="background:#6D4C41;color: #ffffff;"><i class="icon-picture icon-2x"></i><br>Google Meet</a> -->

<!-- <div class="TN bzz aHS-YH" style="margin-left:0px"><div class="qj qr"></div><div class="aio UKr6le"><span class="nU false"><a href="https://meet.google.com/new?hs=180&amp;authuser=0" target="_top" class="J-Ke n0" title="Start a meeting" aria-label="Start a meeting" draggable="false"><i class="icon-camera icon-2x"></i><br>Start a meeting</a></span></div><div class="nL aif"></div></div> -->

<a href="logout.php" style="color: red"><i class="icon-power-off icon-2x"></i><br>LogOut</a>	
</div>
</div>
</div>
<?php
 }
 }
 
 ?>
</body>
</html>