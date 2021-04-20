<?php
header('Content-Type: application/json');
//echo phpinfo();
//echo extension_loaded("mongodb") ? "loaded\n" : "not loaded\n";
    $q = $_GET['user_boksearch'];
    $filter =[
        '$or'=> [
            ['idForms'=>$q],
            ['idBokning'=>$q]
        ]
    ]; 
    $mng = new MongoDB\Driver\Manager("mongodb://localhost:27017");
    $qry = new MongoDB\Driver\Query($filter);
     
    $rows = $mng->executeQuery("ExamensarbetemongoDB.bokningar", $qry);
     
    echo json_encode(iterator_to_array($rows));
    
   
?>