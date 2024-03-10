<!DOCTYPE html>
<html>
    <head lang="fr">
        <meta charset="UTF-8">
        <title>Mise Au Vert</title>
        <link rel="stylesheet" href="../style.css">
        <link rel="icon" type="image/x-icon" href="../res/">
    </head>
    <body>
        <header id="header">
            <div class="navbar">
                <div class="container">
                    <div>
                        <a href="../index"><img src="../res/logo.png" alt="logo" id="logo"></a>
                    </div>
                    <div>
                        <a class="titre" href="../index.html">La Mise Au Vert</a>
                    </div>
                    <div class="navbar_links">
                        <ul class="menu">
                            <li><a class="Accueil" href="../index.html">Accueil</a></li>
                            <li><a class="Apropos" href="apropos.html">à propos</a></li>
                            <li><a class="Service" href="EspacePension/EspacePension.php">Pensions</a></li>
                            <li><a class="EspaceClient" href="espaceClient.php">Espace Client</a></li>
                            <li><a class="Contact" href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
        </header>
        <div id="container-connexion">
            <form action="../Controller/inscrire.php" method="POST">
            <h1>S'inscrire</h1>
            <br>
            
            <label><b>Nom</b></label>
            <input type="text" placeholder="Entrez le nom " name="nom" required>
           
            <label><b>Prénom</b></label>
            <input type="text" placeholder="Entrez le prénom" name="prenom" required>

                <label><b>Code Postal</b></label>
                <input type="text" placeholder="Entrez votre Code Postal" name="CP" required>

                <label><b>Ville</b></label>
                <input type="text" placeholder="Entrez votre ville" name="ville" required>

                <label><b>N° Téléphone</b></label>
                <input type="text" placeholder="06 11 00 22 33" name="tel" required>

            <label><b>Email</b></label>
            <input type="text" placeholder="Entrez votre email" name="email" required>

            <label><b>Date de Naissance</b></label><br><br>

                <label for="day">Jour:</label>
                <select id="day" name="day">
                    <?php
                    for ($i = 1; $i <= 31; $i++) {
                        echo "<option value=\"$i\">$i</option>";
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
                        echo "<option value=\"$numero\">$nom</option>";
                    }
                    ?>
                </select>
                <label for="year">Année:</label>
                <input type="text1" id="year" name="year" placeholder="YYYY">
                <br>

            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrez le mot de passe" name="password" id="password" required>
            <input type="checkbox" id="ShowPassword" onclick="showPassword()">
            <label for="ShowPassword">Afficher le mot de passe</label>
            <br>

            <label><b>Saissez à nouveau votre mot de passe</b></label>
            <input type="password" placeholder="Entrez le mot de passe" name="password" id="password2" required>
            <input type="checkbox" id="ShowPassword2" onclick="showPassword2()">
            <label for="ShowPassword2">Afficher le mot de passe</label>

            <br>
            <input type="checkbox" name="condition">
            <label for="condition" ><b>J'accepte les conditions générales</b></label>
                
            <input type="submit" id='submit' value='Créer un compte'>
            
            <script src="../script.js"></script>
            </form>
            </div>
    </body>
</html>