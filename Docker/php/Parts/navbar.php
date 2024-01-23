<?php 

$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);

// Obtenez le chemin de la page actuelle
$currentPath = $_SERVER['REQUEST_URI'];

// Fonction pour vérifier si la page actuelle correspond à une page spécifique
function isCurrentPage($currentPage, $currentPath) {
    return strpos($currentPath, $currentPage) !== false;
}

?>

<div class="navbar">
    <?php if (!isCurrentPage('Carte', $currentPath)) { ?>
        <button class="nav-btn"><a href="../Carte">Carte</a></button>
    <?php } ?>
    
    <?php if (!isCurrentPage('Maintenance', $currentPath)) { ?>
        <button class="nav-btn"><a href="../Maintenance">Maintenance</a></button>
    <?php } ?>
    
    <?php if (!isCurrentPage('Statistique', $currentPath)) { ?>
        <button class="nav-btn"><a href="#">Statistique</a></button>
    <?php } ?>
</div>


