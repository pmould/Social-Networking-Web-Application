<?php
require_once 'login.php';
$link = mysqli_connect($db_hostname,$db_username,$db_password,$db_database) or die("Error " . mysqli_connect_error());
include 'sessions.php';
?>