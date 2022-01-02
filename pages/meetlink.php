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
    <!-- header -->
<?php include ('index_header.php');?>
<?php
if(! isset($_SESSION['uid'])){
    header("location: ../main.php");
 }else{
 if((time()-$_SESSION['last_login_time_teacher'])>1800){
    header("location: logout.php");
}else{

  include ("../connect/ConDb.php");

  function fill_course($db){ 
   $dept=$_SESSION['dept'];  
    $output='';
    $sql="SELECT coursetbl.*,course_select_tbl.deid,course_select_tbl.levid FROM coursetbl LEFT JOIN course_select_tbl on coursetbl.cid =course_select_tbl.cid  where course_select_tbl.deid='$dept'";
    $result=mysqli_query($db,$sql);
    while($row = mysqli_fetch_array($result)){
    $output.='<option  value="'.$row['cid'].'">'.$row['course'].'</option>';
        }
    return $output;
    } 

 // $result=mysqli_query($db,"SELECT coursetbl.*,course_select_tbl.deid,course_select_tbl.levid FROM coursetbl LEFT JOIN course_select_tbl on coursetbl.cid =course_select_tbl.cid where course_select_tbl.deid='$dept'");

 // $level=mysqli_query($db,"SELECT * FROM `level_tbl`");
                                    
?>
<?php 
$courseSelect=mysqli_query($db,"SELECT meetingtbl.*,coursetbl.course,level_tbl.level FROM meetingtbl left join coursetbl on meetingtbl.cid=coursetbl.cid left join level_tbl on meetingtbl.level=level_tbl.lid where meetingtbl.uid='$uid' and meetingtbl.dept='$dept'");
$count=mysqli_num_rows($courseSelect);

if(isset($_GET['id'])){
    $id=$_GET['id'];
    mysqli_query($db,"DELETE FROM meetingtbl where link_id='$id'");
    header("location: meetlink.php?m=1");
}
?>
	   <!--/. NAV TOP  -->
<?php include ('index_sidebar.php');?>
        <!-- /. NAV SIDE  -->
      
		<div id="page-wrapper" style=" min-height:500px!important;">
		  <div class="header"> 
                        <h1 class="page-header">
                            MEETING LINK
                        </h1>
						<ol class="breadcrumb">
					  <li><a href="#">Home</a></li>
					  <li><a href="#">LINK</a></li>
					  <li class="active">Data</li>
					</ol> 
									
		</div>
            <div id="page-inner" style=" min-height:700px!important;height: 300px!important">


				<!-- /. ROW  --> 
				<div class="row">
                    <?php require_once ('backendgoogleMeet.php');?>
					<div class="col-xs-12 col-sm-12 col-md-12"> 
						<div class="row">
								<div class="col-xs-12 col-sm-6 col-md-4"> 
										<div class="card-panel text-center">
											<h4>Add Link</h4>
											<br>
											<form method="post" >
									 <select class="form-control" name="course"required id="course" onchange="region_change()">
										<option value="" <?php
                                        if (!isset($_GET['course']))
                                                     echo "selected";
                                     ?>>Select Course</option>
                                       <?php echo fill_course($db);?>

												</select>
												<br>
									<select class="form-control" name="level"required id="level">
										<option value="" <?php
                                        if (!isset($_GET['level']))
                                                     echo "selected";
                                           ?>>Select Level</option>
                                       
												</select>
												<br>
                                                <input type="text" name="meetLink" class="form-control" placeholder="Enter Meeting Link Here">
                                                <br>
												<input type="submit" name="add" class="btn btn-success" value="SEND MEETING LINK">
                                               
											</form>
										</div>
								</div>	

					            <div class="col-xs-12 col-sm-6 col-md-8"> 
					            	
								<div class="card-panel text-center">
											<h4>Added Courses</h4>
                                            <div class="table-responsive">
											<table class="table table-bordered " style="color: white;background-color: rgba(0,0,0,0.7); font-size: 16px;">
												<thead>
                                <th>#</th>
                                <th>Course Name</th>
                                 <th>Level</th>
                                 <th>Meeting Link</th>
                                 <th>Date Added</th>
                                 <th>Time Added</th>
                                 <th>Action</th>
                                 </thead>
                                 <?php
                                 $i=0;
                            while($tRecords=mysqli_fetch_array($courseSelect)){
                            $date=date('Y-m-d', strtotime($tRecords['date_posted']));
                             $time=date('H:i A',strtotime($tRecords['date_posted']));
                            $i++;

                                 ?>
                                 <tr>
                                <td><?php echo $i;?></td> 
                                <td><?php echo $tRecords['course'];?></td> 
                                <td><?php echo $tRecords['level']?></td>
                                <td><a href="<?php echo $tRecords['course_link']?>" target="_blank" style="color:red;">JOIN MEETING</a></td> 
                                <td><?php echo $date;?></td> 
                                <td><?php echo $time;?></td> 
                                <td><a href="meetlink.php?id=<?php echo $tRecords['link_id'];?>" class="btn-del" style="color: white;">Revoke Link</a></td> 	
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

	   
				
				
				
                
                <!-- /. ROW  -->
			   

            </div>
            <?php include ('include/footer.php')?>
            <!-- /. PAGE INNER  -->
        </div>

        <!-- /. PAGE WRAPPER  -->
    </div>

     <?php if(isset($_GET['m'])):?>
    <div class="flash-data" data-flashdata="<?=$_GET['m'];?>"></div>
     <?php endif;?>
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
    <script>
        function region_change()
                 {
             var xmlhttp= new XMLHttpRequest();
             xmlhttp.open("GET","ajax.php?reg="+document.getElementById("course").value,false);
              xmlhttp.send(null);
                                //alert(xmlhttp.responseText);
            document.getElementById("level").innerHTML=xmlhttp.responseText;
                                
                            }
       
    </script>

   <script src="../csv/sweetalert/sweetalert2.all.min.js"></script>
    <script src="../message/js/toastr.min.js"></script>
                    <script >
        //sweet alert message code
 $('.btn-del').on('click', function(e){
                  e.preventDefault();
                  const href = $(this).attr('href')

                  Swal.fire({
                    title:'Are You Sure You Want to Revoke?',
                    type: 'Record will be deleted?',
                    type:'warning',
                    showCancelButton:true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#dd3',
                    confirmButtonText: 'Revoke Link',

                  }).then((result)=>{
                    if(result.value){
                      document.location.href=href;
                    }
                  })
                })

            const flashdata = $('.flash-data').data('flashdata')
            if(flashdata){
              Swal.fire({
                type:'success',
                title:'success',
                text:'Link has been Revoke'
              })
            }

//toaste message code not in use sake of the above codes

    <?php if (isset($_GET['status']) && $_GET['status'] === "deleted") : ?>
   toastr.success("Course deleted Successfully");
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