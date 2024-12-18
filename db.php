<?php
$host = "localhost";
$username = "todo_user";  // default username for MySQL on LAMP
$password = "ankush";      // default password for MySQL on LAMP
$database = "todo_app";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

