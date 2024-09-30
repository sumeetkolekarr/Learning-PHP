<?php
$age = 129;

if ($age > 25 && $age < 65) {
    echo "You can Drive";
} elseif ($age > 0 && $age < 25) {
    echo "Go and play GTA5";
} elseif ($age > 65 && $age < 120) {
    echo "You are not eligible to drive";
} else {
    echo "Enter the correct age!";
}

?>