<?php  

	require_once(LIB_PATH.DS."config.php");

	class MySQLDatabase {
		private $connection;
		private $last_query;

		function __construct(){
			$this->open_connection();
		}

		public function open_connection(){
			try{
				$this->connection = new \PDO("mysql:host=".DB_SERVER.";dbname=".DB_NAME,DB_USER,DB_PASS);

				$this->connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
				//echo "Database Connection Established Successfully!";
			}catch(\PDOExcepton $e){
				die("Datbase connection failed: ".$e->getMessage());
			}

		}

		public function close_connection(){
			if(isset($this->connection)){
				$this->connection = null;
			}
		}

		public function query($prepared_statement, $bound_params=array()){
			$this->last_query = $prepared_statement;

			$result = $this->connection->prepare($prepared_statement);
			$result->execute($bound_params);

			$this->confirm_query($result);
			return $result;
		}

		public function affected_rows($result_set){
			return $result_set->rowCount();
		}

		public function insert_id(){
			return $this->connection->lastInsertId();
		}

		public function num_rows($result_set){
			return count($result_set->fetchAll());
		}

		public function confirm_query($result){
			if(!$result){
				$output = "Database query failed: ".$e->getMessage()."<br><br>";
				$output .= "Last SQL query: ".$this->last_query;
				die($output);
			}
		}

	}

	$database = new MySQlDatabase();

?>