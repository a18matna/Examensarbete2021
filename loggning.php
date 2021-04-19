<?php
include_once 'database.php';
$database = new Database();
$conn = $database->getConnection();
$query = $conn->prepare("INSERT INTO logtable(sessionID,url) VALUES(:sessionID,:url)");
        
        $query->bindParam(':sessionID',$_GET['SID']);        
        $query->bindParam(':url',$_GET['url']);
            
          
            if($query->execute()) {
                echo json_encode('log ok');
            }
            
?>
