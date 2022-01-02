 
<!DOCTYPE html>

<html >
<head >
   
    <meta charset="utf-8" />
    <!-- Set the viewport width to device width for mobile -->
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Coming soon, Bootstrap, Bootstrap 3.0, Free Coming Soon, free coming soon, free template, coming soon template, Html template, html template, html5, Code lab, codelab, codelab coming soon template, bootstrap coming soon template" />

    <title>Course Registration</title>
    <link rel="icon" href="img/logo.jpg" type="image/icon" sizes="16x16">
<!-- <link rel="shortcut icon" type="image/ico" href="img/favicon.ico"/> -->
    <!-- Start WOWSlider.com HEAD section -->
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <script type="text/javascript" src="engine1/jquery.js"></script>
    <!-- End WOWSlider.com HEAD section -->

    <!-- ============ Add custom CSS here ============ -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../dist/css/my_style.css" rel="stylesheet" type="text/css" />
    <link href="../../dist/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="../../dist/css/jquery-ui.css" rel="stylesheet" type="text/css" />

    <script src="../../dist/js/jquery-ui.js"></script>
    <script src="../../dist/js/jquery-2.1.4.js"></script>
     <script src="../../dist/js/bootstrap.min.js"></script>
<script src="https://use.fontawesome.com/2199ab073c.js"></script> 
</head>
<body style="background-image: url(img/colorful.jpg);">
    <?php include 'include/bdnav.php'; ?>
<?php
if(! isset($_SESSION['uid'])){
    header("location: ../../main.php");
 }else{
 
  $uid=$_SESSION['uid'];
  $index_no=$_SESSION['index_number'];
  $name=$_SESSION['name'];
  $level=$_SESSION['level'];
  $image=$_SESSION['image'];
  $dept=$_SESSION['dept'];

include 'connect/ConDb.php';

?>
    <form  method="POST" autocomplete="off">

     
        <div class="container registrationform" style="border-radius: 5px;">
          <br><br><br><br>
                       <div class="registrationform col-sm-12">
                          <h3 style="letter-spacing: 4px; font-family: cursive ; text-shadow: 4px 4px 8px #E5FCFB; text-align: center;">Select To View Course</h3>
                          <hr>
                          <?php 
                           $reg=mysqli_query($db,"SELECT course_reg_st.*,coursetbl.course FROM course_reg_st LEFT JOIN coursetbl ON course_reg_st.cid = coursetbl.cid WHERE course_reg_st.uid = '$uid'");

                          ?>
                          <select class="form-control" name="courseview" required="">
                              <option value="" <?php
                            if (!isset($_GET['courseview']))
                                  echo "selected";
                            ?>>Select course to View</option>
                              <?php 
                                  while($view=mysqli_fetch_array($reg)){
                                    
                               ?>
                               <option value="<?php echo $view['cid']?>">
                                <?php echo $view['course'];?></option>

                               <?php
                                  }

                               ?>
                          </select>
                          <br><br>
                          <input type="submit" name="viewcourse" value="View" class="btn-primary form-control">
                        </div>
                 </div>
              <?php
            if(isset($_POST['viewcourse'])){
              $idCid=$_POST['courseview'];
              if($idCid !==""){
              $pView=mysqli_query($db,"SELECT course_reg_st.*,coursetbl.course FROM course_reg_st LEFT JOIN coursetbl ON course_reg_st.cid=coursetbl.cid where course_reg_st.cid='$idCid'");
              $row=mysqli_fetch_array($pView);
               $iV= $row['cid'];
               $courseName=$row['course'];

               $_SESSION['viewID']=$iV;
               $_SESSION['courseName']=$courseName;
                echo "<script> window.location.href ='lessons.php';</script>";
            }else{
              echo "<script> window.location.href ='course_view.inc.php';</script>";
            }
            }
              ?>
            </div>
                          
        </div>

    </form>
    <?php
 }
    ?>
</body>
</html>
