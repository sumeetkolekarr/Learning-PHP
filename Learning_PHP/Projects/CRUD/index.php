<?php
// Connecting to the Database
$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'crud';
$insert = false;
$update = false;
$delete = false;

//Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn) {
    die('Sorry, we failed to connect: ' . mysqli_connect_error());
} else {
    // echo 'Connection was Successful!<br>';
}

if (isset($_GET['delete'])) {
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `notes` WHERE `sno` = $sno";
    $result = mysqli_query($conn, $sql);
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['snoEdit'])) {
        $sno = $_POST['snoEdit'];
        $title = $_POST['titleEdit'];
        $description = $_POST['descriptionEdit'];

        $sql = "UPDATE `notes` SET `title` = '$title', `description` = '$description' WHERE `notes`.`sno` = $sno";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            $update = true;
        } else {
            $update = false;
        }
    } else {

        $title = $_POST['title'];
        $description = $_POST['description'];

        $sql = "INSERT INTO `notes` (`title`, `description`) VALUES ('$title', '$description')";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            $insert = true;
        } else {
            echo 'Problem Inserting DB --> ' . mysqli_error($conn);
        }
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/2.1.8/css/dataTables.dataTables.min.css">
    <title>iNotes - Notes taking made easy</title>
</head>

<body>
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit This Note...</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="/Learning_PHP/Projects/CRUD/index.php" method="POST">
                    <div class="modal-body">
                        <input type="hidden" name="snoEdit" id="snoEdit">
                        <div class="mb-3">
                            <label for="title" class="form-label">Note Title</label>
                            <input type="text" class="form-control" name="titleEdit" id="titleEdit" aria-describedby="emailHelp">
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="descriptionEdit" id="descriptionEdit"></textarea>
                            <label for="description">Note Description</label>
                        </div>
                        <!-- <button type="submit" class="btn btn-primary">Update Note</button> -->
                        <div class="modal-footer d-block mr-auto">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">iNotes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>
    <?php
    if ($insert) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Holy guacamole!</strong> Your Note has been Inserted Successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
    }
    if ($update) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Holy guacamole!</strong> Your Note has been Updated Successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
    }
    if ($delete) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
  <strong>Holy guacamole!</strong> Your Note has been Deleted Successfully.
  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
</div>";
    }
    ?>
    <div class="container my-4">
        <h2>Add a note</h2>
        <form action="/Learning_PHP/Projects/CRUD/index.php" method="POST">
            <div class="mb-3">
                <label for="title" class="form-label">Note Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="emailHelp">
            </div>
            <div class="form-floating mb-3">
                <textarea class="form-control" name="description" id="description"></textarea>
                <label for="description">Note Description</label>
            </div>
            <button type="submit" class="btn btn-primary">Add Note</button>
        </form>
    </div>
    <div class="container">

        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM `notes`";
                $result = mysqli_query($conn, $sql);
                $sno = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $sno++;
                    echo "<tr>
                    <th scope='row'>" . $sno . "</th>
                    <td>" . $row['title'] . "</td>
                    <td>" . $row['description'] . "</td>
                    <td><button class='edit btn btn-sm btn-primary' data-bs-toggle='modal' data-bs-target='#editModal' id=" . $row['sno'] . ">Edit</button> <button class='delete btn btn-sm btn-primary' id=d" . $row['sno'] . ">Delete</button></td>
                </tr>";
                }
                ?>


            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
    <script>
        edits = document.getElementsByClassName('edit')
        Array.from(edits).forEach((element) => {
            element.addEventListener('click', (e) => {
                console.log('edit')
                tr = e.target.parentNode.parentNode
                title = tr.getElementsByTagName('td')[0].innerText
                desc = tr.getElementsByTagName('td')[1].innerText
                descriptionEdit.value = desc
                titleEdit.value = title;
                snoEdit.value = e.target.id;
                console.log(e.target.id)
            })
        })
        deletes = document.getElementsByClassName('delete')
        Array.from(deletes).forEach((element) => {
            element.addEventListener('click', (e) => {
                console.log('edit')
                sno = e.target.id.substr(1, )
                if (confirm('Are you sure you want to delete this note?')) {
                    console.log('yes')
                    window.location = `/Learning_PHP/Projects/CRUD/index.php?delete=${sno}`
                    //TODO: Create a form and use post request to submit the form
                } else {
                    console.log('no')
                }
            })
        })
    </script>
</body>

</html>