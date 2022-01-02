        <?php 
      session_start();
    $uid=$_SESSION['uid'];
    $name=$_SESSION['name'];
    $image=$_SESSION['image'];
    $level=$_SESSION['level'];
    $dept=$_SESSION['dept'];
  

        ?>
        <nav class="navbar navbar-default top-navbar" role="navigation" style="background:url(img/colorful.jpg);">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle waves-effect waves-dark" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand waves-effect waves-dark" href="index.php"><i class="large material-icons">LMS</i> <strong></strong></a>
				
		<div id="sideNav" href=""><i class="material-icons dp48">toc</i></div>

            </div>

            <ul class="nav navbar-top-links navbar-right"> 
				
				  <li><a class="dropdown-button waves-effect waves-dark" href="#!" data-activates="dropdown1">
                    <img  class="direct-chat-img" src="../../profile_pics/<?php echo $image;?>" width="20" height="20">
                    <b style="color: #fff"><?php echo $name?></b> <i class="material-icons right">arrow_drop_down</i></a></li>
            </ul>
        </nav>
		<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
<li><a href="profile.php"><i class="fa fa-user fa-fw"></i> My Profile</a>
</li>
<li><a href="course_view.inc.php"><i class="fa fa-gear fa-fw"></i>View Lesson</a>
</li>
<li><a href="changePass.inc.php"><i class="fa fa-lock fa-fw"></i>Change Password</a>
</li> 
<li><a href="logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
</li>
</ul>