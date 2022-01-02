<?php
include ("../connect/ConDb.php");
$id=$_GET['reg'];
$output='';
$sql="SELECT course_select_tbl.*,level_tbl.level from course_select_tbl left join level_tbl on course_select_tbl.levid=level_tbl.lid  where cid='$id'";
 $result=mysqli_query($db,$sql);
  while($row = mysqli_fetch_array($result)){
 $output.='<option value="'.$row['levid'].'">'.$row['level'].'</option>';
           }
     echo"<select><option selected='' disabled=''>select</option></select>";
      echo $output;

?>