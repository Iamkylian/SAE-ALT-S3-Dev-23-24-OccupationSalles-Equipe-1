<?php
    include_once('../connect.inc.php');

    # Rentre dans ce if si on veux la moyenne 
    if(isset($_POST['average']) && $_POST['average'] == true && isset($_POST['room'])){
        $roomSelected = htmlentities($_POST['room']);
        $data = [];

        $query = "SELECT AVG(activity), AVG(co2), AVG(humidity), AVG(illumination), AVG(temperature), AVG(temperature),AVG(TVOC) FROM Donnes,Device WHERE Device.room = '$roomSelected' AND Donnes.idDevice = Device.id";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        $row = $result->fetch_assoc();
        
        $data['temperature'][] = $row['AVG(temperature)'];
        $data['humidity'][] = $row['AVG(humidity)'];
        $data['activity'][] = $row['AVG(activity)'];
        $data['co2'][] = $row['AVG(co2)'];
        $data['tvoc'][] = $row['AVG(TVOC)'];
        $data['illumination'][] = $row['AVG(illumination)'];


        $query = "SELECT time FROM Donnes,Device WHERE Device.room = '$roomSelected' AND Donnes.idDevice = Device.id ORDER BY time ASC";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        $row = $result->fetch_assoc();

        $data['time'][] = $row['time'];

        // Rentre dans ce if si on ne veux pas la moyenne
    } else if(isset($_POST['room'])){
        $data = [];
        $roomSelected = htmlentities($_POST['room']);

        $query = "SELECT activity, co2, humidity,illumination, temperature, temperature,TVOC,time FROM Donnes,Device WHERE Device.room = '$roomSelected' AND Donnes.idDevice = Device.id ORDER BY time ASC";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        $row = $result->fetch_assoc();
        
        
        $data['temperature'][] = $row['temperature'];
        $data['humidity'][] = $row['humidity'];
        $data['activity'][] = $row['activity'];
        $data['co2'][] = $row['co2'];
        $data['tvoc'][] = $row['TVOC'];
        $data['illumination'][] = $row['illumination'];
        $data['time'][] = $row['time'];
    } 

    echo json_encode($data);
?>