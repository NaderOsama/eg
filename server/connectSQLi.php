<?php

$config = parse_ini_file('connect.ini');

$servername = $config['host'];
$username = $config['username'];
$password = $config['password'];
$dbname = $config['database'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
