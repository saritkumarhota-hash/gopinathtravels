<?php
header("Content-Type: application/json");
include 'db.php';

$sql = "SELECT * FROM tickets ORDER BY travel_date";
$result = $conn->query($sql);

$tickets = [];
while ($row = $result->fetch_assoc()) {
    $tickets[] = $row;
}

echo json_encode($tickets);
?>