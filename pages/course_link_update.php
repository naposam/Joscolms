<?php
  include '../connect/ConDb.php';
  require 'insert_url.php';
 include '../csv/navbar.php';

?>
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

   <style>
       .mag{
           margin:10px;
       }
       table tr td{
        color: white;
       }
   </style>

</head>
<body style="background-image: url(img/colorful.jpg);">
   
   
<?php
if(isset($_GET['id'])){
  $id=$_GET['id'];

$select=mysqli_query($db,"SELECT course_link.*, coursetbl.course FROM course_link LEFT JOIN coursetbl on course_link.cid=coursetbl.cid where course_link.cid='$id'");
$dataSet=mysqli_fetch_array($select);
}
?>
<div class="row">
  <div class="container-fluid" style="border-radius: 5px; margin-top: 120px">

    <div class="col-md-4">
      <center>
        <form method="POST" style="background-color: rgba(0,0,0,0.6); box-shadow: 4px 4px 20px white; border-radius: 20px;" autocomplete="off">
          <br>
      <h4 style="color:white;letter-spacing:5px; text-shadow: 2px 2px 4px white;">UPLOAD LINK</h4>
          <br>
       <?php    $result=mysqli_query($db,"SELECT * FROM coursetbl ");?>
       <?php if(!isset($_GET['id'])):?>
          <select name="course" class="form-control" style="width:70%; border-radius:25px">
            <option value="" <?php
              if (!isset($_GET['course']))
                echo "selected";
                ?>>Select course to Add</option>
                <?php 
              while ($row=mysqli_fetch_array($result)) {
                                                    ?>
            <option value="<?php echo $row['cid'];?>"><?php  echo $row['course'];?></option>
                                                   <?php  

                                                        }
                                                   ?>
          </select><br>
          <select name="level" class="form-control" style="width:70%; border-radius:25px" required="">
             <option value="" <?php
                                                 if (!isset($_GET['level']))
                                                     echo "selected";
                                                 ?>>Select Level</option>
                                                    <option>First Year</option>
                                                    <option>Second Year</option>
                                                    <option>Third Year</option>
          </select><br>
        <?php endif;?>
      
          <input type="text" name="course_link" class="form-control" placeholder="Enter Course Link" style="width:70%; border-radius:25px"value="<?php if(isset($_GET['id'])){echo $dataSet['course_link'];}?>"><br> 
         <!--  <input type="time" name="time" class="form-control" placeholder="select Time For Strem" style="width:70%; border-radius:25px"> --><br>
         <?php if(!isset($_GET['id'])):?>
          <button type="submit" class="btn btn-success form-control" style="width:70%; border-radius:25px" name="submitLink">Save Link</button>
          <br><br><br><br>
          <?php endif;?>
          <?php if(isset($_GET['id'])):?>
          <button type="submit" class="btn btn-success form-control" style="width:70%; border-radius:25px" name="UpdateLink">Update Link</button>
          <br><br><br><br>
          <?php endif;?>
        </form>
      </center>
    </div>

    <div class="col-md-8">

        <table class="table table-bordered" style="background-color: rgba(0,0,0,0.6);">
        <thead style="background-color: #339CFF; color: white;">
        <th>Course</th>
        <th>Level</th>
        <th>Link</th>
        <th>Date</th>
        <th>Time</th>
        <th>Action</th>
        
    </thead>
    <?php
   
     $result=mysqli_query($db,"SELECT course_link.*,coursetbl.course FROM course_link left join coursetbl on course_link.cid=coursetbl.cid");
     $count=mysqli_num_rows($result);
    while($row=mysqli_fetch_array($result)){
    ?>
     <tr>
         
         <td><?php echo $row['course'];?></td>
         <td><?php echo $row['level'];?></td>
          <td><?php echo $row['course_link'];?></td>
          <td><?php echo date('Y-m-d', strtotime($row['date_posted']));?></td>
          <td><?php echo date('H:i A',strtotime($row['date_posted']));?></td>
          <td ><a href="course_link_update.php?id=<?php echo $row['link_id']?>"  style="text-decoration: none;color: lightgreen">Update Link</a></td>
        
     </tr>
   <?php
   }
    ?>
    
</table>
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
   
</body>
</html>
