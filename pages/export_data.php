<?php session_start();?>
<?php if(isset($_SESSION['viewID'])):?>
<?php
 
$course_ud=$_SESSION['viewID'];
$username=$_SESSION['name'];
$uid=$_SESSION['uid'];
$userImage=$_SESSION['image'];
$email=$_SESSION['email'];

 include '../connect/ConDb.php';
 $sql = "SELECT student_tbl.fname, student_tbl.lname,student_tbl.index_number, coursetbl.course, student_tbl.level FROM student_tbl left join course_reg_st on student_tbl.suid=course_reg_st.uid left join coursetbl on coursetbl.cid=course_reg_st.cid where course_reg_st.cid='$course_ud'";  
$setRec = mysqli_query($db, $sql);  
$columnHeader = '';  
$columnHeader = "Fname" . "\t" . "Lname" . "\t". "Index" . "\t"."Course" . "\t" . "Level" . "\t". "Score" . "\t";
$setData = '';  
  while ($rec = mysqli_fetch_row($setRec)) {  
    $rowData = '';  
    foreach ($rec as $value) {  
        $value = '"' . $value . '"' . "\t";  
        $rowData .= $value;  
    }  
    $setData .= trim($rowData) . "\n";  
}  
  
header("Content-type: application/octet-stream");  
header("Content-Disposition: attachment; filename=AssessmentScoreSheet.xls");  
header("Pragma: no-cache");  
header("Expires: 0");  

  echo ucwords($columnHeader) . "\n" . $setData . "\n";

?>
<?php endif;?>

