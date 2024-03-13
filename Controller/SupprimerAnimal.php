<?php
include_once(realpath(__DIR__ . "/../Modele/ScriptAnimal.php"));
$idAnimal = htmlspecialchars($_POST['animal']);
$supp = new ScriptAnimal();
$supp->supprimerUnAnimal($idAnimal);