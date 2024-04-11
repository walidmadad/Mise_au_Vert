<?php
include_once(realpath(__DIR__ . "/../Controller/Connect.php"));
class ScriptBox
{
    private $superficie;
    private $tarif;
    private $id_box;
    public function afficherBox($id_pension, $id_typeGardiennage){
        $cnx = new Connect();
        $conn = $cnx->connexion();

        if($conn->connect_error){
            die("". $conn->connect_error);
        }

        $sqlstmt = $conn->prepare("SELECT id_box FROM box WHERE id_TypeGardiennage = ? AND id_pension = ?");
        $sqlstmt->bind_param("ii",$id_typeGardiennage,$id_pension);
        $sqlstmt->execute();
        $result = $sqlstmt->get_result();
        if($result->num_rows >0){
            $row = $result->fetch_assoc();
            $this->id_box = $row['id_box'];
        } else {

            return -1;
        }

        return $this->id_box;
    }


    public function getTarifSuperficie($id_pension, $id_typeGardiennage) {
        $cnx = new Connect();
        $conn = $cnx->connexion();
        if ($conn->connect_error) {
            die("La connexion a échoué : " . $conn->connect_error);
        }

        // Requête pour récupérer tarifs
        $sqlTarif = $conn->prepare("SELECT Tarif FROM tarification WHERE Type_Gardiennage_id = ? AND Pension_id = ?");
        $sqlTarif->bind_param("ii", $id_typeGardiennage, $id_pension);
        $sqlTarif->execute();
        $resultTarif = $sqlTarif->get_result();

        $tarif = null;
        if ($resultTarif->num_rows > 0) {
            while ($row = $resultTarif->fetch_assoc()) {
                $tarif = $row['Tarif'];
            }
        }

        // Requête pour récupérer superficie
        $sqlSuperficie = $conn->prepare("SELECT superficie FROM box WHERE id_TypeGardiennage = ? AND id_pension = ?");
        $sqlSuperficie->bind_param("ii", $id_typeGardiennage, $id_pension);
        $sqlSuperficie->execute();
        $resultSuperficie = $sqlSuperficie->get_result();

        $superficie = null;
        if ($resultSuperficie->num_rows > 0) {
            while ($row = $resultSuperficie->fetch_assoc()) {
                $superficie = $row['superficie'];
            }
        }

        $typesBox = array(
            'tarif' => $tarif,
            'superficie' => $superficie
        );

        $conn->close();

        return $typesBox;
    }


    public function ModifierBox($superficie, $tarif, $id_type_gardiennage, $id_pension){

        $cnx = new Connect();
        $conn = $cnx->connexion();

        if($conn->connect_error) {
            die("". $conn->connect_error);
        }
        $stmt_tarification = $conn->prepare("UPDATE tarification SET Tarif = ? WHERE Type_Gardiennage_id = ? AND Pension_id = ?");
        $stmt_tarification->bind_param("iii", $tarif, $id_type_gardiennage, $id_pension);

        $stmt_box = $conn->prepare("UPDATE box SET superficie = ? WHERE id_TypeGardiennage = ? AND id_pension =?");
        $stmt_box->bind_param("iii", $superficie, $id_type_gardiennage, $id_pension);

        $tarif_updated = $stmt_tarification->execute();
        $superficie_updated = $stmt_box->execute();

        // Vérifier si les mises à jour sont réussies
        if($tarif_updated && $superficie_updated) {
            header("location: ../View/EspacePension/GestionBox.php");
        } else {
            echo "Erreur lors de l'enregistrement : ". $conn->error;
        }

        // Fermer les déclarations et la connexion
        $stmt_tarification->close();
        $stmt_box->close();
        $conn->close();
    }

}