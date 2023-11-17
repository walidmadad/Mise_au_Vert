<?php 
include("Controlleur/connect.php");
class ScriptEspacePension{
    private $nom_pension;
    private $nom_responsable;
    private $ville_pension;
    private $adresse_pension;
    private $telephone_pension;
    private $email;
    private $password;
    public function createAccount($nom_pension, $nom_responsable, $ville_pension, $adresse_pension, $telephone_pension, $email, $password){
        $this->nom_pension = $nom_pension;
        $this->nom_responsable = $nom_responsable;
        $this->ville_pension = $ville_pension;
        $this->adresse_pension = $adresse_pension;
        $this->telephone_pension = $telephone_pension;
        $this->email = $email;
        $this->password = $password;
    
        $cnx = new Connect();
        $conn = $cnx->connexion();

        if($conn->connect_error) {
            die("La connexio à échoué : ". $conn->connect_error);
        }

        $stmt = $conn->prepare("INSERT INTO pension (nom_pension, responsable_pension, email, telephone_pension, adresse_pension, ville_pension, password) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nom_pension, $nom_responsable, $email, $telephone_pension, $adresse_pension,$ville_pension, $password);
    
        if($stmt->execute()) {  
            header("location: EspacePension.html");
        } else {
            echo "Erreur Lors de l'enregistrement : ".$stmt->error;
        }

        $stmt->close();
        $conn->close();
    }

    public function connexionPension($email, $password){
        $this->email = $email;
        $this->password = $password;

        $cnx = new Connect();
        $conn = $cnx->connexion();

        if($conn->connect_error) {
            die("La connexio à échoué : ". $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT * FROM pension WHERE email = '?' ");
        $stmt->bind_param("s", $email);

        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashed_password_from_db = $row['password'];
        
            if (password_verify($password, $hashed_password_from_db)) {

                header('location: ../espacePension.php');
            } else {
                echo "Identifiants incorrects";
            }
        } else {
            echo "Identifiants incorrects";
        }

    }

}