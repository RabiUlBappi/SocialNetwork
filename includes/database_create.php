<?php

	require_once("config.php");


	class CreateMySQLDatabase {
		private $connection;
		private $last_query;

		function __construct(){
			$this->open_connection();
			$this->create_database();
			$this->select_database();
			$this->import_sql();
		}

		// Connect to MySQL server
		public function open_connection(){
			try{
				$this->connection = new \PDO("mysql:host=".DB_SERVER.";dbname="."",DB_USER,DB_PASS);

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

		// Create database
		private function create_database(){
			try{
				if($this->check_db()){
					echo "Database already exists!";
					return;
				}
				$stmt = $this->connection->exec("CREATE DATABASE IF NOT EXISTS ".DB_NAME);
				echo "Database created!";
			}catch(\PDOExcepton $e){
				die("Error creating database: ".$e->getMessage());
			}
		}

		// Select database
		private function select_database(){
			try{
				$stmt = $this->connection->exec("USE ".DB_NAME);
				echo "Database is selected!";
			}catch(\PDOExcepton $e){
				die("Error selecting database: ".$e->getMessage());
			}
		}

		// Check database if exists
		private function check_db(){
			$dbs = $this->connection->query( 'SHOW DATABASES' );

			while( ( $db = $dbs->fetchColumn( 0 ) ) !== false ){
			    if($db === DB_NAME) return true;
			}

			return false;
		}


				
		// Import from the SQL file
		private function import_sql(){
			
			// Temporary variable, used to store current query
			$templine = '';
			
			// Read in entire file
			$lines = file("database_query.sql");
			//print_r($lines);
			// Loop through each line
			foreach ($lines as $line){
				// Skip it if it's a comment
				if (substr($line, 0, 2) == '--' || $line == '')
				    continue;

				// Add this line to the current segment
				$templine .= $line;
				
				// If it has a semicolon at the end, it's the end of the query
				if (substr(trim($line), -1, 1) == ';'){
				    // Perform the query
				    try{
						$this->connection->exec($templine);
						echo "Query executed successfully!";
					}catch(\PDOExcepton $e){
						die('Error performing query \'<strong>'.$templine.'\': '.$e->getMessage().'<br /><br />');
					}
				    
				    // Reset temp variable to empty
				    $templine = '';
				}
			}
			echo "Tables imported successfully";
		}

	}

	$database = new CreateMySQLDatabase();
	$database->close_connection();

?>