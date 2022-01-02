

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    
    <meta charset="utf-8"/>
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content="Coming soon, Bootstrap, Bootstrap 3.0, Free Coming Soon, free coming soon, free template, coming soon template, Html template, html template, html5, Code lab, codelab, codelab coming soon template, bootstrap coming soon template"/>
       
    <title>Students</title>
<link rel="shortcut icon" type="image/ico" href="img/favicon.ico"/>
<link rel="icon" href="img/logo.jpg" type="image/icon" sizes="16x16">
    <!-- ============ Add custom CSS here ============ -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/my_style.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/jquery-ui.css" rel="stylesheet" type="text/css" />

    <script src="../dist/js/jquery-ui.js"></script>
    <script src="../dist/js/jquery-2.1.4.js"></script>

   <style>
       .mag{
           margin:10px;
       }
   </style>

</head>
<body style="background-image: url(img/colorful.jpg);">
   
   
<?php include 'include/navbar.php'; 
if(! isset($_SESSION['uid'])){
    header("location: ../main.php");
 }else{
  if((time()-$_SESSION['last_login_time_teacher'])>1800){
    header("location: logout.php");
}else{
?>
<?php 

?>

        <div class="container registrationform" style="height: 560px; border-radius: 5px">
<table class="table ">

    <thead>
        <th>Image</th>
        <th>Full Name</th>
        <th>Index Number</th>
        <th>Subject</th>
        <th>Status</th>
        
    </thead>
  <!-- ddd -->
   <?php if(isset($_SESSION['viewID'])):?>
    <?php
     // include '../connect/ConDb.php';
     $course_ud=$_SESSION['viewID'];
     $result=mysqli_query($db,"SELECT student_tbl.*,course_reg_st.cid,coursetbl.course FROM student_tbl left join course_reg_st on student_tbl.suid=course_reg_st.uid left join coursetbl on course_reg_st.cid=coursetbl.cid  where student_tbl.level='$tlevel' and course_reg_st.cid='$course_ud' and student_tbl.dept='$dept'");
     $count=mysqli_num_rows($result);
    while($row=mysqli_fetch_array($result)){
    ?>
     <tr>
         <td><img src="../profile_pics/<?php echo $row["image"]?>" height="50px" width="50px"></td>
         <td><?php echo $row['fname'].' '.$row['lname'];?></td>
         <td><?php echo $row['index_number'];?></td>
          <td><?php echo $row['course'];?></td>
        <?php if($row['status']==='1'):?>
           <td>Online</td>
         <?php endif;?>
       <?php if($row['status']==='0'):?>
          <td>Offline</td>
          <?php endif;?>
     </tr>
   <?php
   }
    ?>
  <?php endif;?>
    <tfoot>
        <tr>
        <th>Total Number Of Registered Student: <?php echo $count;?></th>
        </tr>
    </tfoot>
</table>
            
        </div>
<?php
}
}
?>
   
</body>
</html>
