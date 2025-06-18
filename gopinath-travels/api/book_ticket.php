<?php
header("Content-Type: application/json");
include 'db.php';

$data = json_decode(file_get_contents("php://input"), true);

$name = $data['name'];
$seat = $data['seat'];
$date = $data['date'];
$from = $data['from'];
$to = $data['to'];

$stmt = $conn->prepare("INSERT INTO tickets (passenger_name, seat_number, travel_date, origin, destination) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sisss", $name, $seat, $date, $from, $to);

if ($stmt->execute()) {
    echo json_encode(["message" => "Ticket booked successfully"]);
} else {
    echo json_encode(["error" => "Booking failed"]);
}
?>