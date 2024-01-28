<?php 

$rootDir = realpath($_SERVER["DOCUMENT_ROOT"]);

// Obtenez le chemin de la page actuelle
$currentPath = $_SERVER['REQUEST_URI'];

// Fonction pour vérifier si la page actuelle correspond à une page spécifique
function isCurrentPage($currentPage, $currentPath) {
    return strpos($currentPath, $currentPage) !== false;
}

?>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        // Gestion du clic sur le bouton de fermeture de l'onglet
        $('#closeTabBtn').click(function() {
            // Afficher une boîte de dialogue de confirmation
            var confirmation = window.confirm("Voulez-vous vraiment quitter l'application?");

            // Si l'utilisateur clique sur OK dans la boîte de dialogue, fermer l'onglet
            if (confirmation) {
                var newWindow = window.open('https://www.google.com/', '_self');
                newWindow.close();
            }
        });
    });
</script>

<!-- Import Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="../Css/header.css">
<header>
    <nav>
        <ul class="nav_links">
            <li><a href="../Carte/">Carte</a></li>
            <li><a href="../Maintenance/">Maintenance</a></li>
            <li><a href="../Statistiques/">Statistiques</a></li>
            <li><a href="#" target="_blank">Version 3D</a></li>
            <!--<li><button id="closeTabBtn" class="btn btn-danger">Quitter application</button></li>-->
        </ul>
    </nav>
</header>