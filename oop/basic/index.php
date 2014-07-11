<?php
// PHP OOP ¦ Basic

class Example
{
	public $var = "Test"; // property declaration,  constant or variable (public, protected, and private).
	//const constant = 'constant value';
	
	function Sample(){ //method declaration
	 $this->Test();
	}
	
	function Test(){
	echo $this->var;
	$regular = "<br/> Print within funtion";
	echo $regular;
	}

}


$e = new Example();
$e->Sample();

?>