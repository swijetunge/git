<?php
/*
  Arrays
  An array is a special variable, which can store multiple values in one single variable.
  A variable is a storage area holding a number or text. The problem is, a variable will hold only one value
*/

//$names = array("Saman", "Kamal", "Namal");
//echo $names[1];

/*
  Associative Arrays
*/
//$names = array('Saman'=>19, 'Kamal'=>25, 'Namal'=>30);  
//An associative array, each ID key is associated with a value.

//$names['Sumudu']=12; // add to the array
//$names['Saman']=20; // update the array
//echo $name['Saman'];  // print off value of Saman ID key

/*
Numeric Arrays
*/
//$names[0] = "Lion";   // A numeric array stores each array element with a numeric index.
//$names[1] = "Tiger";
//$names[2] = "Rabbit";


/*
Multidimensional Arrays
In a multidimensional array, each element in the main array can also be an array. 
And each element in the sub-array can be an array, and so on.
*/

$names = array(
'Saman'=>array('age'=>20, 'Hair'=>'Blond', 'food'=>array('Pizza', 'Hashbrown')),
'Kamal'=>array('age'=>25, 'Hair'=>'Brown'),
'Namal'=>array('age'=>30, 'Hair'=>'Black'));

//echo $names ['Saman']['Hair']; //print off Saman's hair color, two dimensional array
//print_r ($names ['Saman']['food']);  // print off Saman's favorite foods
//echo $names ['Saman']['food'] [0]; // print off Saman's most favorit food, three dimensional array

$names ['Sandun'] ['age']= 29;
$names ['Sandun'] ['Haire']= 'Black';


//print_r($names);
/*
The <pre> tag defines preformatted text.
Text in a <pre> element is displayed in a fixed-width font (usually Courier) 
And it preserves both spaces and line breaks.
*/
echo '<pre>',print_r($names, true),'</pre>';

echo '<br/><a href="example.php" target="_blank">Example of GLOBALE[] array</a>';

?>
