<?php
  require_once("../includes/initialize.php");

	$message = "";

  	if ($session->is_logged_in()) {
		$session->logout();
  	}
  	else{
  		$message = "You are not signed in!";
  		echo $message;
  	}

?>