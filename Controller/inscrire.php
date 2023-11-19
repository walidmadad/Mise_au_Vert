
<?php
include("../Modele/ScriptEspaceClient.php");
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$date_de_naissance = $_POST['date_de_naissance'];
$password_utilisateur = $_POST['password'];

$password_hasher = password_hash($password_utilisateur, PASSWORD_DEFAULT);

$Create = new ScriptEspaceClient();
$Create->CreateClient($nom, $prenom, $email, $password_hasher, $date_de_naissance);
?>
