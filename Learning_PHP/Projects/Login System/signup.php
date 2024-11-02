<?php
$showAlert = false;
$showErrorAcc = false;
$showErrorPass = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'partials/_dbconnect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cPassword = $_POST['cPassword'];
    // $exists = false;
    $existSql = "SELECT * FROM `user` WHERE username = '$username'";
    $result = mysqli_query($conn, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows > 0) {
        $exists = true; 
        $showErrorAcc = true;
    } else {
        $exists = false;
        if (($password == $cPassword)) {
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO `user` (`username`, `password`) VALUES ('$username', '$hash')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                $showAlert = true;
            }
        } else {
            $showErrorPass = true;
        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SignUp - iSecure</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php require 'partials/_nav.php' ?>
    <?php
    if ($showAlert) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
        <strong>Success!</strong> Your Account is now created and You can Login.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    } ?>
    <?php
    if ($showErrorAcc) {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Error!</strong> Username Already exists.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    } ?>
    <?php
    if ($showErrorPass) {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
        <strong>Error!</strong> Passwords Do not Match.
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    } ?>
    <div class="container my-3">
        <h1 class="text-center">Signup to our Website</h1>
        <form action="/Learning_PHP/Projects/Login%20System/signup.php" method="post" class="my-4">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" maxlength="11" class="form-control" id="username" aria-describedby="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" maxlength="21" class="form-control" id="password">
            </div>
            <div class="mb-3">
                <label for="cPassword" class="form-label">Confirm Password</label>
                <input type="password" name="cPassword" maxlength="21" class="form-control" id="cPassword">
                <div id="emailHelp" class="form-text">Enter the same Password...</div>
            </div>
            <!-- <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div> -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>