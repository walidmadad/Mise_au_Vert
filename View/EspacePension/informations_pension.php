<?php
include_once(__DIR__ . "/../../Modele/ScriptEspacePension.php");

$scriptEspacePension = new ScriptEspacePension();

$pensionInfo = $scriptEspacePension->getPensionInfo();
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
                    <li><a>
                        <?php
                        $ScriptEspacePension = new ScriptEspacePension();
                        echo $pensionInfo['nom'];
                        ?></li>
                    <br><br>
                    <li><a href="EspacePensionConnecter.php">Accueil</a><li><br>
                    <li><a href="informations_pension.php">Pension</a></li><br><br>
                    <li><a href="GestionBox.php">Box</a></li><br><br>
                    <li><a href="deconecter.php">Se déconecter</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<section class="espaceClient-1">
    <form action="../../Controller/ModifierPension.php" method="POST">
        <h1>Gestion de profil</h1><hr>
        <a style="margin-top:10px">Nom: </a><input type="text" name="nom" value="<?php echo $pensionInfo['nom']; ?>">
        <a style="margin-top:10px">Responsable: </a><input type="text" name="responsable" value="<?php echo $pensionInfo['responsable']; ?>">
        <a style="margin-top:10px">Adresse: </a><input type="text" name="adresse" value="<?php echo $pensionInfo['adresse']; ?>">
        <a style="margin-top:10px">Ville: </a><input type="text" name="ville" value="<?php echo $pensionInfo['ville']; ?>">
        <a style="margin-top:10px">Email: </a><input type="text" name="email" value="<?php echo $pensionInfo['email']; ?>">
        <a style="margin-top:10px">Téléphone: </a><input type="text" name="telephone" value="<?php echo $pensionInfo['telephone']; ?>">
        <input type="submit" id="update" value="Modifier">
    </form>
</section>
<script src="script.js"></script>
</body>
</html>