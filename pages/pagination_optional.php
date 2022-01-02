<?php  
 //pagination.php  
session_start();
if(isset($_SESSION['viewID'])):
 $connect = mysqli_connect("localhost", "root", "", "josco_lms");  
 $record_per_page = 5;  
 $page = '';  
 $output = '';  
 if(isset($_POST["page"]))  
 {  
      $page = $_POST["page"];  
 }  
 else  
 {  
      $page = 1;  
 }  
 $start_from = ($page - 1)*$record_per_page; 
$course_ud=$_SESSION['viewID'];
  $uid=$_SESSION['uid'];
$dept=$_SESSION['dept'];
$getOline=mysqli_query($connect,"SELECT * FROM `reg_opttbl`");
$getData=mysqli_fetch_array($getOline);
$tlevel=$getData['level'];
$tcid=$getData['level']; 
 $query = "SELECT student_tbl.*,reg_opttbl.course_code,option_tbl.course FROM student_tbl left join reg_opttbl on student_tbl.suid=reg_opttbl.uid left join option_tbl on reg_opttbl.course_code=option_tbl.id  where student_tbl.level='$tlevel' and reg_opttbl.course_code='$course_ud' ORDER BY suid DESC LIMIT $start_from, $record_per_page";  
 $result = mysqli_query($connect, $query);
 $count=mysqli_num_rows($result); 
 $i=0; 
 $output .= "  
      <table class='table table-stripped' style='color:white;'>  
           <tr> 
                <th>#</th> 
                <th >Image</th>  
                <th >FullName</th> 
                <th >Index Number</th>  
                <th >Subject</th> 
                 <th>Status</th> 
           </tr>  
 ";  
 while($row = mysqli_fetch_array($result))  
 { 
 if($row['status']=='0'){
   $a="Offline";
 }else{
  $a="Online";
 } 
  $i++;
      $output .= '  
           <tr> 
                <td>'.$i.'</td>
                <td><img src="../profile_pics/'.$row["image"].'" height="50px" width="50px"/></td> 
                <td>'.$row["fname"].' '.$row["lname"].'</td>  
                <td>'.$row["index_number"].'</td>
                <td>'.$row["course"].'</td> 
                <td>'.$a.'</td>     
           </tr>  
      ';  
 } 
 
 $output .= '</table><br /><div align="center">'; 
 
 $page_query = "SELECT student_tbl.*,reg_opttbl.course_code,option_tbl.course FROM student_tbl left join reg_opttbl on student_tbl.suid=reg_opttbl.uid left join option_tbl on reg_opttbl.course_code=option_tbl.id  where student_tbl.level='$tlevel' and reg_opttbl.course_code='$course_ud' ORDER BY suid DESC";  
 $page_result = mysqli_query($connect, $page_query);  
 $total_records = mysqli_num_rows($page_result);  
 $total_pages = ceil($total_records/$record_per_page);  
 for($i=1; $i<=$total_pages; $i++)  
 {  
      $output .= "<span class='pagination_link' style='cursor:pointer; padding:6px; border:1px solid #ccc;' id='".$i."'>".$i."</span>";  
 }  

 $output.='
  <p style="color:white;">Total Number Of Registered Student: '.$count.'<p>    
    '; 
 $output .= '</div><br /><br />';  
 echo $output; 
 endif; 
 ?>  