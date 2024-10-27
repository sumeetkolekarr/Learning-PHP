<?php 
// Connecting to the Database
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
    echo "Connection was Successful";
}
?>