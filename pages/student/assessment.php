<?php session_start();
if(! isset($_SESSION['uid'])){
    header("location: ../../main.php");
 }else{
 
//$roleID=$_SESSION['role'];
$levelID=$_SESSION['level'];
$username=$_SESSION['name'];
$userImage=$_SESSION['image'];
$dept=$_SESSION['dept'];
//$course=$_SESSION['course'];
$user_id=$_SESSION['uid'];
$VID=$_SESSION['viewID'];
include 'connect/ConDb.php';
?>
<?php if(isset($_SESSION['viewID'])):?>
    <?php
//not completed
if(isset($_POST['upload']))
{
  $ass_title=$_POST['title'];
  if($ass_title==$ass_titleChecker){
  $target='../../resources/'.$_FILES['file_upload']['name'];
    $image=$_FILES['file_upload']['name'];

    if(move_uploaded_file($_FILES['file_upload']['tmp_name'],$target )){ 
$insertqry="INSERT INTO ass_student(ass_title,file_link,dept,course,level,uid)
VALUES('$ass_title','$image','$dept','$VID','$levelID','$uid')";
  mysqli_query($db,$insertqry);
  }
}else{
  header("location: assessment.php?status=nameError");
}
}
?>
<?php endif;?>



<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head >
    <!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
    <!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
    <!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
    <!--[if IE 9]> <html class="no-js ie9 oldie" lang="en"> <![endif]-->
    <meta charset="utf-8"/>
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content="Coming soon, Bootstrap, Bootstrap 3.0, Free Coming Soon, free coming soon, free template, coming soon template, Html template, html template, html5, Code lab, codelab, codelab coming soon template, bootstrap coming soon template"/>
       
    <title>Assessments</title>
<!-- <link rel="shortcut icon" type="image/ico" href="img/favicon.ico"/> -->
<link rel="icon" href="img/logo.jpg" type="image/icon" sizes="16x16">
    <!-- ============ Add custom CSS here ============ -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../dist/css/my_style.css" rel="stylesheet" type="text/css" />
    <link href="../../dist/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="../../dist/css/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link href="../../dist/css/item_style.css" rel="stylesheet" type="text/css" />
    <link href="../../dist/css/hover.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="../../message/css/toastr.min.css">
    <script src="../../dist/js/jquery-ui.js"></script>
    <script src="../../dist/js/jquery-2.1.4.js"></script>
    <script src="../../dist/js/jquery.js"></script>
    <script src="../../dist/js/bootstrap.js"></script>
<script src="https://use.fontawesome.com/2199ab073c.js"></script> 
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
           var cssclass;
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

</head>

<body style="background-image: url(img/colorful.jpg);">
    <form id="form1" method="post" enctype="multipart/form-data">

        <?php include 'include/navbar.php' ?>

      
        <div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div ID="upModal"  ChildrenAsTriggers="false" UpdateMode="Conditional">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="submit" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">
                                    <Label ID="lblModalTitle"  Text=""></Label></h4>
                            </div>
                            <div class="modal-body">
                                <Label ID="lblModalBody"  Text=""></Label>
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-info" data-dismiss="modal" aria-hidden="true">Close</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
<?php
$SeletSet=mysqli_query($db,"SELECT * from ass where  level='$levelID' and course='$VID' and status='0'");
$row=mysqli_fetch_array($SeletSet);
?>

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="coursecontent">
                <?php if($row['status']==='0'):?>
                <div class="form-horizontal">
                    <fieldset>
                        <legend>Upload Assignments</legend>
                        <div class=" messagealert" id="alert_container" >
                        </div>
                        <div id="divLesson" class="form-group" >
                            <Label class="control-lab">Assignment title</Label>
                            <input type="text" name="title" id="txtLesson" onkeydown="lesson()"  placeholder="Assignment title" class="form-control" required="">
                        </div>
                       
                        <div class=" form-group" id="divContentLink" >
                            <Label>Select File</Label>
                            <input type="file" name="file_upload" class="form-control"  ID="fuContentLink" required="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" name="upload" Text="Upload File" ID="btnPostFile"  class="btn btn-primary" value="Upload">
                        </div>
                        <Label ID="lblMsg"  Visible="false"></Label>
                    </fieldset>
                </div>
                <?php endif;?>
                <div class=" messagealert" id="success_container" >
                </div>
            </div>
        </div>

        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Uploaded Assignment:
                      <?php if($row['status']==='0'):?>
                      <marquee> <b>Please Note that when the due date is over the file will no longer be visible<b/></marquee>
                      <?php endif;?>
                      <?php if($row['status']=='1'):?>
                      <marquee> <b>Sorry there are no assignment available<b/></marquee>
                      <?php endif;?>
                      </h3>
                </div>
                <div class="panel-body" style="height: 100%; min-height: 514px; background-color: #e2e2e2">
                    <div class=" messagealert" id="del_container" >
                      <?php
                        $up="SELECT ass.*,coursetbl.course,course_reg.uid,course_reg.cid FROM ass LEFT JOIN coursetbl ON ass.course=coursetbl.cid LEFT JOIN course_reg ON coursetbl.cid=course_reg.cid where ass.level='$levelID' and course_reg.cid='$VID'";
                         $upData=mysqli_query($db,$up);
                         
                       ?>

                        </div>
                
                        <div>
                           <?php 
                            while($row=mysqli_fetch_array($upData))
                            {
                              $id=$row['ass_id'];
                              $cour=$row['cid'];
                              $fullName=$row['email'];
                            $date=date('Y-m-d', strtotime($row['dop']));
                            $time=date('H:i A',strtotime($row['dop']));
                            $sub_date=date('Y-m-d', strtotime($row['sub_date']));
                          $sub_time=date('H:i A', strtotime($row['sub_time']));
                           $ass_titleChecker=$row['ass_title']; 

                          $newSubTime=strtotime($row['sub_time']);
                          $cdate=date('Y-m-d');
                            
                          ?>
                          <?php
                        $result = mysqli_query($db,"SELECT substring_index(`file_link`,'.',-1) as `ext` FROM `ass` WHERE ass_id='$id'");
                          $dat = mysqli_fetch_array($result);
                            ?>
                           <?php if (($sub_date) > ($cdate)):?>
                           <?php if (($newSubTime) >= (strtotime($cdate))):?>
                            <div id="pricePlans" style="overflow: hidden" class=" hvr-float-shadow">
                                <ul id="plans">
                                    <li class="plan">
                                        <ul class="planContainer">
                                            <li style="margin: 10px">
                                                <h5 style="cursor: pointer;">
                                           
                                                <a href="temp.php?viewID=<?php echo $row['ass_id']?>">
                                              <?php echo $row['ass_title']?>
                                             </a>
                                             <br><br>
                                             <a href="temp.php?viewID=<?php echo $row['ass_id']?>" style="text-decoration: none;color:darkblue;font-size: 15px;">
                                                    <?php echo $row['course']?>
                                                    
                                                  </a>
                                             <br>
                                            
                                                <!--adding images start -->
                                            <?php if($dat['ext']==='pdf'):?>
                                              <a href="temp.php?viewID=<?php echo $row['ass_id']?>">
                                            <img src="../../icons/pdfx.png"  class="img-fluid img-thumbnail" width="50px" height="50px">Preview</a>
                                                    <?php endif;?>
                                                <!--thumnail for video -->
                                              <?php if($dat['ext']==='mp4'):?>
                                            <a href="temp.php?viewID=<?php echo $row['ass_id']?>">
                                            <img src="../../icons/videox.png"  class="img-fluid img-thumbnail" width="50px" height="50px">Play</a>
                                                <?php endif;?>
                                                <!--thumbnail for word -->
                                              <?php if($dat['ext']==='docx'):?>
                                                 <a href="temp.php?viewID=<?php echo $row['ass_id']?>">
                                                <img src="../../icons/docx.png"  class="img-fluid img-thumbnail" width="50px" height="50px">Download</a>
                                                <?php endif;?>
                                                <!-- thumbnail for -->
                                                <?php if($dat['ext']==='webm'):?>
                                                  <a href="temp.php?viewID=<?php echo $row['ass_id']?>">
                                                <img src="../../icons/videox.png"  class="img-fluid img-thumbnail" width="50px" height="50px">Preview</a>
                                                <?php endif;?>

                                                <?php if($dat['ext']==='pptx'):?>
                                                 <a href="temp.php?viewID=<?php echo $row['ass_id']?>">
                                                <img src="../../icons/pptx.png"  class="img-fluid img-thumbnail" width="50px" height="50px">Download</a>
                                                <?php endif;?>
                                                <?php if($dat['ext']==='xlsx'):?>
                                                  <a href="temp.php?viewID=<?php echo $row['ass_id']?>">
                                                <img src="../../icons/xlsx.png"  class="img-fluid img-thumbnail" width="50px" height="50px">Download</a>
                                                <?php endif;?>
                                                <?php if($dat['ext']==='xls'):?>
                                                  <a href="temp.php?viewID=<?php echo $row['ass_id']?>">
                                                <img src="../../icons/xlsx.png"  class="img-fluid img-thumbnail" width="50px" height="50px">Download</a>
                                                <?php endif;?>

                                                <?php if($dat['ext']==='avi'):?>
                                              <a href="temp.php?viewID=<?php echo $row['ass_id']?>"> 
                                                <img src="../../icons/avi.png"  class="img-fluid img-thumbnail" width="50px" height="50px">Preview</a>
                                                <?php endif;?>

                                              <?php if($dat['ext']==='mkv'):?>
                                                <a href="temp.php?viewID=<?php echo $row['ass_id']?>">
                                                <img src="../../icons/youtube.png"  class="img-fluid img-thumbnail" width="50px" height="50px">Preview</a>
                                                <?php endif;?>
                                                <?php if($dat['ext']==='mkv'):?>
                                                  <a href="temp.php?viewID=<?php echo $row['ass_id']?>">
                                                <img src="../../icons/youtube.png"  class="img-fluid img-thumbnail" width="50px" height="50px">Preview</a>
                                                <?php endif;?>

                                                <?php if($dat['ext']==='mp3'):?>
                                                  <a href="temp.php?viewID=<?php echo $row['ass_id']?>">
                                                <img src="../../icons/mp3.png"  class="img-fluid img-thumbnail" width="50px" height="50px">Preview</a>
                                                <?php endif;?> 
                                                <br>
                                                <small style="color: darkblue;font-size: 15px;">
                                              <span style="font-size: 12px;font-style: italic;">Date Posted: <?php echo $date?></span>
                                              <br>
                                              <span style="font-size: 12px;font-style: italic;">Time Posted: <?php echo $time?></span>
                                              <br>
                                              <span style="font-size: 12px;font-style: italic;">Due Date: <?php echo $sub_date?></span>
                                              <br>
                                              <span style="font-size: 12px;font-style: italic;">Due Time: <?php echo $sub_time?></span>
                                              </small>
                                              <br>
                                               
                                                  <br>
                                                 <!-- <a href="assessment.php?id=<?php //echo $row['ass_id']?>" style="color:red;">Delete</a> -->
                                                </h5>
                                            </li>
                                            <li>
                                               
                                            </li>
                                            <li>
                                                <ul class="options">
                                                    <li><span>
                                                        </span></li>
                                                </ul>
                                            </li>
                                            <li>
                                                <div  style="margin: 10px">
                                                    
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                             <?php endif;?>
                          <?php endif;?>
                               <?php
                         }
                        ?>
                        </div>
                    

                </div>
            </div>
        </div>
        
    </form>


<script src="../../dist/js/jquery-2.1.4.js" type="text/javascript"></script>
     <script src="../../message/js/toastr.min.js"></script>
        <script >

 <?php if (isset($_GET['status']) && $_GET['status'] === "nameError") : ?>
   toastr.error("Please enter correct assigment title");
    <?php endif;?>



toastr.options={
        "preventDuplicates":true, 
        "positionClass": "Top Center",
        "progressBar": true
    }
 </script>
 <?php
}
?>
</body>
</html>