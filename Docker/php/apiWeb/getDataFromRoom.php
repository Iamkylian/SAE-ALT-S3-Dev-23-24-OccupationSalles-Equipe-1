<?php
    include_once('../connect.inc.php');

    $room = htmlentities($_POST['room']);

    $query = "SELECT Donnes.temperature, Donnes.humidity, Donnes.activity, Donnes.co2, Donnes.illumination FROM Device,Donnes WHERE Device.room = '$room' AND Donnes.idDevice = Device.id ORDER BY time DESC;";

    $result = $conn->query($query);

    if($result->num_rows == 0){
        echo "1"; 
    } else {
        $row = $result->fetch_assoc();

        echo $row['co2'];
    }
?>