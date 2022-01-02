    <?php
include("importStudentScore.php") ;

$csv = new csv();

if(isset($_POST['submit'])){
    $emptyfile = $_FILES['file'];
    if(!empty($emptyfile)){
    $csv->import($_FILES['file']['tmp_name']); 
     }else{
        header("location: student_scoretb.php?status=noData");
    }
  
}


?>