 <?php
session_start();

require 'config.php';
if(isset($_POST['submit'])){
	$a=$_POST['email'];
	$b=$_POST['pass'];
 if($a != "" && $b != "") {
    try {
      $query = "select * from `admin` where `username`=:username and `password`=:password";
      $stmt = $db->prepare($query);
      $stmt->bindParam('username', $a);
      $stmt->bindValue('password', $b); 
      $stmt->execute();
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
      if($count == 1 && !empty($row)){
       
        $_SESSION['sess_user_id']   = $row['id'];
        $_SESSION['sess_user_name'] = $row['username'];
        $_SESSION['last_login_time']= time();
       header('location: dashboard.php?status=created');
      }else{
        $_SESSION["login_attempts"] += 1;
      	 header('location: login.php?status=error');
      } 
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
    }
  } 
}



?>