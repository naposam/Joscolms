<?php
include 'backend/database.php';

session_start();
?>
 <?php
	if (! isset ($_SESSION['sess_user_id'])) {
	 header("location: login.php");
	} else {

         ?>
<?php  include 'navbar.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>User Data</title>
	<head>
  <link rel="icon" href="../img/logo.jpg" type="image/icon" sizes="16x16">
</head>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="ajax/ajax.js"></script>
</head>
<body style="background-image: url(../img/colorful.jpg);">
	
    <div class="container">
	<p id="success"></p>
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
						<h2>Manage <b>Students</b></h2>
					</div>
					<div class="col-sm-6">
						<!-- <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New User</span></a> -->
						<a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>						
					</div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>SL NO</th>
						  <th>First Name</th>
                        <th>Last Name</th>
                        <th>Level</th>
						<th>Index Number</th>
                        <th>Gender</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
				<tbody>
				
				<?php
				$result = mysqli_query($conn,"SELECT * FROM users where role='Student'");
					$i=1;
					while($row = mysqli_fetch_array($result)) {
						$name=$row["fname"].' '.$row["lname"];
				?>
				<tr id="<?php echo $row["user_id"]; ?>">
				<td>
							<span class="custom-checkbox">
								<input type="checkbox" class="user_checkbox" data-user-id="<?php echo $row["id"]; ?>">
								<label for="checkbox2"></label>
							</span>
						</td>
					<td><?php echo $i; ?></td>
					<td><?php echo $row["fname"] ?></td>
					<td><?php echo $row["lname"];?></td>
					<td><?php echo $row["level"]; ?></td>
					<td><?php echo $row["email"]; ?></td>
					<td><?php echo $row["gender"]; ?></td>
					<td>
						<a href="#editEmployeeModal" class="edit" data-toggle="modal">
							<i class="material-icons update" data-toggle="tooltip" 
							data-id="<?php echo $row["user_id"]; ?>"
							data-name="<?php echo $name; ?>"
							data-email="<?php echo $row["level"]; ?>"
							data-phone="<?php echo $row["email"]; ?>"
							data-city="<?php echo $row["password"]; ?>"
							title="Edit">&#xE254;</i>
						</a>
						<a href="#deleteEmployeeModal" class="delete" data-id="<?php echo $row["user_id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" 
						 title="Delete">&#xE872;</i></a>

                    </td>
				</tr>
				<?php
				$i++;
				}
				?>
				</tbody>
			</table>
			
        </div>
    </div>
	<!-- Add Modal HTML -->
<!-- 	<div id="addEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="user_form">
					<div class="modal-header">						
						<h4 class="modal-title">Add User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>NAME</label>
							<input type="text" id="name" name="name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>EMAIL</label>
							<input type="email" id="email" name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>PHONE</label>
							<input type="phone" id="phone" name="phone" class="form-control" required>
						</div>
						<div class="form-group">
							<label>CITY</label>
							<input type="city" id="city" name="city" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
					    <input type="hidden" value="1" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-success" id="btn-add">Add</button>
					</div>
				</form>
			</div>
		</div>
	</div> -->
	<!-- Edit Modal HTML -->
	<div id="editEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="update_form">
					<div class="modal-header">						
						<h4 class="modal-title">Editable Fields</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_u" name="id" class="form-control" required>					
						<div class="form-group">
							<label>Name</label>
							<input type="text" id="name_u" name="name" class="form-control" required readonly="">
						</div>
						<div class="form-group">
							<label>Level</label>
							<input type="email" id="email_u" name="email" class="form-control" required readonly="">
						</div>
						<div class="form-group">
							<label>Index No</label>
							<input type="phone" id="phone_u" name="phone" class="form-control" required readonly="">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input type="city" id="city_u" name="city" class="form-control" required>
						</div>					
					</div>
					<div class="modal-footer">
					<input type="hidden" value="2" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-info" id="update">Update</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete Modal HTML -->
	<div id="deleteEmployeeModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
						
					<div class="modal-header">						
						<h4 class="modal-title">Delete User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_d" name="id" class="form-control">					
						<p>Are you sure you want to delete these Records?</p>
						<p class="text-warning"><small>This action cannot be undone.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-danger" id="delete">Delete</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php
}
?>
</body>
</html>                                		                            