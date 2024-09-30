<?php 
echo "Welcome to Associative Arrays!";

// Indexed Arrays
// $arr  = array(46,54,78);
// echo $arr[0];
// echo $arr[1];
// echo $arr[2];

// Associative Arrays
$favCol = array('bunny'=>'orange', 'momo'=>'black', 'pari'=>'white', 5=>'violet');

// echo $favCol['bunny'];
// echo "<br>";
// echo $favCol[5];
// echo "<br>";

foreach($favCol as $key => $value){
    echo "<br>Favorite color of $key is $value";
}

?>