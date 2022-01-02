 
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
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/my_style.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/jquery-ui.css" rel="stylesheet" type="text/css" />

    <script src="../dist/js/jquery-ui.js"></script>
    <script src="../dist/js/jquery-2.1.4.js"></script>
     <script src="../dist/js/bootstrap.min.js"></script>

</head>
<body style="background-image: url(img/000.jpg);">
  <?php include 'include/changeNav.php'; 
  if(! isset($_SESSION['uid'])){
    header("location: ../main.php");
 }else{
  if((time()-$_SESSION['last_login_time_teacher'])>1800){
    header("location: logout.php");
}else{
  ?>
<?php

  $uid=$_SESSION['uid'];
  $name=$_SESSION['name'];
  $image=$_SESSION['image'];
  $email=$_SESSION['email'];

include '../connect/ConDb.php';

?>
    <form  method="POST" autocomplete="off">

     
        <div class="container registrationform" style="height: 560px;border-radius: 5px;">
          <br><br><br><br>
          
                       <div class="registrationform col-md-12 col-sm-12">
                          <h3 style="letter-spacing: 4px; font-family: cursive ; text-shadow: 4px 4px 8px #E5FCFB; text-align: center;">Select To View Optional Course</h3>
                          <hr>
                          <?php 
                           $reg=mysqli_query($db,"SELECT reg_opttbl.*,option_tbl.course FROM reg_opttbl LEFT JOIN option_tbl ON reg_opttbl.course_code=option_tbl.id WHERE reg_opttbl.uid = '$uid'");

                          ?>
                          <select class="form-control" name="courseview" required="">
                              <option value="" <?php
                            if (!isset($_GET['courseview']))
                                  echo "selected";
                            ?>>Select course to View</option>
                              <?php 
                                  while($view=mysqli_fetch_array($reg)){
                                    
                               ?>
                               <option value="<?php echo $view['course_code']?>">
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
              $pView=mysqli_query($db,"SELECT reg_opttbl.*,option_tbl.course FROM reg_opttbl LEFT JOIN option_tbl ON reg_opttbl.course_code=option_tbl.id where reg_opttbl.course_code='$idCid'");
              $row=mysqli_fetch_array($pView);
               $iV= $row['course_code'];
                $courseName=$row['course'];
                $clevel=$row['level'];

              //$_SESSION['cid']=$row['course_code'];
             $_SESSION['level']=$clevel;
                
               $_SESSION['viewID']=$iV;
               $_SESSION['courseName']=$courseName;
                echo "<script> window.location.href ='lessons_optional.php';</script>";
            }else{
              echo "<script> window.location.href ='change_course.inc_optional.php';</script>";
            }
            }
              ?>
            </div>
                          
        </div>

    </form>
    <?php
  }
 }
    ?>
</body>
</html>
