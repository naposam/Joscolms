<?php session_start();?>
<?php include ('change_password.php');?>

<!DOCTYPE html>

<html >
<head >
    <meta charset="utf-8"/>
    <!-- Set the viewport width to device width for mobile -->
     <link rel="icon" href="../img/logo.jpg" type="image/icon" sizes="16x16">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content="Coming soon, Bootstrap, Bootstrap 3.0, Free Coming Soon, free coming soon, free template, coming soon template, Html template, html template, html5, Code lab, codelab, codelab coming soon template, bootstrap coming soon template"/>
    <title>manage password</title>
   
    <!-- ============ Add custom CSS here ============ -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/my_style.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../message/css/toastr.min.css">
    
</head>
<body>
    <?php //include ('topnav.php');?>
    <form id="login" style="margin:auto" autocomplete="off" method="post">
        <div class="container">
            <div class="row">
                <div class="Absolute-Center is-Responsive">
                    <div class="col-sm-12 col-lg-12 col-md-10">
                        <div class="registrationform">
                            <div class="form-horizontal">
                                
                                    <legend><i class="glyphicon glyphicon-lock"></i>Change Password</legend>

                                

                                    <div class="form-group" id="divPassword">                                       
                                        <Label ID="Label2"  Text="Password:" class="col-lg-2 control-label"></Label>
                                        <div class="col-lg-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                 <input type="password"  placeholder="New Password" class="form-control"
                                                name="password" minlength="8">
                                            </div>
                                            <div style="margin-top:10px">
                                                <div class=" messagealert " id="alert_container">
                                                </div>
                                            </div>
                                        </div> 
                                          <Label id="Label2" class="col-lg-2 control-label"></Label>
                                        <div class="col-lg-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                 <input type="password"   placeholder="Confirm Password" class="form-control"
                                                name="conpassword" minlength="8">
                                            </div>
                                            
                                        </div> 
                                    </div>
                             
                                    <div class="form-group" style="margin-top:10px; margin-right:-50px">
                                        <div class=" col-md-offset-4">
                                            <input type="submit" name="changePass" id="btnLogin" class="btn btn-primary" value="Change Password" />
                                            <a href="manage_student_password.php"   id="btnRegister" class="btn btn-warning" />Cancel</a>
                                        </button>
                                            
                                        </div>
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <script src="../dist/js/jquery-2.1.4.js" type="text/javascript"></script>

 <script src="../message/js/toastr.min.js"></script>
 <script >

 <?php if (isset($_GET['status']) && $_GET['status'] == "change") : ?>
   toastr.success("Password Changed successfully!! please login");
    <?php endif;?>

<?php if (isset($_GET['status']) && $_GET['status'] == "failed") : ?>
   toastr.warning("Email does not exist or it invalid");
    <?php endif;?>

<?php if (isset($_GET['status']) && $_GET['status'] == "notMatch") : ?>
   toastr.warning("password not match");
    <?php endif;?>
    <?php if (isset($_GET['status']) && $_GET['status'] == "required") : ?>
   toastr.info("All fields are Required!!");
    <?php endif;?>
toastr.options={
        "preventDuplicates":true, 
        "positionClass": "Top Center",
        "progressBar": true,
        "closeButton": true,
         "progressBar": true,
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
                "../img/34.jpg",
                // "../img/44.jpg",
                "../img/11.jpg",
                "../img/bg.jpg",
                "../img/images.jpg",

                //"img/34.jpg",
                //"img/images.jpg"
            ],

            {
                duration: 4000,
                fade: 1500
            }
        );
        </script>

    </form>
</body>
</html>
