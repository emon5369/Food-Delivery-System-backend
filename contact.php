<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

include('config.php');

$data = json_decode(file_get_contents('php://input'), true);

$name = isset($data['name']) ? $conn->real_escape_string($data['name']) : '';
$email = isset($data['email']) ? $conn->real_escape_string($data['email']) : '';
$message = isset($data['message']) ? $conn->real_escape_string($data['message']) : '';

if (empty($name) || empty($email) || empty($message)) {
    echo json_encode(array("status" => "error", "message" => "All fields are required"));
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(array("status" => "error", "message" => "Invalid email format"));
    exit;
}

$sql = "INSERT INTO tbl_messages (name, email, message) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $name, $email, $message);

if ($stmt->execute()) {
    $response = array("status" => "success", "message" => "Message sent successfully");
} else {
    $response = array("status" => "error", "message" => "Failed to send message");
}

$stmt->close();
$conn->close();

echo json_encode($response);
?>
