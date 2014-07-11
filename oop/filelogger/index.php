<?php

class Log
{
	private $_fileName;
	private $_data;

	public function writeFile($strFileName, $data)
	{
		$this->_fileName = $strFileName;
		$this->_data = $data;
		if (!is_writable ($this->_fileName))
		die ('File does not exist or no permission in order to save '. $this->_fileName);
		
		//fopen — Opens file or URL for reading and writing
		$handle = fopen ($this->_fileName, 'a+'); //a+ append at the EOF and the file does not exist, attempt to create it
		fwrite($handle, $this->_data);
		fclose($handle);
	}
	
	public function readFile($strFileName)
	{
	$handle = fopen ($strFileName, 'r');
	return file_get_contents($strFileName);
	fclose($handle);
	}
}

$log = new Log;
$log->writeFile("server_log.txt", "server011: login user ".date('Y-m-d H:i:s')."\n");
echo  "<pre>".$log->readFile("server_log.txt")."<pri/>";

?>

