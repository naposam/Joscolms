<!-- <?php //include 'inc/header.php'; ?> -->
 <?php
	//Session::checkLogin();
?>
<head>

    <meta charset="utf-8" />
    
 <link rel="shortcut icon" type="image/ico" href="img/logo.jpg"/>
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

     <!-- <style type="text/css">
         hr.line{
            border: 1px solid white;
         }
        
     </style> -->
	<style type="text/css">
     .nav li a:hover{
             color:white!important;
             background: red!important;
         }
		body{
			background-color: black;
			margin:0;
			padding: 0;
			height: 100vh

		}
      #particles-js{
      	position: absolute;
        left: 0px;
         top: 0px;
         right: 0px;
        z-index: -1;
      	background-color: black;
      	width: 100%;
      }

		body {
  overflow: hidden
}

.box {
    margin: 0 auto;
    position: relative;
    color: #feb090;
    width: 570px;
    height: 50px;
    font-size: 2rem;
    box-sizing: border-box;
}
.box-inner {
    position: relative;
}

.box-next {
    opacity: 0;
    transition: all 1s ease;
    font-size: inherit
}

.box > div > span, .box > span {
    display: block;
    transition: all 1s ease;
    position: absolute;
    top:0px;
    left: 0;
    width: 100%;
    height: 100%;
}

.box > div > span {
    top:7px;
}

.box > div > span:not(:first-child) {
    opacity: 0;
}

.box > div > span.hover-me {
    transition-duration: .1s;
}

.box > span.l-top, .box > span.l-bottom {
    border-top: 2px solid #b17b64;
    transform: scale(0, 1);
    transform-origin: left;
    transition-duration: .2s
}

.box > span.l-left, .box > span.l-right {
    border-left: 2px solid #b17b64;
    transform: scale(1, 0);
    transform-origin: top;
    transition-duration: .3s
}

.box > span.l-bottom {
    top: 48px;
    transition-delay: .5s
}

.box > span.l-right {
    left: 568px;
    transition-delay: .5s
}

.box:hover > span.l-top, .box:hover > span.l-left, .box:hover > span.l-bottom, .box:hover > span.l-right {
    opacity: 1;
    transform: scale(1, 1);
     cursor: pointer;
}

.box:hover > div > span.hover-me {
    left: -150px;
    opacity: 0;
    cursor: pointer;
}

.box:hover > div > span.hi {
    opacity: 1;
    left: 14px;
     cursor: pointer;
}

.box:hover > div > span.message {
    opacity: 1;
    left: 65px;
    transition-delay: .25s;
    transition-duration: .2s;
     cursor: pointer;
}

body > div.box:first-child:after {
    content: '\25bc';
    position:absolute;
    left: 47%;
    top: 50px;
    opacity: 0;
    transition: all .2s ease;
}

body > div.box:first-child:hover:after {
    opacity: 1;
}

.box:hover + div.box-next {
    opacity: 1;
    margin-top: 32px
}



	</style>
</head>
<body >
  
    <div id="custom-bootstrap-menu" class="navbar navbar-default" role="navigation" style="background-color: rgba(0,0,0,0.8);">
            <div class="container">
                <div class="navbar-header">
                    <a  id="logo" class="navbar-brand" href="#">JOSCO COURSE WARE</a>
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder">
                        <span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span
                            class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse navbar-menubuilder" style="font-size: 18px;">
                    <ul class="nav navbar-nav navbar-right">
                       <!--  <li ><a href="index.php"><span><i class="glyphicon glyphicon-home"></i></span> Home</a> </li> -->
                         <!-- <li><a href="stu_index.php"><span><i class="glyphicon glyphicon-education"></i></span> Student Registration</a> </li> -->
                          <!-- <li><a href="staffid.php"><span><i class="glyphicon glyphicon-education"></i></span>Staff Registration</a> </li> -->
                        <!--<li><a href="Quiz_Quiz/index.php"><span><i class="glyphicon glyphicon-pencil"></i></span> Take Quiz</a> </li>-->
                        <!-- <li><a href="main.php"><span><i class="glyphicon glyphicon-log-in"></i></span> Login</a> </li>
                        <li><a href="csv/login.php"><span><i class="glyphicon glyphicon-log-in"></i></span>Admin Login</a> </li> -->

                         <li><a href="index.php"><span><i class="glyphicon glyphicon-help"></i></span>Back</a> </li>
                    </ul>
                </div>
            </div>
        </div>
	<div id="particles-js"></div>
	
<div class="main">


	
	<div class="">
	<div class="box">
    <span class="l-top"></span>
    <span class="l-left"></span>
    <div class="box-inner">
      <span class="hover-me">INSTRUCTIONS</span>
      <span class="hi">Hi!</span>
      <span class="message" >Read The Instructions carefully &#8609 </span>
    </div>
    <span class="l-right"></span>
    <span class="l-bottom"></span>
</div>
<div class="box box-next">
   <ol>
   	<li>Register with your fullname, email, password and username</li>
   	<li>One email cannot be registered more than one</li>
   	<li>You have 60 seconds to answer one question</li>
   	<li>The system will skip to the next question after 60 seconds if not answer</li>
   	<li>The system save scores automatically</li>
   	<li>You can view score history any time you log into the system</li>
   	
   </ol>
</div>
	</div>	
</div>

 <?php include 'pages/include/footer.php'; ?>

<script type="text/javascript" src="particles/particles.js"></script>
<script type="text/javascript" src="particles/app.js"></script>
</body>