<?php

try{
$db = new PDO('mysql:host=localhost;dbname=josco_lms; charset=UTF8','root','');	
}catch(PDOException $e){
	die($e->getMessage());
}




?>