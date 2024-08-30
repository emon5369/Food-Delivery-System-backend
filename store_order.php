<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

include('config.php');

$headers = apache_request_headers();
$authHeader = isset($headers['Authorization']) ? $headers['Authorization'] : '';
$token = str_replace('Bearer ', '', $authHeader);

if (empty($token)) {
    echo json_encode(array("status" => "error", "message" => "Unauthorized"));
    exit;
}

$userId = $token;

$sql = "SELECT name, email, contact, address FROM users WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($customer_name, $customer_email, $customer_contact, $customer_address);
$stmt->fetch();

error_log("User ID: $userId");
error_log("Name: $customer_name");

if (!$customer_name) {
    echo json_encode(array("status" => "error", "message" => "User not found"));
    $stmt->close();
    $conn->close();
    exit;
}

$stmt->close(); 

$data = json_decode(file_get_contents("php://input"), true);
$cartItems = $data['cartItems'];
$totalAmount = $data['totalAmount'];
$orderDate = date('Y-m-d H:i:s');
$status = "Ordered"; 


foreach ($cartItems as $item) {
    $food = $item['title']; 
    $price = $item['price'];
    $qty = $item['quantity'];
    $total = $price * $qty;

    $sql2 = "INSERT INTO tbl_order SET 
                food = ?,
                price = ?,
                qty = ?,
                total = ?,
                order_date = ?,
                status = ?,
                customer_name = ?,
                customer_contact = ?,
                customer_email = ?,
                customer_address = ?";

    $stmt2 = $conn->prepare($sql2);
    if ($stmt2 === false) {
        error_log("Error preparing statement: " . $conn->error);
        echo json_encode(array("status" => "error", "message" => "Failed to prepare statement"));
        exit;
    }

    $stmt2->bind_param("sdiissssss", $food, $price, $qty, $total, $orderDate, $status, $customer_name, $customer_contact, $customer_email, $customer_address);
    if ($stmt2->execute() === false) {
        error_log("Error executing statement: " . $stmt2->error);
        echo json_encode(array("status" => "error", "message" => "Failed to execute statement"));
        exit;
    }
    $stmt2->close();
}

$response = array("status" => "success", "message" => "Order placed successfully");

$conn->close();

echo json_encode($response);
?>
