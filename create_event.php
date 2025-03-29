<?php
include 'db.php';
session_start();

if ($_SESSION['role'] != 'admin') {
    die("Access Denied!");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $location = $_POST['location'];
    $type = $_POST['type'];
    $seats = $_POST['seats'];
    $eventadmin = $_SESSION['email']; // Assuming the admin's email is stored in session

    $sql = "INSERT INTO events (title, description, date, time, location, type, available_seats, eventadmin) 
            VALUES ('$title', '$description', '$date', '$time', '$location', '$type', '$seats', '$eventadmin')";

    if ($conn->query($sql) === TRUE) {
        echo "Event created successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
