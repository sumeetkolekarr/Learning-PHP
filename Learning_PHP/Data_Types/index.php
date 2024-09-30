<?php 
$name = 'Bunny';
$cat = 4;

/* PHP Data Types
1. String 
2. Interger
3. Float
4. Boolean
5. Object
6. Array
7. NULL
*/

// String - Sequence of Characters
echo "$name is the real Friend! ";
echo '<br>';

// Integer - Non Decimal Number
echo "$name has $cat Friends! ";
echo '<br>';

// Float - Decimal Point Number
$food = 10.25;
echo "$name has $food Food Pieces! ";
echo '<br>';

// Boolean - Can be either True of False
$x = true;
echo "$x";
echo '<br>';
echo var_dump($x);
echo '<br>';

// Object - Instances of Classes
// Employee is a class ----> Bunny can be one object

// Array - Used to store multiple values in a single variable
$friends = array('Momo', 'Heroine', 'Pari');
echo var_dump($friends);
echo '<br>';
echo $friends[0];
echo '<br>';
echo $friends[1];
echo '<br>';
echo $friends[2];
echo '<br>';
// echo $friends[3]; //Will throw an error as the size of array is 3

//NULL
$name = NULL;
echo var_dump($name);
?>