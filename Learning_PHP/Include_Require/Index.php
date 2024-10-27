<?php
// include 'dbconnect.php'; // Gives Warning
require 'dbconnect.php'; // Throws Error

$sql = "SELECT * FROM `trip`";
$result = mysqli_query($conn, $sql);

$num = mysqli_num_rows($result);
echo '<br>' . $num;
echo ' records found in the DB<br>';
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['sno'] . '. Hello ' . $row['name'] . ' Welcome to ' . $row['dest'] . '<br>';
}
