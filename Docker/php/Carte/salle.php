<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../Css/header.css" rel="stylesheet">
    <link href="../../Css/svg.css" rel="stylesheet">

    <script>
        // Fonction pour actualiser la page après un certain délai
        function refreshPageAfterDelay(seconds) {
            var countdown = seconds;

            // Met à jour le compteur toutes les secondes
            var countdownInterval = setInterval(function () {
                document.getElementById('refreshTimer').innerHTML = countdown;
                countdown--;

                // Quand le compte à rebours atteint 0, actualise la page
                if (countdown < 0) {
                    clearInterval(countdownInterval);
                    location.reload();
                }
            }, 1000);
        }
        
        // Appel de la fonction avec le temps en secondes (600 secondes = 10 minutes)
        refreshPageAfterDelay(300);
    </script>

    <title>Salle</title>

</head>

<body>

    <?php
        include("../connect.inc.php");
    ?>

    <header id="head">
        <?php
            include("../connect.inc.php");

            $vsalle = $_GET['salle'];

            echo "<h1>". $vsalle ."</h1>";

            ini_set('display_errors', 1);

            $query = $conn->prepare("SELECT deviceName FROM Device WHERE room = ?");
            if ($query) {
                $query->bind_param("s", $vsalle);
                $query->execute();

                $result = $query->get_result();

                $query->close();
            } else {
                echo "Erreur de préparation de la requête.";
            }

            
        ?>
    </header>

    <div id="">
        <p>Actualisation dans <span id="refreshTimer"></span> secondes</p>
    </div>

    <div id="menuLat">
        <h1>Dernière donnée :</h1>
    </div>

    <?php
            // Sélectionne la dernière donnée enregistrée pour la salle spécifiée
        $query = $conn->prepare("SELECT d.deviceName, dn.temperature, dn.humidity, dn.activity, dn.co2, dn.tvoc, dn.illumination, dn.time
                                FROM Donnes dn
                                JOIN (SELECT id, deviceName FROM Device WHERE room = ?) d ON dn.idDevice = d.id
                                ORDER BY dn.time DESC
                                LIMIT 1");

        if ($query) {
            $query->bind_param("s", $vsalle);
            $query->execute();

            $result = $query->get_result();

            if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            echo "<p><strong> Température :</strong> " . $row['temperature'] . " °C</p>";
            echo "<p><strong> Humidité : </strong> " . $row['humidity'] . " %</p>";
            echo "<p><strong> Activité : </strong> " . $row['activity'] . "</p>";
            echo "<p><strong> CO2 : </strong> " . $row['co2'] . " ppm</p>";
            echo "<p><strong> TVOC : </strong> " . $row['tvoc'] . " ppb</p>";
            echo "<p><strong> Éclairage : </strong> " . $row['illumination'] . " lux</p>";
            echo "<p><strong> Heure : </strong> " . $row['time'] . "</p>";
            } else {
            echo "<p>Aucune donnée disponible.</p>";
            }

            $query->close();
        } else {
        echo "<p>Erreur de préparation de la requête.</p>";
        }

        $conn->close();
    ?>

    <div id="main">
        <svg width="1800" height="800" viewBox="0 0 177.7769 200">
            <g id="b109" class="changeColor">
                <title>B_109</title>
                <path id="path7040" d="m -20,108.24663 c 23.94467,0.8006 48.29368,2.4467 72.83057,4.48569 l 10.99376,-98.300301 c -25.15533,-1.68229 -50.26828,-3.50216 -75.87947,-3.70448 z"/>
            </g>
        </svg>
    </div>
    
</body>
</html>
