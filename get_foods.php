<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');
include('config.php');

$sql = "SELECT * FROM tbl_food WHERE active='Yes'";
$res = $conn->query($sql);
$foods = [];

if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $foods[] = $row;
    }
}

echo json_encode($foods);

$conn->close();
?>
