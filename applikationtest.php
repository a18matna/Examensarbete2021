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
$mongo = 1;
session_start();
$SID= session_id();
print_r (session_ID());
if(isset($_POST['sessionstart'])){


}
if(isset($_POST['sessionstopp'])){
    //--- Skapar nytt session ID och tar bort eventuellt lagrad session data ---
    session_regenerate_id();
    session_destroy();
    print_r (session_ID());
}
echo '<form action="applikationtest.php" method=post>';
echo '<input type="submit" name="visaFormer" value="Hämta alla former">';
echo '<input type="submit" name="visaBokningar" value="Hämta alla bokningar">';
echo '<input type="submit" name="sessionstart" value="starta">';
echo '<input type="submit" name="sessionstopp" value="stoppa">';
echo '</form>';
echo '<form action="applikationtest.php" method=post>';
echo '<input type="search" name="user_formsearch" value="" placeholder="sök efter former">';
echo '<input type="submit" value="sök">';
echo '</form>';
echo '<form action="applikationtest.php" method=post>';
echo '<input type="search" name="user_boksearch" value="" placeholder="sök efter bokningar">';
echo '<input type="submit" value="sök">';
echo '</form>';

//---  Kollar om bokningsobj är satt och Skickar http request till bokning-service  ---
if(isset($_POST['bokningsobj'])){
    if($mongo=0){
        $url="http://localhost/Bokning-service.php?bokningsobj=".$_POST['bokningsobj'];
        $jsontext = file_get_contents($url);

        //--- Loggar Bokningen med sessionID och handling ---
        $url2="http://localhost/loggning.php?url=".$url. "&SID=".$SID;
        $jsontext2 =file_get_contents($url2);
    }
    elseif($mongo=1){
        $url="http://localhost/Mongo-bokning-service.php?bokningsobj=".$_POST['bokningsobj'];
        $jsontext = file_get_contents($url);
    }    
}

//--- Hämtar Formerna från formservice ---
if (isset($_POST['visaFormer'])){

    if($mongo==0){
        $url="http://localhost/form-service.php";
        $jsontext = file_get_contents($url);
        $rows = json_decode($jsontext);

        //--- Loggar Bokningen med sessionID och handling ---
        $url2="http://localhost/loggning.php?url=".$url. "&SID=".$SID;
        $jsontext2 =file_get_contents($url2);
    }
    elseif($mongo==1){
        $url="http://localhost/Mongo-form-service.php";
        $jsontext = file_get_contents($url);
        $rows = json_decode($jsontext);
    }
    //--- Ekar ut resultaten från formservice och itererar tablerows ---
    echo '<div style= "display:inline">';
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
}
// Tillgängliga former tabell slut


//---  Kollar om user_formsearch är satt och Skickar http request till formsearch-service  ---
if (isset($_POST['user_formsearch'])){

    if($mongo=0){
        $url="http://localhost/formsearch-service.php?user_formsearch=".$_POST['user_formsearch'];
        $jsontext = file_get_contents($url);
        $rows = json_decode($jsontext);

        //--- Loggar Bokningen med sessionID och handling ---
        $url2="http://localhost/loggning.php?url=".$url. "&SID=".$SID;
        $jsontext2 =file_get_contents($url2);
    }
    elseif($mongo=1){
        $url="http://localhost/Mongo-formsearch-service.php?user_formsearch=".$_POST['user_formsearch'];
        $jsontext = file_get_contents($url);
        $rows = json_decode($jsontext);

    }
    //--- Ekar ut resultaten från formsearch-service och itererar tablerows ---  
    echo '<div style= "display:inline-block">';
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
}
//--- form-sökresultat tabell slut

//---  Kollar om user_boksearch är satt och Skickar http request till formsearch-service  ---
if (isset($_POST['user_boksearch'])){
    if($mongo=0){
        $url="http://localhost/bokningsearch-service.php?user_boksearch=".$_POST['user_boksearch'];
        $jsontext = file_get_contents($url);
        $rows = json_decode($jsontext);
        //--- Loggar Bokningen med sessionID och handling ---
        $url2="http://localhost/loggning.php?url=".$url. "&SID=".$SID;
        $jsontext2 =file_get_contents($url2);
    }
    elseif($mongo=1){
        $url="http://localhost/Mongo-bokningsearch-service.php?user_boksearch=".$_POST['user_boksearch'];
        $jsontext = file_get_contents($url);
        $rows = json_decode($jsontext);

    }
    //--- Ekar ut resultaten från bokningsearch-service och itererar tablerows ---  
    echo '<div style= "display:inline-block">';
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
    echo '</div>';
}
// bokning-sökresultat tabell slut

//---  Kollar om avbokningsobj är satt och Skickar http request till AvBokning-service  ---
if(isset($_POST['avbokningsobj'])){
    $url="http://localhost/AvBokning-service.php?avbokningsobj=".$_POST['avbokningsobj'];
    $jsontext = file_get_contents($url);

    //--- Loggar Bokningen med sessionID och handling ---
    $url2="http://localhost/loggning.php?url=".$url. "&SID=".$SID;
    $jsontext2 =file_get_contents($url2);

}
//--- Hämtar Bokningarna från bokadeForms ---
if(isset($_POST['visaBokningar'])){
    if($mongo=0){
        $url="http://localhost/bokadeForms.php";
        $jsontext = file_get_contents($url);
        $rows = json_decode($jsontext);

        //--- Loggar Bokningen med sessionID och handling ---
        $url2="http://localhost/loggning.php?url=".$url. "&SID=".$SID;
        $jsontext2 =file_get_contents($url2);
    }
    elseif($mongo=1){
        $url="http://localhost/Mongo-bokningar-service.php";
        $jsontext = file_get_contents($url);
        $rows = json_decode($jsontext);
    }
    //--- Ekar ut resultaten från bokadeForms och itererar tablerows ---   
    echo '<div style="display:inline-block;">';
    echo '<table>';
    foreach($rows as $row){
        echo '<tr>';
        echo '<form action="applikationtest.php" method=post>';
        if (isset($row->idBokning) && $mongo=0){   
            echo '<td><input type="text" name="avbokningsobj" value="'.$row->idBokning.'" readonly ></td>';
        }elseif (isset($row->_id) && $mongo=1){
            $array = json_decode(json_encode($row->_id),true);
            echo '<td><input type="text" name="avbokningsobj" value="'.$array['$oid'].'" readonly ></td>';
        }
        echo '<td>'.$row->idForms.'</td>';
        echo '<td><input type="submit" value="avboka"></td>';
        echo '</form>';
        echo '</tr>';
            
    }
    echo '</table>';
    echo '</div>';
}
// bokadeForms tabell slut
?>
</body>
</html>

  

