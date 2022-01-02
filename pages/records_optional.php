<!DOCTYPE html>  
 <html>  
      <head>  
           <title>Student</title> 
            <link rel="icon" href="img/logo.jpg" type="image/icon" sizes="16x16"> 
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <script src="https://use.fontawesome.com/2199ab073c.js"></script>
           <script src="../dist/js/jquery-2.1.4.js"></script>
           <script src="../dist/js/bootstrap.min.js"></script>  
 
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
                    <a  id="logo" class="navbar-brand" href="#" style="color: white;"><?php echo $_SESSION['name']?>(<?php if(isset($_SESSION['courseName'])) echo $_SESSION['courseName'];?>)</a>
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
                        <!-- <li  id="liCourse"><a href="submittedassessment.php">Assignment</a> </li>
                         <li  id="liCourse"><a href="student_scoretb.php">Upload</a> </li> -->
                        <li><a href="#"><span class="glyphicon glyphicon-eye-open" style="color: lightgreen;"></span> <?php echo $count;?></a></li>
                        <li><a href="#"><span class="glyphicon glyphicon-plane" style="color: skyblue;"></span> <?php echo $count1;?></a></li>
                        <!-- <li><a href="records.php"><span class="glyphicon glyphicon-plus" style="color: skyblue;"></span>Course</a></li> -->
                        <li><a href="change_course.inc.php"><i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>Change</a></li>
                        <li><a href="index.php"><i class="fa fa-cog fa-spin fa-1x fa-fw"></i></span>Settings</a></li>
                    </ul>
                </div>
            </div>
        </div> 
      <body style="background:url(img/colorful.jpg);">  
           <br /><br />  
           <div class="container">  
                <h3 align="center"></h3><br />  
                <div class="table-responsive" id="pagination_data">  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      load_data();  
      function load_data(page)  
      {  
           $.ajax({  
                url:"pagination_optional.php",  
                method:"POST",  
                data:{page:page},  
                success:function(data){  
                     $('#pagination_data').html(data);  
                }  
           })  
      }  
      $(document).on('click', '.pagination_link', function(){  
           var page = $(this).attr("id");  
           load_data(page);  
      });  
 });  
 </script>  