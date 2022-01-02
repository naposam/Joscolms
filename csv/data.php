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
SELECT * FROM student_tbl 
";

if($_POST['query'] != '')
{
  $query .= '
  WHERE fname LIKE "%'.str_replace(' ', '%', $_POST['query']).'%"
  OR lname LIKE "%'.str_replace(' ', '%', $_POST['query']).'%"
  OR gender LIKE "%'.str_replace(' ', '%', $_POST['query']).'%"
  OR mname LIKE "%'.str_replace(' ', '%', $_POST['query']).'%"
  OR index_number LIKE "%'.str_replace(' ', '%', $_POST['query']).'%"
  ';
}

$query .= 'ORDER BY suid ASC ';

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
    <th>First Name</th>
     <th>Middle Name</th>
    <th>Last Name</th>
    <th>Index Number</th>
    <th>Gender</th>
    <th>Image</th>
    <th>Action</th>
    <th>Edit</th>
    <th>Status</th>
  </tr>
';
$a=0;
if($total_data > 0)
{
  foreach($result as $row)
  {
    $a++;
    if($row["account"]==="1"){
      $status="Blocked";
    }else{
      $status="Active" ;
    }

    $output .= '
    <tr>
     <td>'.$a.'</td>
      <td>'.$row["fname"].'</td>
      <td>'.$row["mname"].'</td>
      <td>'.$row["lname"].'</td>
      <td>'.$row["index_number"].'</td>
      <td>'.$row["gender"].'</td>
      <td><img src="../profile_pics/'.$row['image'].'" width="50" height="50"></td>
      <td>
      <a href="records.php?id='.$row["suid"].'"><i class="material-icons" data-toggle="tooltip" 
             title="Block" style="color:darkorange;">&#xe14b;</i><a/>
          <a href="records.php?ubid='.$row["suid"].'""><i class="material-icons" data-toggle="tooltip" 
             title="Unblock" style="color:darkblue;">&#xe86c;</i></a>
             </td>
      <td><a href="update/recordsUpdate.php?pid='.$row["suid"].'">
      <i class="material-icons update" data-toggle="tooltip" title="Edit" style="color:darkblue;">&#xE254;</i>
      <a/></td>
      <td>'.$status.'</td>

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
