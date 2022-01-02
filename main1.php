<?php include ("login.inc.php");?>

<!DOCTYPE html>

<html >
<head >
    <meta charset="utf-8"/>
  
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link rel="shortcut icon" type="image/ico" href="img/logo.jpg"/>
    <meta name="description" content="Coming soon, Bootstrap, Bootstrap 3.0, Free Coming Soon, free coming soon, free template, coming soon template, Html template, html template, html5, Code lab, codelab, codelab coming soon template, bootstrap coming soon template"/>
    <title>Login</title>
   
    <!-- ============ Add custom CSS here ============ -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/my_style.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/font-awesome.css" rel="stylesheet" type="text/css" />
     <link rel="stylesheet" type="text/css" href="message/css/toastr.min.css">
    <script type="text/javascript">

        function email() {

            document.getElementById("divEmail").className = "form-group";
            document.getElementById("alert_container").className = "hide"

        }

        function pass() {
            document.getElementById("divPassword").className = "form-group";
            document.getElementById("alert_container").className = "hide"
        }

        function ShowMessage(message, messagetype) {
            var cssclass;
            switch (messagetype) {
                case 'Success':
                    cssclass = 'alert-success'
                    break;
                case 'Error':
                    cssclass = 'alert-danger'
                    break;
                case 'Warning':
                    cssclass = 'alert-warning'
                    break;
                default:
                    cssclass = 'alert-info'
            }
            $('#alert_container').append('<div id="alert_div" style="margin: 0 0.5%; -webkit-box-shadow: 3px 4px 6px #999;" class="alert fade in ' + cssclass + '"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>' + messagetype + '!</strong> <span>' + message + '</span></div>');
        }

   </script>
</head>
<body >
    <br><br><br><br><br>
    <form id="" style="margin:auto" method="post" autocomplete="off" >
        <div class="container ">
            <div class="row " >
                <div class="col-md-10 col-lg-12 col-sm-12  ">
                    <div class="col-sm-12 col-lg-12 col-md-10">
                        <div class="registrationform" style="background-color: rgba(0,0,0,0.6);">
                            <div class="form-horizontal">
                                <!-- greetings -->
                      <?php require ('greeting.php');?>
                                <img src="img/logo.jpg" width="90" height="90">
                                    <legend style="text-align: center">Login</legend>

                                <div class="form-group"  id="divEmail">
                                        <label ID="Label1"Text="Email:" class="col-lg-3 control-label"></label>
                                        <div class="col-lg-6  col-sm-12" >
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                                <input type="text" id="txtEmail" onkeydown="email()" placeholder="Username" class="form-control" name="username" required="" />
                                            </div>
                                        </div>                                       
                                    </div>

                                    <div class="form-group" id="divPassword">                                       
                                        <Label id="Label2"  Text="Password:" class="col-lg-3 control-label"></Label>
                                        <div class="col-lg-6 col-sm-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                                 <input type="password" id="txtPassword" onkeydown="pass()" runat="server" placeholder="Password" class="form-control"
                                                TextMode="Password" name="password" required="">
                                            </div>
                                            <div style="margin-top:10px">
                                                <div class=" messagealert " id="alert_container" runat="server">
                                                </div>
                                            </div>
                                        </div>  
                                    </div>
                             
                                    <div class="form-group" style="margin-top:10px; margin-right:-50px">
                                        <div class=" col-md-offset-3">
                                            <input type="submit" name="btnLogin" id="btnLogin" class="btn btn-primary" value="Login" />
                                            <a href="index.php"   id="btnRegister" class="btn btn-warning" />Cancel</a>
                                            
                                        </div>

                                    </div>
                                <a href="forgot_password.php" style="color: white;">Forgot Password?</a>
                            </div>
                        </div>
    <style type="text/css">
    .kvt{
      font-kerning: 30px;
      font-size: 20px;
      font-weight: bold;
      font-family: 'NEOLTH Regular';
      color:darkblue;
      text-shadow: 2px 2px 4px 4px;
    }
    .ti{
       color:lightblue;
       font-size: 20px;
       font-weight: 50vh;
       font-family: 'Vermin Vibes V Regular';
    }
    .inf{
        color: #ff5050;
        font-weight: bolder;
        font-size: 20px;
        font-family: sans-serif0

    }
  </style>
                       <marquee> <h5 style="color: white">All right reserved Josco <?php echo date("Y");?> powered by <span class="kvt">ULT</span><span class="ti"><strong>DEV</strong></span><span class="inf">:info@ultdev.org</span></h5></marquee>
                    </div>
                </div>
            </div>
        </div>

    <script src="dist/js/jquery-2.1.4.js" type="text/javascript"></script>

 <script src="message/js/toastr.min.js"></script>
 <script >

 <?php if (isset($_GET['status']) && $_GET['status'] == "error") : ?>
   toastr.error("Invalid Username or Password");
    <?php endif;?>

<?php if (isset($_GET['status']) && $_GET['status'] == "success") : ?>
   toastr.success("Account Successfully Created Login to Continue");
    <?php endif;?>

<?php if (isset($_GET['status']) && $_GET['status'] == "staff_id") : ?>
   toastr.warning("Enter your Index Number");
    <?php endif;?>
    <?php if (isset($_GET['status']) && $_GET['status'] == "change") : ?>
   toastr.success("Password Changed successfully!! please login");
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
                "img/000.jpg",
                 "img/11.jpg",
                // "img/12.jpg",
                 "img/34.jpg",
                "img/24.jpg",
                 "img/44.jpg",
                "img/colorful.jpg",
                "img/bg.jpg",
                // "img/back7.jpg",
                //  "img/back3.jpg",
                // "img/back14.jpg",
                //  "img/back5.jpg",
                // "img/back9.jpg",
                //  "img/back4.jpg",
                // "img/back13.jpg",
                // "img/back6.jpg",
                // "img/back10.jpg",
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
