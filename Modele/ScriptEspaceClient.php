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

}