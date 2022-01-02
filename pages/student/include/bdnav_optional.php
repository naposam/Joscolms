    <?php session_start();
date_default_timezone_set('Africa/Accra');
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
  <div id="custom-bootstrap-menu" class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a  id="logo" class="navbar-brand" href="#" style="text-transform: uppercase;"><?php echo $_SESSION['name'];?></a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                            class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-menubuilder">
                    <ul class="nav navbar-nav navbar-right">
                        <li ><a href="index.php"><i class="fa fa-home"></i>Home</a> </li>
                         <li><a href="course_reg.inc_optional.php"><i class="fa fa-circle-o-notch fa-spin fa-1x fa-fw"></i>Course Registered</a> </li>
                        <li><a href="course_view.inc_optional.php"><i class="fa fa-cog fa-spin fa-1x fa-fw"></i>Select Course</a> </li>
                       <!--  <li  id="liRes"><a href="resources.php">Resources</a> </li> -->
                       <!--  <li><a href="assessment.php">Assessments</a> </li>
                        <li  id="liStudents"><a href="students.student.php">Students</a> </li> -->
                        <!-- <li  id="liCourse"><a href="courses.aspx">Change Course</a> </li> -->
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>