<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

include('config.php');

$data = json_decode(file_get_contents("php://input"), true);
$name = $data['name'];
$contact = $data['contact'];
$email = $data['email'];
$address = $data['address'];
$password = password_hash($data['password'], PASSWORD_BCRYPT);

$sql = "INSERT INTO users (name, contact, email, address, password) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $name, $contact, $email, $address, $password);

$response = array();
if ($stmt->execute()) {
    $response["status"] = "success";
} else {
    $response["status"] = "error";
    $response["message"] = $stmt->error;
}

$stmt->close();
$conn->close();

echo json_encode($response);
?>
