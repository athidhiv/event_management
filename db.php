<?php
$host = "localhost";
$user = "root";
$password = "266271"; // Change this
$database = "event_management";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
