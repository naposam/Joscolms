<head>
  <link rel="icon" href="../img/logo.jpg" type="image/icon" sizes="16x16">
</head>

<?php include ("login_admin_panel.php");?>


<?php

if (isset($_SESSION["locked"]))
{
    $difference = time() - $_SESSION["locked"];
    if ($difference > 30)
    {
        unset($_SESSION["locked"]);
        unset($_SESSION["login_attempts"]);
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Admin Panel</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	 <link rel="stylesheet" type="text/css" href="../message/css/toastr.min.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter" >
		<div class="container-login100" style="background-image: url(../img/back6.jpg)!important;background-position:center;">
			<div class="wrap-login100">
				<form class="login100-form validate-form" method="POST" autocomplete="off">
					<span class="login100-form-title p-b-26">
						Admin Login
					</span>
					<span class="login100-form-title p-b-48">
						<img src="../pages/img/logo.jpg" width="80" height="80">
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Valid email is: a@b.c">
						<input class="input100" type="text" name="email">
						<span class="focus-input100" data-placeholder="Email"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" name="pass" id="txt" onkeyup="manage(this)">
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<?php
							error_reporting(0);
						 if ($_SESSION["login_attempts"] > 2)
                              {
                              $_SESSION["locked"] = time();
                            echo "Please wait for 30 seconds ";
                                 }
                                else
                               {
 
                             ?>
							<button class="login100-form-btn" type="submit" name="submit" id="btnsubmit" disabled="">
								Login
							</button>
							<?php
 
                                }
 
                            ?>
							
						</div>
						<a href="../index.php">Back</a>
					</div>

					<div class="text-center p-t-115">
						
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
 <script src="../message/js/toastr.min.js"></script>
 <script >

 <?php if (isset($_GET['status']) && $_GET['status'] == "error") : ?>
   toastr.error("Invalid Username or Password");
 	<?php endif;?>
toastr.options={
 		"preventDuplicates":true, 
 		"positionClass": "Top Center",
 		"progressBar": true
 	}
 	
 	// function success_toast(){
 	// 	toastr.success("Data save Succesfully");
 	// }
 </script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
	<script>
  function manage(txt) {
    var bt = document.getElementById('btnsubmit');
    if (txt.value != '') {
      bt.disabled = false;
    }
    else {
      bt.disabled = true;
    }
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
                
                 "../img/back3.jpg",
                "../img/back8.jpg",
                 "../img/back5.jpg",
                 "../img/back4.jpg",
                "../img/back10.jpg",
                "../img/back11.jpg",
                "../img/back12.jpg",
                "../img/back13.jpg",
                "../img/back14.jpg",
                "../img/back15.jpg",
                "../img/back9.jpg",
                "../img/back7.jpg",
                "../img/back16.jpg",
                "../img/back17.jpg",
                "../img/back18.jpg",
                "../img/back19.jpg",
            ],

            {
                duration: 4000,
                fade: 1500
            }
        );
        </script>
</body>
</html>