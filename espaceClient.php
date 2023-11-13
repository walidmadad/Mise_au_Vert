<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Mise Au Vert</title>
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="icon" type="image/x-icon" href="res/logo.png">
    </head>
    <body>
        <header id="header">
            <div class="navbar">
                <div class="container">
                    <div>
                        <a href="index"><img src="res/logo.png" alt="logo" id="logo"></a>
                    </div>
                    <div>
                        <a class="titre" href="index.html">La Mise Au Vert</a>
                    </div>
                    <div class="navbar_links">
                        <ul class="menu">
                            <li><a>
                                <?php
                                    session_start(); 
                                    $nom = $_SESSION['nom'];
                                    $prenom = $_SESSION['prenom'];
                                    echo $nom.' '.$prenom;
                                ?>
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <section>
            
        </section>
        <script src="script.js"></script>
    </body>
</html>
