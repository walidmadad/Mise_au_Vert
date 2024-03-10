
<?php
include("../Modele/ScriptEspaceClient.php");
$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$email = htmlspecialchars($_POST['email']);
$day = htmlspecialchars($_POST['day']);
$month = htmlspecialchars($_POST['month']);
$year = htmlspecialchars($_POST['year']);
$ville = htmlspecialchars($_POST['ville']);
$CP = htmlspecialchars($_POST['CP']);
$tel = htmlspecialchars($_POST['tel']);

$adresse = $CP.', '.$ville;
$date_de_naissance = $year.'-'.$month.'-'.$day;
$password_utilisateur = htmlspecialchars($_POST['password']);

$password_hasher = password_hash($password_utilisateur, PASSWORD_DEFAULT);

$Create = new ScriptEspaceClient();
$Create->CreateClient($nom, $prenom, $email, $password_hasher, $date_de_naissance, $adresse, $tel);

