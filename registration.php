<?php 
include ('reg.inc.php');
if(isset($_SESSION['index_number'])){
   $fname=$_SESSION['fname'];
    $lname=$_SESSION['lname'];
    $mname=$_SESSION['mname'];
  $index_number=$_SESSION['index_number'];  

}else{
    header("location: stu_index.php");
    exit();

}
  
?>
<?php include('validation.php');?>
<!DOCTYPE html>

<html>
<head>
    
    <meta charset="utf-8">
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/ico" href="img/favicon.ico"/>
    <meta name="description" content="Coming soon, Bootstrap, Bootstrap 3.0, Free Coming Soon, free coming soon, free template, coming soon template, Html template, html template, html5, Code lab, codelab, codelab coming soon template, bootstrap coming soon template">
    <title>Registration</title>

    <script type="text/javascript" src="dist/js/jquery-ui.js"></script>
    <script type="text/javascript" src="dist/js/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="dist/js/jquery.js"></script>
    <script type="text/javascript" src="dist/js/bootstrap.js"></script> 
    <link rel="stylesheet" type="text/css" href="message/css/toastr.min.css">

    <script type="text/javascript">

        function ShowPreview(input) {
            if (input.files && input.files[0]) {
                var ImageDir = new FileReader();
                ImageDir.onload = function (e) {
                    $('#imgProfile').attr('src', e.target.result);
                }
                ImageDir.readAsDataURL(input.files[0]);
            }
        }

        function email() {

            document.getElementById("divEmail").className = "form-group";
            document.getElementById("alert_container").className = "hide"
        }

        function pass() {
            document.getElementById("divPassword").className = "form-group";
            document.getElementById("alert_container").className = "hide"
        }

        function lname() {

            document.getElementById("divLname").className = "form-group";
            document.getElementById("alert_container").className = "hide"
        }

        function fname() {
            document.getElementById("divFname").className = "form-group";
            document.getElementById("alert_container").className = "hide"
        }

        function conPass() {
            document.getElementById("divConPassword").className = "form-group";
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
   
    <!-- ============ Add custom CSS here ============ -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/my_style.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/font-awesome.css" rel="stylesheet" type="text/css" />

</head>
<body style="background-image: url('../img/34.jpg')">
    <form id="reg_form"  method="post" style="margin: auto" autocomplete="off" enctype="multipart/form-data">
        <div class="container" style="margin-top:30px;margin-bottom:30px">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center" style="background: url('../img/clk2.png') no-repeat scroll center center;text-align: center">
            <div id="banner">
                <h1>
                    Welcome to JOSCO LMS<strong> Student Registration Page</strong> Feel free to create a new account</h1>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 ">
            <div class="registrationform">
                <div class="form-horizontal">
                    <fieldset>
                        <legend>Registration<i class="fa fa-pencil pull-right"></i></legend>
                        <div class="form-group">   
                            <div class="col-lg-6 col-lg-offset-2">
                                <image id="imgProfile"  Width="150" Height="150" />
                                <br />
                    <input type="file" name="image" onchange="ShowPreview(this)" required="" title="file must be 2mb and dimension must be 600 X 600">                         
                            </div>
                                                                             
                        </div>
                        
                        <div class="form-group"  id="divFname">
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" name="fname" id="txtFname" onkeydown="fname()" placeholder="First Name" Class="form-control has-error" onkeyup="letteronly(this)" required="" value="<?php echo $fname;?>"  readonly/>
                                </div>
                            </div>
                        </div>
                         <div class="form-group"  id="divLname">
                            
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" id="txtLname" onkeydown="lname()" placeholder="Middle Name" Class="form-control"  name="mname" onkeyup="letteronly(this)" required="" value="<?php echo $mname;?>"  readonly/>
                                </div>
                            </div>
                        </div>          
                        <div class="form-group"  id="divLname">
                            
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text" id="txtLname" onkeydown="lname()" placeholder="Last Name" Class="form-control"  name="lname" onkeyup="letteronly(this)" required="" value="<?php echo $lname;?>"  readonly/>
                                </div>
                            </div>
                        </div>    

                         <div class="form-group" id="divGender" >
                           
                            <div class="col-lg-10" >
                               
                                    
                                        <input type="radio"  id="rbtnGender" name="rbtnGender" checked="" value="Male" required="">Male
                                            <input type="radio" name="rbtnGender" id="rbtnGender" value="Female" required="">Female
                                        
                                   
                                
                            </div>
                        </div>
                        <div class="form-group" >
                                <div class="col-lg-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                                                <?php
                                 include ("connect/ConDb.php");
                                 $result=mysqli_query($db,"SELECT * FROM `department_tbl`");
                                    ?>              
                                                <select class="form-control" name="dept" required="">
                                                     <option value="" <?php
                                        if (!isset($_GET['dept']))
                                                     echo "selected";
                                     ?>>Select Department</option>
                                       <?php
                                      while($row=mysqli_fetch_array($result)){

                                     
                                       ?>
                                       <option value="<?php echo $row['dept_id']?>"><?php echo $row['dept_name'];?></option>
                                       <?php
                                         }
                                       ?>
                                                </select>
                                            </div>
                                    </div>
                                       
                              </div>
                            <div class="form-group" >
                                <div class="col-lg-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                                <?php $data=mysqli_query($db,"SELECT * FROM `level_tbl`");?>
                                <select class="form-control" name="level" required="">
                                        <option value="" <?php
                                        if (!isset($_GET['level']))
                                            echo "selected";
                                        ?>>Select Level</option>
                                                    <?php
                                      while($row=mysqli_fetch_array($data)){

                                     
                                       ?>
                                       <option value="<?php echo $row['lid']?>"><?php echo $row['level'];?></option>
                                       <?php
                                         }
                                       ?>
                                                </select>
                                            </div>
                                    </div>
                                       
                              </div>
                       
                        <div class="form-group" runat="server" id="divEmail">
                            <asp:Label ID="Label1" runat="server" Text="Index No:" CssClass="col-lg-2 control-label"></asp:Label>
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
                                    <input type="text" ID="txtEmail" placeholder="Enter your index number" Class="form-control" name="index_number" required="" value="<?php echo $index_number;?>"  readonly/>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group" runat="server" id="divPassword">
                           
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type="password"  id="txtPassword" runat="server" onkeydown="pass()" placeholder="Password" Class="form-control"
                                        TextMode="Password" name="password" minlength="8" required="">
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="divConPassword">
                           
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type="password"  id="txtConfirmPassword" onkeydown="conPass()" placeholder="Confirm Password" Class="form-control"
                                        TextMode="Password" name="conPass" minlength="8" required="">
                                </div>
                                <div>
                                    <div style="margin-top: 20px">
                                        <div class=" messagealert " id="alert_container" runat="server">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <input type="submit" id="btnSubmit"  Class="btn btn-primary" value="Submit" name="btnSubmit" />
                                <a href="main.php" id="btnCancel"  Class="btn btn-warning" >Cancel</a>                              
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>

            

    </div>
       
 
 
        <script src="dist/js/jquery-2.1.4.js" type="text/javascript"></script>
        <script src="message/js/toastr.min.js"></script>
        <script >

 <?php if (isset($_GET['status']) && $_GET['status'] === "error_a") : ?>
   toastr.error("Index Nummber Has Been Used");
    <?php endif;?>

<?php if (isset($_GET['status']) && $_GET['status'] === "error_b") : ?>
   toastr.error("Password do not match");
    <?php endif;?>
    <?php if (isset($_GET['status']) && $_GET['status'] === "error_c") : ?>
   toastr.error("All Fields are Required");
    <?php endif;?>

    <?php if (isset($_GET['status']) && $_GET['status'] === "checked") : ?>
   toastr.success("Data Saved!! Fill the forms All Fields are Required ");
    <?php endif;?>

    <?php if (isset($_GET['status']) && $_GET['status'] === "fileExits") : ?>
   toastr.warning("Image Already Exists");
    <?php endif;?>

    <?php if (isset($_GET['status']) && $_GET['status'] === "invalidInagetype") : ?>
   toastr.warning("Invalid Image Type");
    <?php endif;?>

    <?php if (isset($_GET['status']) && $_GET['status'] === "imgSize") : ?>
   toastr.warning("Image size must not be more 2mb");
    <?php endif;?>

    <?php if (isset($_GET['status']) && $_GET['status'] === "imgdimension") : ?>
   toastr.warning("Passport size must be 600 X 600! Please choose correct passport picture size");
    <?php endif;?>
toastr.options={
        "preventDuplicates":true, 
        "positionClass": "Top Center",
        "progressBar": true
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
                
                "img/background.jpg",
                "img/back17.jpg",
                "img/back18.jpg",
                "img/back19.jpg",
                "img/back20.jpg",
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
