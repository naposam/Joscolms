<?php 
include '../../connect/ConDb.php';
if(isset($_POST['upload']))
{
   $lesson_id=$_POST['lesson'];
  $content_title=$_POST['content_title'];
  $target='../../resources/'.$_FILES['file']['name'];
    $image=$_FILES['file']['name'];

    if(move_uploaded_file($_FILES['file']['tmp_name'],$target )){ 
$insertqry="INSERT INTO resources(lesson_id,content_title,content_link)
VALUES('$lesson_id','$content_title','$image')";
  mysqli_query($db,$insertqry);
  }
}
?>
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
       
    <title>Resources</title>
    <link rel="icon" href="img/logo.jpg" type="image/icon" sizes="16x16">
<link rel="shortcut icon" type="image/ico" href="img/favicon.ico"/>
    <!-- ============ Add custom CSS here ============ -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../dist/css/my_style.css" rel="stylesheet" type="text/css" />
    <link href="../../dist/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="../../dist/css/jquery-ui.css" rel="stylesheet" type="text/css" />
    <link href="../../dist/css/item_style.css" rel="stylesheet" type="text/css" />
    <link href="../../dist/css/hover.css" rel="stylesheet" type="text/css" />
<script src="https://use.fontawesome.com/2199ab073c.js"></script> 
    <script src="../../dist/js/jquery-ui.js"></script>
    <script src="../../dist/js/jquery-2.1.4.js"></script>
    <script src="../../dist/js/jquery.js"></script>
    <script src="../../dist/js/bootstrap.js"></script>

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

</head>
<body style="background-image: url(img/12.jpg);">
    <form id="form1" method="post" enctype="multipart/form-data">

     <?php include 'include/navbar.php';
                if(! isset($_SESSION['uid'])){
           header("location: ../../main.php");
 }else{
 ?>
                

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
                            <input type="text" name="lesson" ID="txtLesson" onkeydown="lesson()"  placeholder="Lesson number" class="form-control">
                        </div>
                        <div id="divTitle" class="form-group" >
                            <label >Content Title</label>
                            <input type="text" name="content_title" ID="txtContentTitle" onkeydown="tit()"  placeholder="Content Title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label Text="Select file thumbnail" >Select file thumbnail</label>
                            <input  type="file" name="thumbnail" class="form-control"  ID="fuThumbnail"  />
                        </div>
                        <div class=" form-group" id="divContentLink" >
                            <label>Select File To Upload</label>
                            <input type="file" name="file" class="form-control"  ID="fuContentLink" />
                        </div>

                        <div class="form-group">
                            <input type="submit" name="upload" value="Upload File" ID="btnPostFile"  class="btn btn-primary" />
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
                            <div id="pricePlans" style="overflow: hidden" class=" hvr-float-shadow">
                                <ul id="plans">
                                    <li class="plan">
                                        <ul class="planContainer">
                                            <li style="margin: 10px">
                                                <h4>
                                                    <!--lesson Id -->
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
                                                <div  style="margin: 10px">
                                                    <!-- <LinkButton class="lnkBtn" ID="lnkBtnPreview" CommandArgument='<%# DataBinder.Eval(Container.DataItem, "content_link")%>' CommandName="prev_command" Text="Preview"  />
                                                    <LinkButton class=" shift" ID="lnkBtnDelete" CommandArgument='<%# DataBinder.Eval(Container.DataItem, "content_link")%>' CommandName="Del_command" Text="Delete"  /> -->
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </form>
    <?php
 }
    ?>
</body>
</html>
