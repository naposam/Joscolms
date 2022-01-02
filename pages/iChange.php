<?php
session_start();
include ('../connect/ConDb.php');
if(!isset($_SESSION['duid'])){
    header("location: ../main.php");
 }else{
//   if((time()-$_SESSION['last_login_time_teacher'])>1800){
//     header("location: logout.php");
// }else{
$user_id=$_SESSION['duid'];
if(isset($_POST['btnChange'])){
  $pass=$_POST['psw'];
  $pas=$_POST['psw_a'];
  if($pass===$pas){
  mysqli_query($db,"UPDATE teacher_tbl set password='$pass',active=1 WHERE tuid='$user_id'");
  header('location: ../main.php');  
}else{
  header('location: fChange.php?status=NoMatch');
}
  
}

?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="img/logo.jpg" type="image/icon" sizes="16x16">
  <link rel="stylesheet" type="text/css" href="../message/css/toastr.min.css"> 
<style>
/* Style all input fields */
input {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
}

/* Style the submit button */
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  cursor: pointer;
}

/* Style the container for inputs */
.container {
  background-color: #f1f1f1;
  padding: 20px;
  width: 60%;
  margin: 0 auto;
}

/* The message box is shown when the user clicks on the password field */
#message {
  display:none;
  width: 60%;
  margin: 0 auto;
  background: #f1f1f1;
  color: #000;
  position: relative;
  padding: 20px;
  margin-top: 10px;

}

#message p {
  padding: 10px 35px;
  font-size: 18px;
}

/* Add a green text color and a checkmark when the requirements are right */
.valid {
  color: green;
}

.valid:before {
  position: relative;
  left: -35px;
  content: "✔";
}

/* Add a red text color and an "x" when the requirements are wrong */
.invalid {
  color: red;
}

.invalid:before {
  position: relative;
  left: -35px;
  content: "✖";
}
body{
  background: rgb(2,0,36);
background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 100%);

}
</style>
</head>
<body >


<center><p style="color: white;">CHANGE PASSWORD</p></center>

<div class="container">
  <form autocomplete="off">
    <!-- <label for="usrname">New Password</label>
    <input type="password" id="usrname" name="pass" required> -->
    <label for="psw">New Password</label>
    <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
    <label for="psw">Confirm Password</label>
    <input type="password" id="psw" name="psw_a" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
    
    <input type="submit" value="Change" name="btnChange">
  </form>
</div>

<div id="message">
  <h3>Password must contain the following:</h3>
  <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
  <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
  <p id="number" class="invalid">A <b>number</b></p>
  <p id="length" class="invalid">Minimum <b>8 characters</b></p>
</div>
				
<script>
var myInput = document.getElementById("psw");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}
</script>
 <script src="../assets/js/custom-scripts.js"></script> 
    <script src="../message/js/toastr.min.js"></script>
                    <script >

    <?php if (isset($_GET['status']) && $_GET['status'] === "NoMatch") : ?>
   toastr.warning("Password do not please Check and Enter again");
    <?php endif;?>
toastr.options={
        "preventDuplicates":true, 
        "positionClass": "Top Center",
        "progressBar": true
    }
 </script>
<?php
//}
}
?>
</body>
</html>
