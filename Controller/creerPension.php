<?php 
include("../Modele/ScriptEspacePension.php");

$nom_pension = htmlspecialchars($_POST["nom_pension"]);
$nom_responsable = htmlspecialchars($_POST["nom_responsable"]);
$ville = htmlspecialchars($_POST["ville"]);
$adresse = htmlspecialchars($_POST["Adresse"]);
$Telephone = htmlspecialchars($_POST["Telephone"]);
$email = htmlspecialchars($_POST["email"]);
$password= htmlspecialchars($_POST["password"]);


$password = password_hash($password, PASSWORD_DEFAULT);

$compte = new ScriptEspacePension();
$compte->createAccount($nom_pension, $nom_responsable, $ville, $adresse, $Telephone, $email, $password);
