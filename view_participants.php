<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    die("Access Denied!");
}

$admin_id = $_SESSION['user_id']; // Assuming admin is stored by user_id
$email=$_SESSION['email']; // Assuming email is stored in session
$sql = "SELECT id, title, description, date, time, location, type, available_seats 
        FROM events WHERE eventadmin = '$email'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Event ID: " . $row["id"] . "<br>";
        echo "Title: " . $row["title"] . "<br>";
        echo "Description: " . $row["description"] . "<br>";
        echo "Date: " . $row["date"] . "<br>";
        echo "Time: " . $row["time"] . "<br>";
        echo "Location: " . $row["location"] . "<br>";
        echo "Type: " . $row["type"] . "<br>";
        echo "Seats Available: " . $row["available_seats"] . "<br>";
        echo "<hr>";
    }
} else {
    echo "No events found.";
}
?>
