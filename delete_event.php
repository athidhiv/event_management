<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    die("Access Denied!");
}

$admin_id = $_SESSION['user_id']; // Logged-in admin
$event_id = $_POST['event_id']; // Event to delete

// Check if the event belongs to the admin
$check_sql = "SELECT id FROM events WHERE id = '$event_id' AND eventadmin = '$admin_id'";
$check_result = $conn->query($check_sql);

if ($check_result->num_rows > 0) {
    // Delete the event
    $delete_sql = "DELETE FROM events WHERE id = '$event_id'";
    if ($conn->query($delete_sql) === TRUE) {
        echo "Event deleted successfully!";
    } else {
        echo "Error deleting event: " . $conn->error;
    }
} else {
    echo "Event not found or you are not authorized to delete it!";
}
?>
