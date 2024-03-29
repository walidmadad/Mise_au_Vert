<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Mise Au Vert</title>
        <link rel="stylesheet" href="../style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/x-icon" href="../res/logo.png">
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
                            <li><a class="EspaceClient" href="espaceClient.html">Espace Client</a></li>
                            <li><a class="Contact" href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <section id="container-connexion">
            <form action="../Controller/connexion_espaceClient.php" method="POST">
            <h1>Connexion</h1>
            <br>

            <label><b>E-mail</b></label>
            <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>

            <label><b>Mot de passe</b></label>
            <input type="password" placeholder="Entrer le mot de passe" name="password" id="password" required>
           
            <input type="checkbox" id="ShowPassword" onclick="showPassword()">
            <label for="ShowPassword">Afficher le mot de passe</label>
            <input type="submit" id='submit' value='Connexion' >
            <a href="inscrireClient.php" id="create">S'isncrire</a>
                <a><?php
                    session_start();
                    include_once(realpath(__DIR__ . '/../Modele/ScriptEspaceClient.php'));
                    if (isset($_SESSION['erreur'])) {
                        $erreur = $_SESSION['erreur'];
                        echo "<p style='color:red'>$erreur</p>";
                        unset($_SESSION['erreur']); // Supprimer la variable d'erreur après l'avoir affichée
                    }
                    ?>

                </a>
            
            </form>
            
        </section>
        <script src="../script.js"></script>
    </body>
</html>