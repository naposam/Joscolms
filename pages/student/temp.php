<?php 
session_start();
if(! isset($_SESSION['uid'])){
    header("location: ../../main.php");
 }else{
 
$uid=$_SESSION['uid'];
$levelID=$_SESSION['level'];
$username=$_SESSION['name'];
$userImage=$_SESSION['image'];
$VID=$_SESSION['viewID'];
include 'connect/ConDb.php';
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
    <title>Preview Lesson</title>
    <link rel="icon" href="img/logo.jpg" type="image/icon" sizes="16x16">
<link rel="shortcut icon" type="image/ico" href="img/favicon.ico"/>
    <!-- ============ Add custom CSS here ============ -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../../dist/css/my_style.css" rel="stylesheet" type="text/css" />
    <link href="../../dist/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link href="../../dist/css/hover.css" rel="stylesheet" type="text/css" />
    <script src="https://use.fontawesome.com/2199ab073c.js"></script> 
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

         <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 assignment" >
             <div>
               
             </div>
             <div id="divLsn">
                 <div ID="dlLessons"  OnItemCommand="Item_Command">
                    
                         <div id="pricePlans" style="overflow: hidden">
                             <ul id="plans">
                                 <li class="plan">
                                     <ul class="planContainer">
                                    <!-- place for lessons buttons  -->
                             
                         

                                     </ul>
                                 </li>
                             </ul>
                         </div>
                     
                 </div>
             </div>
         </div>
                                     <?php 
                                     if(isset($_GET['viewID'])){
                                        $id=$_GET['viewID'];  

                              
                             $data = $db->query("SELECT ass.*, coursetbl.course  FROM `ass` left join coursetbl on ass.course=coursetbl.cid where ass_id='$id'");
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
                <iframe src="../../resources/<?php echo $row["file_link"]?>" width="100%" height="514px">
                   </iframe>
                <?php endif;?>
                <?php if (!isset($id)):?>   
                <div class="panel-body" style="height:514px;min-height:514px;text-align:center; background:#e2e2e2">
                    
                    <h3 visible="false"  id="txtSelectRes">Select resourse to preview</h3>
       

                   </div>
                   <?php endif;?>
            </div>
        </div>
         
         
             

     </form>
     <?php
 }
     ?>
</body>
</html>
