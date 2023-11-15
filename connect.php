<?php 
class Connect{
    private $conn ;
    public function connexion(){
        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "la_mise_au_vert";

        $conn = new mysqli($server,$username,$password,$dbname);
        return $conn;
    }
}