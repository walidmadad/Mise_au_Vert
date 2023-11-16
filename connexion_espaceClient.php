<?php
include("Controller/connect.php");

$email = $_POST['username'];
$password = $_POST['password'];

$cnx = new Connect();
$conn = $cnx->connexion();

if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT * FROM information_account_client WHERE email_client = ?");
$stmt->bind_param("s", $email);

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashed_password_from_db = $row['password_client'];

    if (password_verify($password, $hashed_password_from_db)) {
        session_start(); 

        $_SESSION['nom'] = $row['nom_client'];
        $_SESSION['prenom'] = $row['prenom_client'];
        header('location: espaceClient.php');
    } else {
        echo "Identifiants incorrects";
    }
} else {
    echo "Identifiants incorrects";
}

$stmt->close();

?>
