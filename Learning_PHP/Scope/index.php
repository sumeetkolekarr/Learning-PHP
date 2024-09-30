<?php 
echo "Welcome to scope in PHP!";
$a = 98; //Global Variable

function printValue(){
    // $a = 97; //Local Variable
    global $a; // Gives the access to this global variable
    $a = 100;
    echo "<br>The value of your variable is $a<br>";
}

echo "<br>";
echo $a;
printValue();
echo "<br>The value of your variable a is $a";
echo "<br>";
// echo var_dump($GLOBALS);
echo var_dump($GLOBALS['a']);

?>