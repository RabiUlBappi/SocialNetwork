<?php  

	// If it's going to need the database, then it's
	// probably smart to require it before we start.
	require_once(LIB_PATH.DS.'database.php');

	class User extends DatabaseObject{

		public $user_id;
		public $user_name;
		public $email;
		public $password;

		function __construct(){
			self::$table_name = 'users';
			self::set_db_fields_array();
		}

		// public function full_name(){
		// 	if(isset($this->first_name) && isset($this->last_name)){
		// 		return $this->first_name." ".$this->last_name;
		// 	}
		// 	else{ return ""; }
		// }
		
		public static function authenticate($email="", $password=""){
			global $database;
			$sql = "SELECT * FROM users WHERE ";
			$sql .= "email=? AND password=? LIMIT 1";

			$result_array = self::find_by_sql($sql, [$email, $password]);
			return !empty($result_array) ? array_shift($result_array) : false;
		}
	}

	new User();

?>