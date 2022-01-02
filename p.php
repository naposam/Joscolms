<!DOCTYPE html>
<html>

<head>
	<style type="text/css">
		/*Setting Basic Dimensions to give
		gallary view */
		.container{
			margin: 0 auto;
			width: 90%;
		}
		.main_view{
			width: 80%;
			height: 25rem;
			margin: 0 auto;
		}
		.main_view img{
			width: 100%;
			height: 100%;
			object-fit: cover;
		}
		.side_view{
			display: flex;
			justify-content: center;
			flex-wrap: wrap;
		}
		.side_view img{
			width: 9rem;
			height: 7rem;
			object-fit: cover;
			cursor: pointer;
			margin:0.5rem;
		}
	</style>
</head>

<body>
	<!-- Container for our gallery -->
	<div class="container">
		
		<!-- Main view of our gallary -->
		<div class="main_view">
			<img src="one.jpg" id="main" alt="IMAGE">
		</div>

		<!-- All images with side view -->
		<div class="side_view">
			<img src="img/11.jpg" onclick="change(this.src)">
			<img src="img/12.jpg" onclick="change(this.src)">
			<img src="img/24.jpg" onclick="change(this.src)">
			<img src="img/back.jpg" onclick="change(this.src)">
		</div>
	</div>
	

	<script type="text/javascript">
		// const change = src => {
		// 	document.getElementById('main').src = src
		// }

		function change(src){
			document.getElementById('main').src=src
		}
	</script>
</body>

</html>
<!-- sample unsed code for -->
<!-- calling the function : onsubmit="return samcose()" -->
<!-- this code has not been used . it is just a sample code for validating forms before submitting check and use it. ultdev.org -->
<script>
            function samcose() {
                var name = 
                    document.forms["RegForm"]["Name"];
                var email = 
                    document.forms["RegForm"]["EMail"];
                var phone = 
                    document.forms["RegForm"]["Telephone"];
                var what = 
                    document.forms["RegForm"]["Subject"];
                var password = 
                    document.forms["RegForm"]["Password"];
                var address = 
                    document.forms["RegForm"]["Address"];
  
                if (name.value == "") {
                    window.alert("Please enter your name.");
                    name.focus();
                    return false;
                }
  
                if (address.value == "") {
                    window.alert("Please enter your address.");
                    address.focus();
                    return false;
                }
  
                if (email.value == "") {
                    window.alert(
                      "Please enter a valid e-mail address.");
                    email.focus();
                    return false;
                }
  
                if (phone.value == "") {
                    window.alert(
                      "Please enter your telephone number.");
                    phone.focus();
                    return false;
                }
  
                if (password.value == "") {
                    window.alert("Please enter your password");
                    password.focus();
                    return false;
                }
  
                if (what.selectedIndex < 1) {
                    alert("Please enter your course.");
                    what.focus();
                    return false;
                }
  
                return true;
            }
        </script>
<!-- this code will make your footer stay at the bottom. it has not been used -->
        <style type="text/css">
        	.footer{
        	position: fixed;
            padding: 10px 10px 0px 10px;
            bottom: 0;
            width: 100%;
            /* Height of the footer*/ 
            height: 40px;
            background: grey;}
        </style>
        <script type="text/javascript">
        	function showMessage() {
             alert( 'Hello everyone!' );
             }

             const showMessage=()=>{
             alert( 'Hello everyone!' );
             }
        </script>
<button onclick="showMessage()">Click</button>