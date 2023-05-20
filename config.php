<?php

$host = 'localhost';  // MySQL host
$username = 'root';  // MySQL username
$password = 'root';  // MySQL password
$database = 'diksha';  // Name of the database

// Establish the database connection
$connection = mysqli_connect($host, $username, $password, $database);

// Check if the connection was successful
if (!$connection) {
    die('Database connection failed: ' . mysqli_connect_error());
}
