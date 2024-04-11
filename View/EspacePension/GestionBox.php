<?php
include_once(__DIR__ . "/../../Modele/ScriptBox.php");
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
    <form action="../../Controller/AjoutBox.php" method="POST" id="boxForm">
        <h1>Gestion Des Box</h1>
        <hr>
        <input type="hidden" name="id_pension" value="<?php echo $pensionInfo['id_pension'] ?>">
        <label for="typeGardiennage">Type Gardiennage:</label>
        <select id="type_gardiennage" name="id_type_gardiennage" >
            <option>Veuillez choisir votre Type de Gardiennage</option>

            <?php
            include_once(realpath(__DIR__ . '/../../Modele/ScriptTypeGardiennage.php'));
            $pension = new ScriptTypeGardiennage();
            echo $pension->afficherTypeGardiennage();
            ?>
        </select><br>
        <label for="tarifs">Tarifs par jour (€):</label>
        <input type="text" name="tarifs" id="tarifs" ><br>
        <label for="superficie">Superficie Box (m²):</label>
        <input type="text" name="superficie" id="superficie" ><br>
        <input type="hidden" name="idTypeGardiennage" id="idTypeGardiennage">
        <input type="submit" id="update" value="Modifier">
    </form>
</section>
<script>
    document.getElementById('type_gardiennage').addEventListener('change', function() {
        var selectedOption = this.options[this.selectedIndex].value;
        var id_pension = "<?php echo $pensionInfo['id_pension']; ?>";

        // Appel AJAX pour récupérer les valeurs de tarif et de superficie
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '../../Controller/AjoutBox.php?id_pension=' + id_pension + '&id_typeGardiennage=' + selectedOption, true);
        xhr.onload = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    document.getElementById('tarifs').value = response.tarif;
                    document.getElementById('superficie').value = response.superficie;
                }
            }
        };
        xhr.send();
    });
</script>

</body>
</html>