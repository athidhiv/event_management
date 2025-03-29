<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    die("Please log in first.");
}

$user_id = $_SESSION['user_id'];
$event_id = $_POST['event_id'];

// Check available seats
$seat_check = "SELECT available_seats FROM events WHERE id='$event_id'";
$result = $conn->query($seat_check);
$row = $result->fetch_assoc();

if ($row['available_seats'] > 0) {
    // Reduce seat count
    $update_seats = "UPDATE events SET available_seats = available_seats - 1 WHERE id='$event_id'";
    $conn->query($update_seats);

    // Add participation record
    $sql = "INSERT INTO participation (user_id, event_id) VALUES ('$user_id', '$event_id')";
    if ($conn->query($sql) === TRUE) {
        echo "Successfully joined the event!";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    echo "Event is full!";
}
?>
