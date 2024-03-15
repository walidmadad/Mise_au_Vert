<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Mise Au Vert</title>
        <link rel="stylesheet" href="../../style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/x-icon" href="../res/logo.png">
        <style>
            .animal-table-header th {
                background-color: #4CAF50;
                color: white;
                padding: 15px;
                text-align: center;
            }

            .animal-table-data th {
                padding: 10px;
                background-color:#cccccc ;
                text-align: center;
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
                margin-bottom: 10px;
            }
        </style>
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

                            <li><a href="espaceClient.php" style="margin-top:30px">Accueil</a>
                            <li><a href="informations_client.php" style="margin-top:30px">Profile</a></li>
                            <li><a href="liste_animaux.php" style="color:#209d1e;margin-top:30px">Liste des animaux</a></li>
                            <li><a href="GestiondesAnimaux.php" style="margin-top:30px">Gestion des animaux</a></li>
                            <li><a href="parametres.php" style="margin-top:30px">Paramétres</a></li>

                            <li><a href="deconecter.php" style="margin-top:30px">Se déconecter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="espaceClient-1">
            <h1>Liste des animaux</h1><hr>
            <div>
                <table >
                    <tr class="animal-table-header">
                        <th>Nom d'Animal</th>
                        <th>Espece</th>
                        <th>Age</th>
                        <th>Poids</th>
                        <th>Regle</th>
                        <th>Carnet de Vaccination</th>
                        <th>Vaccin a jour</th>
                        <th>Vermifuge a jour</th>
                        <th>Pension</th>
                        <th>Box</th>
                        <th>Date Fin</th>
                    </tr>
                    <tr class="animal-table-data">
                        <?php
                        include_once(__DIR__ . '/../../Modele/ScriptAnimal.php');

                        $ScriptAnimal = new ScriptAnimal();
                        echo $ScriptAnimal->afficherAnimaux();

                        ?>
                    </tr>

                </table>
                <?php

                ?>
            </div>

        </section>
        <script src="script.js"></script>
    </body>
</html>
