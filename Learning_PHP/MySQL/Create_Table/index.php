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

// Create a Table in the DB
$sql = "CREATE TABLE `trip` (`sno` INT(6) NOT NULL AUTO_INCREMENT, `name` VARCHAR(12) NOT NULL, `dest` VARCHAR(6) NOT NULL, PRIMARY KEY(`sno`))";
$result = mysqli_query($conn, $sql);

// Check for the Table Creation Success
if($result){
    echo "The Table was created Successfully!<br>";
} else {
    echo "The Table was not created Successfully!<br>" . mysqli_error($conn);
}

?>