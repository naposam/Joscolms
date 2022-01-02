<?php
//student registration processing
session_start();
include 'connect/ConDb.php';
if(isset($_POST['btnSubmit'])){
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $lname=$_POST['lname'];
    $gender=$_POST['rbtnGender'];
    $level=$_POST['level'];
    $dept=$_POST['dept'];
    $index_no=$_POST['index_number'];
    $password=$_POST['password'];
    $confirmpassword=$_POST['conPass'];
    $name=$_POST['fname'].' '.$_POST['lname'];
    //images uploading
    // $target='profile_pics/'.$_FILES['image']['name'];

  //checking the image size 
      $fileinfo = @getimagesize($_FILES["image"]["tmp_name"]);
    $width = $fileinfo[0];
    $height = $fileinfo[1];
    
    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
    
    // Get image file extension
    $file_extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
      // Validate file input to check if is not empty
    if (! file_exists($_FILES["image"]["tmp_name"])) {
        header("location: registration.php?status=fileExits");
    }
       // Validate file input to check if is with valid extension
    else if (! in_array($file_extension, $allowed_image_extension)) {
        header('location: registration.php?status=invalidInagetype');
    }
     // Validate image file size
    else if (($_FILES["image"]["size"] > 2000000)) {
        header("location: registration.php?status=imgSize");
    }    // Validate image file dimension
    else if ($width > "600" || $height > "600") {
        header('location: registration.php?status=imgdimension');
    } else{
//do this after checking the image
     $target = "profile_pics/" . basename($_FILES["image"]["name"]);
     $image=$_FILES['image']['name'];
    if(!empty($index_no) && !empty($fname) && !empty($level) && !empty($lname)){
        if($password ===$confirmpassword){
     $check=mysqli_query($db,"SELECT * FROM student_tbl where index_number='$index_no'");
     $count=mysqli_num_rows($check);
     if($count==0){
    if(move_uploaded_file($_FILES['image']['tmp_name'],$target )){ 
   $query="INSERT into student_tbl(fname,mname,lname,level,gender,index_number,password,image,dept)VALUES('$fname','$mname','$lname','$level','$gender','$index_no','$password','$image','$dept')";

   if(mysqli_query($db,$query)){
    $uid = mysqli_insert_id($db);

    $_SESSION['uid']=$uid;
    header("location: main.php");
    }
    }
  }else{
    header("location: registration.php?status=error_a");
  }
   }else{
    header("location: registration.php?status=error_b"); 
   }
 }else{
   header("location: registration.php?status=error_c"); 
 }

}
}


?>