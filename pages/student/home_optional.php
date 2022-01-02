<?php error_reporting(0);?>

<!DOCTYPE html>

<html >
<head >
    
    <meta charset="utf-8" />
    <!-- Set the viewport width to device width for mobile -->
   <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <link rel="shortcut icon" type="image/ico" href="img/favicon.ico"/>
    <meta name="description" content="Coming soon, Bootstrap, Bootstrap 3.0, Free Coming Soon, free coming soon, free template, coming soon template, Html template, html template, html5, Code lab, codelab, codelab coming soon template, bootstrap coming soon template" />

    <title>Home</title>
<link rel="icon" href="img/logo.jpg" type="image/icon" sizes="16x16">
    <!-- Start WOWSlider.com HEAD section -->
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <script type="text/javascript" src="engine1/jquery.js"></script>
    <!-- End WOWSlider.com HEAD section -->

    <!-- ============ Add custom CSS here ============ -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../dist/css/my_style.css" rel="stylesheet" type="text/css" />
    <link href="../../dist/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="../../dist/css/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../simplechat/css/style.css">
  <link rel="stylesheet" href="livechat/bootstrap/css/bootstrap.min.css">
  <script type="text/javascript" src="livechat/js/jquery.min.js"></script>
<script src="https://use.fontawesome.com/2199ab073c.js"></script> 
    <script src="../../dist/js/jquery-ui.js"></script>
    <script src="../../dist/js/jquery-2.1.4.js"></script>
     <script src="../../dist/js/bootstrap.min.js"></script>

</head>
<body style="background-image: url(img/colorful.jpg);">
 
<?php include 'include/navbar_optional.php';
 if(! isset($_SESSION['uid'])){
    header("location: ../../main.php");
 }else{
 ?>
        
<?php

$levelID=$_SESSION['level'];
$username=$_SESSION['name'];
$userImage=$_SESSION['image'];
$email=$_SESSION['index_number'];
$course=$_SESSION['course'];
$view=$_SESSION['viewID'];
include 'connect/ConDb.php';
$data=mysqli_query($db,"SELECT * FROM course_link where cid='$view' and level='$levelID'");
$row=mysqli_fetch_array($data);

?>
   
        
        <div class="container registrationform" style="height: 560px;border-radius: 5px;width: 90%;">

          <div class="row">
            <div class="col-md-8">
              
             <?php if($row['course_link']!==''):?>
           <iframe src="<?php echo $row["course_link"]?>" width="900" height="500" frameborder="0" allowfullscreen></iframe>
           <?php endif;?>

           <?php if($row['course_link']==''):?>
           <marquee><p>SORRY THERE ARE NO LIVE LESSON OR SELECT A COURSE TO VIEW</p></marquee>
           <?php endif;?>

           </div>

  <div class="col-md-4">
<div id="wrapper" style="height:650px;">
  <div id="menu">
  <p><b>HI - <a style="color: white"><?php echo $_SESSION['name']; ?> &nbsp;&nbsp;&nbsp;&nbsp;</p><hr/>
    <p class="welcome"></a></b></p>
    <!-- <p class="logout"><a id="exit" href="#" class="btn btn-default">Exit Live Chat</a></p> -->
  <div style="clear: both"></div>
  </div>
  <div id="chatbox" style="height: 300px;">
  
  </div>

</div>


<script>
    function manage(usermsg) {
    var bt = document.getElementById('submitmsg');
    if (usermsg.value != '') {
      bt.disabled = false;
    }
    else {
      bt.disabled = true;
    }
  }
</script>

            </div>
          </div>
            

            <!-- <img style="width:100%; height:500px" src="img/back2.jpg" alt="Alternate Text" /> -->
              <!-- <video style="width:100%;height: 500px" autoplay="" muted="true" loop="">
                <source src="../background/exams.mp4" type="" style="width: 100%">
            </video> -->
          
        </div>

  <?php
 }
  ?> 
</body>
</html>
