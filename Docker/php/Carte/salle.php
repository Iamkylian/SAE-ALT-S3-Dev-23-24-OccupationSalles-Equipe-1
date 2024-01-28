<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../Css/header.css" rel="stylesheet">
    <link href="../Css/svg.css" rel="stylesheet">
    <link href="../Css/Salle/salle.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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

    <title>Salle
        <?php
        $vsalle = $_GET['salle'];
        echo $vsalle . ' | Suivi des salles ';
        ?>
    </title>

</head>

<body>

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
    
    echo '<a id="return_button" href="' . $link . '"><i class="bi bi-arrow-left h3"></i></a>';
    
    echo "<h1 id='room_name'>" . $vsalle . "</h1>";

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

        if ($query) {
            $query->bind_param("s", $vsalle);
            $query->execute();

            $result = $query->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                echo '<div class="col-1 p-3 mx-1 my-4 border border-1 rounder-1 shadow" id="data">'
                    . '<h5 style="font-size: 1vw;">Température</h5><p style="font-size: 1.5vw;">'  
                    . $row['temperature'] .  
                ' °C</p></div>';
                echo '<div class="col-1 p-3 mx-1 my-4 border border-1 rounder-1 shadow" id="data">'
                . '<h5 style="font-size: 1vw;">Humidité</h5><p style="font-size: 1.5vw;">'  
                . $row['humidity'] .  
            ' %</p></div>';
                echo '<div class="col-1 p-3 mx-1 my-4 border border-1 rounder-1 shadow" id="data">'
                . '<h5 style="font-size: 1vw;">Activité</h5><p style="font-size: 1.5vw;">'  
                . $row['activity'] .  
            ' </p></div>';
                echo '<div class="col-1 p-3 mx-1 my-4 border border-1 rounder-1 shadow" id="data">'
                . '<h5 style="font-size: 1vw;">CO2</h5><p style="font-size: 1.3vw;">'  
                . $row['co2'] .  
            ' PPM</p></div>';
                echo '<div class="col-1 p-3 mx-1 my-4 border border-1 rounder-1 shadow" id="data">'
                . '<h5 style="font-size: 1vw;">TVOC</h5><p style="font-size: 1.5vw;">'  
                . $row['tvoc'] .  
            ' PPB</p></div>';
                echo '<div class="col-1 p-3 mx-1 my-4 border border-1 rounder-1 shadow" id="data">'
                . '<h5 style="font-size: 1vw;">Illumination</h5><p style="font-size: 1.5vw;">'  
                . $row['illumination'] .  
            ' Lux</p></div>';
                echo '<div class="col-1 p-3 mx-1 my-4 border border-1 rounder-1 shadow" id="data">'
                . '<h5 style="font-size: 1vw;">Time</h5><p style="font-size: 1vw;">'  
                . $row['time'] .  
            '</p></div>';
            } else {
                echo "<p>Aucune donnée disponible.</p>";
            }

            $query->close();
        } else {
            echo "<p>Erreur de préparation de la requête.</p>";
        }

        $conn->close();
        ?>
            </div>
        </div>

    </div>


    <div class="container">

        <svg class="salle_part">
            <!--------------------width="1200" height="800" viewBox="0 0 500 500"--------------------------------->
            <?php
            if ($vsalle == "B109") {
                echo '<g id="b109" class="changeColor">
                            <title>B_109</title>
                            <path id="path7040" d="m -20,108.24663 c 23.94467,0.8006 48.29368,2.4467 72.83057,4.48569 l 10.99376,-98.300301 c -25.15533,-1.68229 -50.26828,-3.50216 -75.87947,-3.70448 z"/>
                        </g>';
            } elseif ($vsalle == "B101") {
                echo '<g id="b101" class="changeColor">
                            <title>B_101</title>
                            <path id="path5658" d="m 312.66082,113.32755 c 32.18625,-3.83968 65.89768,-6.54403 101.08279,-8.15138 l -3.85569,-93.585721 c -36.4258,1.38388 -72.23244,4.52013 -107.62361,8.83227 z"/>
                        </g>';
            } elseif ($vsalle == "B102") {
                echo '<g id="b102" class="changeColor">
                <title>B_102</title>
                <path id="path5902" d="m 218.32871,128.54053 c 31.3953,-6.30443 62.8293,-11.62948 94.33211,-15.21298 L 302.26431,20.422719 c -36.15762,4.33875 -71.34911,10.6068 -106.0989,17.75691 z"/>
            </g>';
            } elseif ($vsalle == "B103") {
                echo '<g id="b103" class="changeColor">
                <title>B_103</title>
                <path id="path6032" d="m 102.25706,61.711469 c 30.83507,-8.68128 61.86762,-17.00902 93.90835,-23.53184 l 22.1633,90.360901 c -27.56145,5.62817 -55.18818,12.60391 -82.86466,20.60635 z"/>
            </g>';
            } elseif ($vsalle == "B104") {
                echo '<g id="b104" class="changeColor">
                <title>B_104</title>
                <path id="path6162" d="m 110.6998,185.66572 38.93726,-11.78931 25.96808,87.77854 c -28.4839,8.32013 -57.27527,18.60577 -86.203713,29.76767 l -21.91,-57.86595 9.25949,-23.83036 c 11.59527,0.11209 19.73724,-3.86389 26.067023,-9.9604 4.09567,-3.94473 6.08882,-8.99424 7.88186,-14.10019 z"/>
            </g>';
            } elseif ($vsalle == "B105") {
                echo '<g id="b105" class="changeColor">
                <title>B_105</title>
                <path id="path6406" d="m 149.63706,173.87641 c 30.00718,-8.32761 60.78703,-16.23808 95.08735,-22.24798 l 18.89053,88.1643 c -30.18975,6.08433 -59.56805,13.31294 -88.0098,21.86222 z"/>
            </g>';
            } elseif ($vsalle == "B106") {
                echo '<g id="b106" class="changeColor">
                <title>B_106</title>
                <path id="path6536" d="m 244.72441,151.62843 c 30.60334,-5.17445 61.55499,-9.71797 93.56699,-12.34079 l 12.34755,87.33653 c -33.10794,3.47902 -61.25307,8.06016 -87.02401,13.16856 z"/>
            </g>';
            } elseif ($vsalle == "B107") {
                echo '<g id="b107" class="changeColor">
                <title>B_107</title>
                <path id="path6704" d="m 560.0311,139.53609 c 31.09281,3.25157 62.03017,7.87022 92.83507,13.65361 l -20.55433,83.68832 c -27.38774,-4.61188 -54.9667,-8.93566 -83.83423,-11.31808 z"/>
            </g>';
            } elseif ($vsalle == "B108") {
                echo '<g id="b108" class="changeColor">
                <title>B_108</title>
                <path id="path6910" d="m 463.01664,221.35991 1.71982,-37.65232 7.52828,0.0186 3.59238,-50.02195 c 28.09423,0.9607 56.1545,2.84309 84.17398,5.83185 l -11.55349,86.02385 c -27.88071,-2.16645 -55.8284,-4.24822 -85.46097,-4.20003 z"/>
            </g>';
            } elseif ($vsalle == "B109b") {
                echo '<g id="b109b" class="changeColor">
                <title>B_109b</title>
                <path id="path7248" d="m 409.88792,11.590449 1.45523,34.5632 72.02524,1.1722 2.98166,-36.59831 c -26.05669,-0.5198 -51.43523,-0.0778 -76.46213,0.86291 z"/>
            </g>';
            } elseif ($vsalle == "B110") {
                echo '<g id="b110" class="changeColor">
                <title>B_110</title>
                <path id="path7340" d="m 562.22952,14.432019 c 24.87916,2.02615 49.77904,4.80547 74.70484,8.52737 l -18.79517,97.648831 c -22.15383,-3.06375 -44.3301,-6.06072 -66.90343,-7.8759 z"/>
            </g>';
            } elseif ($vsalle == "B111") {
                echo '<g id="b111" class="changeColor">
                <title>B_111</title>
                <path id="path7508" d="m 636.93436,22.959389 c 23.78467,3.4809 47.52549,7.92479 71.23458,13.06565 l -22.00171,96.810951 c -22.5281,-4.50991 -45.05729,-9.01661 -68.02804,-12.22777 z"/>
            </g>';
            } elseif ($vsalle == "B112") {
                echo '<g id="b112" class="changeColor">
                <title>B112</title>
                <path id="path7993" d="m 716.57973,139.6648 21.94726,-96.505261 c 44.15216,10.74473 87.25011,25.37177 129.80476,41.99957 l -46.44497,96.293061 c 1.38366,-8.52305 3.1863,-17.14394 -3.26187,-27.00513 -4.80749,-7.35209 -11.56614,-9.79818 -19.13921,-9.75184 -12.40764,0.0759 -17.30672,5.22774 -21.26113,11.22667 z"/>
            </g>';
            } elseif ($vsalle == "B112b") {
                echo '<g id="b112b" class="changeColor">
                <title>B_112b</title>
                <path id="path7676" d="m 708.16894,36.025039 c 8.42179,1.8483 17.79734,3.99431 30.35805,7.1345 l -21.94726,96.505261 -30.4125,-6.82881 z"/>
            </g>';
            } elseif ($vsalle == "B113") {
                echo '<g id="b113" class="changeColor">
                        <title>B_113</title>
                        <path id="path8389" d="m 632.31184,236.87802 c 50.26601,8.91608 99.37561,22.17579 147.50106,39.13211 l 22.5564,-52.83704 -8.32766,-24.3855 c -6.15944,0.17634 -12.39466,-0.78649 -17.79224,-5.47083 -5.1901,-4.50428 -6.30797,-8.41398 -7.38559,-11.95091 -38.13395,-11.5108 -76.87,-20.62336 -115.99764,-28.17615 z"/>
                      </g>';
            } elseif ($vsalle == "B115") {
                echo '<g id="b115" class="changeColor">
                <title>B_115</title>
                <path id="path8861" d="m 10.913257,91.932779 c 30.52017,-11.33811 60.96676,-21.38831 91.343803,-30.22131 l 33.20699,87.435411 -35.10998,10.78758 c -7.758963,-8.22241 -17.200533,-10.83196 -28.652613,-7.99645 -8.68038,2.14925 -14.8466,8.17383 -18.6313,18.11815 -1.73545,4.55989 -2.92285,9.33783 -3.70852,14.27814 z"/>
            </g>';
            } elseif ($vsalle == "B116a") {
                echo '<g id="b116a" class="changeColor">
                <title>B_116a</title>
                <path id="path4158" d="m 338.2914,139.28764 31.90296,-2.69496 3.26812,36.01632 -30.13441,2.30399 z"/>
            </g>';
            } elseif ($vsalle == "B116b") {
                echo '<g id="b116b" class="changeColor">
                <title>B_116b</title>
                <path id="path952" d="m 350.63895,226.62417 c 23.44274,-2.41503 47.20563,-4.08629 71.37798,-4.80636 l -1.5634,-52.80161 -8.47319,0.64784 -0.0987,-10.0496 -39.28404,3.46335 0.86486,9.53121 -30.13441,2.30399 z"/>
                <path id="path954" d="m 411.98034,169.66404 0.51544,52.49465"/>
                <path id="path956" d="m 373.46248,172.609 38.51786,-2.94496"/>
            </g>';
            } else {
                // Si aucune salle correspondante n'est trouvée
                echo "Aucune salle correspondante.";
            }

            ?>
        </svg>
    </div>
</body>

</html>