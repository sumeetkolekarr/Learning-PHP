<?php
$fptr = fopen('myFile.txt', 'r');
// echo var_dump($fptr);
if (!$fptr) {
    die('No file is present...');
}

$content = fread($fptr, filesize(('myfile.txt')));
echo $content;
fclose($fptr);
?>
