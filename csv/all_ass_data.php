<?php
error_reporting(0);
$connect = new PDO("mysql:host=localhost; dbname=josco_lms", "root", "");


$limit = '5';
$page = 1;
if($_POST['page'] > 1)
{
  $start = (($_POST['page'] - 1) * $limit);
  $page = $_POST['page'];
}
else
{
  $start = 0;
}

$query = "
SELECT ass_student.*,option_tbl.course as dcourse,student_tbl.fname,student_tbl.lname,student_tbl.suid FROM ass_student left join option_tbl on ass_student.course=option_tbl.id  LEFT JOIN student_tbl on student_tbl.suid=ass_student.uid

";

if($_POST['query'] != '')
{
  $query .= '
  WHERE dcourse LIKE "%'.str_replace(' ', '%', $_POST['query']).'%"
  OR fname LIKE "%'.str_replace(' ', '%', $_POST['query']).'%"
  OR lname LIKE "%'.str_replace(' ', '%', $_POST['query']).'%"
  ';
}

$query .= 'ORDER BY course ASC ';

$filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

$statement = $connect->prepare($query);
$statement->execute();
$total_data = $statement->rowCount();

$statement = $connect->prepare($filter_query);
$statement->execute();
$result = $statement->fetchAll();
$total_filter_data = $statement->rowCount();

$output = '
<label>Total Records - '.$total_data.'</label>
<table class="table table-striped table-bordered">
  <tr>
    <th>#</th>
    <th>Full Name</th>
    <th>Course Name</th>
     <th>View</th>
     <th>Date</th>
    <th>Time</th>
    <th>Action</th>
   
  </tr>
';
$a=0;
if($total_data > 0)
{
  foreach($result as $row)
  {
    $date=date('Y-m-d', strtotime($row['dop']));
    $time=date('H:i A',strtotime($row['dop']));
    $a++;
    $output .= '
    <tr>
     <td>'.$a.'</td>
      <td>'.$row["fname"].' '.$row["lname"].'</td>
      <td>'.$row["dcourse"].'</td>
      <td><a href="../resources/'.$row["file_link"].'">View/Download</a></td>
      <td>'.$date.'</td>
      <td>'.$time.'</td>
      <td><a href="all_ass.php?id='.$row["ass_id"].'"><i class="material-icons" data-toggle="tooltip" 
             title="Delete" style="color:darkorange;">&#xE872;</i><a/></td>

    </tr>
    ';
  }
}
else
{
  $output .= '
  <tr>
    <td colspan="2" align="center">No Data Found</td>
  </tr>
  ';
}

$output .= '
</table>
<br />
<div align="center">
  <ul class="pagination">
';

$total_links = ceil($total_data/$limit);
$previous_link = '';
$next_link = '';
$page_link = '';

//echo $total_links;

if($total_links > 4)
{
  if($page < 5)
  {
    for($count = 1; $count <= 5; $count++)
    {
      $page_array[] = $count;
    }
    $page_array[] = '...';
    $page_array[] = $total_links;
  }
  else
  {
    $end_limit = $total_links - 5;
    if($page > $end_limit)
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $end_limit; $count <= $total_links; $count++)
      {
        $page_array[] = $count;
      }
    }
    else
    {
      $page_array[] = 1;
      $page_array[] = '...';
      for($count = $page - 1; $count <= $page + 1; $count++)
      {
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }
  }
}
else
{
  for($count = 1; $count <= $total_links; $count++)
  {
    $page_array[] = $count;
  }
}

for($count = 0; $count < count($page_array); $count++)
{
  if($page == $page_array[$count])
  {
    $page_link .= '
    <li class="page-item active">
      <a class="page-link" href="#">'.$page_array[$count].' <span class="sr-only">(current)</span></a>
    </li>
    ';

    $previous_id = $page_array[$count] - 1;
    if($previous_id > 0)
    {
      $previous_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a></li>';
    }
    else
    {
      $previous_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Previous</a>
      </li>
      ';
    }
    $next_id = $page_array[$count] + 1;
    if($next_id >= $total_links)
    {
      $next_link = '
      <li class="page-item disabled">
        <a class="page-link" href="#">Next</a>
      </li>
        ';
    }
    else
    {
      $next_link = '<li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a></li>';
    }
  }
  else
  {
    if($page_array[$count] == '...')
    {
      $page_link .= '
      <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
      </li>
      ';
    }
    else
    {
      $page_link .= '
      <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
      ';
    }
  }
}

$output .= $previous_link . $page_link . $next_link;
$output .= '
  </ul>

</div>
';

echo $output;

?>
