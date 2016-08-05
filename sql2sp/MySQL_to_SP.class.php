<?php
/*
 * This is a class to convert your mysql tables into php pdo classes to call stored procedures.
 */
class MySQL_to_SP{
	
	//DataBase settings
	private $host;
	private $user;
	private $pass;
	private $dbname;
	private $tablename;
	private $connection;
	
	//functions Settings
	private $construct = true; 
	private $geters = true;
	private $seters = true;
	private $load_row_from_key = true; 
	private $delete_row_from_key = true; 
	private $save_active_row = true; 
	private $save_active_row_as_new = true;
	private $Order_Keys = true; 
	private $procs = true;
	
	//tables name and variables names and setings of variables
	private $class_name = array(array('name', 'total_vars'));
	private $class_variables = array(array('var_name', 'length', 'key'));
	
	//statistics
	private $num_of_tables = 0;
	private $num_of_total_variables = 0;
	
	
	/**
     * Connects to Mysql. Use DataBase Name to convert into tables. This param will be used
     * on classes to connect again to mysql. You can change this in DataBaseMysqlPDO.php
     * 
     * @param string $host
     * @param string $user
     * @param string $password
     * @param string $dbname
     */
	public function MySQL_to_SP($host, $user, $passoword, $dbname, $tablename=''){
		
		$this->host = $host;
		$this->user = $user;
		$this->pass = $passoword;
		$this->dbname = $dbname;
		$this->tablename = $tablename;
		$this->connection = new mysqli($host, $user, $passoword, $dbname); 
			if($this->connection->connect_error){
				echo "Error connect!"; die;
			}	
	}
	
	
	/**
     * This is the unic function public. You just need to run this function
     * to create your classes files
     * This will read all tables and columns and save it into class vars array
     * After reading one complete table, create the file
     * 
     */
	public function CreateClassFiles(){
		if($this->tablename=='') {
			$loop = $this->connection->query("SHOW tables FROM ".$this->dbname."");	
		}
		else {	
			$loop = $this->connection->query("SHOW tables FROM ".$this->dbname." WHERE Tables_in_".$this->dbname." = '".$this->tablename."'");	
		}
		while($row = $loop->fetch_row()){			
			$this->class_name[$this->num_of_tables]['name'] = $row[0]; //get the name of the table/class
			$this->class_name[$this->num_of_tables]['total_vars'] = 0;		
				$loop2 = $this->connection->query("SHOW columns FROM ". $row[0]);				
				$j = 0;
				while ($row2 = $loop2->fetch_row()){		
					$this->class_variables[$j]['var_name'] = $row2[0];
					$this->class_variables[$j]['length']= $row2[1];
					$row2[3] == "PRI" ? $this->class_variables[$j]['key'] = 1 : $this->class_variables[$j]['key'] = 0;
					$this->num_of_total_variables += 1;
					$this->class_name[$this->num_of_tables]['total_vars'] += 1;
					$j++;
				}	
			$this->CreateFiles();	
			$this->num_of_tables += 1;				
		}		
		$this->CreateDataBaseClass();	
	}
	
	
	/**
     * By using the class vars, will be now create what file will be have inside, and what functions
     * will be able to use
     * 
     */
	private function CreateFiles(){
		$file_in = "<?php\n";
		$file_in .= "namespace ".$this->dbname."\\model;\n\n";
		$file_in .= "abstract class ".$this->class_name[$this->num_of_tables]['name']." {\n\n";
	
		$file_in = $this->CreateVars($file_in);
		
		$file_in .="	public function __construct(\$id=false){
		\$this->connection = new DataBaseMysqlPDO();
		if(\$id) {
			\$this->loadFromKey(\$id);
		}
	}";

		if($this->construct) $file_in = $this->CreateConstruct($file_in);
		
		if($this->load_row_from_key) $file_in = $this->CreateFunctionLoad_from_key($file_in);		
		
		if($this->delete_row_from_key) $file_in = $this->CreateFunctionDeleteFromKey($file_in);
	
		if($this->save_active_row) $file_in = $this->CreateFunctionSaveActiveRow($file_in);

		if($this->save_active_row_as_new) $file_in = $this->CreateFunctionSaveActiveRowAsNew($file_in);
		
		if($this->seters) $file_in = $this->CreateFunctionGetters($file_in);
			
		if($this->geters) $file_in = $this->CreateFunctionSetters($file_in);

		$file_in = $this->CreateFunctionCloseSQL($file_in);
			
		$file_in .= "\n}\n?>";
		
		$this->SaveFile($this->class_name[$this->num_of_tables]['name'].".php", $file_in, "files");

		if($this->procs) $proc_in = $this->CreateFunctionStoredProcedures();
		
		$this->SaveFile($this->class_name[$this->num_of_tables]['name'].".sql", $proc_in, "procs");
	}
	
	
	/**
     * Create Stored Procedures
     * 
     * @param string $file
     */	
	private function CreateFunctionStoredProcedures(){
		// Delete procedure
		$proc_in  = "DELIMITER $$

CREATE DEFINER='".$this->user."'@'%' PROCEDURE ".$this->class_name[$this->num_of_tables]['name']."_delete(
	IN p_id INT(11)
	)
BEGIN
	DELETE FROM ".$this->class_name[$this->num_of_tables]['name']."
	WHERE id = p_id;
END
$$";
		$proc_in .= "\n\n\n\n";
		
		// Select procedure
		$proc_in .= "DELIMITER $$

CREATE DEFINER='".$this->user."'@'%' PROCEDURE ".$this->class_name[$this->num_of_tables]['name']."_select(
	IN  p_id INT(11)    
 )
BEGIN
	SELECT ";
		for($i=0; $i!= $this->class_name[$this->num_of_tables]['total_vars']; $i++){
			if($i > 0) {
				$proc_in .=", ";
			}
			$proc_in .= $this->class_variables[$i]['var_name'];
		}
	$proc_in .= "\n	FROM ".$this->class_name[$this->num_of_tables]['name']."
	WHERE id = p_id;
END
$$";
		$proc_in .= "\n\n\n\n";
		
		// Insert procedure
		$proc_in .= "DELIMITER $$

CREATE DEFINER='".$this->user."'@'%' PROCEDURE ".$this->class_name[$this->num_of_tables]['name']."_insert( ";
	for($i=0; $i!= $this->class_name[$this->num_of_tables]['total_vars']; $i++){
		if(($this->class_variables[$i]['key'] != 1) && ($this->class_variables[$i]['length'] != "timestamp")){
			if($i > 1) {
				$proc_in .=", ";
			}
			$proc_in .= "\n	IN p_".$this->class_variables[$i]['var_name']." ".strtoupper($this->class_variables[$i]['length'])."";
		}	
	}
$proc_in .= "\n )
BEGIN 

    INSERT INTO ".$this->class_name[$this->num_of_tables]['name']."
		( ";
		for($i=0; $i!= $this->class_name[$this->num_of_tables]['total_vars']; $i++){
			if(($this->class_variables[$i]['key'] != 1) && ($this->class_variables[$i]['length'] != "timestamp")){
				if($i > 1) {
					$proc_in .=", ";
				}
				$proc_in .= $this->class_variables[$i]['var_name'];
			}	
		}
$proc_in .= " )
    VALUES 
		( ";
		for($i=0; $i!= $this->class_name[$this->num_of_tables]['total_vars']; $i++){
			if(($this->class_variables[$i]['key'] != 1) && ($this->class_variables[$i]['length'] != "timestamp")){
				if($i > 1) {
					$proc_in .=", ";
				}
				$proc_in .= "p_".$this->class_variables[$i]['var_name'];
			}	
		}
$proc_in .= " ); 
    SELECT LAST_INSERT_ID() AS insertid;
END
$$";
		$proc_in .= "\n\n\n\n";
		
		// Update procedure 
		$proc_in .= "DELIMITER $$

CREATE DEFINER='".$this->user."'@'%' PROCEDURE ".$this->class_name[$this->num_of_tables]['name']."_update( ";
	$proc_in .= "IN p_id INT(11),\n";
	for($i=0; $i!= $this->class_name[$this->num_of_tables]['total_vars']; $i++){
		if(($this->class_variables[$i]['key'] != 1) && ($this->class_variables[$i]['length'] != "timestamp")){
			if($i > 1) {
				$proc_in .=", ";
			}
			$proc_in .= "\n	IN p_".$this->class_variables[$i]['var_name']." ".strtoupper($this->class_variables[$i]['length'])."";
		}	
	}
$proc_in .= "\n )
BEGIN 

    UPDATE ".$this->class_name[$this->num_of_tables]['name']."
    SET ";
		for($i=0; $i!= $this->class_name[$this->num_of_tables]['total_vars']; $i++){
			if(($this->class_variables[$i]['key'] != 1) && ($this->class_variables[$i]['length'] != "timestamp")){
				if($i > 1) {
					$proc_in .=", ";
				}
				$proc_in .= "\n		".$this->class_variables[$i]['var_name']." = p_".$this->class_variables[$i]['var_name'];
			}	
		}
$proc_in .= "\n		
	WHERE id = p_id; 
END
$$";
		$proc_in .= "\n\n\n\n";
		
		return $proc_in;
	}

	/**
     * Create function Get_var_name into your class
     * 
     * @param string $file
     */
	private function CreateFunctionGetters($file){
		for($i=0; $i!= $this->class_name[$this->num_of_tables]['total_vars']; $i++){
			$file .= "\n	/**
	* @return ".$this->class_variables[$i]['var_name']." - ".$this->class_variables[$i]['length']."
	*/";
			$file .= "\n	public function get".ucfirst($this->class_variables[$i]['var_name'])."(){\n";
			$file .= "		return \$this->".$this->class_variables[$i]['var_name'].";\n";
			$file .= "	}\n";
		}
		return $file;
	}
	
	
	/**
     * Create function Set_var_name into your class
     * You cant set Keys
     * 
     * @param string $file
     */	
	private function CreateFunctionSetters($file){
		for($i=0; $i!= $this->class_name[$this->num_of_tables]['total_vars']; $i++){
			if(($this->class_variables[$i]['var_name'] != 1) && ($this->class_variables[$i]['length'] != "timestamp")) {
				$file .="\n	/**
	* @param Type: ".$this->class_variables[$i]['length']."
	*/";
				$file .= "\n	public function set".ucfirst($this->class_variables[$i]['var_name'])."($".$this->class_variables[$i]['var_name']."){\n";
				$file .= "		\$this->".$this->class_variables[$i]['var_name']." = $".$this->class_variables[$i]['var_name'].";\n";
				$file .= "	}\n";
			}
		}
		return $file;
	}
	
	
	/**
     * Create function to close connection to mysql
     * 
     * @param string $file
     */
	private function CreateFunctionCloseSQL($file){
		$file .="\n	/**
	* Close mysql connection
	*/";
		$file .= "\n	public function end".$this->class_name[$this->num_of_tables]['name']."(){\n";
		$file .= "		\$this->connection->conn = NULL;\n";
		$file .= "	}\n";
		return $file;
	}

	
	/**
     * Create function Save the Active Row as new in table
     * 
     * @param string $file
     */	
	private function CreateFunctionSaveActiveRowAsNew($file_in){
		$file_in .="\n	/**
	* Save the active var class as a new row on table
	*/";
		$file_in .= "\n	public function saveActiveRowAsNew(){\n";
		$file_in .= "		\$stmt = \$this->connection->conn->prepare(\"CALL ".$this->dbname.".".$this->class_name[$this->num_of_tables]['name']."_insert(";
		for($i=0; $i!= $this->class_name[$this->num_of_tables]['total_vars']; $i++){
			if(($this->class_variables[$i]['key'] != 1) && ($this->class_variables[$i]['length'] != "timestamp")){
				if($i > 1) {
					$file_in .=", ";
				}
				$file_in .= ":".$this->class_variables[$i]['var_name'];
			}	
		}
		$file_in .= ")\");\n";
		for($i=0; $i!= $this->class_name[$this->num_of_tables]['total_vars']; $i++){
			if(($this->class_variables[$i]['key'] != 1) && ($this->class_variables[$i]['length'] != "timestamp")){
				$file_in .= "		\$".$this->class_variables[$i]['var_name']." = str_replace('\"NULL\"','NULL',\$this->".$this->class_variables[$i]['var_name'].");\n";
				$file_in .= "		\$stmt->bindParam(':".$this->class_variables[$i]['var_name']."',\$".$this->class_variables[$i]['var_name'].");\n";
			}	
		}
		$file_in .= "		\$stmt->execute();\n";
		$file_in .= "		\$id = \$stmt->fetch(\PDO::FETCH_OBJ)->insertid;\n";
		$file_in .= "		\$stmt->closeCursor();\n";
		$file_in .= "		return \$id;\n";
		$file_in .= "	}\n";
		return $file_in;
	}
	
	
	/**
     * Create function Save Active row, just to update
     * 
     * @param string $file
     */	
	private function CreateFunctionSaveActiveRow($file_in){
	$file_in .="\n    /**
     * Update the active row table on table
     */";
		$file_in .= "\n	public function saveActiveRow(){\n";
		$file_in .= "		\$stmt = \$this->connection->conn->prepare(\"CALL ".$this->dbname.".".$this->class_name[$this->num_of_tables]['name']."_update(";
		$file_in .= ":id, ";
		for($i=0; $i!= $this->class_name[$this->num_of_tables]['total_vars']; $i++){
			if(($this->class_variables[$i]['key'] != 1) && ($this->class_variables[$i]['length'] != "timestamp")){
				if($i > 1) {
					$file_in .=", ";
				}
				$file_in .= ":".$this->class_variables[$i]['var_name'];
			}	
		}
		$file_in .= ")\");\n";
		$file_in .= "		\$id = \$this->id;\n";
		$file_in .= "		\$stmt->bindParam(':id',\$id);\n";
		for($i=0; $i!= $this->class_name[$this->num_of_tables]['total_vars']; $i++){
			if(($this->class_variables[$i]['key'] != 1) && ($this->class_variables[$i]['length'] != "timestamp")){
				$file_in .= "		\$".$this->class_variables[$i]['var_name']." = str_replace('\"NULL\"','NULL',\$this->".$this->class_variables[$i]['var_name'].");\n";
				$file_in .= "		\$stmt->bindParam(':".$this->class_variables[$i]['var_name']."',\$".$this->class_variables[$i]['var_name'].");\n";
			}	
		}
		$file_in .= "		\$stmt->execute();\n";
		$file_in .= "	}\n";
		return $file_in;
	}
	
	
	/**
     * Create function Delete a row from key
     * 
     * @param string $file
     */	
	private function CreateFunctionDeleteFromKey($file_in){
		$file_in .="\n    /**
	* Delete the row by using the key as arg
	*
	* @param key_table_type \$key_row
	*
	*/";
		$file_in .= "\n	public function deleteRowFromKey(\$key_row){\n";
		$file_in .= "		\$stmt = \$this->connection->conn->prepare(\"CALL ".$this->dbname.".".$this->class_name[$this->num_of_tables]['name']."_delete(?)\");\n";
		$file_in .= "		\$stmt->bindParam(1, \$key_row);\n";
		$file_in .= "		\$stmt->execute();\n";
		$file_in .= "	}\n";
		return $file_in;
	}
	
	
	/**
     * Create function Load row into var by using a key
     * 
     * @param string $file
     */	
	private function CreateFunctionLoad_from_key($file_in){
			$key_name = $this->class_variables[$this->GetKeyOf_table()]['var_name'];
				$file_in .="\n	/**
	* Load one row into var_class. To use the vars use for exemple echo \$class->getVar_name; 
	*
	* @param key_table_type \$key_row
	* 
	*/";
				$file_in .="\n	public function loadFromKey(\$key_row){\n";
				$file_in .= "		\$stmt = \$this->connection->conn->prepare(\"CALL ".$this->dbname.".".$this->class_name[$this->num_of_tables]['name']."_select(?)\");\n";
				$file_in .= "		\$stmt->bindParam(1, \$key_row);\n";
				$file_in .= "		\$stmt->execute();\n";
				$file_in .= "		while(\$row = \$stmt->fetch()){\n";

				for($k=0; $k!= $this->class_name[$this->num_of_tables]['total_vars']; $k++){
				 	$file_in .="			\$this->".$this->class_variables[$k]['var_name']." = \$row[\"".$this->class_variables[$k]['var_name']."\"];\n";
				}
				$file_in .="		}\n" ;
				$file_in .="	}\n" ;
				
	return $file_in;			
	}
	
	
	/**
     * Create class vars with type coments
     * 
     * @param string $file
     */
	private function CreateVars($file){
		$this->seters == true ? $type = "private" : $type = "public";
	
		for($i = 0; $i != $this->class_name[$this->num_of_tables]['total_vars']; $i++){
			$file .="	$type $".$this->class_variables[$i]['var_name']."; //".$this->class_variables[$i]['length']."\n";	
		}
		$file .= "	public \$connection;\n\n";		
		return $file;
	}
	
	
	/**
     * Create function Construct
     * 
     * @param string $file
     */
	private function CreateConstruct($file){
		$file .="\n\n	/**
	* New object to the class. Dont forget to save this new object \"as new\" by using the function \$class->SaveActiveRowAsNew(); 
	*
	*/";
		$file .= "\n	public function new".ucfirst($this->class_name[$this->num_of_tables]['name'])."(";

		for($i = 0; $i != $this->class_name[$this->num_of_tables]['total_vars']; $i++){
			if(($this->class_variables[$i]['key'] != 1) && ($this->class_variables[$i]['length'] != "timestamp")){
				if($i > 1) {
					$file .=",";
				}	
				$file .= "$".$this->class_variables[$i]['var_name']."";
			}	
		}
		$file .="){\n";
		
		for($i = 0; $i != $this->class_name[$this->num_of_tables]['total_vars']; $i++){
			if(($this->class_variables[$i]['key'] != 1) && ($this->class_variables[$i]['length'] != "timestamp")){
				$file .= "		\$this->".$this->class_variables[$i]['var_name']." = $".$this->class_variables[$i]['var_name'].";\n";
			}
		}
		$file .="	}\n";	
	return $file;		
	}
	
	
	/**
     * Return a key of the last table in var_array
     * 
     * @param string $file
     */
	private function GetKeyOf_table(){
		for($z = 0; $z != $this->class_name[$this->num_of_tables]['total_vars']; $z++){
			if($this->class_variables[$z]['key'] == 1) return $z;
		}
		return 0;
	}
	
	
	/**
     * Create file DataBaseMysqlPDO.php
     * 
     */
	private function CreateDataBaseClass(){
		$file = "<?php
class DataBaseMysqlPDO {\n
	public \$conn;\n
	public function __construct(\$id = false){
		try {
		    \$this->conn = new PDO(\"".$this->host."\", \"".$this->user."\", \"".$this->pass."\");
		    \$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException \$e) {
		    echo 'Connection failed: ' . \$e->getMessage();
		    exit;
		}				
	}
	
	public function closeMysql(){
		\$this->conn = NULL;
	}

}
?>"; 
		$this->SaveFile("DataBaseMysqlPDO.php", $file, "files");
	}
	
	
	/**
     * Create file and put inside your code
     * 
     * @param string $filename
     * @param string $text
     * 
     */	
	private function SaveFile($filename, $text, $dir){
		if($this->VerifyDirectory($dir)){
			$file = fopen($dir."/".$filename, "w");
			fwrite($file, $text);
			fclose($file);
		}
	}
	
	
	/**
     * Create Directory to save the files if it doesnt exist
     * 
     */
	private function VerifyDirectory($dir){
		if(is_dir($dir)){
			return true;
		}else{
			mkdir($dir);
			return true;
		}
	}
	
	
	/**
	 * @return Total of tables
	 */
	public function getNum_of_tables() {
		return $this->num_of_tables;
	}
	
	
	/**
	 * @return Total of variables
	 */
	public function getNum_of_total_variables() {
		return $this->num_of_total_variables;
	}
	
	
	/**
	 * @param True to active Getters Functions, or false
	 */
	public function setGeters($geters) {
		$this->geters = $geters;
	}
	
	
	/**
	 * @param True to active Function query("Select * from table where id=$i), or false
	 */
	public function setLoad_row_from_key($load_row_from_key) {
		$this->load_row_from_key = $load_row_from_key;
	}
	
	
	/**
	 * @param boolean $save_active_row
	 */
	public function setSave_active_row($save_active_row) {
		$this->save_active_row = $save_active_row;
	}
	
	
	/**
	 * @param boolean $save_active_row_as_new
	 */
	public function setSave_active_row_as_new($save_active_row_as_new) {
		$this->save_active_row_as_new = $save_active_row_as_new;
	}
	
	
	/**
	 * @param boolean $seters
	 */
	public function setSeters($seters) {
		$this->seters = $seters;
	}
	
	/**
	 * @param True to active Procs Functions, or false
	 */
	public function setProcs($procs) {
		$this->procs = $procs;
	}
	
	
	/**
	 * @return array table names and total of variables
	 */
	public function getclass_name() {
		return $this->class_name;
	}
	

	/**
	 * @param boolean $construct
	 */
	public function setConstruct($construct) {
		$this->construct = $construct;
	}
	
	/**
	 * @param boolean $delete_row_from_key
	 */
	public function setDelete_row_from_key($delete_row_from_key) {
		$this->delete_row_from_key = $delete_row_from_key;
	}
	
	/**
	 * @param boolean $Order_Keys
	 */
	public function setOrder_Keys($Order_Keys) {
		$this->Order_Keys = $Order_Keys;
	}


	public function endMySQL_to_PDO(){
		$this->connection->close();
	}
	
}

?>