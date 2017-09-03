<?php  

	// If it's going to need the database, then it's
	// probably smart to require it before we start.
	require_once(LIB_PATH.DS.'database.php');

	class DatabaseObject{
		protected static $table_name;
		protected static $db_fields = array();

		// Set $db_fields attribute
		protected function set_db_fields_array(){
			self::$db_fields = self::get_db_table_fields(self::$table_name); // self::ClassName = $this->ClassName 
		}

		public static function get_db_table_fields($table_name){
			global $database;
			$sql = "SHOW COLUMNS FROM ".$table_name;
			$result = $database->query($sql);
			$fieldnames = array();
			while ($row = $result->fetch(\PDO::FETCH_ASSOC)) {
				$fieldnames[] = $row['Field'];
			}
	        return $fieldnames;
		}

		// Instantiate the currently called class (that extends the DatabaseObject class) with its attribute values, i.e. database table's field names and values from record argument
		
		public static function instantiate($record){
			$class_name = get_called_class();
			$object = new $class_name;

			foreach ($record as $attribute => $value) {
				if($object->has_attribute($attribute)){
					$object->$attribute = $value;
				}
			}
			return $object;
		}
		
		// Check if the attributes(database table's fields) of the called class(that extends the DatabaseObject class) to be set, matches the attribute $db_tables' (database table's fields array) indeices that is initially set for the called class
		
		// Simply, checks if there is a corresponding attribute for the database record argument's field
		
		private function has_attribute($attribute){
			$object_vars = $this->attributes();
			return array_key_exists($attribute, $object_vars);
		} 

		protected function attributes(){
			$attributes = array();
			foreach (self::$db_fields as $field) {
				if (property_exists($this, $field)) {
					$attributes[$field] = $this->$field;
				}
			}
			return $attributes;
		}


		// CRUD
		
		// Save - Create or Update
		public function save(){ 
			return isset($this->id) ? $this->update() : $this->create();
		}

		// Create
		protected function create(){
			global $database;
			$attributes = $this->attributes();
			$sql = "INSERT INTO ".self::$table_name." (";
			$sql .= join(", ", array_keys($attributes));
			$sql .= ") VALUES (";
			$question_marks = array();
			foreach ($attributes as $attribute) {
				$question_marks[] = "?";
			}
			$sql .= join(", ", $question_marks);
			$sql .= ")";

			// print_r($sql);
			// print_r($attributes);

			if ($database->query($sql, array_values($attributes))) {
				$this->id = $database->insert_id();
				return true;
			}
			return false;
		}

		// Read
		public static function find_all(){}

		public static function find_by_id($id=0){}

		public static function find_by_sql($prpd_stmt="", $bind_param=array()){
			global $database;
			$result_set = $database->query($prpd_stmt, $bind_param);
			$object_array = array();
			while($row = $result_set->fetchAll()){
				$object_array[] = self::instantiate($row);
			}
			return $object_array;
		}

		public static function count_all(){}

		// Update
		protected function update(){}

		// Delete
		public function delete(){}

	}

?>