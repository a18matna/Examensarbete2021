<!DOCTYPE html>
<html lang="sv">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no" />	
	<link type="text/css" href="" rel="stylesheet">
</head>
<body>
<?php
//---  Kollar om bokningsobj är satt och Skickar http request till bokning-service  ---
//print_r($_POST);
if(isset($_POST['bokningsobj'])){
    $url="http://localhost/Bokning-service.php?bokningsobj=".$_POST['bokningsobj'];
    $jsontext = file_get_contents($url);
  //  print_r($_POST);
   // echo $url.' '.$jsontext;
}

//--- Hämtar Formerna från formservice ---
echo '<div style= "display:inline">';
$url="http://localhost/form-service.php";
$jsontext = file_get_contents($url);
$rows = json_decode($jsontext);

//--- Ekar ut resultaten från formservice och itererar tablerows ---
echo '<table>';
foreach($rows as $row){
    echo "<tr>
        <form action='applikationtest.php' method=post>
            <td><input type='text' name='bokningsobj' value='$row->idForms' readonly ></td>
            <td>$row->typeForms</td>
            <td>$row->sizeForms</td>
            <td>$row->colorForms</td>
            <td><input type='submit' value='boka'></td>
        </form>
    </tr>";
        
}
echo '</table>';
echo '</div>';
// Tillgängliga former tabell slut

echo '<div style= "display:inline-block">';
echo '<form action="applikationtest.php" method=post>
    <input type="search" name="user_formsearch" value="" placeholder="sök efter former">
    <input type="submit" value="sök">
    </form>';
//---  Kollar om user_formsearch är satt och Skickar http request till formsearch-service  ---
if (isset($_POST['user_formsearch'])){
    $url="http://localhost/formsearch-service.php?user_formsearch=".$_POST['user_formsearch'];
    $jsontext = file_get_contents($url);
    $rows = json_decode($jsontext);

//--- Ekar ut resultaten från formsearch-service och itererar tablerows ---    
    echo '<table>';
    foreach($rows as $row){
        echo "<tr>
                <form action='applikationtest.php' method=post>
                    <td><input type='text' name='bokningsobj' value='$row->idForms' readonly ></td>
                    <td>$row->typeForms</td>
                    <td>$row->sizeForms</td>
                    <td>$row->colorForms</td>
                    <td><input type='submit' value='boka'></td>
                </form>
            </tr>";
    }
    echo '</table>';
    
}
echo '</div>';
//--- form-sökresultat tabell slut
echo '<div style= "display:inline-block">';
echo '<form action="applikationtest.php" method=post>
    <input type="search" name="user_boksearch" value="" placeholder="sök efter former">
    <input type="submit" value="sök">
    </form>';
//---  Kollar om user_boksearch är satt och Skickar http request till formsearch-service  ---
if (isset($_POST['user_boksearch'])){
    $url="http://localhost/bokningsearch-service.php?user_boksearch=".$_POST['user_boksearch'];
    $jsontext = file_get_contents($url);
    $rows = json_decode($jsontext);

//--- Ekar ut resultaten från bokningsearch-service och itererar tablerows ---    
    echo '<table>';
    foreach($rows as $row){
        echo "<tr>
                <form action='applikationtest.php' method=post>
                    <td><input type='text' name='avbokningsobj' value='$row->idBokning' readonly ></td>
                    <td>$row->idForms</td>
                    <td><input type='submit' value='avboka'></td>
                </form>
            </tr>";
    }
    echo '</table>';
    
}
echo '</div>';
// bokning-sökresultat tabell slut

//---  Kollar om avbokningsobj är satt och Skickar http request till AvBokning-service  ---
if(isset($_POST['avbokningsobj'])){
    $url="http://localhost/AvBokning-service.php?avbokningsobj=".$_POST['avbokningsobj'];
    $jsontext = file_get_contents($url);
    //print_r($_POST);
    //echo $url.' '.$jsontext;
}
//--- Hämtar Bokningarna från bokadeForms ---
$url="http://localhost/bokadeForms.php";
$jsontext = file_get_contents($url);
$rows = json_decode($jsontext);
echo '<div style="display:inline-block;margin-left:1000px;">';
echo '<table>';
//--- Ekar ut resultaten från bokadeForms och itererar tablerows ---   
foreach($rows as $row){
    echo "<tr>
        <form action='applikationtest.php' method=post>
            <td><input type='text' name='avbokningsobj' value='$row->idBokning' readonly ></td>
            <td>$row->idForms</td>
            <td><input type='submit' value='avboka'></td>
        </form>
        </tr>";
        
}
echo '</table>';
echo '</div>';
// bokadeForms tabell slut
?>
</body>
</html>

  

