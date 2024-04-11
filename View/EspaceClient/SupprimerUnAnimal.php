<?php

session_start();

include_once(realpath(__DIR__ . '/../../Modele/ScriptEspaceClient.php'));

$scriptEspaceClient = new ScriptEspaceClient();
$info = $scriptEspaceClient->getInformationsClient();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mise Au Vert</title>
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="icon" type="image/x-icon" href="../../res/logo.png">
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
                    <li><a style='text-transform: uppercase;'>
                            <?php
                            echo $info['nom'] ." " . $info['prenom'];
                            ?>
                        </a></li>
                    <li><a href="espaceClient.php" style="margin-top:30px">Accueil</a>
                    <li><a href="informations_client.php" style="margin-top:30px">Profile</a></li>
                    <li><a href="liste_animaux.php" style="margin-top:30px">Liste des animaux</a></li>
                    <li><a href="GestiondesAnimaux.php" style="color:#209d1e;margin-top:30px">Gestion des animaux</a></li>
                    <li><a href="parametres.php" style="margin-top:30px">Paramétres</a></li>
                    <li><a href="deconecter.php" style="margin-top:30px">Se déconecter</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="espaceClient-1">
    <h1>Suprimer un Animal</h1><hr>
    <form method="post" action="../../Controller/SupprimerAnimal.php">
        <label style="margin:30px 0 19px 0"><b>Nom d'Animal que voulez supprimer</b></label>
        <select name="animal">
            <option>Veuillez Choisir Un Animal</option>
            <?php
            include_once(realpath(__DIR__ . '/../../Modele/ScriptAnimal.php'));
            $pension = new ScriptAnimal();
            echo $pension->afficherNomAnimaux();
            ?>
        </select>
        <input type="submit" id='delete' value='Supprimer'>
        <?php

        include_once (realpath(__DIR__ . "/../../Modele/ScriptAnimal.php"));
        if (isset($_SESSION['supprimer'])) {
            $supprimer = $_SESSION['supprimer'];
            echo "<p style='color:green'>$supprimer</p>";
            unset($_SESSION['supprimer']);
        }
        else if(isset($_SESSION['erreur'])){
            $erreur = $_SESSION['erreur'];
            echo "<p style='color:red'>$erreur</p>";
            unset($_SESSION['erreur']);
        }
        ?>
    </form>
</section>
<script src="../../script.js"></script>
</body>
</html>
