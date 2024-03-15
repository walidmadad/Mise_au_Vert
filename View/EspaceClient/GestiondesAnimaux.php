<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mise Au Vert</title>
    <link rel="stylesheet" href="../../style.css">

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

                            session_start();
                            include_once(realpath(__DIR__ . '/../../Modele/ScriptEspaceClient.php'));
                            include_once(realpath(__DIR__ . '/../../Controller/Connect.php'));
                            $scriptEspaceClient = new ScriptEspaceClient();

                            echo $scriptEspaceClient->getNom() ." " . $scriptEspaceClient->getPrenom();
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
    <h1>Gestion des Animaux</h1><hr>
    <form action="AjouterUnAnimal.php">
        <input type="submit" id='submit' value='Ajouter un Animal'>
    </form>
    <form>
        <input type="submit" id="update" value="Modifier un Animal">
    </form>
    <form action="SupprimerUnAnimal.php">
        <input type="submit" id='delete' value='Supprimer un Animal'>
    </form>
</section>
</body>
</html>
