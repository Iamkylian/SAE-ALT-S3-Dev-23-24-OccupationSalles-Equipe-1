<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../Css/header.css" rel="stylesheet">
    <link href="../../Css/svg.css" rel="stylesheet">

    <title>Document</title>
</head>
<body>

    <?php
        include("../../connect.inc.php");
    ?>

    <header id="head">
        <?php
            echo "<h1>" . pathinfo($_SERVER["SCRIPT_FILENAME"], PATHINFO_FILENAME) . "</h1>";
        ?>
    </header>

    <section>
        <div id="menuLat">
            <h1>CO2</h1>
            <h1>CO2</h1>
            <h1>CO2</h1>
        </div>

        <div id="main">
            <svg width="1800" height="800" viewBox="0 0 177.7769 200">
                <g id="b109" class="changeColor">
                    <title>B_109</title>
                    <path id="path7040" d="m -20,108.24663 c 23.94467,0.8006 48.29368,2.4467 72.83057,4.48569 l 10.99376,-98.300301 c -25.15533,-1.68229 -50.26828,-3.50216 -75.87947,-3.70448 z"/>
                </g>
            </svg>
        </div>
    </section>
</body>
</html>
