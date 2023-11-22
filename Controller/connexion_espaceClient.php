<?php
include("../Modele/ScriptEspaceClient.php");

$email = $_POST['username'];
$password = $_POST['password'];

$connexion = new ScriptEspaceClient();
$connexion->ConnexionClient($email, $password);

exit();
?>
