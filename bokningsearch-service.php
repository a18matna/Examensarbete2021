<?php
include_once 'database.php';

//Create database connection
$database = new Database();
$conn = $database->getConnection();
$sql = "SELECT * FROM forms where '".$_POST['user_boksearch']."' in (idForms, typeForms, colorForms, sizeForms) ";
$result = $conn->query($sql);
$row = $result ->fetchall(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id='searchformdiv'>
        <table>
            <tr>
            <th> Sök resultat </th>
            </tr>
            <tr>
            <th> ID </th><th> TYP </th> <th> FÄRG </th> <th> STORLEK </th>
            </tr>
            <?php 
        
            foreach ($row as $data){
            ?>
            <tr>
                <td><?= $data['idForms']?></td>
                <td><?= $data['typeForms']?></td>
                <td><?= $data['colorForms']?></td>
                <td><?= $data['sizeForms']?></td>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>