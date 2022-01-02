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

<?php 
 include ("../connect/ConDb.php");
$courseSelect=mysqli_query($db,"SELECT course_reg.*,coursetbl.course,level_tbl.level FROM course_reg left join coursetbl on course_reg.cid=coursetbl.cid left join level_tbl on course_reg.levelid=level_tbl.lid where course_reg.uid='$uid' and course_reg.deptid='$dept'");
$count=mysqli_num_rows($courseSelect);
?>
	   <!--/. NAV TOP  -->
<?php include ('index_sidebar.php');?>
        <!-- /. NAV SIDE  -->

      
		<div id="page-wrapper" style=" min-height:500px!important;">
		  <div class="header"> 
                        <h1 class="page-header">
                           Course Registered
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li><a href="#">Course</a></li>
					  <li class="active">Data</li>
					</ol> 
									
		</div>
            <div id="page-inner" style=" min-height:700px!important;height: 300px!important">

			<div class="dashboard-cards"> 
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
					
						<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image orange">
						<i class="material-icons dp48">import_export</i>
						</div>
						<div class="ard-stacked orange">
						<div class="card-content">
						<h3>Registered: </h3> 
						</div>
						<div class="card-action">
						<strong><?php echo $count;?></strong>
						</div>
						</div>
						</div>
	 
                    </div>
                    
                    
                    
                </div>
			   </div>
				<!-- /. ROW  --> 
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-10"> 
						<div class="row">

					         <div class="col-xs-12 col-sm-12 col-md-10"> 
							<div class="card-panel text-center ">
											<h4>Registered Courses</h4>
							<div class="table-responsive">
							<table class="table table-bordered " style="color: white;background-color: rgba(0,0,0,0.6); font-size: 16px;">
												<thead>
                                <th>#</th>
                                <th>Course Name</th>
                                <th>Level</th>
                                <th>Date Registered</th>
                                <th>Time Registered</th>
                                 <th>Action</th>
                                  </thead>
                                  <?php
                                 $i=0;
                            while($tRecords=mysqli_fetch_array($courseSelect)){
                            $date=date('Y-m-d', strtotime($tRecords['dor']));
                             $time=date('H:i A',strtotime($tRecords['dor']));
                            $i++;

                                 ?>
                                 <tr>
                                <td><?php echo $i;?></td> 
                                <td><?php echo $tRecords['course'];?></td> 
                                <td><?php echo $tRecords['level']?></td> 
                                <td><?php echo $date;?></td> 
                                <td><?php echo $time;?></td> 
                                <td><a href="registeredCourses.php?id=<?php echo $tRecords['rid'];?>"><i class="fa fa-times" aria-hidden="true"></i></a></td> 	
                                 </tr>

                                 <?php
                             }
                                 ?>
											</table>
                            </div>
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