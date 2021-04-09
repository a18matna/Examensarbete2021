<?php
include_once 'database.php';

//Create database connection
$database = new Database();
$conn = $database->getConnection();
?>
<!DOCTYPE html>
<html lang="sv">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />	
	<link type="text/css" href="" rel="stylesheet">
</head>
<body>
    <h1> Hämta former</h1>
	<form action='form-service.php' method='get'>
        <input type='submit' value='hämta alla former'>
    </form>
    <h1> Hämta Bokningar</h1>
    <form action='bokadeForms.php' method='get'> 
        <input type='submit' value='hämta alla bokningar'>
    </form>
    <h1> Sök efter Form</h1>
    <form action='formsearch-service.php' method='get'>
        <input type='search' Placeholder='sök efter form' value='' name='user_formsearch'>
        <input type='submit' value='sök'>
    </form>
    <h1> Sök efter Bokning</h1>
    <form action='bokningsearch-service.php' method='get'>
        <input type='search' Placeholder='sök efter bokning' value='' name='user_boksearch'>
        <input type='submit' value='sök'>
    </form>
</body>
</html>
