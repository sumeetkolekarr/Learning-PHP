<?php

echo "Welcome to the stage where we are ready to get connected to a database!<br>";

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

// Variables to Insert into the table
$name = 'Sumeet';
$destination = 'USA';

// Inserting Data into a Table in the DB
$sql = "INSERT INTO `trip` (`name`, `dest`) VALUES ('$name', '$destination')";
$result = mysqli_query($conn, $sql);

// Check for the Table Data Insertion Success
if($result){
    echo "The Data was inserted Successfully!<br>";
} else {
    echo "The Data was not inserted Successfully!<br>" . mysqli_error($conn);
}

?>