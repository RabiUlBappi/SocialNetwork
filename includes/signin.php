<?php
  require_once("initialize.php");

    // Fetching Values From URL
	$email 	= $_POST['user_signin_email'];
	$password = $_POST['user_signin_pwd'];
	$con = new MySQLDatabase();

	if(isset($_POST['user_signin_email'])){
		$stmt = $con->query("SELECT user_id FROM users WHERE  email=? AND password=?", array($email, $password));
		if($database->num_rows($stmt)>0) {echo "You are signed in!";}
		else echo "Incorrect email or password!";
	}

?>