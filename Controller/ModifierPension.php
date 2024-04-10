<?php

include("../Modele/ScriptEspacePension.php");

$nom_pension = htmlspecialchars($_POST["nom"]);
$nom_responsable = htmlspecialchars($_POST["responsable"]);
$ville = htmlspecialchars($_POST["ville"]);
$adresse = htmlspecialchars($_POST["adresse"]);
$Telephone = htmlspecialchars($_POST["telephone"]);
$email = htmlspecialchars($_POST["email"]);

$compte = new ScriptEspacePension();
$compte->ModifierAccount($nom_pension, $nom_responsable, $ville, $adresse, $Telephone, $email);

?>