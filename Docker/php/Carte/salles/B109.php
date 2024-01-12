<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/header.css" rel="stylesheet">
    <style>
        body {
            width: 100%;
            font-family: 'Arial', sans-serif;
        }

        #head {
            width:100%;
            background-color: #333;
            color: white;
            padding: 10px;
            text-align: center;
        }

        #menuLat {
            width: 200px;
            height: 100%;
            background-color: #f2f2f2;
            padding-top: 20px;
            right: 0;
            top: 0;
        }

        #menuLat a {
            padding: 8px 8px 8px 16px;
            text-decoration: none;
            font-size: 18px;
            color: #818181;
            display: block;
        }

        #menuLat .active {
            background-color: #4CAF50;
            color: white;
        }

        #main {
            margin-left: 200px;
            padding: 20px;
        }

        g {
            fill: rgb(183, 232, 247);
            stroke: rgb(0, 26, 255);
            fill-opacity: 1;
            stroke-width: 1px;
            stroke-linecap: round;
            stroke-linejoin: round;
            stroke-opacity: 1;
            transition: fill 1.2s, stroke 1s;
        }

        g.changeColor:hover {
            stroke: rgb(56, 0, 102);
            fill: rgb(247, 156, 239);
        }
    </style>
    <title>Document</title>
</head>
<body>

    <?php
        include("../connect.inc.php");
    ?>

    <header id="head">
        <?php
            echo "<h1>" . pathinfo($_SERVER["SCRIPT_FILENAME"], PATHINFO_FILENAME) . "</h1>";
        ?>
    </header>

    <div id="menuLat">
    </div>

    <div id="main">
        <svg width="1800" height="800" viewBox="0 0 177.7769 200">
            <g id="b109" class="changeColor">
                <title>B_109</title>
                <!-- Ajustez les coordonnées pour déplacer le chemin vers la gauche -->
                <path id="path7040" d="m -20,108.24663 c 23.94467,0.8006 48.29368,2.4467 72.83057,4.48569 l 10.99376,-98.300301 c -25.15533,-1.68229 -50.26828,-3.50216 -75.87947,-3.70448 z"/>
            </g>
        </svg>
    </div>

</body>
</html>
