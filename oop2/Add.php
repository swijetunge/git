<?

class Add implements OperatorInterface {
	
	public function run($number, $results) {
		
		return $results + $number;
	}
}
