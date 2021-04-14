<?php
header('Content-Type: application/json');
include_once 'database.php';

//Create database connection
$database = new Database();
$conn = $database->getConnection();
$sql = "SELECT * FROM forms";
$result = $conn->query($sql);
$row = $result ->fetchall(PDO::FETCH_ASSOC);

echo json_encode($row);
?>