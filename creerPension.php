<?php 
include("connect.php");

$nom_pension = $_POST["nom_pension"];
$nom_responsable = $_POST["nom_responsable"];
$ville = $_POST["ville"];
$adresse = $_POST["Adresse"];
$Telephone = $_POST["Telephone"];
$email = $_POST["email"];
$password= $_POST["password"];

$password = password_hash($password, PASSWORD_DEFAULT);

$cnx = new Connect();
$conn = $cnx->connexion();

if($conn->connect_error) {
    die("La connexio à échoué : ". $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO pension (nom_pension, responsable_pension, email, telephone_pension, adresse_pension, ville_pension, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("sssssss", $nom_pension, $nom_responsable, $email, $Telephone, $adresse, $ville, $password);

if($stmt->execute()) {  
    header("location: EspacePension.html");
} else {
    echo "Erreur Lors de l'enregistrement : ".$stmt->error;
}
$stmt->close();
$conn->close();
?>