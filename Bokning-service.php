<?php
include_once 'database.php';
//Create database connection
$database = new Database();
$conn = $database->getConnection();
$query = $conn->prepare("INSERT INTO bokningar(idForms) VALUES(:idForms)");
            $query->bindParam(':idForms',$_GET['bokningsobj']);
            
          
            if($query->execute()) {
                echo json_encode('bokning OK');
            }
            
?>
