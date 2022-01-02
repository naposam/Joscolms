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
    <link rel="stylesheet" type="text/css" href="include/updatepic.css">
</head>

<body style="background:url(img/colorful.jpg);">
    <div id="wrapper">
    <!-- header -->
<?php include ('index_header.php');?>
<?php
if(! isset($_SESSION['uid'])){
    header("location: ../../main.php");
 }else{
 	include ('connect/ConDb.php');
  $image=$_SESSION['image'];
  $id=$_SESSION['uid'];
  $dataSet=mysqli_query($db,"SELECT student_tbl.*,department_tbl.dept_name,level_tbl.level FROM student_tbl LEFT JOIN department_tbl on student_tbl.dept=department_tbl.dept_id left join level_tbl on student_tbl.level=level_tbl.lid where student_tbl.suid='$id'");
   $row=mysqli_fetch_array($dataSet);
   $date=date('Y-m-d', strtotime($row['dor']));
   $time=date('H:i A',strtotime($row['dor']));

?>
	   <!--/. NAV TOP  -->
<?php include ('index_sidebar.php');?>
        <!-- /. NAV SIDE  -->
      
		<div id="page-wrapper" style=" min-height:500px!important;">
		  <div class="header"> 
                        <h1 class="page-header">
                           Profile
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li><a href="#">profile</a></li>
					  <li class="active">Data</li>
					</ol> 
									
		</div>
            <div id="page-inner" style=" min-height:700px!important;height: 300px!important">

			<div class="dashboard-cards"> 
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3">
					
						<div class="card horizontal cardIcon waves-effect waves-dark">
						<div class="card-image red">
						<i class="material-icons dp48">today</i>
						</div>
						<div class="card-stacked red">
						<div class="card-content">
						<h3><?php echo date('Y-m-d'); ?> </h3> 
						</div>
						<div class="card-action">
						
						</div>
						</div>
						</div>
	 
                    </div>
                    
                   <div class="col-xs-12 col-sm-6 col-md-3">
					
						
					<img  class="direct-chat-img" src="../../profile_pics/<?php echo $image;?>" width="120" height="120">
							<!-- <strong><p id="time"></p></strong> -->
						<!-- <h3><?php //echo date('Y-m-d'); ?> </h3>  -->
                    </div> 
                       <?php include ("updatepic.php");?>
                    <div class="col-xs-12 col-sm-6 col-md-3">
					  <form id="frm-image-upload" name='img'
                      method="post" enctype="multipart/form-data">
                     <div class="form-row">
            <div>Choose Image file:</div>
            <div>
                <input type="file" class="file-input" name="file-input">
            </div>
        </div>

        <div class="button-row">
            <input type="submit" id="btn-submit" name="upload"
                value="Upload">
        </div>
    </form>
    <?php if(!empty($response)) { ?>
    <div class="response <?php echo $response["type"]; ?>"><?php echo $response["message"]; ?></div>
    <?php }?>
						
					
                    </div> 
                    
                </div>
			   </div>

				<!-- /. ROW  --> 
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12"> 
						<div class="row">
							<form method="post" autocomplete="off">
								<div class="col-xs-12 col-sm-6 col-md-4"> 
								<div class="card-panel text-center">
											<h4></h4>
								<input type="hidden" name="uid" value="<?php echo $row['tuid'];?>">			
								<input type="text" name="fname" class="control" value="<?php echo $row['fname'];?>" readonly>
								<br>
								<input type="text" name="mname" class="control" value="<?php echo $row['mname'];?>" readonly>
								<br>
								<input type="text" name="lname" class="control"value="<?php echo $row['lname'];?>" readonly>
								<br>
								
							 <input type="submit" name="add" class="btn btn-success" value="Update" disabled="">
                                               
											
										</div>
								</div>	

								<div class="col-xs-12 col-sm-6 col-md-4"> 
								<div class="card-panel text-center">
									<br>
								<input type="text" name="gender" class="control" value="<?php echo $row['gender'];?>">
								<br>
								<input type="email" name="email" class="control" value="<?php echo $row['level'];?>">
								<br>
								<input type="text" name="staff" class="control" value="<?php echo $row['index_number'];?>" readonly>
								<br>
								<input type="text" name="dept" class="control" value="<?php echo $row['dept_name'];?>" readonly>
								
											
										</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-4"> 
								<div class="card-panel text-center">
									<br>
								<input type="password" name="password" class="control" value="<?php echo $row['password'];?>">
								<br>
								<?php if($row['status']=='0'):?>
								<input type="text" class="control" value="Status: ACTIVE"  readonly>
							<?php endif;?>
								<br>
								<input type="text" class="control" value="<?php echo 'Registration Date: '. $date;?>" readonly>
								<br>
								<input type="text"  class="control" value="<?php echo 'Registration Time: '. $time;?>" readonly>
								
											
										</div>
								</div>	
                      </form>
					         								
					</div><!--/.row-->
						
					</div>
					
		 
				
			 
				
				
                
				 	
                <!-- /. ROW  -->

	   
				
				
				
                
                <!-- /. ROW  -->
			   
				<!-- <footer><p>All right reserved. Template by: </p>
				
        
				</footer> -->
            </div>
            <!-- /. PAGE INNER  -->
         <?php include ('../include/footer.php')?>
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
	<script type="text/javascript">
var timestamp = '<?=time();?>';
function updateTime(){
  $('#time').html(Date(timestamp));
  timestamp++;
}
$(function(){
  setInterval(updateTime, 1000);
});
</script>
	
	<script src="assets/js/easypiechart.js"></script>
	<script src="assets/js/easypiechart-data.js"></script>
	
	 <script src="assets/js/Lightweight-Chart/jquery.chart.js"></script>
	
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script> 
 
<?php
}
?>
</body>

</html>