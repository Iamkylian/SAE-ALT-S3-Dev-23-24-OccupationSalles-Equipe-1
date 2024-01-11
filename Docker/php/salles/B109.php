<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/header.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>

<style>
        svg {
            
        }
        g {
            fill:rgb(183, 232, 247);
            stroke:rgb(0, 26, 255);
            
            /* stroke:rgb(0, 0, 0);
            fill: rgb(248, 183, 43); */
            
            fill-opacity:1;
            stroke-width:1px;
            stroke-linecap:round;
            stroke-linejoin:round;
            stroke-opacity:1;
            
            transition: fill 1.2s, stroke 1s
        }
        g.changeColor:hover {
            stroke:rgb(56, 0, 102);
            fill: rgb(247, 156, 239);
            
            /* stroke:rgb(255, 193, 183);
            fill: rgb(233, 8, 0); */
        }
        
</style>

    <?php
        include("../connect.inc.php");
    ?>

    <header id="head">
        <?php
            echo "<h1>" . pathinfo($_SERVER["SCRIPT_FILENAME"], PATHINFO_FILENAME) . "</h1>";
        ?>
    </header>
    <!-- <?php   
        ini_set('display_errors', 1);

        $query = $conn->prepare("SELECT * FROM Device");
        $query->execute();

        $result = $query->get_result();

        foreach($result as $row){
            echo $row['deviceName'] . '<br><br>';
        }
    ?> -->

<svg width="1800" height="800" viewBox="0 0 177.7769 200">
    <a href='salles/B109.php'>
        <g id="b109" class="changeColor">
            <title>B_109</title>
            <!-- Ajustez les coordonnées pour déplacer le chemin vers la gauche -->
            <path id="path7040" d="m -20,108.24663 c 23.94467,0.8006 48.29368,2.4467 72.83057,4.48569 l 10.99376,-98.300301 c -25.15533,-1.68229 -50.26828,-3.50216 -75.87947,-3.70448 z"/>
        </g>
    </a>
</svg>




    
</body>
</html>