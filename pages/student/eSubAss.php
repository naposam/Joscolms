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
    <script src="https://use.fontawesome.com/2199ab073c.js"></script> 
    <link rel="stylesheet" type="text/css" href="message/css/toastr.min.css">
</head>

<body style="background:url(img/colorful.jpg);">
    <div id="wrapper" >
    <!-- header -->
<?php include ('index_header.php');?>
<?php
if(! isset($_SESSION['uid'])){
    header("location: ../../main.php");
 }else{
 
?>
<?php
 include ("connect/ConDb.php");
$a=mysqli_query($db,"SELECT * FROM `ass_student` where uid='$uid'");
$count=mysqli_num_rows($a);

$result1=mysqli_query($db,"SELECT ass_student.*,coursetbl.course as dcourse FROM ass_student left join coursetbl
 on ass_student.course=coursetbl.cid where ass_student.uid='$uid' and ass_student.dept='$dept'");


if(isset($_GET['id'])){
  $id=$_GET['id'];
  $getFile=mysqli_query($db,"SELECT * FROM ass_student where ass_id='$id'");
  $fileDel=mysqli_fetch_array($getFile);
  $file=$fileDel['file_link'];
  mysqli_query($db,"DELETE FROM ass_student where ass_id='$id'");
  unlink("../../resources/".$file);
 header("location: eSubAss.php?status=info");
}

?>
	   <!--/. NAV TOP  -->
<?php include ('index_sidebar.php');?>
        <!-- /. NAV SIDE  -->
      
		<div id="page-wrapper" style=" min-height:500px!important;">
		  <div class="header" > 
                        <h1 class="page-header">
                            ASSIGNMENT
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li><a href="#">Dashboard</a></li>
					  <li class="active">Data</li>
					  <?php if($count<1):?>
				<marquee><h3 style="text-transform: uppercase;"><?php echo "You have not submited any assignment yet";?></h3></marquee>
				<?php endif;?>		
					</ol> 
             		
		</div>
            <div id="page-inner" style=" min-height:700px!important;height: 300px!important">

		
				<!-- /. ROW  --> 

				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12"> 

                   <div class="card">
                        <div class="card-action">
                             Records
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                               <tr>
                              <th>#</th>
                             <th>Name</th>
                             <th>Date</th>
                              <th>Time</th>
                               <th>Status</th>
                               <th>View</th>
                             <th>Action</th>

                                </tr>
                                    </thead>
                                    <tbody>
                    <?php
                          $i=0; 
                            while ($row1=mysqli_fetch_array($result1)){
                                $i++; 
                               
                               $date=date('Y-m-d', strtotime($row1['dop']));
                                $time=date('H:i A',strtotime($row1['dop']));  
                             ?>
                         <tr class="odd gradeX">
                           <td><?php echo $i;?></td>
                            <td><?php echo $row1['dcourse'];?></td>
                            
                            <td><a href="../../resources/<?php echo $row1["file_link"]?>">View/Download</a></td>
                            <td><?php echo $date;?></td>
                            <td><?php echo $time;?></td>
                            <td><?php echo "Submitted";?></td>
                             
                          <td><a href="eSubAss.php?id=<?php echo $row1['ass_id']?>"><i class="fa fa-trash" style="color: red;"></i></a></td>
                         </tr>
                     <?php
                     }
                   ?>
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>




















					<!-- <div class="cirStats">
						  	<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-4"> 
										<div class="card-panel text-center">
											<h4>Female</h4>
											<div class="easypiechart" id="easypiechart-blue" data-percent="<?php //echo $perF;?>" ><span class="percent"><?php echo $perF;?>%</span>
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
						</div> -->							
						</div><!--/.row-->
						
					</div>
					
		 
				
			 
				
				
                
				 	
                <!-- /. ROW  -->

	   
				
				
				
                
                <!-- /. ROW  -->
			   
				
            </div>
            <?php include ('../include/footer.php')?>
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
	 <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
        <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>
   
 
    <!-- Custom Js -->
    <script src="assets/js/custom-scripts.js"></script> 
    <script src="message/js/toastr.min.js"></script>
                    <script >

    <?php if (isset($_GET['status']) && $_GET['status'] === "info") : ?>
   toastr.success("Assignment Deleted Successfully.");
    <?php endif;?>
toastr.options={
        "preventDuplicates":true, 
        "positionClass": "Top Center",
        "progressBar": true
    }
 </script>
    
<?php
}
?>
</body>

</html>