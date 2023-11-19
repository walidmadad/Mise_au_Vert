<?php
include("../Controller/connect.php");

class ScriptEspaceClient{
    private $nom_client;
    private $prenom_client;
    private $email_client;
    private $password_client;
    private $date_naissance_client;

    public function CreateClient($nom_client,$prenom_client,$email_client,$password_client,$date_naissance_client){
        $this->nom_client = $nom_client;
        $this->prenom_client = $prenom_client;
        $this->email_client = $email_client;
        $this->password_client = $password_client;
        $this->date_naissance_client = $date_naissance_client;

        $cnx = new Connect();
        $conn = $cnx->connexion();

        if($conn->connect_error) {
            die("". $conn->connect_error);
        }

        $sqlStmt = $conn->prepare("INSERT INTO information_account_client (nom_client, prenom_client, email_client, password_client, date_naissance_client) VALUES(?,?,?,?,?)");
        $sqlStmt->bind_param("sssss",$nom_client, $prenom_client, $email_client, $password_client, $date_naissance_client);

        if($sqlStmt->execute()) {  
            header("location: ../EspacePension.html");
        } else {
            echo "Erreur Lors de l'enregistrement : ".$sqlStmt->error;
        }

        $sqlStmt->close();
        $conn->close();
    }

    public function ConnexionClient($email_client, $password_client){
        $this->email_client = $email_client;
        $this->password_client = $password_client;

        $cnx = new Connect();
        $conn = $cnx->connexion();

        if ($conn->connect_error) {
            die("La connexion a échoué : " . $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT * FROM information_account_client WHERE email_client = ?");
        $stmt->bind_param("s", $email_client);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashed_password_from_db = $row['password_client'];

            if (password_verify($password_client, $hashed_password_from_db)) {
                header('location: ../View/EspaceClient/espaceClient.php');
            } else {
                echo "Identifiants incorrects";
            }
        } else {
            echo "Identifiants incorrects";
        }

        $stmt->close();

    }

}