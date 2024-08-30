<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

include('config.php');

$data = json_decode(file_get_contents("php://input"), true);
$email = $data['email'];
$password = $data['password'];

$sql = "SELECT id, name, email, password FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($id, $name, $email, $hashed_password);
$stmt->fetch();

$response = array();
if ($stmt->num_rows > 0) {
    if (password_verify($password, $hashed_password)) {
        $response["status"] = "success";
        $response["user"] = array(
            "id" => $id,
            "name" => $name,
            "email" => $email
        );
    } else {
        $response["status"] = "error";
        $response["message"] = "Invalid password";
    }
} else {
    $response["status"] = "error";
    $response["message"] = "User not found";
}

$stmt->close();
$conn->close();

echo json_encode($response);
?>
