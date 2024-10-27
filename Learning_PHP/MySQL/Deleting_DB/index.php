<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'sample_db';

// Create a Connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not Successful
if (!$conn) {
    die("Sorry, We failed to connect: " . mysqli_connect_error());
} else {
    echo "Connection was Successful<br>";
}

// Deleting the Record
$sql = "DELETE FROM `trip` WHERE `name` = 'Sumeet' LIMIT 3";
$result = mysqli_query($conn, $sql);
echo "Number of affected rows:" . mysqli_affected_rows($conn) . '<br>';
if ($result) {
    echo 'Deleted Sucessfully!';
} else {
    $err = mysqli_error($conn);
    echo "Not Deleted Successfully due to $err";
}
?>