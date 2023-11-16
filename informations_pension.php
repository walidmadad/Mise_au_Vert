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
                                    $nom_pension = $_SESSION['nom_pension'];

                                    echo $nom_pension;
                                ?>
                            </a></li>
                            <br><br>
                            <li><a href="espaceClient.php">Accueil</a><li><br>
                            <li><a href="informations_pension.php" style="color:#209d1e">Profile</a></li><br><br>
                            <li><a href="liste_animaux.php">Liste des animaux</a></li><br><br>
                            <li><a href="historique.php">Historique</a></li><br><br>
                            <li><a href="reservation.php">Réservation</a></li><br><br>
                            <li><a href="parametres.php">Paramétres</a></li><br><br>
                            <li><a href="securite.php">Sécurité et Confidentialité</a></li><br><br>
                            <li><a href="deconecter.php">Se déconecter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="espaceClient-1">
            <h1>Gestion de profile</h1><hr>
            <a>Nom: </a><input type="text" value="<?php $nom_pension = $_SESSION['nom_pension']; echo $nom_pension;?>"></input>
            <a>Responsable: </a><a><?php $responsable_pension = $_SESSION['responsable_pension']; echo $responsable_pension;?></a>
            <a>Adresse: </a><a><?php $adresse_pension = $_SESSION['adresse_pension']; echo $adresse_pension;?></a>
            <a>Ville: </a><a><?php $ville_pension = $_SESSION['telephone_pension']; echo $ville_pension;?></a>
            <a>Email: </a><a><?php $email_pension = $_SESSION['email_pension']; echo $email_pension;?></a>
            <a>Telephone: </a><a><?php $telephone_pension = $_SESSION['telephone_pension']; echo $telephone_pension;?></a>
        </section>
        <script src="script.js"></script>
    </body>
</html>
