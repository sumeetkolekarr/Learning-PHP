<?php
// session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
  $loggedIn = true;
} else {
  $loggedIn = false;
}

echo '<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/Learning_PHP/Projects/Login%20System/login.php">iSecure</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/Learning_PHP/Projects/Login%20System/welcome.php">Home</a>
        </li> ';
if (!$loggedIn) {
  echo '<li class="nav-item">
          <a class="nav-link" href="/Learning_PHP/Projects/Login%20System/login.php">Login</a>
          </li>
          <li class="nav-item">
          <a class="nav-link" href="/Learning_PHP/Projects/Login%20System/signup.php">Signup</a>
          </li>';
}
else {
  echo '<li class="nav-item">
            <a class="nav-link" href="/Learning_PHP/Projects/Login%20System/logout.php">Logout</a>
            </li>
            </ul>';
}
echo '
    </div>
  </div>
</nav>';
