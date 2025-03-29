<?php
include 'db.php';

$type = $_GET['type'] ?? '';
$location = $_GET['location'] ?? '';
$date = $_GET['date'] ?? '';

$sql = "SELECT * FROM events WHERE 1";

if ($type) $sql .= " AND type='$type'";
if ($location) $sql .= " AND location='$location'";
if ($date) $sql .= " AND date='$date'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Title: " . $row["title"] . " | Location: " . $row["location"] . " | Date: " . $row["date"] . "<br>";
    }
} else {
    echo "No events found!";
}
?>
