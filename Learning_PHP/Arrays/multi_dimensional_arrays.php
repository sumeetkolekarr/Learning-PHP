<?php

echo "Welcome to Multi Dimensional Arrays!<br>";

// Creating a 2 Dimensional Array
$multiDim = array(
    array(2, 5, 7, 8),
    array(1, 2, 3, 1),
    array(4, 5, 0, 1)
);

// echo var_dump($multiDim)
// echo $multiDim[0][1];

// for ($i=0; $i < count($multiDim); $i++) { 
//     echo var_dump($multiDim[$i]);
//     echo "<br>";
// }

for ($i=0; $i < count($multiDim); $i++) { 
    for ($j=0; $j < count($multiDim[$i]); $j++) { 
        echo ($multiDim[$i][$j]);
        echo " ";
    }
    echo "<br>";
}

?>
