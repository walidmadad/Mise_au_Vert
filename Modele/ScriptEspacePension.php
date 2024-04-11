<?php
include_once(realpath(__DIR__ . '/../Controller/Connect.php'));

class ScriptEspacePension{
    private $nom_pension;
    private $nom_responsable;
    private $ville_pension;
    private $adresse_pension;
    private $telephone_pension;
    private $email;
    private $password;
    private $id_pension;


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
        $stmt->bind_param("sssssss", $nom_pension, $nom_responsable, $email, $telephone_pension, $adresse_pension,$ville_pension, $password);

        if($stmt->execute()) {
            header("location: ../View/EspacePension/EspacePensionConnecter.php");
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
            die("La connexion a échoué : ". $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT * FROM pension WHERE email = ?");
        $stmt->bind_param("s", $email);

        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashed_password_from_db = $row['password'];

            if (password_verify($password, $hashed_password_from_db)) {
                session_start();
                $_SESSION['id_pension'] = $row['id_pension'];
                $this->nom_pension = $row['nom_pension'];
                $this->nom_responsable = $row['responsable_pension'];
                $this->adresse_pension = $row['adresse_pension'];
                $this->ville_pension = $row['ville_pension'];
                $this->email = $row['email'];
                $this->telephone_pension = $row['telephone_pension'];
                $this->id_pension = $row['id_pension'];


                header('location: ../View/EspacePension/EspacePensionConnecter.php');
            } else {
                echo "Identifiants incorrects";
            }
        } else {
            echo "Identifiants incorrects";
        }
        $stmt->close();
    }

    public function getNomPension(){
        $nomPension = isset($_SESSION['nom_pension']) ? $_SESSION['nom_pension'] : null;
        return $nomPension;
    }
    public function afficherPension(){
        $cnx = new Connect();
        $conn = $cnx->connexion();

        if($conn->connect_error){
            die("". $conn->connect_error);
        }
        $sqlstmt = $conn->prepare("SELECT nom_pension, id_pension FROM pension");
        $sqlstmt->execute();
        $result = $sqlstmt->get_result();
        $option ="";

        while($row = $result->fetch_assoc()){
            $option .= "<option value='" . $row['id_pension'] . "'>".$row['nom_pension'] . "</option>";
        }
        $sqlstmt->close();
        $conn->close();
        return $option;
    }




    public function updateResponsableInfo($idPension, $nomResponsable, $adresseResponsable, $telephoneResponsable, $emailResponsable) {
        $cnx = new Connect();
        $conn = $cnx->connexion();

        if ($conn->connect_error) {
            die("La connexion a échoué : " . $conn->connect_error);
        }

        $stmt = $conn->prepare("UPDATE pension SET responsable_pension = ?, adresse_responsable = ?, telephone_responsable = ?, email_responsable = ? WHERE id_pension = ?");
        $stmt->bind_param("ssssi", $nomResponsable, $adresseResponsable, $telephoneResponsable, $emailResponsable, $idPension);

        if ($stmt->execute()) {
            header("Location: ../View/EspacePension/EspacePensionConnecter.php");
        } else {
            echo "Erreur lors de la mise à jour des informations du responsable : " . $stmt->error;
        }

        $stmt->close();
        $conn->close();
    }






    public function getPensionInfo(){
        session_start();
        $idPension = $_SESSION['id_pension'];
        $cnx = new Connect();
        $conn = $cnx->connexion();
        if($conn->connect_error) {
            die("La connexion a échoué : ". $conn->connect_error);
        }

        $stmt = $conn->prepare("SELECT * FROM pension WHERE id_pension = ?");

        $stmt->bind_param("i", $idPension);

        $stmt->execute();
        $result = $stmt->get_result();

        // Vérifier s'il y a des résultats
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $pensionInfo = array(
                'nom' => $row['nom_pension'],
                'responsable' => $row['responsable_pension'],
                'adresse' => $row['adresse_pension'],
                'ville' => $row['ville_pension'],
                'email' => $row['email'],
                'telephone' => $row['telephone_pension'],
                'id_pension' => $row['id_pension']
            );
        } else {
            $pensionInfo = array();
        }

        $stmt->close();
        $conn->close();



        return $pensionInfo;
    }
    public function ModifierAccount ($nom_pension, $nom_responsable, $ville_pension, $adresse_pension, $telephone_pension, $email){
        $this->nom_pension = $nom_pension;
        $this->nom_responsable = $nom_responsable;
        $this->ville_pension = $ville_pension;
        $this->adresse_pension = $adresse_pension;
        $this->telephone_pension = $telephone_pension;
        $this->email = $email;

        session_start();
        $id_pension = $_SESSION['id_pension'];
        $cnx = new Connect();
        $conn = $cnx->connexion();

        if($conn->connect_error) {
            die("La connexio à échoué : ". $conn->connect_error);
        }

        $stmt = $conn->prepare("UPDATE pension SET nom_pension = ?, responsable_pension = ?, email = ?, telephone_pension = ?, adresse_pension = ?, ville_pension = ? WHERE id_pension = ?");
        $stmt->bind_param("ssssssi", $nom_pension, $nom_responsable, $email, $telephone_pension, $adresse_pension, $ville_pension, $id_pension);

        if($stmt->execute()) {
            header("location: ../View/EspacePension/informations_pension.php");
        } else {
            echo "Erreur Lors de l'enregistrement : ".$stmt->error;
        }

        $stmt->close();
        $conn->close();
    }

}