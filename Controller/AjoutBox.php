<?php
include("../Modele/ScriptBox.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Traitement du formulaire
    $tarif_box = htmlspecialchars($_POST["tarifs"]);
    $superficie = htmlspecialchars($_POST["superficie"]);
    $id_type_gardiennage = htmlspecialchars($_POST["id_type_gardiennage"]);
    $id_pension = htmlspecialchars($_POST['id_pension']);

    $compte = new ScriptBox();
    $compte->ModifierBox($superficie, $tarif_box, $id_type_gardiennage, $id_pension);
} else if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Traitement de la requête AJAX
    $id_pension = htmlspecialchars($_GET['id_pension']);
    $id_type_gardiennage = htmlspecialchars($_GET['id_typeGardiennage']);

    $compte = new ScriptBox();
    $result = $compte->getTarifSuperficie($id_pension, $id_type_gardiennage);

    header('Content-Type: application/json');
    echo json_encode($result);
}
?>
