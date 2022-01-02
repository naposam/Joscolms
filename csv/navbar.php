<style type="text/css">
    .nav li a:hover{
  background: red!important;
  color: white!important;
}
</style>
  
  <div id="custom-bootstrap-menu" class="navbar navbar-default" role="navigation"  style="background-color: rgba(0,0,0,0.6);">
            <div class="container">
                <div class="navbar-header">
                    <!-- <a  id="logo" class="navbar-brand" href="#"><?php //echo $_SESSION['name']?></a> -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                            class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-menubuilder">
                    <ul class="nav navbar-nav navbar-right">
                      <li ><a href="dashboard.php">Home</a> </li>
                        <li ><a href="index.php">Data Upload</a> </li>
                         <li><a href="courseupload.php">Course Upload</a> </li>
                        <li><a href="course_link_update.php">Course Stream Link</a> </li>
                        <li><a href="selectDeptCourse.php">Register Course</a> </li>
                         <li><a href="records.php">Students</a> </li>
                         <li><a href="teachers.php">Teachers</a> </li>
                        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>