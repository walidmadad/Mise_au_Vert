<?php
include("../Modele/ScriptEspacePension.php");
$pension_email = $_POST['username'];
$password = $_POST['password'];

$connexion = new ScriptEspacePension();
$connexion->connexionPension($pension_email, $password);

