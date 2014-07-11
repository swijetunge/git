<?php
// PHP OOP ¦ Scope & Calculator

class Calc{
	
	public $num1;
	public $num2;
	protected $result;
	
	function setInputs($int1, $int2)
	{
	$this->num1 = (int) $int1;
	$this->num2 = (int) $int2;
	}
	
	function add()
	{
	$this->result = $this->num1 + $this->num2;
	}
	
	function subt()
	{
	$this->result = $this->num1 - $this->num2;
	}
	
	function mul()
	{
	$this->result = $this->num1 * $this->num2;
	}
	
	function div()
	{
	$this->result = $this->num1 / $this->num2;
	}
	
	function getResult()
	{
	return $this->result;
	}


}


$cal = new Calc();
$cal->setInputs(25,4);
//$cal->add();
//$cal->subt();
//$cal->mul();
$cal->div();
echo $cal->getResult();

?>
