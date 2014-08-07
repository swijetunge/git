<?php

class Calculator {
	
	protected $results;
	protected $operation;
	
	public function setOperation($operation){
		
		$this->operation = $operation;
		var_dump($operation);
	}
	
	public function calulate() {
		
		foreach (func_get_args() as $number) {
			$this->results = $this->operation->run($number, $this->results);
		}
	}
	
	public function getResults() {
		
		return $this->results;
	}
	
}

?>