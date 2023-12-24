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
                            include_once(realpath(__DIR__ . '/../../Controller/connect.php'));
                            $scriptEspaceClient = new ScriptEspaceClient();

                            echo $scriptEspaceClient->getNom() ." " . $scriptEspaceClient->getPrenom();
                            ?>
                        </a></li>
                    <br><br>
                    <li><a href="espaceClient.php">Accueil</a><li><br>
                    <li><a href="informations_client.php">Profile</a></li><br><br>
                    <li><a href="liste_animaux.php">Liste des animaux</a></li><br><br>
                    <li><a href="AjouterUnProprietaire.php">Ajouter un Proprietaire</a></li><br><br>
                    <li><a href="AjouterUnAnimal.php" style="color:#209d1e">Ajouter un Animal</a></li><br><br>
                    <li><a href="parametres.php">Paramétres</a></li><br><br>
                    <li><a href="securite.php">Sécurité et Confidentialité</a></li><br><br>
                    <li><a href="deconecter.php">Se déconecter</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="espaceClient-1">
    <h1>Ajouter un Animal</h1><hr>
    <form action="../Controller/creerPension.php" method="POST">

        <label><b>Nom</b></label>
        <input type="text" placeholder="Entrez nom " name="nom" required><br><br>

        <label><b>Pension</b></label>
        <input type="text" placeholder="Entrez la pension" name="pension" required><br><br>

        <label><b>Nom de Proprietaire</b></label>
        <select id="proprietaire" name="proprietaire">

        <input type="submit" id='submit' value='Ajouter'>

    </form>

</section>
<script src="script.js"></script>
</body>
</html>
