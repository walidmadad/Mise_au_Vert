<?php
include("../Modele/ScriptEspaceClient.php");

$email = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

$connexion = new ScriptEspaceClient();
$connexion->ConnexionClient($email, $password);

exit();

