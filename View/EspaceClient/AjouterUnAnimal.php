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
                    <li><a href="AjouterUnProprietaire.php" style="margin-top:30px">Ajouter un Proprietaire</a></li>
                    <li><a href="AjouterUnAnimal.php" style="color:#209d1e;margin-top:30px">Ajouter un Animal</a></li>
                    <li><a href="parametres.php" style="margin-top:30px">Paramétres</a></li>
                    <li><a href="securite.php" style="margin-top:30px">Sécurité et Confidentialité</a></li>
                    <li><a href="deconecter.php" style="margin-top:30px">Se déconecter</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="espaceClient-1">
    <h1>Ajouter un Animal</h1><hr>
    <form action="../../Controller/AjouterAnimal.php" method="POST">

        <label style="margin-top:10px" for="nom"><b>Nom</b></label>
        <input type="text" placeholder="Entrez le nom d'animal" name="nom" id="nom" required>

        <label style="margin-top:10px" for="espece"><b>Espece</b></label>
        <select id="espece" name="espece" >
            <option>Veuillez choisir l'espece</option>
            <?php
            include_once(realpath(__DIR__ . '/../../Modele/ScriptEspece.php'));
            $espece = new ScriptEspece();
            echo $espece->affihcerEspeces();
            ?>
        </select>

        <label style="margin-top:10px" for="proprietaire"><b>Nom de Proprietaire</b></label>
        <select id="proprietaire" name="proprietaire">
            <option>Veuillez choisir le proprietaire</option>
        <?php
            include_once(realpath(__DIR__ . '/../../Modele/ScriptProprietaire.php'));
            $prop = new ScriptProprietaire();
            echo $prop->affihcerProprietaire();

        ?>
        </select>
        <input type="submit" id='submit' value='Ajouter'>
        <?php

        include_once (realpath(__DIR__ . "/../../Modele/ScriptAnimal.php"));
        if (isset($_SESSION['ajouter'])) {
            $ajouter = $_SESSION['ajouter'];
            echo "<p style='color:green'>$ajouter</p>";
            unset($_SESSION['ajouter']);
        }
        else if(isset($_SESSION['erreur'])){
            $erreur = $_SESSION['erreur'];
            echo "<p style='color:red'>$erreur</p>";
            unset($_SESSION['erreur']);
        }
        ?>
    </form>
</section>
</body>
</html>
