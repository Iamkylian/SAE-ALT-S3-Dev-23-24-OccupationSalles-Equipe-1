<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/header.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <?php
        echo "<header id='head'>" . pathinfo($_SERVER["SCRIPT_FILENAME"], PATHINFO_FILENAME) . "</header>";
        ini_set('display_errors', 1);

        $query = $connexion->prepare("SELECT * FROM Device");
        $query->execute();

        while($ligne = $query->fetch()){
            echo $ligne['deviceName'];
        }
    ?>

    
</body>
</html>