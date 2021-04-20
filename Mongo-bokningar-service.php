<?php
header('Content-Type: application/json');
//echo phpinfo();
//echo extension_loaded("mongodb") ? "loaded\n" : "not loaded\n";

    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $qry = new MongoDB\Driver\Query([]);
     
    $rows = $mng->executeQuery("ExamensarbetemongoDB.bokningar", $qry);
     //print_r($rows);
    echo json_encode(iterator_to_array($rows));
    
   
?>