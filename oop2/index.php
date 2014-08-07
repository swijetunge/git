<?php

// include "Person.php";
// 
// include "Chest.php";
// include "Lock.php";
// 
// include "TalkInterface.php";
// include "Cat.php";
// include "Dog.php";
// 
// include "Foo.php";
// 
// include "Find.php";
// 
// include "Calculator.php";
// include "OperatorInterface.php";
// include "Add.php";
// include "Sub.php";
// include "Mul.php";
// include "Div.php";

require_once 'autoloader.php';

/* 
 * Classes: TalkInterface, Cat and Dog
 * Example: Interface
 */
 
// $dog = new Dog();
// $cat = new Cat();
// echo $cat->talk(). '<br />' . $dog->talk();



/* 
 * Classes: Person 
 * Example: Simple OOP 
 */
 
// $object = new Person("Sam", "12");
// echo $object->sentence();



/* 
 * Classes: Chest and Lock
 * Example: Dependency Injection
 */
 
// $chest = new Chest(new Lock);
// $chest->close();
// $chest->open();


/* 
 * Classes: Foo
 * Example: Static - without instantiating 
 */

 // echo Foo::hello("Hello World.");
 

 /* 
 * Classes: Find
 * Example: Method Chaining 
 */
 
 // $find = new Find();
 // $find->train()->deptime();
 
 /* 
 * Classes: Calculator, OperatorInterface, Add, Div, Mul, Sub
 * Example: simple OOP calculator  
 */
 
 $cal = new Calculator;
 
 $cal->setOperation(new Add);
 $cal->calulate(20, 30);
 
 $cal->setOperation(new Sub);
 $cal->calulate(-5, 10);
 
 $cal->setOperation(new Mul);
 $cal->calulate(3);
 
 $cal->setOperation(new Div);
 $cal->calulate(5);
 
 $cal->setOperation(new Add);
 $cal->calulate(.5);
 
 echo $cal->getResults();
?>