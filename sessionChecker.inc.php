
<?php
//checking session variable
if(!(isset($_SESSION['uid'])) || ($_SESSION['name']))
{
    
    header('Location: index.php');
    exit();
}
?>