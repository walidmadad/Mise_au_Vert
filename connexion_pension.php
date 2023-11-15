<?php
include("connect.php");
$pension_email = $_POST['username'];
$password = $_POST['password'];

$cnx = new Connect();
$conn = $cnx->connexion();

if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT * FROM pension WHERE email = ?");
$stmt->bind_param("s", $pension_email);

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hashed_password_from_db = $row['password'];

    if (password_verify($password, $hashed_password_from_db)) {
        session_start(); 
        $_SESSION['nom_pension'] = $row['nom_pension'];
        
        header('location: espacePension.php');
    } else {
        echo "Identifiants incorrects";
    }
} else {
    echo "Identifiants incorrects";
}

$stmt->close();

?>
