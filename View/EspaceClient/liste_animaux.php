<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Mise Au Vert</title>
        <link rel="stylesheet" href="../../style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/x-icon" href="../res/logo.png">
    </head>
    <body>
        <section id="menuEspaceClient">
            <div class="navbar_espaceClient">
                <div class="container_espaceClient"> 
                    <div class="navbar_links_espaceClient">
                        <ul class="menu_espaceClient">
                            <li><img src="../../res/person-profile-icon.png" alt="logo" id="logo"><li>
                            <li><a style='text-transform: uppercase'>
                                    <?php

                                    session_start();
                                    include_once(realpath(__DIR__ . '/../../Modele/ScriptEspaceClient.php'));
                                    include_once(realpath(__DIR__ . '/../../Controller/connect.php'));
                                    $scriptEspaceClient = new ScriptEspaceClient();

                                    echo $scriptEspaceClient->getNom() ." " . $scriptEspaceClient->getPrenom();
                                    ?>
                                </a></li>
                            <br><br>
                            <li><a href="espaceClient.php">Accueil</a><li><br>
                            <li><a href="informations_client.php">Profile</a></li><br><br>
                            <li><a href="liste_animaux.php" style="color:#209d1e">Liste des animaux</a></li><br><br>
                            <li><a href="AjouterUnAnimal.php">Ajouter un Proprietaire</a></li><br><br>
                            <li><a href="AjouterUnProprietaire.php">Ajouter un Animal</a></li><br><br>
                            <li><a href="parametres.php">Paramétres</a></li><br><br>
                            <li><a href="securite.php">Sécurité et Confidentialité</a></li><br><br>
                            <li><a href="deconecter.php">Se déconecter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="espaceClient-1">
            <h1>Liste des animaux</h1><hr>
            <div>
                <?php

                ?>
            </div>

        </section>
        <script src="script.js"></script>
    </body>
</html>
