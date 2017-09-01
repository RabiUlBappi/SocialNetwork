<?php
  require_once("initialize.php");

    // Fetching Values From URL
	$name 	= $_POST['user_name'];
	$email 	= $_POST['user_email'];
	$password = $_POST['user_pwd'];
	$con = new MySQLDatabase();

	if(isset($_POST['user_name'])){
		$stmt = $con->query("SELECT user_id FROM users WHERE  email=?", array($email));
		if($stmt->rowCount()>0) {echo "ERROR! This email is already taken.";}
		else{
			$stmt = $con->query("INSERT INTO users (user_name, email, password) VALUES (?, ?, ?)",array($name,$email,$password));
			echo "You signed up succesfully!";
		}
	}

?>