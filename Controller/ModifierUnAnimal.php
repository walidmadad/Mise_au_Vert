<?php
include_once(realpath(__DIR__ . "/../Modele/ScriptAnimal.php"));
include_once(realpath(__DIR__ ."/Animal.php"));
include_once(realpath(__DIR__ . "/../Modele/ScriptBox.php"));

$nom = $_POST['nom'];
$espece = $_POST['espece'];
$poids = $_POST['poids'];
$age = $_POST['age'];
$regle = $_POST['regle'];
$carnet = $_POST['carnet'];
$vaccin_a_jour = $_POST['vaccin_a_jour'];
$vermifuge_a_jour = $_POST['vermifuge_a_jour'];
$dateFin = $_POST['dateFin'];
$pension = $_POST['pension'];
$type_gardiennage = $_POST['type_gardiennage'];
$id= $_POST['id'];

echo $pension, $type_gardiennage;

$box = new ScriptBox();
$id_box = $box->afficherBox($pension,$type_gardiennage);

$animal = new ScriptAnimal();
$animal->modifierAnimal($id,$nom,$espece,$poids,$age,$regle,$carnet,$vaccin_a_jour,$vermifuge_a_jour,$dateFin,$id_box);
