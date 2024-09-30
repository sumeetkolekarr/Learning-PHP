<?php 
echo "Welcome to PHP Tutorial on Functions! <br>";

function processMarks($marksArr){
    $sum = 0;
    foreach($marksArr as $value){
        $sum += $value;
    }
    return $sum;
}

function avgMarks($marksArr){
    $sum = 0;
    $i = 0;
    foreach($marksArr as $value){
        $sum += $value;
        $i++;
    }
    return $sum/$i;
}

$bunny =  [45,25,44,36];
$sumMarks = processMarks($bunny);
$agMarks = avgMarks($bunny);
echo "Total marks scored by Harry out of 200 is $sumMarks & Average Marks is $agMarks";

?>