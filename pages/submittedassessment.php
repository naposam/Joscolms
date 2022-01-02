 



<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head >
   
    <meta charset="utf-8"/>
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content="josco learning management system"/>
       
    <title>Assessments</title>
  <link rel="shortcut icon" type="image/ico" href="img/favicon.ico"/>
  <link rel="icon" href="img/logo.jpg" type="image/icon" sizes="16x16">
    <!-- ============ Add custom CSS here ============ -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/my_style.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/item_style.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/hover.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="message/css/toastr.min.css">
    <script src="https://use.fontawesome.com/2199ab073c.js"></script>
    <script src="../dist/js/jquery-ui.js"></script>
    <script src="../dist/js/jquery-2.1.4.js"></script>
    <script src="../dist/js/jquery.js"></script>
    <script src="../dist/js/bootstrap.js"></script>

</head>

<body style="background-image: url(img/colorful.jpg);">
  <?php include 'include/navbar.php' ?>
  <?php 


if(! isset($_SESSION['uid'])){
    header("location: ../main.php");
 }else{
 if((time()-$_SESSION['last_login_time_teacher'])>1800){
    header("location: logout.php");
}else{

$dept=$_SESSION['dept'];
$uid=$_SESSION['uid'];
$email=$_SESSION['email'];
$lid= $_SESSION['levelid'];
$username=$_SESSION['name'];
$userImage=$_SESSION['image'];
$email=$_SESSION['email'];

?>
    <form id="form1" method="post" enctype="multipart/form-data">

       

      
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
             
                <div class=" messagealert" id="success_container" >
                </div>
            </div>
        </div>
                  <?php if(isset($_SESSION['viewID'])):?>
                  <?php
                   $course_ud=$_SESSION['viewID'];
                        $up="SELECT ass_student.*,coursetbl.course FROM ass_student LEFT JOIN coursetbl on ass_student.course=coursetbl.cid where ass_student.level='$lid' and ass_student.course='$course_ud' and ass_student.dept='$dept'";
                        $upData=mysqli_query($db,$up);

                         $count=mysqli_num_rows($upData);
                       ?>
                     <?php endif;?>


        <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                <h3 class="panel-title">Total Assignment Submitted : <?php echo $count;?></h3>
                </div>
                <div class="panel-body" style="height: 100%; min-height: 514px; background-color: #e2e2e2">
                    <div class=" messagealert" id="del_container" >
                      
                        </div>
                
                        <div>
                          <?php if(isset($_SESSION['viewID'])):?>
                           <?php 
                            while($row=mysqli_fetch_array($upData)){
                              $id=$row['ass_id'];
                            $date=date('Y-m-d', strtotime($row['dop']));
                            $time=date('H:i A',strtotime($row['dop']));  
                            $file_image=$row['file_link'];
                          ?>
                          <?php
                        $result = mysqli_query($db,"SELECT substring_index(`file_link`,'.',-1) as `ext` FROM `ass_student` WHERE ass_id='$id'");
                          $dat = mysqli_fetch_array($result);
                            ?>
                            <div id="pricePlans" style="overflow: hidden" class=" hvr-float-shadow">
                                <ul id="plans">
                                    <li class="plan">
                                        <ul class="planContainer">
                                            <li style="margin: 10px">
                                                <h5 style="cursor: pointer;">
                                                 <address style="font-size: 13px;text-transform: uppercase;font-style: italic;"><?php echo $row['email']?></address> 
                                                 
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
                                              </small>
                                              <br>
                                               
                                                  <br>
                                                 <a href="submittedassessment.php?id=<?php echo $row['ass_id']?>" style="color:red;">Delete</a>
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
                      <?php endif;?>
                      <!-- check -->
                        
                        </div>
               <?php
if(isset($_GET['id'])){
  $id=$_GET['id'];
  mysqli_query($db,"DELETE FROM ass where ass_id='$id'");
  unlink("../resources/".$file_image);
  //header("location: submittedassessment.php?status=deleted");
}
               ?>     

                </div>
            </div>
        </div>
        
    </form>
    <script src="dist/js/jquery-2.1.4.js" type="text/javascript"></script>
        <script src="message/js/toastr.min.js"></script>
        <script >

 <?php if (isset($_GET['status']) && $_GET['status'] === "deleted") : ?>
   toastr.success("File deleted Successfully");
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