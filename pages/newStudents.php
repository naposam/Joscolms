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
         <!--/. NAV TOP  -->
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
$query=mysqli_query($db,"SELECT student_tbl.*,department_tbl.dept_name,level_tbl.level FROM student_tbl left join department_tbl on student_tbl.dept=department_tbl.dept_id left join level_tbl on student_tbl.level=level_tbl.lid where student_tbl.dept='$dept'");
      ?>
       <!-- /. NAV SIDE  -->
    <?php include ('index_sidebar.php');?>
        
        <div id="page-wrapper" style=" min-height:500px!important;" >
		  <div class="header"> 
                        <h1 class="page-header">
                           Students Table
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li><a href="#">Tables</a></li>
					  <li class="active">Data</li>
					</ol> 
									
		</div>
		
            <div id="page-inner" style=" min-height:800px!important;height: 300px!important"> 
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="card">
                        <div class="card-action">
                             Records
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>FullName</th>
                                            <th>Department</th>
                                            <th>Index Number</th>
                                            <th>Image</th>
                                            <th>Level</th>
                                            <th>Chat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                    <?php
                 while($row=mysqli_fetch_array($query)){

                    ?>
                                        <tr class="odd gradeX">
                        <td><?php echo $row['fname'].' '.$row['lname'];?></td>
                                     <td><?php echo $row['dept_name'];?></td>
                                     <td><?php echo $row['index_number'];?></td>
                                    <td class="center"><img  class="direct-chat-img" src="../profile_pics/<?php echo $row['image'];?>" width="50" height="50"></td>
                                    <td class="center"><?php echo $row['level'];?></td>
                                        <td><a href="#"><i class="fa fa-comments"></i></a></td>
                                        </tr>
                                   <?php
                                    }
                                   ?>    
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
           
                
                </div>
               
            </div>
                <!-- /. ROW  -->
         
            <?php include ('include/footer.php')?>
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
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
 
<?php
}
}
?>
</body>

</html>
