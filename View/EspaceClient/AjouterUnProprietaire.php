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

                            <li><a href="espaceClient.php" style="margin-top:30px">Accueil</a><li>
                            <li><a href="informations_client.php" style="margin-top:30px" >Profile</a></li>
                            <li><a href="liste_animaux.php" style="margin-top:30px">Liste des animaux</a></li>
                            <li><a href="AjouterUnProprietaire.php" style="color:#209d1e; margin-top: 30px">Ajouter un Proprietaire</a></li>
                            <li><a href="AjouterUnAnimal.php" style="margin-top:30px">Ajouter un Animal</a></li>
                            <li><a href="parametres.php" style="margin-top:30px">Paramétres</a></li>
                            <li><a href="securite.php" style="margin-top:30px">Sécurité et Confidentialité</a></li>
                            <li><a href="deconecter.php" style="margin-top:30px">Se déconecter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="espaceClient-1">

                <h1>Ajouter un Proprietaire</h1><hr>
                <form action="../../Controller/AjouterProprietaire.php" method="POST">

                    <label for="nom" style="margin-top:10px"><b>Nom</b></label>
                    <input id="nom" type="text" placeholder="Entrez le nom de proprietaire" name="nom" required>

                    <label for="prenom" style="margin-top:10px"><b>Prènom</b></label>
                    <input id="prenom" type="text" placeholder="Entrez le prénom de proprietaire" name="prenom" required>

                    <label for="adresse" style="margin-top:10px"><b>Adresse</b></label>
                    <input id="adresse" type="text" placeholder="Entrez l'adresse de proprietaire" name="adresse" required>

                    <label for="tel" style="margin-top:10px"><b>N° Telephone</b></label>
                    <input id="tel" type="text" placeholder="Entrez le numero de télephone de proprietaire" name="telephone" required>

                    <input type="submit" id='submit' value='Ajouter'>
                    <?php

                        include_once (realpath(__DIR__ . "/../../Modele/ScriptProprietaire.php"));
                        if(isset($_SESSION['ajouter'])) {
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
        <script src="../../script.js"></script>
    </body>
</html>
