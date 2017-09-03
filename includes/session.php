<?php  

	/**
	* A class to help with sessions
	* In our case, primarily to manage logging users in and out
	*
	* Keep in mind when working with sessions that, it is generally
	* inadvisable to store DB related objects in sessions
	*/

	class Session{
		private $logged_in = false;
		public $user_id;
		public $message;
		
		function __construct(){
			# code...
		}


	}

?>