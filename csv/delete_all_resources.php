<?php
include ("../connect/ConDb.php");
mysqli_query($db,"DELETE FROM `resources`");
header('location: all_resources.php');
?>