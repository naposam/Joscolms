
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    
 <link rel="shortcut icon" type="image/ico" href="img/logo.jpg"/ >
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Coming soon, Bootstrap, Bootstrap 3.0, Free Coming Soon, free coming soon, free template, coming soon template, Html template, html template, html5, Code lab, codelab, codelab coming soon template, bootstrap coming soon template" />

    <title>Josco Course Ware</title>

    <!-- Start WOWSlider.com HEAD section -->
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <script type="text/javascript" src="engine1/jquery.js"></script>
    <!-- End WOWSlider.com HEAD section -->

    <!-- ============ Add custom CSS here ============ -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/my_style.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/jquery-ui.css" rel="stylesheet" type="text/css" />

    <script src="dist/js/jquery-ui.js"></script>
    <script src="dist/js/jquery-2.1.4.js"></script>
     <script src="dist/js/bootstrap.min.js"></script>

     <style type="text/css">
         hr.line{
            border: 1px solid white;
         }
         .nav li a:hover{
             color:white!important;
             background: red!important;
         }
         #particles-js{
        position: absolute;
        left: 0px;
         top: 0px;
         right: 0px;
        z-index: -1;
        width: 100%;
      }
      .caption a:hover{
         background: red!important;
         color: white!important;
        border-color: green!important;
        transition: 0.6s;  
        /*transform: rotateY(130deg); */
        transform:scale(1.1,1.1);}
     </style>
</head>
<body >
    <!--Navbar-->
    <div id="custom-bootstrap-menu" class="navbar navbar-default" role="navigation" style="background-color: rgba(0,0,0,0.8);">
            <div class="container">
                <div class="navbar-header">
                    <a  id="logo" class="navbar-brand" href="#">JOSCO COURSE WARE:</a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                            class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-menubuilder" style="font-size: 18px;">
                    <ul class="nav navbar-nav navbar-right">
                        <!-- <li ><a href="index.php"><span><i class="glyphicon glyphicon-home"></i></span> Home</a> </li> -->
                         <!-- <li><a href="stu_index.php"><span><i class="glyphicon glyphicon-education"></i></span> Student Registration</a> </li> -->
                          <!-- <li><a href="staffid.php"><span><i class="glyphicon glyphicon-education"></i></span>Staff Registration</a> </li> -->
                        <!--<li><a href="Quiz_Quiz/index.php"><span><i class="glyphicon glyphicon-pencil"></i></span> Take Quiz</a> </li>-->
                        <!-- <li><a href="main.php"><span><i class="glyphicon glyphicon-log-in"></i></span> Login</a> </li>
                        <li><a href="csv/login.php"><span><i class="glyphicon glyphicon-log-in"></i></span>Admin Login</a> </li> -->

                         <li><a href="chatbot/bot.php"><span><i class="glyphicon glyphicon-help"></i></span>Help</a> </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="particles-js"></div>
    <!--End Navbar-->
    <!--Carousel-->
    <div class="container" style="height: 60vh">
      <div class="row">
     <!-- <div class="col-sm-6 col-md-4">
    <div class="thumbnail" style="cursor: pointer;">
      <img src="cards/Student-Registration.png" alt="..." >
      <div class="caption">
        <p></p>
        <p><a href="stu_index.php" class="btn btn-primary" role="button">Student Registration</a> 
        </p>
      </div>
    </div>
  </div> -->
   <div class="col-sm-6 col-md-4">
    <div class="thumbnail" style="cursor: pointer;">
      <img src="cards/login_lock.jpg" alt="...">
      <div class="caption">
        <p></p>
        <p><a href="main.php" class="btn btn-primary" role="button">Login</a> 
        </p>
      </div>
    </div>
  </div>
  <!--  <div class="col-sm-6 col-md-4">
    <div class="thumbnail" style="cursor: pointer;">
      <img src="cards/startregistration1.png" alt="...">
      <div class="caption">
        <p></p>
        <p><a href="staffid.php" class="btn btn-primary" role="button">Staff Registration</a> 
        </p>
      </div>
    </div>
  </div> -->
   <div class="col-sm-6 col-md-4">
    <div class="thumbnail" style="cursor: pointer;">
      <img src="cards/d.jpg" alt="...">
      <div class="caption">
       
        <p><a href="csv/login.php" class="btn btn-primary" role="button">Dashboard</a> 
        </p>
      </div>
    </div>
  </div>
   <!-- <div class="col-sm-6 col-md-4">
    <div class="thumbnail" style="cursor: pointer;">
      <img src="cards/chat.jpg" alt="...">
      <div class="caption">
        
        <p><a href="simplechat/index.php" class="btn btn-primary" role="button">Chat</a> 
        </p>
      </div>
    </div>
  </div> -->
   <div class="col-sm-6 col-md-4">
    <div class="thumbnail" style="cursor: pointer;">
      <img src="cards/learning1.jpg" alt="...">
      <div class="caption">
       
        <p><a href="chatbot/bot.php" class="btn btn-primary" role="button" disable>Help</a> 
        </p>
      </div>
    </div>
  </div>
</div>
    </div>

    <br><br>
    <!--hr-->
   
    <div>
      
    </div>
     <script src="dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="dist/js/jquery.backstretch.js" type="text/javascript"></script>
        <script type="text/javascript">
            'use strict';

            /* ========================== */
            /* ::::::: Backstrech ::::::: */
            /* ========================== */
            // You may also attach Backstretch to a block-level element
            $.backstretch(
            [
               // "img/11.jpg",
                 //"img/000.jpg",
                
                 //"img/34.jpg",
                //"img/24.jpg",
                 //"img/44.jpg",
                //"img/colorful.jpg",
            //    "img/bg.jpg",
                "img/back6.jpg",
              "img/background.jpg",
                 "img/back17.jpg",
                 "img/back18.jpg",
                 "img/back19.jpg",
                  "img/back3.jpg",
                 "img/back8.jpg",
                  
                  "img/back4.jpg",
                 "img/back10.jpg",
                 "img/back11.jpg",
                 "img/back12.jpg",
             "img/back13.jpg",
                 "img/back14.jpg",
                 "img/back15.jpg",
                 "img/back9.jpg",
                 "img/back7.jpg",
               
            ],

            {
                duration: 4000,
                fade: 1500
            }
        );
        </script>
  <script type="text/javascript" src="particles/particles.js"></script>
<script type="text/javascript" src="particles/app.js"></script>
</body>
</html>