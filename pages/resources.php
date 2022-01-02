 <?php 
 error_reporting(0);
session_start();
$uid=$_SESSION['uid'];
$name=$_SESSION['name'];
$imge=$_SESSION['image'];
$email=$_SESSION['email'];
$dpt = $_SESSION['dept'];
?>
<?php if(isset($_SESSION['viewID'])):?>
<?php
//yet to initialized view course model
$course=$_SESSION['viewID'];
$levelid=$_SESSION['levelid'];
include '../connect/ConDb.php';

if(isset($_POST['upload']))
{
   $lesson_id=$_POST['lesson'];
  $content_title=$_POST['content_title'];
  $target='../resources/'.$_FILES['file']['name'];
    $image=$_FILES['file']['name'];

    if(move_uploaded_file($_FILES['file']['tmp_name'],$target )){ 
$insertqry="INSERT INTO resources(course,lesson_id,content_title,uid,content_link,level,dept)
VALUES('$course','$lesson_id','$content_title','$uid','$image','$levelid','$dpt')";
  mysqli_query($db,$insertqry);
  }
}
?>
<?php endif;?>
 <head>
  <link rel="icon" href="img/logo.jpg" type="image/icon" sizes="16x16">
</head>



<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head >
    
    <meta charset="utf-8"/>
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content="Coming soon, Bootstrap, Bootstrap 3.0, Free Coming Soon, free coming soon, free template, coming soon template, Html template, html template, html5, Code lab, codelab, codelab coming soon template, bootstrap coming soon template"/>
       
    <title>Resources</title>

<!-- <link rel="shortcut icon" type="image/ico" href="img/favicon.ico"/> -->

    <!-- ============ Add custom CSS here ============ -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/my_style.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/item_style.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/hover.css" rel="stylesheet" type="text/css" />
<script src="https://use.fontawesome.com/2199ab073c.js"></script>
    <script src="../dist/js/jquery-ui.js"></script>
    <script src="../dist/js/jquery-2.1.4.js"></script>
    <script src="../dist/js/jquery.js"></script>
    <script src="../dist/js/bootstrap.js"></script>

   <script type="text/javascript">

       function lesson() {           
           document.getElementById("divLesson").className = "form-group";
           document.getElementById("alert_container").className = "hide"
       }

       function tit() {
           document.getElementById("divTitle").className = "form-group";
           document.getElementById("alert_container").className = "hide"
       }

       function ShowModal() {
           $('#myModal').modal('show');
       }
       
       function ShowMessage(message, messagetype) {
           var class;
           switch (messagetype) {
               case 'Success':
                   class = 'alert-success'
                   $('#success_container').append('<div id="alert_div" style="margin: 0 0.5%; -webkit-box-shadow: 3px 4px 6px #999;" class="alert fade in ' + class + '"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>' + messagetype + '!</strong> <span>' + message + '</span></div>');
                   $('#del_container').append('<div id="alert_div" style="margin: 0 0.5%; -webkit-box-shadow: 3px 4px 6px #999;" class="alert fade in ' + class + '"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>' + messagetype + '!</strong> <span>' + message + '</span></div>');
                   break;
               case 'Error':
                   class = 'alert-danger'
                   $('#alert_container').append('<div id="alert_div" style="margin: 0 0.5%; -webkit-box-shadow: 3px 4px 6px #999;" class="alert fade in ' + class + '"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>' + messagetype + '!</strong> <span>' + message + '</span></div>');
                   $('#del_container').append('<div id="alert_div" style="margin: 0 0.5%; -webkit-box-shadow: 3px 4px 6px #999;" class="alert fade in ' + class + '"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>' + messagetype + '!</strong> <span>' + message + '</span></div>');
                   break;
               case 'Warning':
                   class = 'alert-warning'
                   break;
               default:
                   class = 'alert-info'
           }
           
       }

   </script>
                         <script type="text/javascript">
						    	function letteronly(input){
						    		var regex=/[^-a-zA-Z ]/gi;
						    		input.value=input.value.replace(regex,"");
						    	}
						   
						   </script>

</head>
<body style="background-image: url(img/colorful.jpg);">
   <?php include 'include/navbar.php'; 
if(!isset($_SESSION['uid'])){
    header("location: ../main.php");
 }else{
  if((time()-$_SESSION['last_login_time_teacher'])>1800){
    header("location: logout.php");
}else{
 
 ?>

    <form id="form1" method="post" enctype="multipart/form-data" autocomplete="off">

               

        <ScriptManager  />
        <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModallabel" aria-hidden="true">
            <div class="modal-dialog">
                <UpdatePanel ID="upModal"  ChildrenAsTriggers="false" UpdateMode="Conditional">
                    <ContentTemplate>
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">
                                    <label ID="lblModalTitle"  Text=""></label></h4>
                            </div>
                            <div class="modal-body">
                                <label ID="lblModalBody"  Text=""></label>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-info" data-dismiss="modal" aria-hidden="true">Close</button>
                            </div>
                        </div>
                    </ContentTemplate>
                </UpdatePanel>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="coursecontent">
                <div class="form-horizontal">
                    <fieldset>
                        <legend>Upload Course Content</legend>
                        <div class=" messagealert" id="alert_container" >
                        </div>
                        <div id="divLesson" class="form-group" >
                            <label >Lessons Number</label>
                            <input type="text" name="lesson" id="lesson" onkeydown="lesson()"  placeholder="Lesson number" class="form-control" onkeyup="letteronly(this)"/>
                        </div>
                        <div id="divTitle" class="form-group" >
                            <label >Content Title</label>
                            <input type="text" name="content_title" id="txt" onkeydown="tit()"  placeholder="Content Title" class="form-control" onkeyup="manage(this)"/>
                        </div>
                      
                        <div class=" form-group" id="divContentLink" >
                            <label>Select File To Upload</label>
                            <input type="file" name="file" class="form-control"  required="" />
                        </div>

                        <div class="form-group">
                            <input type="submit" name="upload" value="Upload File" id="btnPostFile"  class="btn btn-primary" disabled="" />
                        </div>
                        <label ID="lblMsg"  Visible="false"></label>
                    </fieldset>
                </div>
                <div class=" messagealert" id="success_container" >
                </div>
            </div>
        </div>

        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Uploaded files</h3>
                </div>
                <div class="panel-body" style="height: 100%; min-height: 514px; background-color: #e2e2e2">

                    <div class=" messagealert" id="del_container" >

                        </div>
                        
                       
                    <div ID="dlCustomers"  OnItemCommand="Prev_command"
                        RepeatColumns="6" RepeatDirection="Horizontal" Width="100%">
                       
                        <div>
                          <?php if(isset($_SESSION['viewID'])):?>

                        <?php
                        $course_ud=$_SESSION['viewID'];
                        $up="SELECT resources.*,coursetbl.course FROM resources left join coursetbl on resources.course=coursetbl.cid where resources.uid='$uid' and resources.course='$course_ud'";
                        $upData=mysqli_query($db,$up);

                         
                       ?>
                          <?php 
                            while($row=mysqli_fetch_array($upData)){
                              $id=$row['re_id'];
                              $file=$row['content_link'];
                            
                          ?>
                            <?php
                            //checking for the file extension of lesson
                           $result = mysqli_query($db,"SELECT substring_index(`content_link`,'.',-1) as `ext` FROM `resources` WHERE re_id='$id'");
                          $dat = mysqli_fetch_array($result);
                            ?>
                            <div id="pricePlans" style="overflow: hidden" class=" hvr-float-shadow">
                            
                                <ul id="plans">
                                    <li class="plan">
                                        <ul class="planContainer">
                                            <li style="margin: 10px">
                                                <h4>
                                                  <a href="">
                                              <?php echo $row['lesson_id']?>
                                             </a>
                                             <br>
                                            <small style="color: darkblue;font-size: 15px;"><?php echo $row['content_title']?></small>
                                            <br>
                                                  <a href="" style="text-decoration: none;color:darkblue;font-size: 15px;">
                                                    <?php echo $row['course']?>
                                                    
                                                  </a>

                                                <!--adding images start -->
                                            <?php if($dat['ext']==='pdf'):?>
                                            <img src="../icons/pdfx.png"  class="img-fluid img-thumbnail" width="50px" height="50px">
                                                    <?php endif;?>
                                                <!--thumnail for video -->
                                              <?php if($dat['ext']==='mp4'):?>
                                            <img src="../icons/videox.png"  class="img-fluid img-thumbnail" width="50px" height="50px">
                                                <?php endif;?>
                                                <!--thumbnail for word -->
                                              <?php if($dat['ext']==='docx'):?>
                                                <img src="../icons/docx.png"  class="img-fluid img-thumbnail" width="50px" height="50px">
                                                <?php endif;?>
                                                <!-- thumbnail for -->
                                                <?php if($dat['ext']==='webm'):?>
                                                <img src="../icons/videox.png"  class="img-fluid img-thumbnail" width="50px" height="50px">
                                                <?php endif;?>

                                                <?php if($dat['ext']==='pptx'):?>
                                                <img src="../icons/pptx.png"  class="img-fluid img-thumbnail" width="50px" height="50px">
                                                <?php endif;?>
                                                <?php if($dat['ext']==='xlsx'):?>
                                                <img src="../icons/xlsx.png"  class="img-fluid img-thumbnail" width="50px" height="50px">
                                                <?php endif;?>

                                                <?php if($dat['ext']==='avi'):?>
                                                <img src="../icons/avi.png"  class="img-fluid img-thumbnail" width="50px" height="50px">
                                                <?php endif;?>

                                              <?php if($dat['ext']==='mkv'):?>
                                                <img src="../icons/youtube.png"  class="img-fluid img-thumbnail" width="50px" height="50px">
                                                <?php endif;?>
                                                <?php if($dat['ext']==='mkv'):?>
                                                <img src="../icons/youtube.png"  class="img-fluid img-thumbnail" width="50px" height="50px">
                                                <?php endif;?>

                                                <?php if($dat['ext']==='mp3'):?>
                                                <img src="../icons/mp3.png"  class="img-fluid img-thumbnail" width="50px" height="50px">
                                                <?php endif;?>
                                                    <!-- delete lesson -->
                                                  <br><br>
                                                 <a href="resources.php?id=<?php echo $row['re_id']?>" style="color:red;">delete</a>
                                                </h4>
                                            </li>
                                            <li>
                                              
                                                <!-- content image-->
                                            </li>
                                            <li>
                                                <ul class="options">
                                                    <li><span>

                                                <!-- content_title-->                                                  

                                                  </span></li>
                                                </ul>
                                            </li>
                                            <li>
                                                
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <?php
                         }
                        ?>
                 <?php endif;?>

                 
                        </div>
  <?php if(isset($_GET['id'])){
  $id=$_GET['id'];
  mysqli_query($db,"DELETE FROM resources where re_id='$id'");
  unlink("../resources/".$file);
  //header("location: submittedassessment.php?status=deleted");
}
     ?>

                    </div>

                </div>
            </div>
        </div>

    </form>
    <script>
  function manage(txt) {
    var bt = document.getElementById('btnPostFile');
    if (txt.value != '') {
      bt.disabled = false;
    }
    else {
      bt.disabled = true;
    }
  }

    function check(lesson) {
    var bt = document.getElementById('btnPostFile');
    if (lesson.value != '') {
      bt.disabled = false;
    }
    else {
      bt.disabled = true;
    }
  }

</script>
<?php 
}
    }
?>
</body>
</html>
