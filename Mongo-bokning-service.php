<?php
header('Content-Type: application/json');
//echo phpinfo();
//echo extension_loaded("mongodb") ? "loaded\n" : "not loaded\n";
    $q=$_GET['bokningsobj'];
    $bulk = new MongoDB\Driver\BulkWrite;
    $doc = [
        'idForms'=>$q,
    ];
    $bulk ->insert($doc);
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $result = $mng->executeBulkWrite("ExamensarbetemongoDB.bokningar", $bulk); 
?>