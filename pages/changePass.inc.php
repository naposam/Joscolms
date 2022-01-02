<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>LMS</title> 
    <link rel="icon" href="img/logo.jpg" type="image/icon" sizes="16x16">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="assets/materialize/css/materialize.min.css" media="screen,projection" />
    <!-- Bootstrap Styles-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FontAwesome Styles-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- Morris Chart Styles-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
    <!-- Custom Styles-->
    <link href="assets/css/custom-styles.css" rel="stylesheet" />
    <!-- Google Fonts-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="assets/js/Lightweight-Chart/cssCharts.css"> 
</head>

<body style="background:url(img/colorful.jpg);">
    <div id="wrapper">
    <!-- header -->
<?php include ('index_header.php');?>
<?php
if(! isset($_SESSION['uid'])){
    header("location: ../main.php");
 }else{
 	if((time()-$_SESSION['last_login_time_teacher'])>1800){
    header("location: logout.php");
}else{
 
?>
	   <!--/. NAV TOP  -->
<?php include ('index_sidebar.php');?>
        <!-- /. NAV SIDE  -->
      
		<div id="page-wrapper" style=" min-height:500px!important;">
		  <div class="header"> 
                        <h1 class="page-header">
                           Change Password
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li><a href="#">Change</a></li>
					  <li class="active">Data</li>
					</ol> 
									
		</div>
            <div id="page-inner" style=" min-height:700px!important;height: 300px!important">

			<div class="dashboard-cards"> 
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
					
						<?php
					 include ("../connect/ConDb.php");
                   if(isset($_POST['change'])){
                   	 $pass=$_POST['pass'];
                   	 $pass1=$_POST['conpass'];
                   	 if($pass===$pass1){
                   	$query="UPDATE teacher_tbl SET password='$pass' where tuid='$uid'";
                   	if(mysqli_query($db,$query)){
                   		header("location: changePass.inc.php?status=success");
                   	}

                   	 }else{
                   	 	header("location: changePass.inc.php?status=NotMatch");
                   	 }
                   }

						?>
	 
                    </div>
                    
                    
                    
                </div>
			   </div>
				<!-- /. ROW  --> 
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-10 "> 
						<div class="row">
							<div class="col-xs-12 col-sm-6 col-md-2">
							</div>

					         <div class="col-xs-12 col-sm-12 col-md-10 "> 
										<div class="card-panel text-center">
											<h4>Password</h4>
							<form method="post" autocomplete="off">
								<input type="password" name="pass" class="form-control" placeholder="New Password" required="" minlength="8">
								<input type="password" name="conpass" class="form-control" placeholder="Re-Type Password" required="" minlength="8">
								<input type="submit" name="change" value="Change">
							</form>

										</div>
								</div>								
					</div><!--/.row-->
						
					</div>
					
		 
				
			 
				
				
                
				 	
                <!-- /. ROW  -->
 </div>
	   
				
				
				
                
                <!-- /. ROW  -->
			   
				<?php include ('include/footer.php')?>
           
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <!-- JS Scripts-->
    <!-- jQuery Js -->
    <script src="assets/js/jquery-1.10.2.js"></script>
	
	<!-- Bootstrap Js -->
    <script src="assets/js/bootstrap.min.js"></script>
	
	<script src="assets/materialize/js/materialize.min.js"></script>
	
    <!-- Metis Menu Js -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- Morris Chart Js -->
    <script src="assets/js/morris/raphael-2.1.0.min.js"></script>
    <script src="assets/js/morris/morris.js"></script>
	
	
	<script src="assets/js/easypiechart.js"></script>
	<script src="assets/js/easypiechart-data.js"></script>
	
	 <script src="assets/js/Lightweight-Chart/jquery.chart.js"></script>
	
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script> 
 
<?php
}
}
?>

</body>

</html>