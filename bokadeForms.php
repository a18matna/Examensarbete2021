<?php

include_once 'database.php';

//Create database connection
$database = new Database();
$conn = $database->getConnection();
$sql = "SELECT * FROM bokningar";
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
<?php 
//for ($i=0; $i < 10; $i++){
?>
    <div id='formdiv'>
        <table>
            <th> Aktuella bokningar </th>
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