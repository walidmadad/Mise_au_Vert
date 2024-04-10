<?php
include_once(realpath(__DIR__ . "/../Controller/Connect.php"));
include_once(realpath(__DIR__ . "/ScriptEspaceClient.php"));
class ScriptAnimal{
    private $nom, $espece,$id, $poids,$age,$regle,$carnet,$vaccin_a_jour,$vermifuge_a_jour,$dateFin,$id_animal,$id_box;

    public function ajouterAnimal($nom, $espece, $poids,$age,$regle,$carnet,$vaccin_a_jour,$vermifuge_a_jour,$dateFin,$id_box){
        $this->nom = $nom;
        $this->espece = $espece;
        $this->poids = $poids;
        $this->age = $age;
        $this->regle = $regle;
        $this->carnet = $carnet;
        $this->vaccin_a_jour = $vaccin_a_jour;
        $this->vermifuge_a_jour = $vermifuge_a_jour;
        $this->dateFin = $dateFin;
        $this->id_box = $id_box;

        session_start();

        $scriptEspaceClient = new ScriptEspaceClient();
        $this->id = $scriptEspaceClient->getId();

        $cnx = new Connect();
        $conn = $cnx->connexion();
        if($conn->connect_error){
            die("".$conn->connect_error);
        }
        $sqlstmt = $conn->prepare("INSERT INTO animal(nom_animal, id_espece, id_proprietaire) VALUES(?,?,?)");
        $sqlstmt->bind_param("sss",$nom,$espece,$this->id);
        if ($sqlstmt->execute()) {
            $sqlstmt2 = $conn->prepare("SELECT id_Animal FROM animal WHERE nom_animal=?");
            $sqlstmt2->bind_param("s",$nom);
            $sqlstmt2->execute();
            $result = $sqlstmt2->get_result();
            if($result->num_rows >0){
                $row = $result->fetch_assoc();
                $this->id_animal = $row['id_Animal'];
            }
            $dateNow = date('Y-m-d');
            $sqlstmt4 = $conn->prepare("INSERT INTO date(Date) VALUES (?) ON DUPLICATE KEY UPDATE Date = Date");
            $sqlstmt4->bind_param("s", $dateNow);
            $sqlstmt4->execute();

            $date_id = mysqli_insert_id($conn);

            $sqlstmt3 = $conn->prepare("INSERT INTO affectation(animal_id,Poids,Age,Regle,Carnet_Vaccination,Vaccin_a_jour,Vermifuge_a_jour,Date_fin,box_id,Date_debut) VALUES(?,?,?,?,?,?,?,?,?,?)");
            $sqlstmt3->bind_param("isssssssis",$this->id_animal,$poids,$age,$regle,$carnet,$vaccin_a_jour,$vermifuge_a_jour,$dateFin,$id_box,$dateNow);
            if($sqlstmt3->execute()){
                session_start();
                $_SESSION["ajouter"] = "Animal ajouté";
                header('location: ../View/EspaceClient/AjouterUnAnimal.php');
            }
            else {
                session_start();
                $_SESSION["erreur"]= "Un erreur a été survenue, veuillez ressayer plus tard";
                header('location: ../View/EspaceClient/AjouterUnAnimal.php');
            }

        } else {
            session_start();
            $_SESSION["erreur"]= "Un erreur a été survenue, veuillez ressayer plus tard";
            header('location: ../View/EspaceClient/AjouterUnAnimal.php');
        }

    }

    public function modifierAnimal($id_animal, $nom, $espece, $poids, $age, $regle, $carnet, $vaccin_a_jour, $vermifuge_a_jour, $dateFin, $id_box) {
        $this->id_animal = $id_animal;
        $this->nom = $nom;
        $this->espece = $espece;
        $this->poids = $poids;
        $this->age = $age;
        $this->regle = $regle;
        $this->carnet = $carnet;
        $this->vaccin_a_jour = $vaccin_a_jour;
        $this->vermifuge_a_jour = $vermifuge_a_jour;
        $this->dateFin = $dateFin;
        $this->id_box = $id_box;

        session_start();

        $scriptEspaceClient = new ScriptEspaceClient();
        $this->id = $scriptEspaceClient->getId();

        $cnx = new Connect();
        $conn = $cnx->connexion();
        if ($conn->connect_error) {
            die("" . $conn->connect_error);
        }
        $sqlstmt = $conn->prepare("UPDATE animal SET nom_animal=?, id_espece=?, id_proprietaire=? WHERE id_Animal=?");
        $sqlstmt->bind_param("sssi", $nom, $espece, $this->id, $id_animal);
        if ($sqlstmt->execute()) {
            $dateNow = date('Y-m-d');
            $sqlstmt4 = $conn->prepare("INSERT INTO date(Date) VALUES (?) ON DUPLICATE KEY UPDATE Date = Date");
            $sqlstmt4->bind_param("s", $dateNow);
            $sqlstmt4->execute();

            $date_id = mysqli_insert_id($conn);

            $sqlstmt3 = $conn->prepare("UPDATE affectation SET Poids=?, Age=?, Regle=?, Carnet_Vaccination=?, Vaccin_a_jour=?, Vermifuge_a_jour=?, Date_fin=?, box_id=?, Date_debut=? WHERE animal_id=?");
            $sqlstmt3->bind_param("sssssssssi", $poids, $age, $regle, $carnet, $vaccin_a_jour, $vermifuge_a_jour, $dateFin, $id_box, $dateNow, $id_animal);
            if ($sqlstmt3->execute()) {
                session_start();
                $_SESSION["ajouter"] = "Animal modifié";
                header('location: ../View/EspaceClient/liste_animaux.php');
            } else {
                session_start();
                $_SESSION["erreur"] = "Une erreur est survenue, veuillez réessayer plus tard";
                header('location: ../View/EspaceClient/ModifierUnAnimal2.php');
            }
        } else {
            session_start();
            $_SESSION["erreur"] = "Une erreur est survenue, veuillez réessayer plus tard";
            header('location: ../View/EspaceClient/ModifierUnAnimal2.php');
        }
    }

    public function afficherNomAnimaux(){
        $cnx = new Connect();
        $conn = $cnx->connexion();

        $scriptEspaceClient = new ScriptEspaceClient();
        $this->id = $scriptEspaceClient->getId();

        if($conn->connect_error){
            die("". $conn->connect_error);
        }
        $sqlstmt = $conn->prepare("SELECT id_Animal, nom_animal FROM animal WHERE id_proprietaire = ?");
        $sqlstmt->bind_param("i", $this->id);
        $sqlstmt->execute();

        $result = $sqlstmt->get_result();

        $options = "";

        while($row = $result->fetch_assoc()){
            $option .= "<option value='" . $row['id_Animal'] . "'>".$row['nom_animal'] . "</option>";
        }
        $sqlstmt->close();
        $conn->close();
        return $option;
    }
    public function supprimerUnAnimal($id_animal){
        $cnx = new Connect();
        $conn = $cnx->connexion();

        if($conn->connect_error){
            die("".$conn->connect_error);
        }

        $sqlstmtAffectation = $conn->prepare("DELETE FROM affectation WHERE animal_id = $id_animal");
        $sqlstmtAffectation->execute();
        if($sqlstmtAffectation->execute()){
            $sqlstmt = $conn->prepare("DELETE FROM animal WHERE id_Animal = ?");
            $sqlstmt->bind_param("i",$id_animal);
            if($sqlstmt->execute()){
                session_start();
                $_SESSION["supprimer"] = "Animal supprimé";
                header('location: ../View/EspaceClient/SupprimerUnAnimal.php');
            }else {
                session_start();
                $_SESSION["erreur"]= "Un erreur a été survenue, veuillez ressayer plus tard";
                header('location: ../View/EspaceClient/SupprimerUnAnimal.php');
            }
        }

    }

    public function afficherAnimaux(){
        $cnx = new Connect();
        $conn = $cnx->connexion();

        $scriptEspaceClient = new ScriptEspaceClient();
        $this->id = $scriptEspaceClient->getId();

        if($conn->connect_error){
            die("". $conn->connect_error);
        }
        $sqlstmt = $conn->prepare("SELECT * FROM animal WHERE id_proprietaire = ?");
        $sqlstmt->bind_param("i", $this->id);
        $sqlstmt->execute();

        $result = $sqlstmt->get_result();

        $options = "";

        while($row = $result->fetch_assoc()){
            $options .= "<tr><th style='padding: 10px;
                background-color:#eae9e9 ;
                text-align: center;'>" . $row['nom_animal'] . "</th>";
            $id_prop = $row['id_proprietaire'];


            $id_prop = $row['id_espece'];
            $sqlstmt_esp = $conn->prepare("SELECT libelle FROM espece WHERE id_espece = ?");
            $sqlstmt_esp->bind_param("i", $id_prop);
            $sqlstmt_esp->execute();
            $result3 = $sqlstmt_esp->get_result();

            while($row3 = $result3->fetch_assoc()){
                $options .= "<th style='padding: 10px;
                background-color:#eae9e9 ;
                text-align: center;'>" . $row3['libelle'] . "</th>";
            }

            $id_animal = $row['id_Animal'];
            $sqlstmt_affectation = $conn->prepare("SELECT * FROM affectation WHERE animal_id = ?");
            $sqlstmt_affectation->bind_param("i",$id_animal);
            $sqlstmt_affectation->execute();
            $result2 = $sqlstmt_affectation->get_result();


            while($row2 = $result2->fetch_assoc()){
                $options .= "<th style='padding: 10px;
                background-color:#eae9e9 ;
                text-align: center;'>" . $row2['Age'] . "</th>";
                $options .= "<th style='padding: 10px;
                background-color:#eae9e9 ;
                text-align: center;'>" . $row2['Poids'] . "</th>";
                $options .= "<th style='padding: 10px;
                background-color:#eae9e9 ;
                text-align: center;'>" . $row2['Regle'] . "</th>";
                $options .= "<th style='padding: 10px;
                background-color:#eae9e9 ;
                text-align: center;'>" . $row2['Carnet_Vaccination'] . "</th>";
                $options .= "<th style='padding: 10px;
                background-color:#eae9e9 ;
                text-align: center;'>" . $row2['Vaccin_a_jour'] . "</th>";
                $options .= "<th style='padding: 10px;
                background-color:#eae9e9 ;
                text-align: center;'>" . $row2['Vermifuge_a_jour'] . "</th>";
                $id_box = $row2['box_id'];

                $sqlstmt_box = $conn->prepare("SELECT * FROM box WHERE id_box = ?");
                $sqlstmt_box->bind_param("i",$id_box);
                $sqlstmt_box->execute();
                $result4 = $sqlstmt_box->get_result();

                while($row4 = $result4->fetch_assoc()){

                    $sqlstmt_pension = $conn->prepare("SELECT * FROM pension WHERE id_pension = ?");
                    $sqlstmt_pension->bind_param("i",$row4['id_pension']);
                    $sqlstmt_pension->execute();
                    $result5 = $sqlstmt_pension->get_result();
                    while($row5 = $result5->fetch_assoc()){
                        $options .= "<th style='padding: 10px;
                    background-color:#eae9e9 ;
                    text-align: center;'>" . $row5['nom_pension'] . "</th>";
                    }

                    $sqlstmt_typegardiennage = $conn->prepare("SELECT * FROM typegardiennage WHERE id_TypeGardiennage=?");
                    $sqlstmt_typegardiennage->bind_param("i",$row4['id_TypeGardiennage']);
                    $sqlstmt_typegardiennage->execute();
                    $result6= $sqlstmt_typegardiennage->get_result();
                    while($row6 = $result6->fetch_assoc()){
                        $options .= "<th style='padding: 10px;
                    background-color:#eae9e9 ;
                    text-align: center;'>" . $row6['Libelle'] . "</th>";
                    }
                }

                $options .= "<th style='padding: 10px;
                background-color:#eae9e9 ;
                text-align: center;'>" . $row2['Date_fin'] . "</th></tr>";
            }


        }

        $sqlstmt->close();
        $conn->close();
        return $options ;
    }

}