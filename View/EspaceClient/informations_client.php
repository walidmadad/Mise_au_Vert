<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Mise Au Vert</title>
        <link rel="stylesheet" href="../../style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/x-icon" href="../res/logo.png">
        <style>
            .espaceClient-1 {
                max-width: 600px;
                margin: 0 auto;
                padding: 20px;
                border: 1px solid #ccc;
                border-radius: 8px;
            }
            h1 {
                color: #333;
            }
            a {
                display: block;
                margin-bottom: 5px;
            }
            input, select {
                margin-bottom: 10px;
                padding: 8px;
                width: 100%;
                box-sizing: border-box;
            }
            label {
                display: inline-block;
                margin-bottom: 5px;
            }</style>
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
                                    include_once(realpath(__DIR__ . '/../../Controller/Connect.php'));
                                    $scriptEspaceClient = new ScriptEspaceClient();

                                    echo $scriptEspaceClient->getNom() ." " . $scriptEspaceClient->getPrenom();
                                    ?>
                                </a></li>
                            <br><br>
                            <li><a href="espaceClient.php">Accueil</a><li><br>
                            <li><a href="informations_client.php" style="color:#209d1e">Profile</a></li><br><br>
                            <li><a href="liste_animaux.php">Liste des animaux</a></li><br><br>
                            <li><a href="AjouterUnAnimal.php">Ajouter un Animal</a></li><br><br>
                            <li><a href="parametres.php">Paramétres</a></li><br><br>
                            <li><a href="securite.php">Sécurité et Confidentialité</a></li><br><br>
                            <li><a href="deconecter.php">Se déconecter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="espaceClient-1">
            <form method="post" action="traitement-modification-profile.php">
                <h1>Gestion de profil</h1>
                <hr style="margin-bottom: 30px;">

                <label for="gestion-profile_nom">Nom:</label>
                <input type="text" id="gestion-profile_nom" name="nom" value="<?php echo $scriptEspaceClient->getNom(); ?>"><br>

                <label for="gestion-profile_prenom">Prénom:</label>
                <input type="text" id="gestion-profile_prenom" name="prenom" value="<?php echo $scriptEspaceClient->getPrenom(); ?>"><br>

                <label align="center" style="margin-top: 30px">Date de Naissance</label>
                <label for="day">Jour:</label>
                <select id="day" name="day">
                    <?php
                    for ($i = 1; $i <= 31; $i++) {
                        $selected = ($scriptEspaceClient->getDay() == $i) ? "selected" : "";
                        echo "<option value=\"$i\" $selected>$i</option>";
                    }
                    ?>
                </select>

                <label for="month">Mois:</label>
                <select id="month" name="month">
                    <?php
                    $mois = [
                        1 => "Janvier", 2 => "Février", 3 => "Mars", 4 => "Avril",
                        5 => "Mai", 6 => "Juin", 7 => "Juillet", 8 => "Août",
                        9 => "Septembre", 10 => "Octobre", 11 => "Novembre", 12 => "Décembre"
                    ];

                    foreach ($mois as $numero => $nom) {
                        $selected = ($scriptEspaceClient->getMonth() == $numero) ? "selected" : "";
                        echo "<option value=\"$numero\" $selected>$nom</option>";
                    }
                    ?>
                </select>

                <label for="year">Année:</label>
                <input type="text" id="year" name="year" placeholder="YYYY" value="<?php echo $scriptEspaceClient->getYear(); ?>"><br>

                <label for="gestion-profile_email">Email :</label>
                <input type="text" id="gestion-profile_email" name="email" value="<?php echo $scriptEspaceClient->getEmail(); ?>">

                <input type="submit" id='' value='Modifier'>
            </form>
        </section>
    </body>
</html>
