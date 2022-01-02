<?php
include("csv_optional.php") ;
$csv = new csv();

if(isset($_POST['courseupload'])){
    $emptyfile = $_FILES['file'];
    if(!empty($emptyfile)){
    $csv->importCourse($_FILES['file']['tmp_name']); 
     }else{
        echo "No csv to import";
    }
  
}

?>