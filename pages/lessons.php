<?php 

error_reporting(0);
session_start();

if(! isset($_SESSION['uid'])){
    header("location: ../main.php");
 }else{
    if((time()-$_SESSION['last_login_time_teacher'])>1800){
    header("location: logout.php");
}else{
 
$uid=$_SESSION['uid'];
$name=$_SESSION['name'];
$imge=$_SESSION['image'];
$email=$_SESSION['email'];
$dpt = $_SESSION['dept'];
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head >
    
    <meta charset="utf-8"/>
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content="Coming soon, Bootstrap, Bootstrap 3.0, Free Coming Soon, free coming soon, free template, coming soon template, Html template, html template, html5, Code lab, codelab, codelab coming soon template, bootstrap coming soon template"/>
    <title>Lessons</title>
<link rel="shortcut icon" type="image/ico" href="img/favicon.ico"/>
<link rel="icon" href="img/logo.jpg" type="image/icon" sizes="16x16">
    <!-- ============ Add custom CSS here ============ -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/my_style.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/hover.css" rel="stylesheet" type="text/css" />
    <script src="https://use.fontawesome.com/2199ab073c.js"></script>
    <script src="../dist/js/jquery-2.1.4.js"></script>
     <script src="../dist/js/bootstrap.min.js"></script>
    <style>
        html, html a {
            color:#e2e2e2;
            -webkit-font-smoothing: antialiased;
            text-shadow: 1px 1px 1px rgba(0,0,0,0.004);
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background: #e2e2e2;
        }

        #plans, #plans ul, #plans ul li {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        #pricePlans {
            width: 155px;
        }

            #pricePlans #plans .plan {                
                float: left;
                width: 100%;
                text-align: center;
            }

        .planContainer .options li {
            font-weight: 700;
            color: #364762;
            line-height: 2.5;
        }

            .planContainer .options li span {
                color: #e2e2e2;
            }

        .planContainer .button {
            text-decoration: none;
            color: #e2e2e2;
            font-weight: 700;
            line-height: 2.6em;
            border: 2px solid #e2e2e2;
            display: inline-block;
            width: 80%;
            height: 2.8em;
            border-radius: 4px;
        }

        .shift {
            margin-left: 10px;
        }

        .planContainer .button.bestPlanButton {
            color: #fff;
            background: #f7814d;
            border: 2px solid #f7814d;
        }

        @media screen and (min-width: 1025px) {

            #pricePlans #plans .plan {
                margin: 5px;
            }

            .planContainer .button:hover {
                background: #e2e2e2;
                color: #3e4f6a;
            }

            .planContainer .button.bestPlanButton:hover {
                background: #ff9c70;
                border: 2px solid #ff9c70;
            }
        }

        .fixed-content {
            height:490px;          
            position: fixed;
            overflow-y: scroll;
            float:left;            
        }

        .assignment {            
            background: rgba(0, 0, 0, 0.3);
            color: #FFF !important;
        }

        #divLsn::-webkit-scrollbar,#divRes::-webkit-scrollbar {
            width:5px;
            background:rgba(0, 0, 0, 0.3);
        }

        #divLsn::-webkit-scrollbar-thumb,#divRes::-webkit-scrollbar-thumb {
            background-color:#3e4f6a;
            border-radius:10px;
        }

        #divLsn::-webkit-scrollbar-thumb:hover,#divRes::-webkit-scrollbar-thumb:hover {
            background-color:#3e4f6a;
            border:1px solid #333333;
        }

        #divLsn::-webkit-scrollbar-thumb:active,#divRes::-webkit-scrollbar-thumb:active {
            background-color:#3e4f6a;
            border:1px solid #333333;
        }


    </style>

</head>
<body style="background-image: url(img/colorful.jpg);">
     <form id="form1" >

            <?php include 'include/navbar.php'; ?>

         <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 assignment" style="width: 200px; height: 560px; border-radius: 5px">
             <div style="text-align: center; text-decoration: underline">
                 <h3>Lessons</h3>
             </div>
             <div id="divLsn">
                 <div ID="dlLessons"  OnItemCommand="Item_Command">
                    
                         <div id="pricePlans" style="overflow: hidden">
                             <ul id="plans">
                                 <li class="plan">
                                     <ul class="planContainer">
                                    <!-- place for lessons buttons  -->
                                <?php if(isset($_SESSION['viewID'])):?>
                                <?php
                                include '../connect/ConDb.php';
                                
                            $course_ud=$_SESSION['viewID'];
                            $verify = $db->query("SELECT * FROM `resources` where uid='$uid' and course='$course_ud'");
                            while($row = mysqli_fetch_array( $verify))
                          {
                                ?>
                                <a href="lessons.php?id=<?php echo $row['re_id']?>" class="btn btn-primary" style="margin:4px;width: 150px"><?php echo $row['lesson_id'];?></a>

                           <?php
                            }
                        
                           ?>
                           <?php endif;?>



                                     </ul>
                                 </li>
                             </ul>
                         </div>
                     
                 </div>
             </div>
         </div>
                                     <?php 
                                     if(isset($_GET['id'])){
                                        $id=$_GET['id'];  
 
                             $data = $db->query("SELECT resources.*,coursetbl.course FROM resources left join coursetbl on resources.course=coursetbl.cid where resources.re_id='$id'");
                             $row = mysqli_fetch_array( $data);
                             }
                                            ?>
         <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12" style="width:70%">
            <div class="panel panel-primary">
                <div class="panel-heading" style="text-align:center">
                   <?php if(isset($id)):?>
                <h3 class="panel-title"  id="txtLessonTitle"><?php echo $row['course']?></h3> 
                    <?php endif;?>
                    <?php if (!isset($id)):?> 
                    <h3 class="panel-title"  id="txtLessonTitle">Lessons</h3>
                    <?php endif;?>                   
                </div>
                <?php if(isset($id)):?>
                <iframe src="../resources/<?php echo $row["content_link"]?>" width="100%" height="514px">
                   </iframe>
                <?php endif;?>
                <?php if (!isset($id)):?>   
                <div class="panel-body" style="height:514px;min-height:514px;text-align:center; background:#e2e2e2">
                    
                    <h3 visible="false"  id="txtSelectRes">Select resourse to preview</h3>
       

                   </div>
                   <?php endif;?>
            </div>
        </div>
         
         <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 assignment" style="height: 100%; width: 200px; min-height: 560px; border-radius: 5px">
             <div style="text-align: center; text-decoration: underline">
                 <h3>Resources</h3>
             </div>
             <div id="divRes">
                 <div ID="dlRes"  OnItemCommand="Res_command">
                    
                         <div id="pricePlans" style="overflow: hidden" class=" hvr-box-shadow-inset grow">
                             <ul id="plans">
                                 <li class="plan">
                                     <ul class="planContainer ">
                                         <!-- <li>
                                             <img  ID="imgPhoto"  Width="80px" Height="80px"  />
                                         </li>
                                         <li>
                                             <ul class="options">
                                                 <li><span>
                                                     <Label ID="lblTitle"></Label></span></li>
                                             </ul>
                                         </li>
                                         <li> -->
                                          <?php 
                                         
                                          $result = mysqli_query($db,"SELECT substring_index(`content_link`,'.',-1) as `ext` FROM `resources` WHERE re_id='$id'");
                                          $dat = mysqli_fetch_array($result);
                                          ?>  
                                        <?php if($dat['ext']==='pdf'):?> 
                                        <a href="lessons.php?id=<?php echo $row['re_id']?>" >
                                        <img src="../icons/pdfx.png"  class="img-fluid img-thumbnail" width="50px" height="50px">
                                          Preview</a>
                                          <p><?php echo $row['course'];?></p> 
                                        <?php endif;?>
                                          
                                         <?php if($dat['ext']==='webm'):?>
                                        <a href="lessons.php?id=<?php echo $row['re_id']?>" >
                                        <img src="../icons/videox.png"  class="img-fluid img-thumbnail" width="50px" height="50px">
                                       Preview</a>
                                          <p><?php echo $row['course'];?></p> 
                                          <?php endif;?>
                                             <?php if($dat['ext']==='mp4'):?>
                                        <a href="lessons.php?id=<?php echo $row['re_id']?>" >
                                        <img src="../icons/videox.png"  class="img-fluid img-thumbnail" width="50px" height="50px">
                                       Preview</a>
                                          <p><?php echo $row['course'];?></p> 
                                          <?php endif;?>

                                        <?php if($dat['ext']==='docx'):?>
                                        <a href="lessons.php?id=<?php echo $row['re_id']?>" >
                                        <img src="../icons/docx.png"  class="img-fluid img-thumbnail" width="50px" height="50px">
                                       Download File</a>
                                          <p><?php echo $row['course'];?></p> 
                                          <?php endif;?>

                                        <?php if($dat['ext']==='pptx'):?>
                                        <a href="lessons.php?id=<?php echo $row['re_id']?>" >
                                        <img src="../icons/pptx.png"  class="img-fluid img-thumbnail" width="50px" height="50px">Download</a>
                                          <p><?php echo $row['course'];?></p> 
                                          <?php endif;?> 

                                          <?php if($dat['ext']=="txt"):?>
                                        <a href="lessons.php?id=<?php echo $row['re_id']?>" >
                                        <img src="../icons/file.png"  class="img-fluid img-thumbnail" width="50px" height="50px">
                                       Preview</a>
                                          <p><?php echo $row['course'];?></p> 
                                          <?php endif;?>       
                                         </li>
                                     </ul>
                                 </li>
                             </ul>
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
