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
    echo ('Connection is Successful<br>');
}

$sql = "SELECT * FROM `trip`";
$result = mysqli_query($conn, $sql);

//Finding the number of records
$num = mysqli_num_rows($result);
echo $num;
echo ' records found in the database...<br>';

//Display the rows returned by the SQL Query
if ($num > 0) {
    // $row = mysqli_fetch_assoc($result);
    // echo var_dump($row);
    // echo '<br>';
    // $row = mysqli_fetch_assoc($result);
    // echo var_dump($row);
    // echo '<br>';
    // $row = mysqli_fetch_assoc($result);
    // echo var_dump($row);
    // echo '<br>';
    // $row = mysqli_fetch_assoc($result);
    // echo var_dump($row);
    // echo '<br>';
    // $row = mysqli_fetch_assoc($result);
    // echo var_dump($row);
    // echo '<br>';
    // $row = mysqli_fetch_assoc($result);
    // echo var_dump($row);
    // echo '<br>';
    // $row = mysqli_fetch_assoc($result);
    // echo var_dump($row);
    // echo '<br>';

    //We can fetch in a better way using the while loop
    while ($row = mysqli_fetch_assoc($result)) {
        // echo var_dump($row);
        echo $row['sno'] . ". Hello " . $row['name'] . " Welcome to " . $row['dest'];
        echo '<br>';
    }
}
