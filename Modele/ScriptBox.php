<?php
include_once(realpath(__DIR__ . "/../Controller/Connect.php"));
class ScriptBox
{
    public function afficherBox($id_pension, $id_typeGardiennage){
        $cnx = new Connect();
        $conn = $cnx->connexion();

        if($conn->connect_error){
            die("Erreur de connexion à la base de données: ". $conn->connect_error);
        }

        $sqlstmt = $conn->prepare("SELECT id_box FROM box WHERE id_TypeGardiennage = ? AND id_pension = ?");
        $sqlstmt->bind_param("ii", $id_typeGardiennage, $id_pension);
        $sqlstmt->execute();
        $result = $sqlstmt->get_result();

        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $id_box = $row['id_box'];
        } else {
            return -1;
        }

        return $id_box;
    }
}