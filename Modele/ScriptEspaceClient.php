<?php
include_once(realpath(__DIR__ . '/../Controller/Connect.php'));


class ScriptEspaceClient{
    private $id,$nom,$prenom,$email,$date,$date_de_naissance;

    private $nom_client;
    private $id_client;
    private $prenom_client;
    private $email_client;
    private $password_client;
    private $date_naissance_client;
    private $adresse_client;
    private $tel_client;

    public function CreateClient($nom_client,$prenom_client,$email_client,$password_client,$date_naissance_client, $adresse_client, $tel_client){
        $this->nom_client = $nom_client;
        $this->prenom_client = $prenom_client;
        $this->email_client = $email_client;
        $this->password_client = $password_client;
        $this->date_naissance_client = $date_naissance_client;
        $this->tel_client = $tel_client;
        $this->adresse_client = $adresse_client;

        $cnx = new Connect();
        $conn = $cnx->connexion();

        if($conn->connect_error) {
            die("". $conn->connect_error);
        }

        $sqlStmt = $conn->prepare("INSERT INTO proprietaire(nom_Propietaire, prenom_Propietaire, email_Proprietaire, password_proprietaire, date_naissance_proprietaire, TELEPHONE_Propietaire, Adresse_Propietaire) VALUES(?,?,?,?,?,?,?)");
        $sqlStmt->bind_param("sssssss",$nom_client, $prenom_client, $email_client, $password_client, $date_naissance_client, $tel_client, $adresse_client);

        if($sqlStmt->execute()) {  
            header("location: ../View/espaceClient.php");
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

        $stmt = $conn->prepare("SELECT * FROM proprietaire WHERE email_Proprietaire = ?");
        $stmt->bind_param("s", $email_client);

        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $hashed_password_from_db = $row['password_proprietaire'];


            if (password_verify($password_client, $hashed_password_from_db)) {
                session_start();
                $_SESSION['nom_client'] = $row['nom_Propietaire'];
                $_SESSION['prenom_client'] = $row['prenom_Propietaire'];
                $_SESSION['email_client'] = $row['email_Proprietaire'];
                $_SESSION['date_naissance_client'] = $row['date_naissance_proprietaire'];
                $_SESSION['password'] = $row['password_proprietaire'];
                $_SESSION['id_client'] = $row['id_proprietaire'];

                header('location: ../View/EspaceClient/espaceClient.php');

            } else {
                session_start();
                $_SESSION['erreur'] = "E-mail ou mot de passe incorrect";
                header('location: ../View/espaceClient.php');
            }
        } else {
            session_start();
            $_SESSION['erreur'] = "E-mail ou mot de passe incorrect";
            header('location: ../View/espaceClient.php');
        }
        $stmt->close();
    }

    public function getInformationsClient(){
        $id = isset($_SESSION['id_client']) ? $_SESSION['id_client'] : null;
        $nom = isset($_SESSION['nom_client']) ? $_SESSION['nom_client'] : null;
        $prenom = isset($_SESSION['prenom_client']) ? $_SESSION['prenom_client'] : null;
        $email = isset($_SESSION['email_client']) ? $_SESSION['email_client'] : null;
        $DateDeNaissance = isset($_SESSION['date_naissance_client']) ? $_SESSION['date_naissance_client'] : null;

        $year = $this->getYear($DateDeNaissance);
        $month = $this->getMonth($DateDeNaissance);
        $day = $this->getDay($DateDeNaissance);

        $info = array(
            'id' => $id,
            'nom' => $nom,
            'prenom' => $prenom,
            'email'=> $email,
            'year' =>$year,
            "month" =>$month,
            'day' => $day
        );
        return $info;
    }
    public function setInformationsClient($id, $nom, $prenom, $email, $date_naissance) {
        $_SESSION['id_client'] = $id;
        $_SESSION['nom_client'] = $nom;
        $_SESSION['prenom_client'] = $prenom;
        $_SESSION['email_client'] = $email;
        $_SESSION['date_naissance_client'] = $date_naissance;
    }

    private function getYear($date) {
        if ($date !== null) {
            return date('Y', strtotime($date));
        }
        return null;
    }

    private function getMonth($date) {
        if ($date !== null) {
            return date('m', strtotime($date));
        }
        return null;
    }

    private function getDay($date) {
        if ($date !== null) {
            return date('d', strtotime($date));
        }
        return null;
    }
    public function modifierInfoClient($id, $nom, $prenom, $year, $month, $day, $email){

        $cnx = new Connect();
        $conn = $cnx->connexion();
        if($conn->connect_error) {
            die("". $conn->connect_error);
        }
        $dateNaissance = $year . "-" . $month ."-" .$day;
        $sqlStmt = $conn->prepare("UPDATE proprietaire SET nom_Propietaire = ?, prenom_Propietaire = ?, email_Proprietaire = ?, date_naissance_proprietaire = ? WHERE id_proprietaire = ?");
        $sqlStmt->bind_param('ssssi',$nom,$prenom,$email,$dateNaissance,$id);
        $clientUpdated = $sqlStmt->execute();
        return $clientUpdated;
    }

}