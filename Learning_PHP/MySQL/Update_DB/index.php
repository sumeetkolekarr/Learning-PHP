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

$sql = "SELECT * FROM `trip`";
$result = mysqli_query($conn, $sql);

//Usage of 'WHERE' clause to fetch data from the database 
$num = mysqli_num_rows($result);
$no = 1;
echo $num . ' records found in the database...<br>';
if ($num > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo $no . ". Hello " . $row['name'] . " Welcome to " . $row['dest'];
        echo '<br>';
        $no = $no + 1;
    }
}

// Usage of WHERE Clause to update Data
$sql = "UPDATE `trip` SET `name` = 'Lucky' WHERE `dest` = 'UAE'";
$result = mysqli_query($conn, $sql);
// echo $result; //Returns number
// echo var_dump($result); //Returns Bool
echo "Number of affected rows:" . mysqli_affected_rows($conn) . '<br>';
if ($result) {
    echo 'We updated the record Successfully';
} else {
    echo 'We could not update the record Successfully';
}
