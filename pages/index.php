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
     <link rel="stylesheet" type="text/css" href="../message/css/toastr.min.css"> 
</head>

<body style="background:url(img/colorful.jpg);">
    <div id="wrapper" >
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
<?php
 include ("../connect/ConDb.php");
$a=mysqli_query($db,"SELECT * FROM `course_select_tbl` where deid='$dept'");
$countVailable=mysqli_num_rows($a);
$b=mysqli_query($db,"SELECT * FROM `course_reg` where uid='$uid'");
$countRegistered=mysqli_num_rows($b);

$c=mysqli_query($db,"SELECT count(*) as ftotal FROM `student_tbl` where dept='$dept' and gender='Female'");
$countFemale=mysqli_num_rows($c);
$row_c=mysqli_fetch_array($c);
$ftotal=$row_c['ftotal'];
$d=mysqli_query($db,"SELECT count(*) as mtotal FROM `student_tbl` where dept='$dept' and gender='Male'");
$countmale=mysqli_num_rows($d);
$row_d=mysqli_fetch_array($d);
$mtotal=$row_d['mtotal'];

$e=mysqli_query($db,"SELECT count(*) as total FROM `student_tbl` where dept='$dept'");
$count=mysqli_num_rows($e);
$row_e=mysqli_fetch_array($e);
$total=$row_e['total'];

$perM=($mtotal/100)*$total;
$perF=($ftotal/100)*$total;


?>
	   <!--/. NAV TOP  -->
<?php include ('index_sidebar.php');?>
        <!-- /. NAV SIDE  -->
      
		<div id="page-wrapper" style=" min-height:500px!important;">
		  <div class="header" > 
                        <h1 class="page-header">
                            Dashboard
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li><a href="#">Dashboard</a></li>
					  <li class="active">Data</li>
					</ol> 
									
		</div>
            <div id="page-inner" style=" min-height:700px!important;height: 300px!important">

			<div class="dashboard-cards"> 
                <div class="row">
                 <div class="col-xs-12 col-sm-6 col-md-3">
					
						<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image red">
						<i class="material-icons dp48">shopping_cart</i>
						</div>
						<div class="card-stacked red">
						<div class="card-content">
						<h3><?php echo $countVailable;?></h3> 
						</div>
						<div class="card-action">
						<strong>Availabe Course</strong>
						</div>
						</div>
						</div> 
                    </div>
                       <div class="col-xs-12 col-sm-6 col-md-3">
					
						<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image orange">
						<i class="material-icons dp48">import_export</i>
						</div>
						<div class="card-stacked orange">
						<div class="card-content">
						<h3><?php echo $countRegistered;?></h3> 
						</div>
						<div class="card-action">
						<strong>Registered</strong>
						</div>
						</div>
						</div>
	 
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
					
							<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image blue">
						<i class="material-icons dp48">supervisor_account</i>
						</div>
						<div class="card-stacked blue">
						<div class="card-content">
						<h3><?php echo $countFemale;?></h3> 
						</div>
						<div class="card-action">
						<strong>Female Students</strong>
						</div>
						</div>
						</div> 
						 
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
					
					<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image green">
						<i class="material-icons dp48">supervisor_account</i>
						</div>
						<div class="card-stacked green">
						<div class="card-content">
						<h3><?php echo $countmale;?></h3> 
						</div>
						<div class="card-action">
						<strong>Male Students</strong>
						</div>
						</div>
						</div> 
						 
                    </div>

                </div>
			   </div>
				<!-- /. ROW  --> 
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12"> 
					<div class="cirStats">
						  	<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-4"> 
										<div class="card-panel text-center">
											<h4>Female</h4>
											<div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $perF;?>" ><span class="percent"><?php echo $perF;?>%</span>
											</div> 
										</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-4"> 
										<div class="card-panel text-center">
											<h4>Male</h4>
											<div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $perM;?>" ><span class="percent"><?php echo $perM;?>%</span>
											</div>
										</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-4"> 
									<a href="newStudents.php" style="text-decoration: none;">
										<div class="card-panel text-center">
											<h4>Total Student</h4>
											<div class="easypiechart" id="easypiechart-red" data-percent="0" ><span class="percent"><?php echo $total;?></span>
											</div>
										</div>
									</a>
								</div>
								  
								  
							</div>
						</div>							
						</div><!--/.row-->
						
					</div>
					
		 
				
			 
				
				
                
				 	
                <!-- /. ROW  -->

	   
				
				
				
                
                <!-- /. ROW  -->
			   
				
            </div>
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