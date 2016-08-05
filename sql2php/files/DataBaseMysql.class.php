<?php


		
class DataBaseMysql {

	public $conn;

	public function __construct($id = false){
		$this->conn = new mysqli("localhost", "root", "");
		if($this->conn->connect_error){
			echo "Error connect to mysql";die;
		}
		if($id) {
			$this->loadFromKey($id);
		}
	}
	
	public function runQuery($query_tag){
		$result = $this->conn->query($query_tag) or die("Error in SQL query-> $query_tag  ". mysql_error());
		return $result;
	}

	public function totalOfRows($table_name){
		$result = $this->RunQuery("Select * from $table_name");
		return $result->num_rows;
	}

	public function closeMysql(){
		$this->conn->close();
	}

}

?>