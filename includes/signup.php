<?php
  require_once("initialize.php");

    // Fetching Values From URL
	$name 	= $_POST['user_name'];
	$email 	= $_POST['user_email'];
	$password = $_POST['user_pwd'];
	$con = new MySQLDatabase();

	if(isset($_POST['user_name'])){
		if(User::authenticate($email, $password)) {echo "ERROR! This email is already taken.";}
		else{
			$user = new User();
			
			$user->user_name = $name;
			$user->email = $email;
			$user->password = $password;

			$op = $user->save() ? "You signed up succesfully!" : "Sorry! Some error occurred during signup.";
			echo $op;
		}
	}

?>