<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
header('Access-Control-Allow-Methods: *');
include('config.php');

$sql = "SELECT * FROM tbl_category WHERE active='Yes'";
$res = $conn->query($sql);
$foods = [];

if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $categories[] = $row;
    }
}

echo json_encode($categories);

$conn->close();
?>
