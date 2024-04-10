<?php
require_once('Connect.php');
class Animal
{
    function getIdBox($id){
        $cnx = new Connect();
        $conn = $cnx->connexion();
        $sqlstmt = $conn->prepare("SELECT box_id FROM affectation WHERE animal_id = ?");
        $sqlstmt->bind_param("i", $id);
        $sqlstmt->execute();
        $result = $sqlstmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['box_id'];
        } else {
            return null;
        }
    }
    function getIdPension($id){
        $cnx = new Connect();
        $conn = $cnx->connexion();
        $sqlstmt = $conn->prepare("SELECT id_pension FROM box WHERE id_box = ?");
        $sqlstmt->bind_param("i", $id);
        $sqlstmt->execute();
        $result = $sqlstmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['id_pension'];
        } else {
            return null;
        }
    }
    function getIdTypeGardiennage($id){
        $cnx = new Connect();
        $conn = $cnx->connexion();
        $sqlstmt = $conn->prepare("SELECT id_TypeGardiennage FROM box WHERE id_box = ?");
        $sqlstmt->bind_param("i", $id);
        $sqlstmt->execute();
        $result = $sqlstmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['id_TypeGardiennage'];
        } else {
            return null;
        }

    }
    function getIdEspece($id){
        $cnx = new Connect();
        $conn = $cnx->connexion();
        $sqlstmt = $conn->prepare("SELECT id_espece FROM animal WHERE id_Animal = ?");
        $sqlstmt->bind_param("i", $id);
        $sqlstmt->execute();
        $result = $sqlstmt->get_result();
        $row = $result->fetch_assoc();
        return $row['id_espece'];

    }

    function getPension($id){
        $cnx = new Connect();
        $conn = $cnx->connexion();
        $sqlstmt = $conn->prepare("SELECT nom_pension FROM pension WHERE id_pension = ?");
        $sqlstmt->bind_param("i", $id);
        $sqlstmt->execute();
        $result = $sqlstmt->get_result();
        $row = $result->fetch_assoc();
        return $row['nom_pension'];
    }
    function getTypeGardiennage($id){
        $cnx = new Connect();
        $conn = $cnx->connexion();
        $sqlstmt = $conn->prepare("SELECT Libelle FROM typegardiennage WHERE id_TypeGardiennage = ?");
        $sqlstmt->bind_param("i", $id);
        $sqlstmt->execute();
        $result = $sqlstmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['Libelle'];
        } else {
            return null;
        }
    }
    function getNomAnimal($id){
        $cnx = new Connect();
        $conn = $cnx->connexion();
        $sqlstmt = $conn->prepare("SELECT nom_animal FROM animal WHERE id_Animal = ?");
        $sqlstmt->bind_param("i", $id);
        $sqlstmt->execute();
        $result = $sqlstmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['nom_animal'];
        } else {
            return null;
        }
    }

    function getPoids($id){
        $cnx = new Connect();
        $conn = $cnx->connexion();
        $sqlstmt = $conn->prepare("SELECT Poids FROM affectation WHERE animal_id = ?");
        $sqlstmt->bind_param("i", $id);
        $sqlstmt->execute();
        $result = $sqlstmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['Poids'];
        } else {
            return null;
        }
    }
    function getAge($id){
        $cnx = new Connect();
        $conn = $cnx->connexion();
        $sqlstmt = $conn->prepare("SELECT Age FROM affectation WHERE animal_id = ?");
        $sqlstmt->bind_param("i", $id);
        $sqlstmt->execute();
        $result = $sqlstmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['Age'];
        } else {
            return null;
        }
    }
    function getCarnet($id){
        $cnx = new Connect();
        $conn = $cnx->connexion();
        $sqlstmt = $conn->prepare("SELECT Carnet_Vaccination FROM affectation WHERE animal_id = ?");
        $sqlstmt->bind_param("i", $id);
        $sqlstmt->execute();
        $result = $sqlstmt->get_result();
        $row = $result->fetch_assoc();
        return $row['Carnet_Vaccination'];
    }
    function getVaccin($id){
        $cnx = new Connect();
        $conn = $cnx->connexion();
        $sqlstmt = $conn->prepare("SELECT Vaccin_a_jour FROM affectation WHERE animal_id = ?");
        $sqlstmt->bind_param("i", $id);
        $sqlstmt->execute();
        $result = $sqlstmt->get_result();
        $row = $result->fetch_assoc();
        return $row['Vaccin_a_jour'];
    }
    function getVermifuge($id){
        $cnx = new Connect();
        $conn = $cnx->connexion();
        $sqlstmt = $conn->prepare("SELECT Vermifuge_a_jour FROM affectation WHERE animal_id = ?");
        $sqlstmt->bind_param("i", $id);
        $sqlstmt->execute();
        $result = $sqlstmt->get_result();
        $row = $result->fetch_assoc();
        return $row['Vermifuge_a_jour'];
    }
    function getRegle($id){
        $cnx = new Connect();
        $conn = $cnx->connexion();
        $sqlstmt = $conn->prepare("SELECT Regle FROM affectation WHERE animal_id = ?");
        $sqlstmt->bind_param("i", $id);
        $sqlstmt->execute();
        $result = $sqlstmt->get_result();
        $row = $result->fetch_assoc();
        return $row['Regle'];
    }
    function getDateFin($id){
        $cnx = new Connect();
        $conn = $cnx->connexion();
        $sqlstmt = $conn->prepare("SELECT Date_fin FROM affectation WHERE animal_id = ?");
        $sqlstmt->bind_param("i", $id);
        $sqlstmt->execute();
        $result = $sqlstmt->get_result();
        $row = $result->fetch_assoc();
        return $row['Date_fin'];
    }

    function getEspece($id)
    {
        $cnx = new Connect();
        $conn = $cnx->connexion();
        $sqlstmt = $conn->prepare("SELECT libelle FROM espece WHERE id_espece = ?");
        $sqlstmt->bind_param("i", $id);
        $sqlstmt->execute();
        $result = $sqlstmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row['libelle'];
        } else {
            return null;
        }

    }
}