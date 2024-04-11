<?php

session_start();
include_once(realpath(__DIR__ . '/../../Modele/ScriptEspaceClient.php'));
include_once(realpath(__DIR__ . '/../../Controller/Connect.php'));
$scriptEspaceClient = new ScriptEspaceClient();
$info = $scriptEspaceClient->getInformationsClient();
?><!DOCTYPE html>
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
            #dateNaisanceMdf{display: flex; align-items: center;padding-left:2px;}

            h1 {
                color: #333;
            }
            a {
                display: block;
                margin-bottom: 5px;
            }
            input, select {
                margin-bottom: 10px;
                margin-left:3px ;
                padding: 8px;
                width: 60%;
                height: 60%;
                box-sizing: border-box;
            }
            label {
                margin-left:3px ;
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
                                    echo $info['nom'] ." " . $info['prenom'];
                                    ?>
                                </a></li>

                            <li><a href="espaceClient.php" style="margin-top:30px">Accueil</a>
                            <li><a href="informations_client.php" style="color:#209d1e;margin-top:30px">Profile</a></li>
                            <li><a href="liste_animaux.php" style="margin-top:30px">Liste des animaux</a></li>
                            <li><a href="GestiondesAnimaux.php" style="margin-top:30px">Gestion des animaux</a></li>
                            <li><a href="parametres.php" style="margin-top:30px">Paramétres</a></li>

                            <li><a href="deconecter.php" style="margin-top:30px">Se déconecter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="espaceClient-1">
            <form id="modifier-client-form" method="post" action="/../../Controller/ModifierClient.php">
                <h1>Gestion de profil</h1>
                <hr style="margin-bottom: 30px;">

                <label for="gestion-profile_nom">Nom:</label>
                <input type="text" id="gestion-profile_nom" name="nom" value="<?php echo $info['nom']; ?>"><br>
                <input type="hidden" name="id" value="<?php echo $info['id']; ?>">
                <label for="gestion-profile_prenom">Prénom:</label>
                <input type="text" id="gestion-profile_prenom" name="prenom" value="<?php echo $info['prenom']; ?>">

                <label style="text-align: center">Date de Naissance</label><br>
                <div id="dateNaisanceMdf">
                    <label for="day">Jour:</label>
                    <select id="day" name="day">
                        <?php
                        for ($i = 1; $i <= 31; $i++) {
                            $selected = ($info['day'] == $i) ? "selected" : "";
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
                            $selected = ($info['month'] == $numero) ? "selected" : "";
                            echo "<option value=\"$numero\" $selected>$nom</option>";
                        }
                        ?>
                    </select>

                    <label for="year">Année:</label>
                    <input type="text" id="year" name="year" placeholder="YYYY" value="<?php echo $info['year']; ?>"><br>
                </div>
                <label for="gestion-profile_email">Email :</label>
                <input type="text" id="gestion-profile_email" name="email" value="<?php echo $info['email']; ?>">

                <input type="submit" id='' value='Modifier'>
            </form>
        </section>
        <script>
            document.getElementById('modifier-client-form').addEventListener('submit', function(event) {
                event.preventDefault();

                var form = event.target;
                var formData = new FormData(form);

                var xhr = new XMLHttpRequest();
                xhr.open('POST', form.action);
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        var response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            // Mettre à jour les informations sur la page
                            document.getElementById('gestion-profile_nom').value = response.data.nom;
                            document.getElementById('gestion-profile_prenom').value = response.data.prenom;
                            document.getElementById('gestion-profile_email').value = response.data.email;
                            document.getElementById('day').value = response.data.day;
                            document.getElementById('month').value = response.data.month;
                            document.getElementById('year').value = response.data.year;
                        } else {
                            alert('Erreur lors de la modification des informations.');
                        }
                    } else {
                        alert('Erreur lors de la requête.');
                    }
                };
                xhr.send(formData);
            });
        </script>
    </body>
</html>
