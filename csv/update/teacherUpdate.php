<?php
session_start();
include '../../connect/ConDb.php';
include 'backendTeacher.php';
if(isset($_GET['pid'])){
    $pid=$_GET['pid'];
    $query="SELECT teacher_tbl.*,department_tbl.dept_name FROM teacher_tbl LEFT JOIN department_tbl ON teacher_tbl.dept=department_tbl.dept_id where teacher_tbl.tuid='$pid'";
    $result=mysqli_query($db,$query);
    $row=mysqli_fetch_array($result);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="This is a student on line learning platform">
    <meta name="author" content="josco LMS">
    <meta name="keywords" content="josco LMS">

    <!-- Title Page-->
    <title>LMS Teacher Update</title>

    <!-- Icons font CSS-->
    <link rel="icon" href="../../img/logo.jpg" type="image/icon" sizes="16x16">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all">
</head>

<body >
     <?php
    if (! isset ($_SESSION['sess_user_id'])) {
     header("location: ../login.php");
    } else {
if((time()-$_SESSION['last_login_time'])>1800){
    header("location: ../logout.php");
}else{
         ?>
    <div class="page-wrapper bg-gra-03 p-t-45 p-b-50" style="background-image: url(../../img/colorful.jpg);">
        <div class="wrapper wrapper--w790">
            <div class="card card-5">
                <div class="card-heading">
                    <h2 class="title">Update Form</h2>
                </div>
                <div class="card-body">
                    <form method="POST">
                <span class="contact100-form-title">

            <img  class="direct-chat-img" src="../../profile_pics/<?php echo $row["image"]?>" width="100" height="100">
            <?php if($row['status']=='1'):?> 
                 <span style="color: darkblue;font-style: italic;">Block</span>
             <?php endif;?>
             <?php if($row['status']=='0'):?> 
                 <span style="color:red;font-style: italic;">Active</span>
             <?php endif;?>
                </span>
                <input type="hidden" name="user_id" value="<?php echo $row['tuid'];?>">
                        <div class="form-row m-b-55">
                            <div class="name">Name</div>
                            <div class="value">
                                <div class="row row-space">
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="fname" value="<?php echo $row['fname'];?>" readonly>
                                            <label class="label--desc">first name</label>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <div class="input-group-desc">
                                            <input class="input--style-5" type="text" name="lname" value="<?php echo $row['lname'];?>" readonly>
                                            <label class="label--desc">last name</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="form-row">
                            <div class="name">Staff ID</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="staff_id" value="<?php echo $row['staff_id'];?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Department</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="dept" value="<?php echo $row['dept_name'];?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="name">Email</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="email" name="email" value="<?php echo $row['email'];?>"  readonly>
                                </div>
                            </div>
                        </div>
                 
                        
                        <div class="form-row">
                            <div class="name">Gender</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="gender" value="<?php echo $row['gender'];?>">
                                </div>
                            </div>
                        </div>
                        
                      <div class="form-row">
                            <div class="name">Password</div>
                            <div class="value">
                                <div class="input-group">
                                    <input class="input--style-5" type="text" name="passsword" value="<?php echo $row['password'];?>">
                                </div>
                            </div>
                        </div>
                      
                        <div>
                            <button class="btn btn--radius-2 btn--blue" type="submit" name="update">Save Changes</button>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <a href="../teachers.php" style="color: red;">Exit</a>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="js/global.js"></script>
<?php
}
}
?>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->