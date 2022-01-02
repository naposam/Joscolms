<?php
session_start ();
function loginForm() {
    echo '
	<div class="form-group">
		<div id="loginform" style="background:rgba(0,0,0,0.2)">
			<form action="index.php" method="post" autocomplete="off">
			<h1 style="color:white;">Live Chat</h1><hr/>
				<label for="name" style="color:white;">Please enter your name to proceed..</label>
				<input type="text" name="name" id="name" class="form-control" placeholder="Enter Your Name"/>
				<input type="submit" class="btn btn-default" name="enter" id="enter" value="Enter" />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="../index.php" class="btn btn-danger"><i class="glyphicon glyphicon-menu-right"></i></a>
			</form>
		</div>
	</div>
   ';
}
 
if (isset ( $_POST ['enter'] )) {
    if ($_POST ['name'] != "") {
        $_SESSION ['name'] = stripslashes ( htmlspecialchars ( $_POST ['name'] ) );
        $cb = fopen ( "log.html", 'a' );
        fwrite ( $cb, "<div class='msgln'><i>User " . $_SESSION ['name'] . " has joined the chat session.</i><br></div>" );
        fclose ( $cb );
    } else {
        echo '<span class="error" style="color:white;">Please Enter a Name</span>';
    }
}
 
if (isset ( $_GET ['logout'] )) {
    $cb = fopen ( "log.html", 'a' );
    fwrite ( $cb, "<div class='msgln'><i>User " . $_SESSION ['name'] . " has left the chat session.</i><br></div>" );
    fclose ( $cb );
    session_destroy ();
    header ( "Location: index.php" );
}
?>