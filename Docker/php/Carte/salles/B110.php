<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../Css/header.css" rel="stylesheet">
    <link href="../../Css/svg.css" rel="stylesheet">    <title>Document</title>
</head>
<body>
    <?php
        include("../../connect.inc.php");
    ?>

    <header id="head">
        <?php
            echo pathinfo($_SERVER["SCRIPT_FILENAME"], PATHINFO_FILENAME);
        ?>
    </header>
    <?php   
        ini_set('display_errors', 1);

        $query = $conn->prepare("SELECT * FROM Device");
        $query->execute();

        $result = $query->get_result();

        foreach($result as $row){
            echo $row['deviceName'] . '<br><br>';
        }
    ?>

    
</body>
</html>