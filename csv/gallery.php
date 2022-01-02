<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>LMS Course</title>
      <link rel="icon" href="../img/logo.jpg" type="image/icon" sizes="16x16">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/placeholder-loading/dist/css/placeholder-loading.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
      <link rel="stylesheet" type="text/css" href="../message/css/toastr.min.css">
    <style type="text/css">
      .card-header{
      background: #435d7d;
    color: #fff;
    text-transform: uppercase;
    text-align: center;
      }
      .nav-item a:hover{
   background: red;
   color: white!important;
}
 .nav-item a{
   color: white!important;
}

    </style>
    <link href="../lib/jquery.bsPhotoGallery.css" rel="stylesheet">
<script src="../lib/jquery.bsPhotoGallery.js"></script> 

<script>
  $(document).ready(function(){
    $('ul.first').bsPhotoGallery({
      "classes" : "col-xl-3 col-lg-2 col-md-4 col-sm-4",
      "hasModal" : true,
      "shortText" : false  
    });
  });
</script>
  </head>
  <body style="background-image: url(../img/colorful.jpg);">
      <?php
	if (! isset ($_SESSION['sess_user_id'])) {
	 header("location: login.php");
	} else {
    if((time()-$_SESSION['last_login_time'])>1800){
    header("location: logout.php");
}else{

         ?>
      
      <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background: rgba(0,0,0,0.5)!important;">
  <a class="navbar-brand" href="#"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      
       <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">Home<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Data Upload<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="course_link_update.php">Course Stream Link</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="selectDeptCourse.php">Register Course</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="courseupload.php">Course Upload</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="records.php">Students</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="teachers.php">Teachers</a> </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    
      
    </ul>
   
  </div>
</nav>  
  
    <div class="container">
      <h3 align="center"></h3>
      <br />
      <div class="card">
        <div class="card-header">Manage Password</div>
        <div class="card-body">
          
    <!-- <ul class="row first">
      <li> -->
      <?php
     $dir=glob('../profile_pics/{*.jpg, *.png}',GLOB_BRACE);
     foreach($dir as $value)
     {
     ?>
     <a href="<?php echo $value;?>">
     <img src="<?php echo $value;?>" width="200px" align="left" hspace="5px" vspace="5px" height="200px">
    </a>
    <?php
    }
    ?>
    
      <!-- </li>
    
  </ul>
         --> 
          <div class="table-responsive" id="dynamic_content">
            
          </div>
        </div>
      </div>
    </div>
       




  <?php
}
     }
     ?>
 

  </body>
</html>
