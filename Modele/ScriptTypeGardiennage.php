<?php
include_once(realpath(__DIR__ . "/../Controller/Connect.php"));
class ScriptTypeGardiennage
{
    public function afficherTypeGardiennage(){
        $cnx = new Connect();
        $conn = $cnx->connexion();

        if($conn->connect_error){
            die("". $conn->connect_error);
        }
        $sqlstmt = $conn->prepare("SELECT id_TypeGardiennage, libelle FROM TypeGardiennage");
        $sqlstmt->execute();
        $result = $sqlstmt->get_result();
        $option ="";

        while($row = $result->fetch_assoc()){
            $option .= "<option value='" . $row['id_TypeGardiennage'] . "'>".$row['libelle'] . "</option>";

        }
        $sqlstmt->close();
        $conn->close();
        return $option;
    }
}