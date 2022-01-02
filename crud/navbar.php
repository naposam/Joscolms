<style>
.nav li a:hover{
  background: red!important;
  color: white!important;
}
</style>
  <div id="custom-bootstrap-menu" class="navbar navbar-default" role="navigation"  style="background:#000;color:#ffffff;font-weight: bold;font-size: 20px;">
            <div class="container">
                <div class="navbar-header">
                    <!-- <a  id="logo" class="navbar-brand" href="#"><?php //echo $_SESSION['name']?></a> -->
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                            class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-menubuilder">
                    <ul class="nav navbar-nav navbar-right" style="color: white;">
                        <li ><a href="../csv/index.php">Data Upload</a> </li>
                         <li><a href="../csv/courseupload.php">Course Upload</a> </li>
                        <li><a href="../csv/course_link_update.php">Course Stream Link</a> </li>
                        <li><a href="index.php">Teachers</a> </li>
                         <li><a href="student.php">Students</a> </li>
                        <li><a href="../csv/logout.php"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
                    </ul>
                </div>
            </div>
        </div>