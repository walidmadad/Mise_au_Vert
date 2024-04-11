<?php
include("../Modele/ScriptEspaceClient.php");

$modifier = new ScriptEspaceClient();
$info = $modifier->getInformationsClient();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = htmlspecialchars($_POST['id']);
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $day = htmlspecialchars($_POST['day']);
    $month = htmlspecialchars($_POST['month']);
    $year = htmlspecialchars($_POST['year']);

    $date_de_naissance = $year.'-'.$month.'-'.$day;

    $clientUpdated = $modifier->modifierInfoClient($id,$nom,$prenom,$year,$month,$day,$email);

    if($clientUpdated) {
        header("location: ../View/EspaceClient/informations_client.php");
    } else {
        echo "Erreur lors de l'enregistrement ";
    }
}
