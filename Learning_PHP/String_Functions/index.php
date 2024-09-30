<?php
 $name = 'Bunny is a good cat!';
 echo $name;
 echo '<br>';
 echo "The length of " . "my string is " . strlen($name);
 echo '<br>';
 echo str_word_count($name);
 echo '<br>';
 echo strrev($name);
 echo '<br>';
 echo strpos($name, "Bunny");
 echo '<br>';
 echo str_replace("Bunny", "Momo", $name);
 echo '<br>';
 echo str_repeat($name, 5);
 echo '<br>';
 echo '<pre>';
 echo rtrim("    this is a good boy    ");
 echo '<br>';
 echo ltrim("    this is a good boy    ");
 echo '</pre>';
?>