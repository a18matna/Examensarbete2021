<?php
include_once 'database.php';
//Create database connection
$database = new Database();
$conn = $database->getConnection();
$query = $conn->prepare("DELETE FROM bokningar WHERE idBokning = :idBokning");
            $query->bindParam(':idBokning',$_POST['avbokningsobj']);
            
          
            if(!$query->execute()) {
           
            }
            
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action='bokadeForms.php'><input type='submit' value='bokningar'></form>
</body>
</html>