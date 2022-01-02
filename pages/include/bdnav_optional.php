  <?php session_start();
$uid=$_SESSION['uid'];
$dept=$_SESSION['dept'];
include ('../connect/ConDb.php');
$getOline=mysqli_query($db,"SELECT * FROM `reg_opttbl`");
$getData=mysqli_fetch_array($getOline);
$tlevel=$getData['level'];
$tcid=$getData['level'];
if(isset($_SESSION['viewID'])):
    $course_ud=$_SESSION['viewID'];
$myd=mysqli_query($db,"SELECT student_tbl.*,reg_opttbl.course_code FROM student_tbl left join reg_opttbl on student_tbl.suid=reg_opttbl.uid  where student_tbl.status='1' and student_tbl.level='$tlevel' and reg_opttbl.course_code='$course_ud' ");
$count=mysqli_num_rows($myd);
endif;

if(isset($_SESSION['viewID'])):
    $course_ud=$_SESSION['viewID'];
$c=mysqli_query($db,"SELECT student_tbl.*,reg_opttbl.course_code FROM student_tbl left join reg_opttbl on student_tbl.suid=reg_opttbl.uid where student_tbl.status='0' and student_tbl.level='$tlevel' and reg_opttbl.course_code='$course_ud'");
$count1=mysqli_num_rows($c);
endif;

  ?>
  <head>
     <style>
         .nav li a:hover{
           color:white!important;
           background: red!important;
         }
         .nav li a{
           color: white!important;
         }

     </style> 
  </head>
  <div id="custom-bootstrap-menu" class="navbar navbar-default" role="navigation"  style="background-color: rgba(0,0,0,0.6);">
            <div class="container">
                <div class="navbar-header">
                    <a  id="logo" class="navbar-brand" href="#"><?php echo $_SESSION['name']?>(<?php if(isset($_SESSION['courseName'])) echo $_SESSION['courseName'];?>)</a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                            class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-menubuilder">
                    <ul class="nav navbar-nav navbar-right">
                        <li ><a href="home_optional.php">Live Lesson</a> </li>
                         <li><a href="forum_optional.php">Forum</a> </li>
                        <li><a href="lessons_optional.php">Lessons</a> </li>
                        <li  id="liRes"><a href="resources_optional.php">Resources</a> </li>
                        <li><a href="assessment_optional.php">Assessments</a> </li>
                        <li  id="liStudents"><a href="records_optional.php">Students</a> </li>
                       <!--  <li  id="liCourse"><a href="submittedassessment.php">Assignment</a> </li>
                         <li  id="liCourse"><a href="student_scoretb.php">Upload</a> </li> -->
                        <li><a href="#"><span class="glyphicon glyphicon-eye-open" style="color: lightgreen;"></span> <?php echo $count;?></a></li>
                        <li><a href="#"><i class="fa fa-users" aria-hidden="true"></i> <?php echo $count1;?></a></li>
                        <!-- <li><a href="included/records.php"><span class="glyphicon glyphicon-plus" style="color: skyblue;"></span>Course</a></li> -->
                        <li><a href="change_course.inc.php"><i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>Change</a></li>
                        <li><a href="index.php"><i class="fa fa-cog fa-spin fa-1x fa-fw"></i>Settings</a></li>
                    </ul>
                </div>
            </div>
        </div>