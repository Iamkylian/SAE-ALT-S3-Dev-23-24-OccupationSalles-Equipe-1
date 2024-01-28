<?php
    include_once('../connect.inc.php');

    if(isset($_POST['average']) && isset($_POST['room'])){
        $roomSelected = htmlentities($_POST['room']);
        $data = [];

        $query = "SELECT AVG(activity), AVG(co2), AVG(humidity), AVG(illumination), AVG(temperature), AVG(temperature),AVG(TVOC) FROM Donnes,Device WHERE Device.room = '$roomSelected' AND Donnes.idDevice = Device.id ORDER BY time ASC";
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

    } else if(isset($_POST['room'])){
        $data = [];
        $roomSelected = htmlentities($_POST['room']);

    } 

    echo json_encode($data);
?>