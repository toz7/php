<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "tev_db";

// Creating connection
$mysqli = new mysqli($servername, $username, $password, $database);

// Checking connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}


?>
