<?php 
error_reporting(0);
include 'bacnkendAdd_course.php';
session_start();
if(! isset($_SESSION['uid'])){
    header("location: ../main.php");
 }else{
  if((time()-$_SESSION['last_login_time_teacher'])>1800){
    header("location: logout.php");
}else{
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    
    <meta charset="utf-8" />
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="shortcut icon" type="image/ico" href="img/favicon.ico"/>
    <meta name="description" content="Coming soon, Bootstrap, Bootstrap 3.0, Free Coming Soon, free coming soon, free template, coming soon template, Html template, html template, html5, Code lab, codelab, codelab coming soon template, bootstrap coming soon template" />
    <title>Select Course</title>

    <!-- ============ Add custom CSS here ============ -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/my_style.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/font-awesome.css" rel="stylesheet" type="text/css" />
     <link rel="stylesheet" type="text/css" href="../message/css/toastr.min.css">
</head>
<body style="background-image: url(img/000.jpg);">
   <marquee><h1 style="color:#fff; font-family:cursive;letter-spacing: 3px; text-shadow: 4px 4px 8px #A2A2FE">Please Make Sure you select the right course</h1></marquee>
    <form id="form1" method="POST">
        <div class="container">
            <div class="row">
                <div class="Absolute-Center is-Responsive">
                    <div class = "panel panel-default" style="background: rgba(0,0,0,0.5); box-shadow: 4px 4px 10px white;">
                 <div class = "panel-body">
                    <div class="col-sm-6 col-lg-6 col-md-6" style="box-shadow: 4px 4px 10px white">

                        <div class="registrationform">
                            <div class="form-horizontal">
                                <fieldset>
                                    <legend style="text-align: center">Course Selection</legend>
                                    <div class="form-group" id="divRole">
                                        <?php
                                           include '../connect/ConDb.php';
                                            $result=mysqli_query($db,"SELECT * FROM coursetbl ");

                                        ?>
                                        <div class=" col-md-12">
                                            <div class="input-group">
                                               <select class="form-control" name="course">
                                            <option value="" <?php
                                                 if (!isset($_GET['course']))
                                                     echo "selected";
                                                 ?>>Select course to register</option>
                                                  
                                                   <?php 
                                                    while ($row=mysqli_fetch_array($result)) {
                                                    

                                                    

                                                   ?>
                                                   <option value="<?php echo $row['cid'];?>"><?php  echo $row['course'];?></option>
                                                   <?php  

                                                        }
                                                   ?>
                                               </select>
                                               <br><br><br>
                                            <div class="form-group">
                                           <div class="col-lg-10 col-lg-offset-1">
                                            
                                               <input type="submit" name="add" class="btn btn-success" value="Add">
                                               <a href="lessons.php" class="btn btn-danger"><i class="fa fa-arrow-right"></i>Home</a>
                                             
                                         </div>
                                     </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" style="margin-top: 10px; margin-right: -50px">
                                        <div class=" col-md-offset-4">
                                            
                                            
                                        </div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-6 col-md-6">
                        <?php  $result=mysqli_query($db,"SELECT coursetbl.course,course_reg.cid,course_reg.status,course_reg.uid,course_reg.id FROM coursetbl LEFT JOIN course_reg ON coursetbl.cid = course_reg.cid WHERE course_reg.uid = '$uid' ");
 ?>
                        <table class="table table-bordered " style="color: white;background-color: rgba(0,0,0,0.7); font-size: 16px;">
                            <caption>Added Courses</caption>
                            <thead>
                                <th>#</th>
                                <th>Course Name</th>
                                <th>Status</th>
                                 <th>Action</th>
                            </thead>
                        <?php 
                        $i = 0;
                         while ($row=mysqli_fetch_array($result)){
                                  $i++;                  
                                 $status = $row['status'];
                                 $uid=$row['uid'];               

                                                   ?>
                            <tr>
                                <td><?php echo $i; ?></td> 
                               <td><?php echo $row['course'];?></td>
                                <?php if($status==='0'):?>
                                    <td><?php echo 'unconfirm';?></td>
                                <?php endif; ?>
                                <?php if($status==='1'):?>
                                    <td><?php echo 'confirmed';?></td>
                                <?php endif; ?>
                                <td><a href="add_course.php?delete=<?php echo $row['id'];?>">Delete</a></td>
                            </tr>
                            <?php
                                }
                            ?>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <?php if($status==='0'):?>
                                    <th><a href="add_course.php?uid=<?php echo $uid ?>" class="btn-primary" >Confirm</a></th>
                                <?php endif; ?>
                                </tr>
                            </tfoot>
                        </table>
                        <?php
                        if (isset($_GET['uid'])) {
                            $uid = $_GET['uid'];
                            mysqli_query($db,"UPDATE course_reg SET status='1' WHERE uid='$uid'");
                        }

                        ?>
                    </div>
                </div>
                <?php
      if(isset($_GET['delete'])){
        $id=$_GET['delete'];
        mysqli_query($db,"DELETE FROM course_reg where id='$id'");
        
      }
    ?>
            </div>
        </div>
            </div>
        </div>

        <script src="../dist/js/jquery-2.1.4.js" type="text/javascript"></script>
        <script src="../message/js/toastr.min.js"></script>
        <script >

 <?php if (isset($_GET['status']) && $_GET['status'] === "error") : ?>
   toastr.warning("Course Already Add");
    <?php endif;?>

<?php if (isset($_GET['status']) && $_GET['status'] === "error_b") : ?>
   toastr.error("You cannot add more than two");
    <?php endif;?>
toastr.options={
        "preventDuplicates":true, 
        "positionClass": "Top Center",
        "progressBar": true
    }
 </script>
        <script src="../dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../dist/js/jquery.backstretch.js" type="text/javascript"></script>
        <script type="text/javascript">
            'use strict';

            /* ========================== */
            /* ::::::: Backstrech ::::::: */
            /* ========================== */
            // You may also attach Backstretch to a block-level element
            $.backstretch(
            [
                "img/44.jpg",
                "img/colorful.jpg",
                "img/34.jpg",
                "img/images.jpg"
            ],

            {
                duration: 4000,
                fade: 1500
            }
        );
        </script>
    </form>
<?php
}
}
?>
</body>
</html>
