<?php
include_once(realpath(__DIR__ . "/../Controller/Connect.php"));

class ScriptEspece{
    public function affihcerEspeces(){
        $cnx = new Connect();
        $conn = $cnx->connexion();
        if($conn->connect_error){
            die("". $conn->connect_error);
        }
        $sqlstmt = $conn->prepare("SELECT libelle, id_espece FROM Espece");
        $sqlstmt->execute();

        $result = $sqlstmt->get_result();

        $options = "";

        while ($row = $result->fetch_assoc()) {
            $options .= "<option value='" . $row['id_espece'] . "'>" . $row['libelle'] . "</option>";
        }

        $sqlstmt->close();
        $conn->close();
        return $options;
    }
}