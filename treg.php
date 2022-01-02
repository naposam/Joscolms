
<?php include ("frmprocess.inc.php");
if(isset($_SESSION['staff_id'])){
    $fname=$_SESSION['fname'];
    $lname=$_SESSION['lname'];
    $staff_id=$_SESSION['staff_id'];
    $mname=$_SESSION['mname'];
}else{
    header("location: staffid.php");
    exit();
}
    
?>
<?php include('validation.php');?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head >
  
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
<body style="background-image: url('img/colorful.jpg')">
    <form id="reg_form" runat="server" method="post" style="margin: auto" enctype="multipart/form-data">
        <div class="container" style="margin-top:30px;margin-bottom:30px">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center" style="background: url('img/clk2.png') no-repeat scroll center center;text-align: center">
            <div id="banner">
                <h1>
                    Welcome to JOSCO LMS <strong>Staff Registration Page</strong> Feel free to create a new account</h1>
            </div>
        </div>
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 ">
            <div class="registrationform" style="background:rgba(0,0,0,0.6);">
                <div class="form-horizontal">
                    <fieldset>
                        <legend>Registration<i class="fa fa-pencil pull-right"></i></legend>
                        <div class="form-group">   
                            <div class="col-lg-6 col-lg-offset-2">
                                <image ID="imgProfile" runat="server" Width="150" Height="180" />
                                <br />
                                <input type="file" name="image" runat="server" id="ImageUpload" onchange="ShowPreview(this)" required="" />                                
                            </div>                                                 
                        </div>
                        
                        <div class="form-group"  id="divFname">
                           
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text"  ID="txtFname" onkeydown="fname()" placeholder="First Name" class="form-control has-error" name="fname" required="" onkeyup="letteronly(this)" value="<?php echo ucfirst($fname);?>" readonly />
                                </div>
                            </div>
                        </div>
                          <div class="form-group"  id="divFname">
                           
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text"  ID="txtFname" onkeydown="fname()" placeholder="Middle Name" class="form-control has-error" name="mname" required="" onkeyup="letteronly(this)" value="<?php echo ucfirst($mname);?>" readonly />
                                </div>
                            </div>
                        </div>
                        <div class="form-group"  id="divLname">
                           
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                    <input type="text"  id="txtLname" onkeydown="lname()" placeholder="Last Name" class="form-control" name="lname" required="" onkeyup="letteronly(this)" value="<?php echo ucfirst($lname);?>" readonly/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group" runat="server" id="divRole">
                            
                            <div class="col-lg-10" >
                                <div class="input-group">    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>       
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
                                  <!--  <div class="form-group" >
                                <div class="col-lg-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="glyphicon glyphicon-tags"></i></span>
                                                <select class="form-control" name="level" required="">
                                                       <option value="" <?php
                                                 //if (!isset($_GET['level']))
                                                   //  echo "selected";
                                                 ?>>Select Level</option>
                                                    <option>First Year</option>
                                                    <option>Second Year</option>
                                                    <option>Third Year</option>
                                                </select>
                                            </div>
                                    </div>
                                       
                              </div> -->
                         <div class="form-group" id="divGender" >
                            
                            <div class="col-lg-10">
                                 <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <div class="radio">
                                   <select class="form-control" name="gender" required="">
                                       <option value="" <?php
                                                 if (!isset($_GET['gender']))
                                                     echo "selected";
                                                 ?>>Select Gender</option>
                                       <option>Male</option>
                                        <option>Female</option>
                                   </select>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="form-group"  id="divEmail">
                            
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                    <input type="email"  id="txtEmail" onkeydown="email()" placeholder="name@example.com" Class="form-control" name="email"  required="" />
                                    <asp:RegularExpressionValidator ID="RegularExpressionValidator1" runat="server" ControlToValidate="txtEmail" ErrorMessage="Please enter a valid Email" ValidationExpression="\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*">Email is not valid</asp:RegularExpressionValidator>
                                </div>
                            </div>
                        </div>
                           <div class="form-group"  id="div1">
                            
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-edit"></i></span>
                                    <input type="number"  ID="txtID"  placeholder="Enter Staff Id" class="form-control" min="0" name="staff_id" required="" value="<?php echo $staff_id;?>" readonly />
                                   
                                </div>
                            </div>
                        </div>
                        <div class="form-group" id="divPassword">
                          
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type="password" ID="txtPassword"  onkeydown="pass()"  class="form-control"
                                        TextMode="Password" name="password" required="" minlength="7" />
                                </div>
                            </div>
                        </div>

                        <div class="form-group"  id="divConPassword">
                            
                            <div class="col-lg-10">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                    <input type="password" ID="txtConfirmPassword" onkeydown="conPass()" placeholder="Confirm Password" class="form-control"
                                         name="conPass" minlength="8" required="" />
                                </div>
                                <div>
                                    <div style="margin-top: 20px">
                                        <div class=" messagealert " id="alert_container" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <input type="submit" ID="btnSubmit"  class="btn btn-primary" Text="Submit"  name="btnSubmit" />
                                <a href="main.php" ID="btnCancel" runat="server" class="btn btn-warning" Text="Cancel" >Cancel</a>                              
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

 <?php if (isset($_GET['status']) && $_GET['status'] === "error") : ?>
   toastr.error("Duplicate Entry: Staff ID or Email Already Exist");
    <?php endif;?>

<?php if (isset($_GET['email']) && $_GET['email'] === "invalidEmail") : ?>
   toastr.error("Invalid Email Address!! Please Use Correct and active Email");
    <?php endif;?>
    <?php if (isset($_GET['status']) && $_GET['status'] === "error_c") : ?>
   toastr.error("All Fields are Required");
    <?php endif;?>
  <?php if (isset($_GET['status']) && $_GET['status'] === "checked") : ?>
   toastr.success("Detail Found!! Fill the forms All Fields are Required");
    <?php endif;?>

toastr.options={
        "preventDuplicates":true, 
        "positionClass": "Top Center",
        "progressBar": true,
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
                
                "img/background.jpg",
                "img/back13.jpg",
                "img/back14.jpg",
                "img/back15.jpg",
                "img/back16.jpg",
                "img/back17.jpg",
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

