<?php
/*
number_format — Format a number with grouped thousands
string number_format ( float $number , int $decimals = 0 , string $dec_point = '.' , string $thousands_sep = ',' )
This function accepts either one, two, or four parameters (not three):
If only one parameter is given, number will be formatted without decimals, but with a comma (",") 
between every group of thousands.
If two parameters are given, number will be formatted with decimals decimals with a dot (".") in front, and 
a comma (",") between every group of thousands.
If all four parameters are given, number will be formatted with decimals decimals, dec_point instead of a dot (".") 
before the decimals and thousands_sep instead of a comma (",") between every group of thousands.
*/

$num = 2573400.00;
echo 'I have &pound'. number_format($num, 2, '.', ',');

?>
