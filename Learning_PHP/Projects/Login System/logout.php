<?php
session_start();


session_unset();
session_destroy();

header('location: /Learning_PHP/Projects/Login%20System/login.php');
exit;
