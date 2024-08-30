<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

include('config.php');

$headers = apache_request_headers();
$authHeader = isset($headers['Authorization']) ? $headers['Authorization'] : '';
$token = str_replace('Bearer ', '', $authHeader);

if (empty($token)) {
    echo json_encode(array("status" => "error", "message" => "Unauthorized"));
    exit;
}

$userId = $token; //assuming the token is the user ID

$sql = "SELECT name, contact, email, address FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($name, $contact, $email, $address);
$stmt->fetch();

$response = array();
if ($stmt->num_rows > 0) {
    $response["status"] = "success";
    $response["user"] = array(
        "name" => $name,
        "contact" => $contact,
        "email" => $email,
        "address" => $address
    );
} else {
    $response["status"] = "error";
    $response["message"] = "User not found";
}

$stmt->close();
$conn->close();

echo json_encode($response);
?>
