   <?php
 error_reporting(0);
session_start();
if(! isset($_SESSION['uid'])){
    header("location: ../main.php");
 }else{
  if((time()-$_SESSION['last_login_time_teacher'])>1800){
    header("location: logout.php");
}else{
 
 include '../connect/ConDb.php'; 
$dept=$_SESSION['dept'];
$uid=$_SESSION['uid'];
$username=$_SESSION['name'];
$userImage=$_SESSION['image'];
$email=$_SESSION['email'];

?>

<?php if(isset($_SESSION['viewID'])):?>

<?php
 $course_ud=$_SESSION['viewID'];
//$uid=$_SESSION['cid']
$lid=$_SESSION['levelid'];
if(isset($_POST['upload']))
{
  $ass_title=$_POST['title'];
  $date=$_POST['date'];
  $time=$_POST['time'];
  $target='../resources/'.$_FILES['file_upload']['name'];
    $image=$_FILES['file_upload']['name'];

    if(move_uploaded_file($_FILES['file_upload']['tmp_name'],$target )){ 
$insertqry="INSERT INTO ass(ass_title,file_link,course,dept,level,email,sub_date,sub_time)
VALUES('$ass_title','$image','$course_ud','$dept','$lid','$uid','$date','$time')";
  mysqli_query($db,$insertqry);
  }
}
?>
<?php endif;?>
<!DOCTYPE html>
 <?php 

if(isset($_GET['id'])){
  $id=$_GET['id'];
  $getFile=mysqli_query($db,"SELECT * FROM ass where ass_id='$id'");
  $fileDel=mysqli_fetch_array($getFile);
  $file=$fileDel['file_link'];
  mysqli_query($db,"DELETE FROM ass where ass_id='$id'");
  unlink("../resources/".$file);
}

?>  
<html xmlns="http://www.w3.org/1999/xhtml">
<head >
    
    <meta charset="utf-8"/>
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content="Josco lms is designed to help students learn at their own pace. It very responsive and can fit on any device.You can contact ultdev at info@ultdev.com for more info"/>
       
    <title>Assessments</title>
    <link rel="icon" href="img/logo.jpg" type="image/icon" sizes="16x16">
<link rel="shortcut icon" type="image/ico" href="img/favicon.ico"/>
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
  <?php include 'include/navbar.php'; ?>
 
    <form id="form1" method="post" enctype="multipart/form-data" autocomplete="off">

     

        <ScriptManager  />
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

        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="coursecontent">
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
                        <div class=" form-group" id="divContentLink" >
                            <Label>Submisson Date</Label>
                            <input type="date" name="date" class="form-control"  ID="fuContentLink" required="" />
                        </div>
                        <div class=" form-group" id="divContentLink" >
                            <Label> SubmissonTime</Label>
                            <input type="time" name="time" class="form-control"  ID="fuContentLink" required=""/>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="upload" Text="Upload File" ID="btnPostFile"  class="btn btn-primary" value="Upload">
                        </div>
                        <Label ID="lblMsg"  Visible="false"></Label>
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
                      <?php
                        $up="SELECT ass.*,coursetbl.course FROM ass LEFT JOIN coursetbl on ass.course=coursetbl.cid where email='$uid' and ass.course='$course_ud'";
                        $upData=mysqli_query($db,$up);

                         
                       ?>

                        </div>
                
                        <div>
                           <?php 
                            while($row=mysqli_fetch_array($upData)){
                              $id=$row['ass_id'];
                            $date=date('Y-m-d', strtotime($row['dop']));
                            $time=date('H:i A',strtotime($row['dop']));  
                          $sub_date=date('Y-m-d', strtotime($row['sub_date']));
                          $sub_time=date('H:i A', strtotime($row['sub_time']));
                          ?>
                          <?php
                        $result = mysqli_query($db,"SELECT substring_index(`file_link`,'.',-1) as `ext` FROM `ass` WHERE ass_id='$id'");
                          $dat = mysqli_fetch_array($result);
                            ?>
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
                                            <img src="../icons/pdfx.png"  class="img-fluid img-thumbnail" width="50px" height="50px">Preview</a>
                                                    <?php endif;?>
                                                <!--thumnail for video -->
                                              <?php if($dat['ext']==='mp4'):?>
                                            <a href="temp.php?viewID=<?php echo $row['ass_id']?>">
                                            <img src="../icons/videox.png"  class="img-fluid img-thumbnail" width="50px" height="50px">Play</a>
                                                <?php endif;?>
                                                <!--thumbnail for word -->
                                              <?php if($dat['ext']==='docx'):?>
                                                 <a href="temp.php?viewID=<?php echo $row['ass_id']?>">
                                                <img src="../icons/docx.png"  class="img-fluid img-thumbnail" width="50px" height="50px">Download</a>
                                                <?php endif;?>
                                                <!-- thumbnail for -->
                                                <?php if($dat['ext']==='webm'):?>
                                                  <a href="temp.php?viewID=<?php echo $row['ass_id']?>">
                                                <img src="../icons/videox.png"  class="img-fluid img-thumbnail" width="50px" height="50px">Preview</a>
                                                <?php endif;?>

                                                <?php if($dat['ext']==='pptx'):?>
                                                 <a href="temp.php?viewID=<?php echo $row['ass_id']?>">
                                                <img src="../icons/pptx.png"  class="img-fluid img-thumbnail" width="50px" height="50px">Download</a>
                                                <?php endif;?>
                                                <?php if($dat['ext']==='xlsx'):?>
                                                  <a href="temp.php?viewID=<?php echo $row['ass_id']?>">
                                                <img src="../icons/xlsx.png"  class="img-fluid img-thumbnail" width="50px" height="50px">Download</a>
                                                <?php endif;?>

                                                <?php if($dat['ext']==='avi'):?>
                                              <a href="temp.php?viewID=<?php echo $row['ass_id']?>"> 
                                                <img src="../icons/avi.png"  class="img-fluid img-thumbnail" width="50px" height="50px">Preview</a>
                                                <?php endif;?>

                                              <?php if($dat['ext']==='mkv'):?>
                                                <a href="temp.php?viewID=<?php echo $row['ass_id']?>">
                                                <img src="../icons/youtube.png"  class="img-fluid img-thumbnail" width="50px" height="50px">Preview</a>
                                                <?php endif;?>
                                                <?php if($dat['ext']==='mkv'):?>
                                                  <a href="temp.php?viewID=<?php echo $row['ass_id']?>">
                                                <img src="../icons/youtube.png"  class="img-fluid img-thumbnail" width="50px" height="50px">Preview</a>
                                                <?php endif;?>

                                                <?php if($dat['ext']==='mp3'):?>
                                                  <a href="temp.php?viewID=<?php echo $row['ass_id']?>">
                                                <img src="../icons/mp3.png"  class="img-fluid img-thumbnail" width="50px" height="50px">Preview</a>
                                                <?php endif;?> 
                                                <br>
                                                <small style="color: darkblue;font-size: 15px;">
                                              <span style="font-size: 12px;font-style: italic;">Date: <?php echo $date?></span>
                                              <br>
                                              <span style="font-size: 12px;font-style: italic;">Time: <?php echo $time?></span>
                                              <br>
                                              <span style="font-size: 12px;font-style: italic;">Due Date: <?php echo $sub_date?></span>
                                              <br>
                                              <span style="font-size: 12px;font-style: italic;">Due Time: <?php echo $sub_time?></span>
                                              </small>
                                             
                                              <br>
                                               
                                                  <br>
                                                 <a href="assessment.php?id=<?php echo $row['ass_id']?>" style="color:red;">Delete</a>
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
                               <?php
                         }
                        ?>
                        </div>
                    

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