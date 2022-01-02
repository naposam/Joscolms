  

<!DOCTYPE html>

<html >
<head >
  
    <meta charset="utf-8" />
    
    <!-- Set the viewport width to device width for mobile -->
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Coming soon, Bootstrap, Bootstrap 3.0, Free Coming Soon, free coming soon, free template, coming soon template, Html template, html template, html5, Code lab, codelab, codelab coming soon template, bootstrap coming soon template" />
<!-- <link rel="shortcut icon" type="image/ico" href="img/favicon.ico"/> -->
    <title>Course Registration</title>
<link rel="icon" href="img/logo.jpg" type="image/icon" sizes="16x16">
    <!-- Start WOWSlider.com HEAD section -->
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <script type="text/javascript" src="engine1/jquery.js"></script>
    <!-- End WOWSlider.com HEAD section -->

    <!-- ============ Add custom CSS here ============ -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../dist/css/my_style.css" rel="stylesheet" type="text/css" />
    <link href="../../dist/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="../../dist/css/jquery-ui.css" rel="stylesheet" type="text/css" />
     <link rel="stylesheet" type="text/css" href="message/css/toastr.min.css">

    <script src="../../dist/js/jquery-ui.js"></script>
    <script src="../../dist/js/jquery-2.1.4.js"></script>
     <script src="../../dist/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/2199ab073c.js"></script> 
</head>
<body style="background-image: url(img/colorful.jpg);">
<?php include 'include/bdnav_optional.php'; ?>
<?php
if(! isset($_SESSION['uid'])){
    header("location: ../../main.php");
 }else{
 
  $uid=$_SESSION['uid'];

  $name=$_SESSION['name'];
  $level=$_SESSION['level'];
  $image=$_SESSION['image'];
  $index_no=$_SESSION['index_number'];
  $deptStd=$_SESSION['dept'];

include('addCourse_optional.php');
?>
    <form  method="POST" autocomplete="off" >

    
        
        <div class="container registrationform" style="height: 560px;border-radius: 5px">
            <div class="row">
                 <div class="col-md-6">
                       <div class="registrationform">
                            <div class="form-horizontal">
                                <fieldset>
                                    <legend style="text-align: center">Course Selection</legend>
                                    <center>
                                    <div class="form-group" id="divRole">
                                        <?php
                                           include 'connect/ConDb.php';
                                      $result=mysqli_query($db,"SELECT * FROM option_tbl");

                                        ?>
                                        <div class=" col-md-12">
                                            <div class="input-group">
                                               <select class="form-control" name="course"  required="">
                                                <option value="" <?php
                                                 if (!isset($_GET['course']))
                                                     echo "selected";
                                                 ?>>Select course to Add</option>
                                                   <?php 
                                                    while ($row=mysqli_fetch_array($result)) {
                                                    

                                                    

                                                   ?>
                                                   <option value="<?php echo $row['id'];?>"><?php  echo $row['course'];?></option>
                                                   <?php  

                                                        }
                                                   ?>
                                               </select>
                                               <br><br><br>
                                            <div class="form-group">
                                           <div class="col-lg-12 ">
<!--                                             <a href="index.php" class="btn btn-danger">Exit</a>
 -->  <input type="submit" name="add" class="btn form-control btn-primary" value="Add" >
 
                                             
                                         </div>
                                     </div>
                                            </div>
                                        </div>
                                    </div>
                                  </center>
                                    <div class="form-group" style="margin-top: 10px; margin-right: -50px">
                                        <div class=" col-md-offset-4">
                                            
                                            
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                 </div>

                 <div class="col-md-6" style="text-align: center;">
                    <h3 style=" font-family: sans-serif; ">Registered Optional Courses</h3>
                    <?php
                  $result1=mysqli_query($db,"SELECT reg_opttbl.*,option_tbl.course FROM reg_opttbl left join option_tbl
                    on reg_opttbl.course_code=option_tbl.id where reg_opttbl.uid='$uid'");
                          ?>
                           <div class="table-responsive">
                      <table class="table table-bordered">
                          <thead style="letter-spacing: 2px; font-family: cursive; text-shadow: 4px 4px 10px white; font-size: 18px;color: white">
                             <th>#</th>
                             <th>Name</th>
                             <th>Date</th>
                              <th>Time</th>
                             
                             <th>Action</th>
                          </thead>
                          <?php
                          $i=0; 
                            while ($row1=mysqli_fetch_array($result1)){
                                $i++; 
                                
                               $date=date('Y-m-d', strtotime($row1['rdate']));
                                $time=date('H:i A',strtotime($row1['rdate']));  
                             ?>
                         <tr style="color: #ffffff;">
                           <td><?php echo $i;?></td>
                            <td><?php echo $row1['course'];?></td>
                            <td><?php echo $date;?></td>
                            <td><?php echo $time;?></td>
  
                          <td><a href="course_reg.inc_optional.php?id=<?php echo $row1['rid']?>">Delete</a></td>
                         </tr>
                     <?php
                     }
                   ?>
                </table> 
                </div> 
                 </div>
            </div>
                          
        </div>

    </form>
    <!-- delecting from the course_reg table -->
     <?php
      if(isset($_GET['id'])){
        $id=$_GET['id'];
        mysqli_query($db,"DELETE FROM reg_opttbl where rid='$id'");
        
      }
     ?>
    <script src="../../dist/js/jquery-2.1.4.js" type="text/javascript"></script>
        <script src="message/js/toastr.min.js"></script>
          <script >


 <?php if (isset($_GET['status']) && $_GET['status'] === "error") : ?>
   toastr.error("Course has Already been Added");
    <?php endif;?>

<?php if (isset($_GET['message']) && $_GET['message'] === "success") : ?>
   toastr.success("Course Add Successfully");
    <?php endif;?>
    <?php if (isset($_GET['status']) && $_GET['status'] === "error_c") : ?>
   toastr.error("All Fields are Required");
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
