<?php session_start();
$roleID=$_SESSION['role'];
$levelID=$_SESSION['level'];
$username=$_SESSION['name'];
$userImage=$_SESSION['image'];
$email=$_SESSION['email'];
$course=$_SESSION['course'];
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    
    <meta charset="utf-8"/>
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content="Coming soon, Bootstrap, Bootstrap 3.0, Free Coming Soon, free coming soon, free template, coming soon template, Html template, html template, html5, Code lab, codelab, codelab coming soon template, bootstrap coming soon template"/>
       
    <title>Students</title>
<link rel="shortcut icon" type="image/ico" href="img/favicon.ico"/>
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
   
   
<?php include 'include/navbar.php'; ?>

        <div class="container registrationform" style="height: 560px; border-radius: 5px">
<table class="table ">

    <thead>
        <th>Image</th>
        <th>FullName</th>
        <th>Email</th>
        <th>Level</th>

    </thead>
    <?php
     include '../connect/ConDb.php';
     $result=mysqli_query($db,"SELECT users.*,course_reg.cid FROM users left join course_reg on users.user_id=course_reg.uid where users.role='Student' and course_reg.cid='$course' and users.level='$levelID' ");
     $count=mysqli_num_rows($result);
    while($row=mysqli_fetch_array($result)){
    ?>
     <tr>
         <td><img src="../resources/<?php echo $row["image"]?>" height="50px" width="50px"></td>
         <td><?php echo $row['fname'].' '.$row['lname']; ?></td>
         <td><?php echo $row['email'];?></td>
          <td><?php echo $row['level'];?></td>
     </tr>
   <?php
   }
    ?>
    <tfoot>
        <tr>
        <th>Total Number Of Registered Student: <?php echo $count;?></th>
        </tr>
    </tfoot>
</table>
            
        </div>

   
</body>
</html>
