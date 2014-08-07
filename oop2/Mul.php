<?php

class Mul implements OperatorInterface {
	
	public function run($number, $results) {
		
		return $results * $number;
	}
}
