<?php

class Div implements OperatorInterface {
	
	public function run($number, $results) {
		
		return $results / $number;
	}
}
