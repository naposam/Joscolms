<?php
include("newCsvUpload.php") ;
$csv = new csv();

if(isset($_POST['submit'])){
    $emptyfile = $_FILES['file'];
    if(!empty($emptyfile)){
    $csv->import($_FILES['file']['tmp_name']); 
     }else{
        echo "No csv to import";
    }
  
}

if(isset($_POST['submitfile'])){
    $emptyfile = $_FILES['file'];
    if(!empty($emptyfile)){
    $csv->importData($_FILES['file']['tmp_name']); 
     }else{
        echo "No csv to import";
    }
  
}

if(isset($_POST['courseupload'])){
    $emptyfile = $_FILES['file'];
    if(!empty($emptyfile)){
    $csv->importCourse($_FILES['file']['tmp_name']); 
     }else{
        echo "No csv to import";
    }
  
}

if (isset($_POST['export'])){
    $csv->export();
}
?>