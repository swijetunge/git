<?php

class ErrorHandler 
{
	protected $errors = array();
	
	public function addError($error, $key = null)
	{
		if($key)
		{
			$this->errors[$key][] = $error;
		} 
		else
		{
			$this->errors[] = $error;
			
		}
	}
	
	public function all($key = null)
	{
		return isset($this->errors[$key]) ? $this->errors[$key] : $this->errors;
	}
	
	public function hasErrors()
	{
		return count($this->all()) ? true : false;
	}
	
	public function first($key)
	{
		$e = $this->all($key);
		if(isset($e[0]))
		{
			return $e[0];
		}
		else
		{
			return '';
		}
	}
}

?>