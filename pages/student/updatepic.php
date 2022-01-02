<?php
error_reporting(0);
include ('connect/ConDb.php');
if (isset($_POST["upload"])) {
    // Get Image Dimension
$file=$_SESSION['image'];
$id=$_SESSION['uid'];
    $fileinfo = @getimagesize($_FILES["file-input"]["tmp_name"]);
    $width = $fileinfo[0];
    $height = $fileinfo[1];
    
    $allowed_image_extension = array(
        "png",
        "jpg",
        "jpeg"
    );
    
    // Get image file extension
    $file_extension = pathinfo($_FILES["file-input"]["name"], PATHINFO_EXTENSION);
    
    // Validate file input to check if is not empty
    if (! file_exists($_FILES["file-input"]["tmp_name"])) {
        $response = array(
            "type" => "error",
            "message" => "Choose image file to upload."
        );
    }    // Validate file input to check if is with valid extension
    else if (! in_array($file_extension, $allowed_image_extension)) {
        $response = array(
            "type" => "error",
            "message" => "Upload valiid images. Only PNG and JPEG are allowed."
        );
        //echo $result;
    }    // Validate image file size
    else if (($_FILES["file-input"]["size"] > 2000000)) {
        $response = array(
            "type" => "error",
            "message" => "Image size exceeds 2MB"
        );
    }    // Validate image file dimension
    else if ($width > "600" || $height > "600") {
        $response = array(
            "type" => "error",
            "message" => "Image dimension should be within 600X600"
        );
    } else {
        $target = "../../profile_pics/" . basename($_FILES["file-input"]["name"]);
        $image=$_FILES['file-input']['name'];
        if (move_uploaded_file($_FILES["file-input"]["tmp_name"], $target)) {
             unlink("../../profile_pics/".$file);
            mysqli_query($db,"UPDATE student_tbl set image='$image' WHERE suid='$id'");

            $response = array(
                "type" => "success",
                "message" => "Update uploaded successfully.Please Note that your image will be previewed on your next login."
            );
        } else {
            $response = array(
                "type" => "error",
                "message" => "Problem in uploading image files."
            );
        }
    }
}
?>