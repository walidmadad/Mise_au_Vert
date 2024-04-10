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
                        include_once(__DIR__ . "/../../Modele/ScriptEspacePension.php");
                        include_once(realpath(__DIR__ . '/../../Controller/Connect.php'));

                        session_start();
                        $ScriptEspacePension = new ScriptEspacePension();

                        echo $ScriptEspacePension->getNomPension();
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
    <form>
        <h1>Gestion Des Box</h1><hr>
        <label for="typeGardiennage">Type Gardiennage:</label>
        <select id="typeGardiennage">
            <option value="option1">Hotel Cânin</option>
            <option value="option2">Option 2</option>
            <option value="option3">Option 3</option>
        </select><br>
        <a style="margin-top:10px">Tarifs par jours (€): </a><input type="text" value=""></input>
        <a style="margin-top:10px">Superficie Box (m²): </a><input type="text" value=""></input>
        <input type="submit" id='update' value='Modifier'>
    </form>
</section>
<script src="script.js"></script>
</body>
</html>