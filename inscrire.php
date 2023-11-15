
<?php
include("connect.php");
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$date_de_naissance = $_POST['date_de_naissance'];
$password_utilisateur = $_POST['password'];

$password_hasher = password_hash($password_utilisateur, PASSWORD_DEFAULT);

$cnx = new Connect();
$conn = $cnx->connexion();

if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}
$stmt = $conn->prepare("INSERT INTO information_account_client (nom_client, prenom_client, email_client, date_naissance_client, password_client) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nom, $prenom, $email, $date_de_naissance, $password_hasher);

if ($stmt->execute()) {
    header('location: espaceClient.html');
} else {
    echo "Erreur lors de l'enregistrement : " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
