   <?php @session_start()?>
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
                    <a  id="logo" class="navbar-brand" href="#" style="text-transform: uppercase;"><?php echo $_SESSION['name'];?>(<?php if(isset($_SESSION['courseName'])) echo $_SESSION['courseName'];?>)</a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                            class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-menubuilder">
                    <ul class="nav navbar-nav navbar-right">
                        <li ><a href="home.php"><i class="fa fa-circle-o-notch fa-spin fa-1x fa-fw"></i>LIVE LESSON</a> </li>
                         <li><a href="forum.php">FORUM</a> </li>
                        <li><a href="lessons.php">LESSONS</a> </li>
                    <!-- <li  id="liRes"><a href="resources.php">Resources</a> </li> -->
                        <li><a href="assessment.php">Assessments</a> </li>
                       <!--  <li  id="liStudents"><a href="#">Students</a> </li> -->
                <li  id="liCourse"><a href="course_view.inc.php"><i class="fa fa-refresh fa-spin fa-1x fa-fw"></i>Change Course</a> </li>
                  <li  id="liCourse"><a href="student_chat/index.php"><i class="fa fa-comment"></i> Student Chat</a> </li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>