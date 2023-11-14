<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Mise Au Vert</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/x-icon" href="res/logo.png">
    </head>
    <body>
        <section id="menuEspaceClient">
            <div class="navbar_espaceClient">
                <div class="container_espaceClient"> 
                    <div class="navbar_links_espaceClient">
                        <ul class="menu_espaceClient">
                        <li><img src="res/person-profile-icon.png" alt="logo" id="logo"><li>
                            <li><a>
                                <?php
                                    session_start(); 
                                    $nom = $_SESSION['nom'];
                                    $prenom = $_SESSION['prenom'];
                                    echo $nom.' '.$prenom;
                                ?>
                            </a></li>
                            <br><br><br>
                            <li><a href="informations_client.php">Profile</a></li><br><br>
                            <li><a href="liste_animaux.php">Liste des animaux</a></li><br><br>
                            <li><a href="">Historique</a></li><br><br>
                            <li><a href="">Réservation</a></li><br><br>
                            <li><a href="">Paramétres</a></li><br><br>
                            <li><a href="#">Se déconecter</a></li><br>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="espaceClient-1">
            <h1>Espace Client</h1><hr>
        </section>
        <script src="script.js"></script>
    </body>
</html>
