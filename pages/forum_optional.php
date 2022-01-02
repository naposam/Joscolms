<?php
error_reporting(0);
session_start();


if(! isset($_SESSION['uid'])){
    header("location: ../main.php");
 }else{
  if((time()-$_SESSION['last_login_time_teacher'])>1800){
    header("location: logout.php");
}else{
 

$username=$_SESSION['name'];
$userImage=$_SESSION['image'];
$email=$_SESSION['email'];
$uid=$_SESSION['uid'];
$dept=$_SESSION['dept'];
include ('../connect/ConDb.php');
?>
<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head >

    
    <meta charset="utf-8"/>
    <link rel="shortcut icon" type="image/ico" href="img/favicon.ico"/>
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content="Coming soon, Bootstrap, Bootstrap 3.0, Free Coming Soon, free coming soon, free template, coming soon template, Html template, html template, html5, Code lab, codelab, codelab coming soon template, bootstrap coming soon template"/>

    <title>Forum</title>
<link rel="icon" href="img/logo.jpg" type="image/icon" sizes="16x16">
    <!-- ============ Add custom CSS here ============ -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/my_style.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/font-awesome.css" rel="stylesheet" type="text/css" />
    
    <link href="../dist/css/hover.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css" type="text/css"/>
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css" type="text/css"/>
    <link rel="stylesheet" href="../dist/css/style.css" type="text/css"/>
    <link rel="stylesheet" href="../dist/css/custom.css" type="text/css"/>
    <script src="../dist/js/jquery-2.1.4.js"></script>
     <script src="../dist/js/bootstrap.min.js"></script>
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
            overflow-x: hidden;
        }

        .assignment {            
            background: rgba(0, 0, 0, 0.3);
            color: #FFF !important;
        }

    </style>
    

</head>
<body style="background-image: url(img/colorful.jpg);">
   
    
        <?php include 'include/navbar_optional.php'; ?>

        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 assignment " style="width: 200px; height: 560px; border-radius: 5px">
             <div style="text-align: center; text-decoration: underline">
                 <h3>Lessons</h3>
                 
             </div>
             <div >
                 <div ID="dlLessons"  OnItemCommand="Item_Command">
                         <div id="pricePlans" style="overflow: hidden">
                             <ul id="plans">
                                 <li class="plan">
                                     <ul class="planContainer">
                                  <?php if(isset($_SESSION['viewID'])):?>
                                 <?php
                                $course_ud=$_SESSION['viewID'];
                                  $data = $db->query("SELECT * FROM `resources` where uid='$uid' and course='$course_ud'");
                                   while($dataSet=mysqli_fetch_array($data)){


                                     ?>  
                                     <a href="forum.php?id=<?php echo $dataSet['re_id']?>" class="btn btn-primary" style="margin:10px;width: 150px;"><?php echo $dataSet['lesson_id']?></a>
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

        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 ">

            <div class="box box-primary direct-chat direct-chat-primary">
                <div class="box-header with-border" style="background-color:#e2e2e2">
                    <i class="fa fa-comments fa-fw"></i>
                     <?php if(isset($_SESSION['viewID'])):?>
                    <?php
                    $course_ud=$_SESSION['viewID'];
                    if(isset($_GET['id'])){
                           $id=$_GET['id'];
                    $query="SELECT resources.*,option_tbl.course from resources left join option_tbl on resources.course=option_tbl.id where re_id='$id' and uid='$uid' and resources.course='$course_ud'";
                    $resultSet=mysqli_query($db,$query);
                    $resultData=mysqli_fetch_array($resultSet);
                       $lesson_id=$resultData['lesson_id'];
                       $chat_id=$resultData['re_id'];
                    }
                    ?>
                    <Label ID="txtChatTitle" class="box-title text-primary">Chat Room
                    <?php if(isset($id)):?> 
                      <?php echo $resultData['course'];?> <span style="font-style: italic;">Topic:</span> <?php echo $resultData['content_title'];?></Label>
                    <?php endif;?>
                    <?php endif;?>

                    <!-- chec -->
                      
                </div>
                <!-- /.box-header -->
                <div class="box-body" style="background-color:#e2e2e2">
                    <!-- Conversations are loaded here -->
                    <div class="direct-chat-messages" style="max-height: 445px; height: 445px">
                  <?php

                    $q="SELECT * from forum where lesson_id='$chat_id' ORDER BY dop DESC";
                    $resForum=mysqli_query($db,$q);
                    
                       
                  ?>
                        <Label class="Absolute-Center is-Responsive"  ID="lblPrompt"  Font-Bold="True" Font-Size="20">Select Lesson to join chat!!!</Label>
                          
                        <div ID="dlForum" >
                                <!-- Message. Default to the left -->
                                <div class="direct-chat-msg" style="margin: 10px">
                                    <div class="direct-chat-info clearfix">
                                        <span class="direct-chat-name pull-left"></span>
                                        <span class="direct-chat-timestamp pull-right"></span>
                                    </div>
                                     <?php
                            while($resultData=mysqli_fetch_array($resForum)){
                                  $date=date('Y-m-d', strtotime($resultData['dop']));
                                     $time=date('H:i A',strtotime($resultData['dop']));  
                                  ?>
                                    <!-- /.direct-chat-info -->
                                    <img  class="direct-chat-img" src="../profile_pics/<?php echo $resultData["user_image"]?>"> <!-- /.direct-chat-img -->
                                        
                                    <div class="direct-chat-text" style="word-wrap: break-word; word-break: break-all">
                                    <span style="color:black;font-style: italic;"><?php echo ucwords($resultData['user_name']);?></span>
                                   
                                  
                                  <p style="margin:5px;"><b><?php echo $resultData['messages'];?></b></p>
                                  <small style="font-size:12px;"><?php echo $date;?> <?php echo $time;?></small>
                                  </div>
                                 <?php
                             }
                             ?>
                                    
                                    <!-- /.direct-chat-text -->
                                </div>
                                <!-- /.direct-chat-msg -->
                        </div>

                    </div>
                    <!--/.direct-chat-messages-->
                </div>
                <!-- /.box-body -->
                <?php

                  if(isset($_POST['btnSubmit'])){
                    $message=$_POST['messages'];
                    $id=$_GET['id'];

                    if(!empty($message)){
                      if(isset($_GET['id'])){
                    $insert="INSERT INTO forum(lesson_id,messages,user_name,user_image,course)VALUES('$chat_id','$message','$username','$userImage','$course_ud')";
                    $reData=mysqli_query($db,$insert);
                    echo '<script>window.location.href = window.location.href</script>';
                    header("location: forum.php?id=$chat_id");
                   }
                   }else{
                    header("location: forum.php?status=no_lesson_id");
                   } 
                  }
                ?>
                <div class="box-footer" style="background-color:#e2e2e2">
                    <form  method="post" autocomplete="off">
                        <div class="input-group ">
                            <input type="" name="messages"   placeholder="Type Message ..." class="form-control" required="" id="txt" onkeyup="manage(this)"/>
                            <span class="input-group-btn">
                                <input type="submit" name="btnSubmit"  id="btnSend" class="btn btn-success btn-flat" value="Send" disabled="" />
                            </span>
                        </div>
                    </form>
                </div>
                <!-- /.box-footer-->
            </div>

        </div>
<script>
  function manage(txt) {
    var bt = document.getElementById('btnSend');
    if (txt.value != '') {
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
