<head>
  <link rel="icon" href="img/logo.jpg" type="image/icon" sizes="16x16">
</head>
<!DOCTYPE html>
<html>
<head>
   
    <?php include 'controllerScore.php';?>
	<meta charset="utf-8"/>
    <!-- Set the viewport width to device width for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <meta name="description" content="Coming soon, Bootstrap, Bootstrap 3.0, Free Coming Soon, free coming soon, free template, coming soon template, Html template, html template, html5, Code lab, codelab, codelab coming soon template, bootstrap coming soon template"/>
    <title>Score Table</title>
   
    <!-- ============ Add custom CSS here ============ -->
    <link href="../dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/my_style.css" rel="stylesheet" type="text/css" />
    <link href="../dist/css/font-awesome.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="../message/css/toastr.min.css">
    <script src="../dist/js/jquery-2.1.4.js"></script>
     <script src="../dist/js/bootstrap.min.js"></script>
    <style type="text/css">
    	table thead th{
    		text-align: center;
    	}
    </style>
</head>
<body style="background-image: url(img/colorful.jpg);">
  <?php include 'include/bdnav.php'; 
  
  
if(! isset($_SESSION['uid'])){
    header("location: ../main.php");
 }else{
  if((time()-$_SESSION['last_login_time_teacher'])>1800){
    header("location: logout.php");
}else{
 
  ?>
	<div class="row">
	<div class="container-fluid" style="border-radius: 5px; margin-top: 50px">

		<div class="col-md-4">
			<center>
				<form method="POST" style="background-color: rgba(0,0,0,0.6); box-shadow: 4px 4px 20px white;" enctype="multipart/form-data" >
					<br>
					<h4 style="color: white; letter-spacing:5px; text-shadow: 2px 2px 4px white;">Upload Student Scores</h4>
					<br>
					<input type="file" name="file" class="form-control" placeholder="Upload File" style="width:70%;">
					<br><br>
					<input type="submit" class="btn btn-success form-control" style="width:70%;" value="Upload Record" name="submit">
					<br><br><br><br>
				
			</center>
		</div>

		<div class="col-md-8">
    
      <a href="export_data.php"><button type="button" name="export" class="btn btn-success">Export</button></a>
      
					<table class="table table-bordered">
    					<thead style="background-color: rgba(0,0,0,0.6); color: white;">
        					<th>#</th>
        					<th>Name</th>
        					<th>Index</th>
        					<th>Level</th>
                  <th>Course</th>
                  <th>Date</th>
                  <th>Time</th>
                  <th>Scores</th>

    					</thead>
              <?php if(isset($_SESSION['viewID'])):?>
                        <?php
$uid=$_SESSION['uid'];
$getOline=mysqli_query($db,"SELECT * FROM `course_reg` where uid='$uid'");
$getData=mysqli_fetch_array($getOline);
$uidlid=$getData['levelid'];
          
               
               $course_ud=$_SESSION['viewID'];     
            $data=mysqli_query($db,"SELECT scoretbl.*,coursetbl.course,level_tbl.level FROM scoretbl LEFT JOIN coursetbl on scoretbl.course=coursetbl.course left join level_tbl on scoretbl.level=level_tbl.lid where  coursetbl.cid='$course_ud' and scoretbl.level='$uidlid'");
                $a=0;
           while($row=mysqli_fetch_array($data)){
           $a++;

                        ?>
                      <tr>
                      <td><?php echo $a?></td>   
                    <td><?php echo $row['fname'].' '.$row['lname']?></td> 
                    <td><?php echo $row['index_number']?></td>
                    <td><?php echo $row['level']?></td> 
                    <td><?php echo $row['course']?></td>   
                    <td><?php echo date('Y-m-d', strtotime($row['dos']))?></td> 
                    <td><?php echo date('H:i A',strtotime($row['dos']))?></td> 
                    <td><?php echo $row['score']?></td>       
                      </tr>
                      <?php
                      }
                      ?>
                    <?php endif;?>
                  <?php if(!isset($_SESSION['viewID'])):?>
                        <?php

                    $course=$_SESSION['course'];
                    $levelID=$_SESSION['level'];    
            $data=mysqli_query($db,"SELECT scoretbl.*,coursetbl.course FROM scoretbl LEFT JOIN coursetbl on scoretbl.course=coursetbl.course where scoretbl.level='$levelID' and coursetbl.cid='$course'");
                        $a=0;
           while($row=mysqli_fetch_array($data)){
           $a++;

                        ?>
                      <tr>
                      <td><?php echo $a?></td>   
                    <td><?php echo $row['fname'].' '.$row['lname']?></td> 
                    <td><?php echo $row['index_number']?></td>
                    <td><?php echo $row['level']?></td> 
                    <td><?php echo $row['course']?></td>   
                    <td><?php echo date('Y-m-d', strtotime($row['dos']))?></td> 
                    <td><?php echo date('H:i A',strtotime($row['dos']))?></td> 
                    <td><?php echo $row['score']?></td>       
                      </tr>
                      <?php
                      }
                      ?>
                    <?php endif;?>
					</table>
       		</div>
       	</div>
    </div>



<script src="../dist/js/jquery-2.1.4.js" type="text/javascript"></script>
<script src="../message/js/toastr.min.js"></script>
        <script >

 <?php if (isset($_GET['status']) && $_GET['status'] === "noData") : ?>
   toastr.error("No data to load");
    <?php endif;?>

    <?php if (isset($_GET['status']) && $_GET['status'] === "create") : ?>
   toastr.success(" Saved Successsfully ");
    <?php endif;?>

    <?php if (isset($_GET['status']) && $_GET['status'] === "error") : ?>
   toastr.warning("unable to save data");
    <?php endif;?>

    <?php if (isset($_GET['status']) && $_GET['status'] === "found") : ?>
   toastr.warning("Course Already add please just the link");
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