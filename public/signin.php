<?php
  require_once("../includes/initialize.php");

	$message = "";

  	if ($session->is_logged_in()) {
		return true;//header("location:../layouts/home.php");
  	}

	if(isset($_POST['user_signin_email'])){

	    // Fetching Values From URL
		$email 	  = trim($_POST['user_signin_email']);
		$password = trim($_POST['user_signin_pwd']);

		$found_user = User::authenticate($email, $password);
		if($found_user){
			$session->login($found_user);
			//header("location://localhost/SocialNetwork/index.php");
		}
		else{
			$message = "Incorrect email or password!";
			echo $message;
		}
	}
	else{
		// Form has not been submitted
		$email = '';
		$password = '';
	}

?>