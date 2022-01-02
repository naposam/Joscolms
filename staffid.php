<?php
include ('check_teacher_reg.php');
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8" />
    <!-- Set the viewport width to device width for mobile -->
    <link rel="icon" href="img/logo.jpg" type="image/icon" sizes="16x16">

   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Coming soon, Bootstrap, Bootstrap 3.0, Free Coming Soon, free coming soon, free template, coming soon template, Html template, html template, html5, Code lab, codelab, codelab coming soon template, bootstrap coming soon template" />

    <title>Josco Course Ware</title>

    <!-- Start WOWSlider.com HEAD section -->
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <script type="text/javascript" src="engine1/jquery.js"></script>
    <!-- End WOWSlider.com HEAD section -->

    <!-- ============ Add custom CSS here ============ -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/my_style.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/jquery-ui.css" rel="stylesheet" type="text/css" />

 <link rel="stylesheet" type="text/css" href="message/css/toastr.min.css">
    <script src="dist/js/jquery-ui.js"></script>
    <script src="dist/js/jquery-2.1.4.js"></script>
     <script src="dist/js/bootstrap.min.js"></script>

     <style type="text/css">
         hr.line{
            border: 1px solid white;
         }
     </style>
</head>
<body >
    <!--Navbar-->
    <center>
        <div class="container">

              <div class="container-fluid" style="border: solid 2px white; width: 300px; height: 400px;margin-top: 170px;background-color: rgba(0,0,0,0.6);box-shadow: 4px 4px 9px skyblue">
                <form method="POST" autocomplete="off">
                  <br>
                   <h4 style="color: white;letter-spacing: 3px; text-shadow: 4px 4px 7px white;">Check Staff ID</h4><br>
                   <img src="img/ttt.png" width="100" height="100" style="background-color: white"><br><br>
                    <input type="" name="staff_id" placeholder="Enter Staff ID" class="form-control" style="background-color: rgba(0,0,0,0.0); border: none; border-bottom: 2px solid white; border-radius: 10px; width: 200px; border-top: 2px solid white;color: white "><br><br>
                    <button type="submit" class="btn btn-primary form-control" style="border-radius: 30px; width: 200px;" name="submit">Register</button><br><br>
                    <a href="main.php" class="" style="color: white">Already a User ??<span style="color: skyblue"> Login</span></a>
                </form>
              </div>
              <marquee> <h5 style="color: white">All right reserved josco <?php echo date("Y");?> powered by ultdev:info@ultdev.org</h5></marquee>
        </div>
    </center>
      <script src="dist/js/jquery-2.1.4.js" type="text/javascript"></script>

 <script src="message/js/toastr.min.js"></script>
 <script >

 <?php if (isset($_GET['status']) && $_GET['status'] == "staff_error") : ?>
   toastr.error("Staff ID Does Not Exist!! Contact the College Admin");
    <?php endif;?>
    
<?php if (isset($_GET['status']) && $_GET['status'] == "success") : ?>
   toastr.success("Account Successfully Created Login to Continue");
    <?php endif;?>

<?php if (isset($_GET['status']) && $_GET['status'] == "staff_id") : ?>
   toastr.warning("Enter your Staff ID");
    <?php endif;?>
<?php if (isset($_GET['status']) && $_GET['status'] == "staff_duplicate") : ?>
   toastr.info("Sorry the staff ID has already been used");
    <?php endif;?>


toastr.options={
        "preventDuplicates":true, 
        "positionClass": "Top Center",
        "progressBar": true,
        "closeButton": true,
         "progressBar": true,
    }
  
 </script>
  <script src="dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="dist/js/jquery.backstretch.js" type="text/javascript"></script>
        <script type="text/javascript">
            'use strict';

            /* ========================== */
            /* ::::::: Backstrech ::::::: */
            /* ========================== */
            // You may also attach Backstretch to a block-level element
            $.backstretch(
            [
                "img/back6.jpg",
                "img/background.jpg",
                 "img/back17.jpg",
                "img/back16.jpg",
                 "img/bg.jpg",
                "img/back11.jpg",
                 "img/back4.jpg",
                "img/back13.jpg",
                
                "img/back7.jpg",
            ],

            {
                duration: 4000,
                fade: 1500
            }
        );
        </script>
	</body>
</html>