<?php

//fetch.php

// include('database_connection.php');
$a=1;
$connect = new PDO("mysql:host=localhost;dbname=course_ware", "root", "");

$column = array('fname','lname','level', 'gender', 'email');

$query ="SELECT * FROM users";

if(isset($_POST['search']['value']))
{
 $query .= '
 WHERE fname LIKE "%'.$_POST['search']['value'].'%" 
  OR lname LIKE "%'.$_POST['search']['value'].'%"
 OR gender LIKE "%'.$_POST['search']['value'].'%" 
 OR email LIKE "%'.$_POST['search']['value'].'%" 
 OR level LIKE "%'.$_POST['search']['value'].'%" 
 ';
}

if(isset($_POST['order']))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY dor DESC ';
}

$query1 = '';

if($_POST['length'] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach($result as $row)
{

 $sub_array = array();
 $sub_array[] = $a++;
 $sub_array[] = $row['fname'].' '.$row['lname'];
 $sub_array[] = $row['level'];
 $sub_array[] = $row['gender'];
 $sub_array[] = $row['email'];
 $sub_array[] = '<img src="../resources/'.$row['image'].'" width="50" height="50">';
 $sub_array[] = date('Y-m-d', strtotime($row["dor"]));
 $sub_array[] = date('H:i A',strtotime($row["dor"]));
 $sub_array[] = '<a href="view_Teacher_inc.php?id='.$row['user_id'].'">Delete</a>';
  $sub_array[] = '<a href="update/recordsUpdate.php?pid='.$row['user_id'].'">Update</a>';
 $data[] = $sub_array;
}

function count_all_data($connect)
{
 $query = "SELECT * FROM users where role='Teacher'";
 $statement = $connect->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'    => intval($_POST['draw']),
 'recordsTotal'  => count_all_data($connect),
 'recordsFiltered' => $number_filter_row,
 'data'    => $data
);

echo json_encode($output);

?>
