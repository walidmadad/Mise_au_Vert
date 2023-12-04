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
                            <li><a href="informations_client.php" style="color:#209d1e">Profile</a></li><br><br>
                            <li><a href="liste_animaux.php">Liste des animaux</a></li><br><br>
                            <li><a href="historique.php">Historique</a></li><br><br>
                            <li><a href="reservation.php">Réservation</a></li><br><br>
                            <li><a href="parametres.php">Paramétres</a></li><br><br>
                            <li><a href="securite.php">Sécurité et Confidentialité</a></li><br><br>
                            <li><a href="deconecter.php">Se déconecter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="espaceClient-1">
            <h1>Gestion de profile</h1><hr style="margin-bottom: 30px;">
            <a>Nom: </a><input type"text" id="gestion-profile_nom" name="nom" value="<?php
            include_once(realpath(__DIR__ . '/../../Modele/ScriptEspaceClient.php'));
            $scriptEspaceClient = new ScriptEspaceClient();
            echo $scriptEspaceClient->getNom();
            ?>"> <br>
            <a>Prenom: </a><input type"text" id="gestion-profile_nom" name="prenomnom" value="<?php
            include_once(realpath(__DIR__ . '/../../Modele/ScriptEspaceClient.php'));
            $scriptEspaceClient = new ScriptEspaceClient();
            echo $scriptEspaceClient->getPrenom();
            ?>"> <br>
            <a align="center" style="margin-top: 30px">Date de Naissance</a>
            <label for="day">Jour:</label>
            <select id="day" name="day">
                <option value=""><?php include_once(realpath(__DIR__ . '/../../Modele/ScriptEspaceClient.php'));
                    $scriptEspaceClient = new ScriptEspaceClient();
                    echo $scriptEspaceClient->getDay();
                    ?></option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
            </select>
            <label for="month">Mois:</label>
            <select id="month" name="month" onchange="updateDays()">
                <option ><?php include_once(realpath(__DIR__ . '/../../Modele/ScriptEspaceClient.php'));
                    $scriptEspaceClient = new ScriptEspaceClient();
                    echo $scriptEspaceClient->getMonth();
                    ?></option>
                <option value="1">Janvier</option>
                <option value="2">Février</option>
                <option value="3">Mars</option>
                <option value="4">Avril</option>
                <option value="5">Mai</option>
                <option value="6">Juin</option>
                <option value="7">Juillet</option>
                <option value="8">Août</option>
                <option value="9">Septembre</option>
                <option value="10">Octobre</option>
                <option value="11">Novembre</option>
                <option value="12">Décembre</option>
            </select>
            <label for="year">Année:</label>
            <input type="text1" id="year" name="year" placeholder="YYYY" value="<?php
            include_once(realpath(__DIR__ . '/../../Modele/ScriptEspaceClient.php'));
            $scriptEspaceClient = new ScriptEspaceClient();
            echo $scriptEspaceClient->getYear();
            ?>">
            <br>

            <a>Email : </a><input type="text" id="gestion-profile" name="email" value="<?php
            include_once(realpath(__DIR__ . '/../../Modele/ScriptEspaceClient.php'));
            $scriptEspaceClient = new ScriptEspaceClient();
            echo $scriptEspaceClient->getEmail();
            ?>">
                <input type="submit" id='' value='Modifier'>
            </form>
        </section>
    </body>
</html>
