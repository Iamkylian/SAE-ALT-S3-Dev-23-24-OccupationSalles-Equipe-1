<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../Css/header.css" rel="stylesheet">
    <link href="../Css/svg.css" rel="stylesheet">
    <link href="../Css/Salle/salle.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <title>Salle
        <?php
        $vsalle = $_GET['salle'];
        echo $vsalle . ' | Suivi des salles ';
        ?>
    </title>

</head>

<body style="overflow-x: hidden;">

    <?php include_once('../Parts/navbar.php') ?>

    <?php
    include("../connect.inc.php");
    ?>


    <?php
    include("../connect.inc.php");

    if (substr($vsalle, 0, 2) === 'B0') {
        $link = '../Carte/rdc.php';
    } elseif (substr($vsalle, 0, 2) === 'B1') {
        $link = '../Carte/premierEtage.php';
    } else {
        $link = '../Carte/deuxiemeEtage.php';
    }
    
    // Affiche le nom de la salle
    echo "<h1 id='room_name'>" . $vsalle . "</h1>";
    echo '<a id="return_button" href="' . $link . '"><i class="bi bi-arrow-left h3"></i></a>';

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

    <!--<div id="main">
        <nav id="nav">
            <ul>
                <li><a href="premierEtage.php">Retour au premier étage</a></li>
            </ul>
        </nav>
    </div>-->

    <div id="data-container" class="container-fluid">
        <div class="row" id="data-row">
        <?php
        // Sélectionne la dernière donnée enregistrée pour la salle spécifiée
        $query = $conn->prepare("SELECT d.deviceName, dn.temperature, dn.humidity, dn.activity, dn.co2, dn.tvoc, dn.illumination, dn.time
                                FROM Donnes dn
                                JOIN (SELECT id, deviceName FROM Device WHERE room = ?) d ON dn.idDevice = d.id
                                ORDER BY dn.time DESC
                                LIMIT 1");

        
        ?>
            </div>
        </div>
    </div>

    
    <div class="container-fuild">
        <div class="btn-group select-button" style="padding-left: 17%;" role="group" id="button_group">
            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
            <label class="btn btn-outline-light" for="btnradio1">Last Data</label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
            <label class="btn btn-outline-light" for="btnradio2">Average</label>
        </div>
        <div class="row my-2" style="justify-content: center;">
            <div class="col-2">
                    <div class="p-5 mx-1 my-4 shadow" id="chart1">
                        <div class="d-flex justify-content-center align-items-center spinner">
                            <div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div>
                            <p class="m-0 fs-4 my-5 ds-title"></p>
                        </div>
                    </div>
                </div>
                <div class="col-2">
                    <div class="p-5 mx-1 my-4 shadow" id="chart2">
                        <div class="d-flex justify-content-center align-items-center spinner">
                            <div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div>
                            <p class="m-0 fs-4 my-5 ds-title"></p>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="p-5 mx-1 my-4 shadow" id="chart3">
                        <div class="d-flex justify-content-center align-items-center spinner">
                            <div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div>
                            <p class="m-0 fs-4 my-5 ds-title"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-4" style="justify-content: center;">
            <div class="col-4">
                    <div class="p-5 mx-1 my-4 shadow" id="chart4">
                        <div class="d-flex justify-content-center align-items-center spinner">
                            <div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div>
                            <p class="m-0 fs-4 my-5 ds-title"></p>
                    </div>
                </div>
            </div>
            <div class="col-2">
                    <div class="p-5 mx-1 my-4 shadow" id="chart5">
                        <div class="d-flex justify-content-center align-items-center spinner">
                            <div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div>
                            <p class="m-0 fs-4 my-5 ds-title"></p>
                    </div>
                </div>
            </div>
            <div class="col-2">
                    <div class="p-5 mx-1 my-4 shadow" id="chart6">
                        <div class="d-flex justify-content-center align-items-center spinner">
                            <div class="spinner-border text-light me-2" style="width: 1.3rem; height: 1.3rem;" role="status"></div>
                            <p class="m-0 fs-4 my-5 ds-title"></p>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="../js/LoadRoom.js"></script>