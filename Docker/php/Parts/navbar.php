<?php 

$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);

// Obtenez le chemin de la page actuelle
$currentPath = $_SERVER['REQUEST_URI'];

// Fonction pour vérifier si la page actuelle correspond à une page spécifique
function isCurrentPage($currentPage, $currentPath) {
    return strpos($currentPath, $currentPage) !== false;
}

?>
<!-- Import Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="../Css/header.css">
<header>
    <nav>
        <ul class="nav_links">
            <li><a href="#">Carte</a></li>
            <li><a href="#">Maintenance</a></li>
            <li><a href="#">Statistiques</a></li>
        </ul>
    </nav>
</header>


