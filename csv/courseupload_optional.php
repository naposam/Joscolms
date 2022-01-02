<?php
session_start();
?>
<head>
  <link rel="icon" href="../img/logo.jpg" type="image/icon" sizes="16x16">
</head>
<?php include ('controllerAuth_optional.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
   
   <meta charset="utf-8">
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/ico" href="../img/favicon.ico"/>
    <meta name="description" content="Coming soon, Bootstrap, Bootstrap 3.0, Free Coming Soon, free coming soon, free template, coming soon template, Html template, html template, html5, Code lab, codelab, codelab coming soon template, bootstrap coming soon template">
    <title>Upload Optional Courses</title>

    <script type="text/javascript" src="../dist/js/jquery-ui.js"></script>
    <script type="text/javascript" src="../dist/js/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="../dist/js/jquery.js"></script>
    <script type="text/javascript" src="../dist/js/bootstrap.js"></script> 
    <link rel="stylesheet" type="text/css" href="message/css/toastr.min.css">
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../message/css/toastr.min.css">
    <link href="../dist/css/my_style.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/font-awesome.css" rel="stylesheet" type="text/css" />


</head>
<body style="background-image: url(../img/34.jpg);">
     <?php include 'navbar.php';?>
        <?php
	if (! isset ($_SESSION['sess_user_id'])) {
	 header("location: login.php");
	} else {
        if((time()-$_SESSION['last_login_time'])>1800){
    header("location: logout.php");
}else{

         ?>
    <center><br><br><br><br><br><br>
    <div class="contanier" style="width:80%;background-color: rgba(0,0,0,0.5); box-shadow: 5px 5px 10px white; height: 500px!important;">
        <div class="row">
                    <br><br>
            <div class="col-md-12 col-sm-12 col-lg-12">
             <div class="contanier" style="width: 80%;background-color: rgba(0,0,0,0.7);box-shadow: 5px 5px 10px white; height: 400px;">
                <br>
                <h4 style="font-family: sans-serif;color: white;letter-spacing: 3px;">UPLOAD OPTIONAL COURSES</h4>
                <img src="../img/st.png" width="150" height="150">
            <form action="" method="post" enctype="multipart/form-data">
            <br>
            <input type="file" name="file" class="form-control" style="width: 40%">
            <br>
            <button  type="submit" name="courseupload" class="btn btn-success" >Save Student Data</button>
            </form>
        </div>
    </div>
        
        <!-- <div class="col-md-6 col-sm-12 col-lg-6" >
            <div class="contanier" style="width: 80%;background-color: rgba(0,0,0,0.7);box-shadow: 5px 5px 10px white; height: 400px;">
                <br>
                <h4 style="font-family:sans-serif;color: white;letter-spacing: 3px;">UPLOAD STAFF DATA</h4>
                <img src="../img/st.png" width="150" height="150">
                <form action="" method="post" enctype="multipart/form-data">
                <br>
                <input type="file" name="file" class="form-control"  style="width: 80%">
                <br>
                <button  type="submit" name="submitfile" class="btn btn-success"  >Save Staff Data</button>
                 </form>
            </div>
        </div> -->
    <!-- <form method="post" >
    <button type="submit" name="export">Export</button>
    </form>  -->
        </div>
    </div>
</center>
<script src="../dist/js/jquery-2.1.4.js" type="text/javascript"></script>
<script src="../message/js/toastr.min.js"></script>
        <script >

 <?php if (isset($_GET['status']) && $_GET['status'] === "create") : ?>
   toastr.success("Data Save successfully");
    <?php endif;?>

<?php if (isset($_GET['status']) && $_GET['status'] === "error") : ?>
   toastr.error("Unable Save Data");
    <?php endif;?>
    <?php if (isset($_GET['status']) && $_GET['status'] === "error_c") : ?>
   toastr.error("All Fields are Required");
    <?php endif;?>
toastr.options={
        "preventDuplicates":true, 
        "positionClass": "Top Center",
        "progressBar": true
    }
 </script>
 <?php
}
	}
 ?>
</body>
</html>