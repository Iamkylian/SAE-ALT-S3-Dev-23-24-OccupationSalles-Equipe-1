<?php
// Inclure la connexion à la base de données
include_once('../connect.inc.php');

// Vérifier si les données POST existent
if (isset($_POST['select-room']) && isset($_POST['datetimePicker'])) {
    // Récupérer les valeurs POST
    $selectedRoom = $_POST['select-room'];
    $selectedDatetime = $_POST['datetimePicker'];

    // Effectuer la requête SQL pour récupérer les données des capteurs
    $query = "SELECT Do.temperature, Do.humidity, Do.activity, Do.co2, Do.tvoc, Do.illumination, Do.time
            FROM Donnes AS Do
            WHERE Do.idDevice IN (SELECT De.id FROM Device De WHERE De.room = '$selectedRoom') AND Do.time <= '$selectedDatetime' 
            ORDER BY Do.time DESC";
    
    $stmt = $conn->prepare($query);
    $stmt->execute();

    $result = $stmt->get_result();

    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    $stmt->close();

    // Retourner les données au format JSON
    echo json_encode($data);
} else {
    // Retourner une réponse d'erreur si les données POST ne sont pas définies
    echo json_encode(array('error' => 'Missing POST data'));
}
?>
