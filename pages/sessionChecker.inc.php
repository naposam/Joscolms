
<?php
if(!(isset($_SESSION['uid'])) || ($_SESSION['name']))
{
    
    header('Location: ../main.php');
    exit();
}
?>