
<html>
 <head>
  <title>LMS</title>
  <link rel="icon" href="../img/logo.jpg" type="image/jpeg">
  <script src="dataTables/jquery.min.js"></script>
  <link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/>
  <script type="text/javascript" src="dataTables/datatables.min.js"></script>
  <link rel="stylesheet" href="dataTables/bootstrap.min.css" />
  <script src="dataTables/bootstrap.min.js"></script>
  <style type="text/css">

    body{
    background:#b3b3b3;
    background-size: cover;
    
    
    }
    .table tr:nth-child(odd){ 
    background: #b8d1f3!important;
  }
.table tr{
    background: #b8d1f3;
  }
  .table tr:nth-child(even){
    background: #dae5f4;
  }
.nav li a:hover{
  background: red;
  color: white;
}
  </style>
 </head>

 <body style="background-image: url(../img/colorful.jpg);">
  <nav class="navbar navbar-dark" style="background: rgba(0,0,0,0.5);">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#" style="color:#fff;">
      </a>
    </div>
    <ul class="nav navbar-nav navbar-right" >
      <li ><a href="../csv/index.php" style="color: white;">Data Upload</a> </li>
      <li><a href="../csv/courseupload.php" style="color: white;">Course Upload</a> </li>
      <li><a href="../csv/course_link_update.php" style="color: white;">Course Stream Link</a> </li>
      <li><a href="view_Teacher_inc.php" style="color: white;">Teachers</a> </li>
        <li><a href="../csv/logout.php" style="color: white;"><span class="glyphicon glyphicon-log-out"></span>Logout</a></li>
    </ul>
  </div>
</nav>
  <div class="container box">
  <h1 align="center" style="color: white">School Data</h1>
   <br />
   <div class="table-responsive">
    <table id="customer_data" class="table table-bordered table-striped">
     <thead>
      <tr>
        <th>#</th>
       <th>Full Name</th>
       <th>Level</th>
       <th>Gender</th>
       <th>Email</th>
       <th>Image</th>
       <th>Date Reg</th>
       <th>Time Reg</th>
       <th>Delete</th>
       <th>Update</th>
      </tr>
     </thead>
    </table>
   </div>
  </div>
  <br />
  <br />
  <?php
include 'backend/database.php';
if(isset($_GET['id'])){
  $id=$_GET['id'];
 mysqli_query($conn,"DELETE FROM users where user_id='$id'"); 
}

  ?>
 </body>
</html>
<script type="text/javascript" language="javascript" >
 $(document).ready(function(){

  $('#customer_data').DataTable({
   "processing" : true,
   "serverSide" : true,
   "ajax" : {
    url:"fetch.php",
    type:"POST"
   },
   dom: 'lBfrtip',
   buttons: [
    'excel', 'csv', 'copy'
   ],
   "lengthMenu": [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
  });
  
 });
 
</script>