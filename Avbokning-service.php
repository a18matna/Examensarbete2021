<?php
include_once 'database.php';
//Create database connection
$database = new Database();
$conn = $database->getConnection();
$query = $conn->prepare("DELETE FROM bokningar WHERE idBokning = :idBokning");
            $query->bindParam(':idBokning',$_GET['avbokningsobj']);
            
          
            if($query->execute()) {
                echo json_encode('avbokning OK');
            }
            
?>
