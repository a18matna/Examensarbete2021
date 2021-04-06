<?php

include_once 'database.php';

//Create database connection
$database = new Database();
$conn = $database->getConnection();
$sql = "SELECT * FROM forms";
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
            <th> olika former </th>
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