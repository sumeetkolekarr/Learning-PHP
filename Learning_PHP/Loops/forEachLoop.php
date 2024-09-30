<?php
echo "For Each Loops! <br>";

$arr = array(5, 8, 63, 4, 1, 52);

// for ($i=0; $i < count($arr); $i++) { 
//     echo $arr[$i];
//     echo "<br>";
// }


//Better Way to do this - ForEach Loops
foreach($arr as $value){
    echo "$value <br>";
}