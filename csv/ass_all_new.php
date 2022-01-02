<?php
session_start();
include ("../connect/ConDb.php");
if(isset($_GET['id'])){
  $id=$_GET['id'];
  $getFile=mysqli_query($db,"SELECT * FROM ass_student where ass_id='$id'");
  $fileDel=mysqli_fetch_array($getFile);
  $file=$fileDel['file_link'];
  mysqli_query($db,"DELETE FROM ass_student where ass_id='$id'");
  unlink("../resources/".$file);
 header("location: ass_all_new.php?m=1");
}
?>
<head>
<title>Table</title>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"/>
 
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
<style type="text/css">
      .card-header{
      background: #435d7d;
    color: #fff;
    text-transform: uppercase;
    text-align: center;
      }
      .nav-item a:hover{
   background: red;
   color: white!important;
}
 .nav-item a{
   color: white!important;
}

    </style>
</head>
<body class="bg-info">
	 <?php
	if (! isset ($_SESSION['sess_user_id'])) {
	 header("location: login.php");
	} else {
    if((time()-$_SESSION['last_login_time'])>1800){
    header("location: logout.php");
}else{

         ?>
	 <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background: rgba(0,0,0,0.5)!important;">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      
       <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Data Upload<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="course_link_update.php">Course Stream Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="selectDeptCourse.php">Register Course</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="courseupload.php">Course Upload</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="records.php">Students</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="teachers.php">Teachers</a> </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    
      
    </ul>
   
  </div>
</nav> 
 <div class="container">
 	<div class="row justify-content-center">
 		<div class="col-lg-10 bg-light rounded my-2 py-2">
 			<h3 class="text-center text-white pt-2 bg-danger">ALL ASSIGNMENTS</h3>
 			<hr>
 	<table class="table table-bordered table-stripped table-hover">
 			<thead>
 			<tr>
 			
    <th>#</th>
    <th>Full Name</th>
    <th>Course Name</th>
     <th>View</th>
     <th>Date</th>
    <th>Time</th>
    <th>Action</th>
</tr>
   </thead>
   <?php
$sql="SELECT ass_student.*,option_tbl.course as dcourse,student_tbl.fname,student_tbl.lname,student_tbl.suid FROM ass_student left join option_tbl on ass_student.course=option_tbl.id  LEFT JOIN student_tbl on student_tbl.suid=ass_student.uid";
    $res=$db->query($sql);
    $x=0;
   while($row=$res->fetch_assoc()){
     $x++;
     $date=date('Y-m-d', strtotime($row['dop']));
    $time=date('H:i A',strtotime($row['dop']));
   ?>
  <tbody>
  	<tr>
  		<td><?= $x;?></td>
  		<td><?= $row["fname"].' '.$row["lname"];?></td>
  		<td><?= $row["dcourse"];?></td>
  		<td><a href="../resources/<?= $row["file_link"];?>">View/Download</a></td>
  		<td><?= $date;?></td>
  		<td><?= $time;?></td>
  		<td><a href="ass_all_new.php?id=<?php echo $row["ass_id"];?>" class="btn-del"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-archive-fill" viewBox="0 0 16 16" style="color: red">
  <path d="M12.643 15C13.979 15 15 13.845 15 12.5V5H1v7.5C1 13.845 2.021 15 3.357 15h9.286zM5.5 7h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1 0-1zM.8 1a.8.8 0 0 0-.8.8V3a.8.8 0 0 0 .8.8h14.4A.8.8 0 0 0 16 3V1.8a.8.8 0 0 0-.8-.8H.8z"/>
</svg> DELETE<a/></td>

  	</tr>
  </tbody>




   <?php
     };
     ?>
	
 			</table>
 		</div>
 	</div>

 </div>
 <script src="sweetalert/sweetalert2.all.min.js"></script>
     <!-- <script src="sweetalert/jquery-3.5.1.min.js"></script> -->
 <?php if(isset($_GET['m'])):?>
    <div class="flash-data" data-flashdata="<?=$_GET['m'];?>"></div>
     <?php endif;?>
 <script type="text/javascript">
 $(document).ready(function(){
  $('table').DataTable();
 	});




  $('.btn-del').on('click', function(e){
                  e.preventDefault();
                  const href = $(this).attr('href')

                  Swal.fire({
                    title:'Are You Sure?',
                    type: 'Record will be deleted?',
                    type:'warning',
                    showCancelButton:true,
                    confirmButtonColor: '#FF0000',
                    cancelButtonColor: '#dd3',
                    confirmButtonText: 'Delete Record',

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
                text:'Record has been deleted'
              })
            }
 </script>
  <?php
  }
	}
    ?>
</body>