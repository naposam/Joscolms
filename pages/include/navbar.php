 <?php 
 session_start();
$uid=$_SESSION['uid'];
$dept=$_SESSION['dept'];
include ('../connect/ConDb.php');
$getOline=mysqli_query($db,"SELECT * FROM `course_reg` where uid='$uid'");
$getData=mysqli_fetch_array($getOline);
$tlevel=$getData['levelid'];
$tcid=$getData['levelid'];
if(isset($_SESSION['viewID'])):
    $course_ud=$_SESSION['viewID'];
$myd=mysqli_query($db,"SELECT student_tbl.*,course_reg_st.cid,coursetbl.course FROM student_tbl left join course_reg_st on student_tbl.suid=course_reg_st.uid left join coursetbl on course_reg_st.cid=coursetbl.cid  where student_tbl.status='1' and  student_tbl.level='$tlevel' and course_reg_st.cid='$course_ud' and student_tbl.dept='$dept'");
$count=mysqli_num_rows($myd);
endif;

if(isset($_SESSION['viewID'])):
    $course_ud=$_SESSION['viewID'];
$c=mysqli_query($db,"SELECT student_tbl.*,course_reg_st.cid,coursetbl.course FROM student_tbl left join course_reg_st on student_tbl.suid=course_reg_st.uid left join coursetbl on course_reg_st.cid=coursetbl.cid  where student_tbl.status='0' and student_tbl.level='$tlevel' and course_reg_st.cid='$course_ud' and student_tbl.dept='$dept'");
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
                        <li ><a href="home.php">Live Lesson</a> </li>
                         <li><a href="forum.php">Forum</a> </li>
                        <li><a href="lessons.php">Lessons</a> </li>
                        <li  id="liRes"><a href="resources.php">Resources</a> </li>
                        <li><a href="assessment.php">Assessments</a> </li>
                        <li  id="liStudents"><a href="records.php">Students</a> </li>
                        <li  id="liCourse"><a href="submittedassessment.php">Assignment</a> </li>
                         <li  id="liCourse"><a href="student_scoretb.php">Upload</a> </li>
                        <li><a href="#"><span class="glyphicon glyphicon-eye-open" style="color: lightgreen;"></span> <?php echo $count;?></a></li>
                        <li><a href="#"><i class="fa fa-users" aria-hidden="true"></i> <?php echo $count1;?></a></li>
                        <!-- <li><a href="included/records.php"><span class="glyphicon glyphicon-plus" style="color: skyblue;"></span>Course</a></li> -->
                        <li><a href="change_course.inc.php"><i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>Change</a></li>
                        <li><a href="index.php"><i class="fa fa-cog fa-spin fa-1x fa-fw"></i></span>Settings</a></li>
                    </ul>
                </div>
            </div>
        </div>