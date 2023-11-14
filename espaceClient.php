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
        <section id="menuEspaceClient">
            <div class="navbar_espaceClient">
                <div class="container_espaceClient"> 
                    <div class="navbar_links_espaceClient">
                        <ul class="menu_espaceClient">
                        <li><img src="res/person-profile-icon.png" alt="logo" id="logo"><li>
                            <li><a>
                                <?php
                                    session_start(); 
                                    $nom = $_SESSION['nom'];
                                    $prenom = $_SESSION['prenom'];
                                    echo $nom.' '.$prenom;
                                ?>
                            </a></li>
                            <br><br><br>
                            <li><a href="informations_client.php">Profile</a></li><br><br>
                            <li><a href="liste_animaux.php">Liste des animaux</a></li><br><br>
                            <li><a href="">Historique</a></li><br><br>
                            <li><a href="">Réservation</a></li><br><br>
                            <li><a href="">Paramétres</a></li><br><br>
                            <li><a href="#">Sécurité et Confidentialité</a></li><br><br>
                            <li><a href="">Se déconecter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <section class="espaceClient-1">
            <h1>Espace Client</h1><hr>
            <div class="container_espaceClient2">
                <div class="side-by-side">
                    <div class="events">
                       <h2>Événements à Venir</h2>
                        <p>Découvrez nos prochains événements spéciaux et journées portes ouvertes. Rejoignez-nous pour des moments mémorables avec nos pensionnaires.</p>
                        <a href="#upcoming-events">En savoir plus sur nos événements</a>
                   </div>

                    <div class="customer-support">
                        <h2>Soutien Client</h2>
                        <p>Notre équipe de support client est là pour répondre à vos questions et vous aider dans le processus de réservation. Contactez-nous à tout moment pour une assistance rapide.</p>
                        <a href="#contact-support">Contacter le support client</a>
                    </div>
                    <div class="side-by-side">
                </div>
            </div>
            <div class="container_espaceClient2">
                <div class="side-by-side">
                    <div class="partnerships">
                        <h2>Partenaires ou Collaborations</h2>
                        <p>Découvrez nos partenaires et collaborations qui contribuent à offrir les meilleurs services possibles à nos clients et leurs animaux de compagnie.</p>
                        <a href="#partnerships">En savoir plus sur nos partenaires</a>
                    </div>
                </div>
            </div>
        </section>
        <script src="script.js"></script>
    </body>
</html>
