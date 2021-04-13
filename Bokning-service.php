<?php
include_once 'database.php';
//Create database connection
$database = new Database();
$conn = $database->getConnection();
$query = $conn->prepare("INSERT INTO bokningar(idForms) VALUES(:idForms)");
            $query->bindParam(':idForms',$_POST['bokningsobj']);
            
          
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
<h1></h1>
</body>
</html>