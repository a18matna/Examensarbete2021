<?php
include_once 'database.php';

//Create database connection
$database = new Database();
$conn = $database->getConnection();
$sql = "SELECT * FROM bokningar where '".$_GET['user_boksearch']."' in (idForms) ";
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
            <th> Boknings-ID </th><th> Form-ID </th>
            </tr>
            <?php 
        
            foreach ($row as $data){
            ?>
            <tr>
                <form action='Avbokning-service.php' method=post>
                <td><input type='text' name='avbokningsobj' value=<?=$data['idBokning']?> readonly ></td>
                <td><?= $data['idForms']?></td>
                <td><input type='submit' value='avboka'></td>
                </form>
            </tr>
            <?php
            }
            ?>
        </table>
    </div>
</body>
</html>