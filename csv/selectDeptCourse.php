<?php 

session_start();
include '../connect/ConDb.php';
?>
<head>
  <link rel="icon" href="../img/logo.jpg" type="image/icon" sizes="16x16">
</head>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    
    <meta charset="utf-8"/>
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content="Coming soon, Bootstrap, Bootstrap 3.0, Free Coming Soon, free coming soon, free template, coming soon template, Html template, html template, html5, Code lab, codelab, codelab coming soon template, bootstrap coming soon template"/>
       
    <title>Live Streaming Lesson</title>
    
<link rel="shortcut icon" type="image/ico" href="img/favicon.ico"/>
<link rel="icon" href="img/logo.jpg" type="image/icon" sizes="16x16">
    <!-- ============ Add custom CSS here ============ -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/my_style.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/jquery-ui.css" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" type="text/css" href="../message/css/toastr.min.css">
    <script src="../dist/js/jquery-ui.js"></script>
    <script src="../dist/js/jquery-2.1.4.js"></script>
    <script src="../dist/js/bootstrap.min.js"></script>

   <style>
       .mag{
           margin:10px;
       }
       table tr td{
        color: white;
       }
   </style>

</head>
<body style="background-image: url(../img/colorful.jpg);">
  <?php
	if (! isset ($_SESSION['sess_user_id'])) {
	 header("location: login.php");
	} else {
if((time()-$_SESSION['last_login_time'])>1800){
    header("location: logout.php");
}else{
         ?>
  <?php include 'navbar.php'?>; 
   
<?php
if(isset($_GET['id'])){
  $id=$_GET['id'];
mysqli_query($db,"DELETE FROM course_select_tbl WHERE sid='$id'");

}
?>
<div class="row">
  <?php

  require 'course_insert.php';
 

?>           

  <div class="container-fluid" style="border-radius: 5px; margin-top: 120px">

    <div class="col-md-4">
      <center>
        <form method="POST" style="background-color: rgba(0,0,0,0.6); box-shadow: 4px 4px 20px white; border-radius: 20px;" autocomplete="off">
          <br>
      <h4 style="color:white;letter-spacing:5px; text-shadow: 2px 2px 4px white;">Add Courses</h4>
          <br>
       
      <?php
 $res=mysqli_query($db,"SELECT * FROM coursetbl ");
  ?>  
          <select name="course" class="form-control" style="width:70%;">
            <option value="" <?php
              if (!isset($_GET['course']))
                echo "selected";
                ?>>Select course</option>
                <?php 
              while($row=mysqli_fetch_array($res)) {
                                                    ?>
            <option value="<?php echo $row['cid'];?>">
              <?php  echo $row['course'];?></option>
                          <?php  

                             }
                          ?>
          </select><br>
<div>
<?php $data=mysqli_query($db,"SELECT * FROM `level_tbl`");?>
          <select class="form-control" name="led" style="width: 70%;">
            <option value="" <?php
              if (!isset($_GET['course']))
                echo "selected";
                ?>>Select Level</option>
            <?php
            while($leData=mysqli_fetch_assoc($data)){
            ?>
          <option value="<?php echo $leData['lid']?>"><?php echo $leData['level']?></option>

            <?php

          }

            ?>
          </select>
           <br>
          <?php $department=mysqli_query($db,"SELECT * FROM `department_tbl`");
           ?> 


          <select name="dept" class="form-control" style="width:70%;">
             <option value="" <?php
               if (!isset($_GET['dept']))
                echo "selected";
                  ?>>Select Department</option>
                  <?php
                  while($drow=mysqli_fetch_array($department)){?>

                <option value="<?php echo $drow['dept_id'];?>"><?php echo $drow['dept_name'];?></option>
                                       <?php
                                         }
                                       ?>
                            </select>
                            <br>
       
         <br>
        
          <input type="submit" class="btn btn-success form-control" style="width:70%; border-radius:25px" name="submit" value="Save">
         
          <br>
          <br>
        </form>
      </center>
    </div>

    <div class="col-md-8">
 <div class="table-responsive">
  <table class="table table-bordered " style="background-color: rgba(0,0,0,0.6);" >
        <!-- <table class="table table-bordered" > -->
        <thead style="background-color: #339CFF; color: white;">
          <th>#</th>
        <th>Course</th>
        <th>Level</th>
        <th>Department</th>
        <th>Action</th>
        
    </thead>
    <?php
   
     $result=mysqli_query($db,"SELECT course_select_tbl.*,coursetbl.course,department_tbl.dept_name,level_tbl.level FROM course_select_tbl left join coursetbl on course_select_tbl.cid=coursetbl.cid left join department_tbl on course_select_tbl.deid=department_tbl.dept_id left join level_tbl on course_select_tbl.levid=level_tbl.lid ");
     $count=mysqli_num_rows($result);
     $i=0;
    while($row=mysqli_fetch_array($result)){
      $i++;
    ?>
     <tr>
         <td><?php echo $i;?></td>
         <td><?php echo $row['course'];?></td>
         <td><?php echo $row['level'];?></td>
          <td><?php echo $row['dept_name'];?></td>
          <td ><a href="selectDeptCourse.php?id=<?php echo $row['sid']?>"  style="text-decoration: none;color: lightgreen">Delete</a></td>
        
     </tr>
   <?php
     }
   }
    ?>
    
</table>
</div>
</div>
</div>
</div>


        <script src="../dist/js/jquery-2.1.4.js" type="text/javascript"></script>
        <script src="../message/js/toastr.min.js"></script>
        <script >

 <?php if (isset($_GET['status']) && $_GET['status'] === "error") : ?>
   toastr.error("All Fields are required");
    <?php endif;?>

    <?php if (isset($_GET['status']) && $_GET['status'] === "success") : ?>
   toastr.success("Link Saved Successsfully ");
    <?php endif;?>

    <?php if (isset($_GET['status']) && $_GET['status'] === "update") : ?>
   toastr.success("Link Updated Successsfully ");
    <?php endif;?>

    <?php if (isset($_GET['status']) && $_GET['status'] === "found") : ?>
   toastr.warning("Course Already add please just the link");
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
