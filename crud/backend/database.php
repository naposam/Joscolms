<?php
$servername = "localhost";
$username = "u452519361_course_ware";
$password = "Pa$$001word";
$dbname = "u452519361_course_ware";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
