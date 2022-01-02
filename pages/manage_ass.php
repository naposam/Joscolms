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

 $ass=mysqli_query($db,"SELECT ass.*,option_tbl.course as dcourse FROM ass LEFT JOIN option_tbl on ass.course=option_tbl.id where ass.email='$uid'");


$query=mysqli_query($db,"SELECT ass_student.*,option_tbl.course as dcourse,student_tbl.fname,student_tbl.lname FROM ass_student left join option_tbl
 on ass_student.course=option_tbl.id  LEFT JOIN student_tbl on student_tbl.suid=ass_student.uid where  ass_student.course='$courseID'");


if(isset($_GET['id'])){
  $id=$_GET['id'];
  mysqli_query($db,"UPDATE ass SET status=1 where ass_id='$id'");
 header("location: manage_ass.php?status=info");
}

if(isset($_GET['unid'])){
  $unid=$_GET['unid'];
  mysqli_query($db,"UPDATE ass SET status=0 where ass_id='$unid'");
 header("location: manage_ass.php?status=unlock");
}
      ?>
       <!-- /. NAV SIDE  -->
    <?php include ('index_sidebar.php');?>
        
        <div id="page-wrapper" style=" min-height:500px!important;" >
		  <div class="header"> 
                        <h1 class="page-header">
                       Optional Submitted  Assignment
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
                            <th>#</th>
                             <th>Course</th>
                               <th>Assignment Title</th>
                             <th>Date Given</th>
                              <th>Time Given</th>
                               <th>Due Date</th>
                               <th>Due Time</th>
                             <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                    <?php
                      $i=0; 
                 while($row=mysqli_fetch_array($ass)){
                   $datep=date('Y-m-d',strtotime($row['dop']));
                    $ptime=date('H:i A',strtotime($row['dop']));
                    $sub_date=$row['sub_date'];
                    $sub_time=date('H:i A',strtotime($row['sub_time'])); 
                      $i++; 

                    ?>
                        <tr class="odd gradeX">
                        <td><?php echo $i;?></td>
                        <td><?php echo $row['dcourse'];?></td>
                            <td><?php echo $row['ass_title'];?></td>
                            <td><?php echo $datep;?></td>
                            <td><?php echo $ptime;?></td>
                            <td><?php echo $sub_date;?></td>
                            <td><?php echo $sub_time;?></td>
                            <td>
                            <?php if($row['status']==='0'):?>
                          <a href="manage_ass.php?id=<?php echo $row['ass_id']?>" style="color: red;text-transform: uppercase;">Lock Assignment</i></a>
                          <?php endif;?>
                          <?php if($row['status']==='1'):?>
                         <a href="manage_ass.php?unid=<?php echo $row['ass_id']?>" style="color: darkgreen;text-transform: uppercase;">Unlock Assignment</i></a>
                          <?php endif;?>
                          </td>
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
     <script src="../message/js/toastr.min.js"></script>
                    <script >

    <?php if (isset($_GET['status']) && $_GET['status'] === "info") : ?>
   toastr.success("Assignment locked Successfully.");
    <?php endif;?>

      <?php if (isset($_GET['status']) && $_GET['status'] === "unlock") : ?>
   toastr.success("Assignment unlocked Successfully.");
    <?php endif;?>
toastr.options={
        "preventDuplicates":true, 
        "positionClass": "Top Center",
        "progressBar": true
    }
 </script>
    
 
<?php
}
}
?>
</body>

</html>
