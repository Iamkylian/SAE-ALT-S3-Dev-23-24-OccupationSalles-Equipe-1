<?php
    header("Access-Control-Allow-Origin: *");

    // Autres en-têtes CORS facultatifs
    header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
    
    include_once('../connect.inc.php');

    $room = htmlentities($_POST['room']);

    $query = "SELECT Donnes.temperature, Donnes.humidity, Donnes.activity, Donnes.co2, Donnes.illumination,Donnes.time FROM Device,Donnes WHERE Device.room = '$room' AND Donnes.idDevice = Device.id ORDER BY time DESC;";

    $result = $conn->query($query);

    if($result->num_rows == 0){
        echo "1"; 
    } else {
        $row = $result->fetch_assoc();
        
        echo $row['co2'];
    }
?>