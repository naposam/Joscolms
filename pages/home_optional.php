
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
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/my_style.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/jquery-ui.css" rel="stylesheet" type="text/css" />
 <link rel="stylesheet" href="student/livechat/bootstrap/css/bootstrap.min.css">
<script src="https://use.fontawesome.com/2199ab073c.js"></script>
  <script type="text/javascript" src="student/livechat/js/jquery.min.js"></script>
    <script src="../dist/js/jquery-ui.js"></script>
    <script src="../dist/js/jquery-2.1.4.js"></script>
     <script src="../dist/js/bootstrap.min.js"></script>

</head>
<body style="background-image: url(img/colorful.jpg);">
    <form  >

<?php include 'include/bdnav_optional.php'; 

    
if(! isset($_SESSION['uid'])){
    header("location: ../../main.php");
 }else{
  if((time()-$_SESSION['last_login_time_teacher'])>1800){
    header("location: logout.php");
}else{
 
?>
        
<?php


$username=$_SESSION['name'];
$userImage=$_SESSION['image'];
$email=$_SESSION['email'];

include '../connect/ConDb.php';
 if(isset($_SESSION['viewID'])):
  $course=$_SESSION['viewID'];
$data=mysqli_query($db,"SELECT * FROM course_link where cid='$course'");
$row=mysqli_fetch_array($data);
endif;

?>
        <div class="container registrationform" style="height: 560px;border-radius: 5px;width: 90%;">
          <div class="row">
            <div class="col-md-8">
 
            <?php if($row['course_link']!==''):?>
           <iframe src="<?php echo $row["course_link"]?>" width="900" height="500" frameborder="0" allowfullscreen allow="autoplay; encrypted-media"></iframe>
           <?php endif;?>

           <?php if($row['course_link']==''):?>
           <marquee><p>SORRY THERE ARE NO LIVE LESSON </p></marquee>
           <?php endif;?>
           
        </div>
         <div class="col-md-4">

              <?php
              //error_reporting(0);
  //include ("student/livechat/chat.php");
  //if (! isset ( $_SESSION ['name'] )) {
  //loginForm ();
  //} else {
?>
<div id="wrapper" style="height:650px;">
  <div id="menu">
  <p><b>HI - <a style="color:white;"><?php echo $_SESSION['name']; ?></a> &nbsp;&nbsp;&nbsp;&nbsp;</p><hr/>
    <p class="welcome"></b></p>
    <!-- <p class="logout"><a id="exit" href="#" class="btn btn-default">Exit Live Chat</a></p> -->
  <div style="clear: both"></div>
  </div>
  <div id="chatbox" style="height: 300px;">
  <?php
    // if (file_exists ( "student/livechat/log.html" ) && filesize ( "student/livechat/log.html" ) > 0) {
    // $handle = fopen ( "student/livechat/log.html", "r" );
    // $contents = fread ( $handle, filesize ( "student/livechat/log.html" ) );
    // fclose ( $handle );

    // echo $contents;
    // }
  ?>
  </div>
<!-- <form name="message" action="" autocomplete="off">
  <input name="usermsg" class="form-control" type="text" id="usermsg" placeholder="Create A Message" style="float: left; width: 75%;margin-left: 5px;" onkeyup="manage(this)" />
  <input name="submitmsg" class="btn btn-success " type="submit" id="submitmsg" value="Send" style="float: left;width: 20%;" disabled="" />
</form> -->
</div>

<!-- <script type="text/javascript">
$(document).ready(function(){
});
$(document).ready(function(){
    $("#exit").click(function(){
        var exit = confirm("Are you sure you want quit?");
        if(exit==true){window.location = 'index.php?logout=true';}     
    });
});
$("#submitmsg").click(function(){
        var clientmsg = $("#usermsg").val();
        $.post("student/livechat/post.php", {text: clientmsg});             
        $("#usermsg").attr("value", "");
        loadLog;
    return false;
});
function loadLog(){    
    var oldscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
    $.ajax({
        url: "student/livechat/log.html",
        cache: false,
        success: function(html){       
            $("#chatbox").html(html);       
            var newscrollHeight = $("#chatbox").attr("scrollHeight") - 20;
            if(newscrollHeight > oldscrollHeight){
                $("#chatbox").animate({ scrollTop: newscrollHeight }, 'normal');
            }              
        },
    });
}
setInterval (loadLog, 2500);
</script> -->
<?php
//}
?>

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
</div>
    </form>
    <?php
  }
 }
    ?>
</body>
</html>
