<?php 
$email = $_POST['username'];
$password = $_POST['password'];
$password_hasher = md5($password);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "la_mise_au_vert";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT * FROM information_account_client WHERE email_client = ? AND password_client = ?");
$stmt->bind_param("ss", $email, $password_hasher);

$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    header('location: espaceClient.php');
} else {
    echo "Identifiants incorrects";
}

$stmt->close();
$conn->close();

?>