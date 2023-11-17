<?php 
include("Modele/ScriptEspacePension.php");

$nom_pension = $_POST["nom_pension"];
$nom_responsable = $_POST["nom_responsable"];
$ville = $_POST["ville"];
$adresse = $_POST["Adresse"];
$Telephone = $_POST["Telephone"];
$email = $_POST["email"];
$password= $_POST["password"];

$password = password_hash($password, PASSWORD_DEFAULT);

$compte = new ScriptEspacePension();
$compte->createAccount($nom_pension, $nom_responsable, $ville, $adresse, $Telephone, $email, $password);
?>