  <?php session_start();
  $_SESSION['uid'];
    $name=$_SESSION['name'];
    $image=$_SESSION['image'];
    $email=$_SESSION['email'];
    $dept=$_SESSION['dept'];
?>
  <head>
     <style>
         .nav li a:hover{
           color: white!important;
           background:darkorange!important;
         }
     </style> 
  </head>
  <div id="custom-bootstrap-menu" class="navbar navbar-default" role="navigation" style="background-color: rgba(0,0,0,0.6);">
            <div class="container">
                <div class="navbar-header">
                    <a  id="logo" class="navbar-brand" href="#">
                        <?php echo $_SESSION['name'];?></a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                            class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-menubuilder">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="index.php">Exit</a> </li>
                        
                        <!-- <li><a href="change_course.inc.php"><span class="glyphicon glyphicon-eye-open" style="color: red;"></span>Change Course</a></li> -->
                        
                    </ul>
                </div>
            </div>
        </div>