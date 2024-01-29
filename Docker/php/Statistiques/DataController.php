<?php
    include_once('../connect.inc.php');

    if(isset($_POST['room']) && !is_null($_POST['room']))
    {
        # Récupération de la pièce choisie
        $room = htmlentities($_POST['room']);

        # Récupération des données de la pièce
        $query = "SELECT * FROM Donnes,Device WHERE Device.room = '$room' AND Donnes.idDevice = Device.id ORDER BY time ASC";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();

        $data = [];
        while($row = $result->fetch_assoc())
        {
            # Récupération des données
            $data['temperature'][] = $row['temperature'];
            $data['humidity'][] = $row['humidity'];
            $data['activity'][] = $row['activity'];
            $data['co2'][] = $row['co2'];
            $data['tvoc'][] = $row['tvoc'];
            $data['illumination'][] = $row['illumination'];
            $data['time'][] = $row['time'];
        }

        # Renvoie les données vers le javascript en JSON
        echo json_encode($data);
    } else 
    {
        echo json_encode(1);
    }
?>