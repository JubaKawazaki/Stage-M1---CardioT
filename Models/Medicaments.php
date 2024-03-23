<?php

class Medicaments{


    static public function getAll(){
        $DB = DB::connect();
        $query = " SELECT * FROM Medicaments order by ID_Medicament DESC";
        $stmt = $DB->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    static public function Ajouter($data){
        $DB = DB::connect();
        $query = "INSERT INTO `medicaments`(`ID_Medicament`, `Nom`, `Description`) 
        VALUES (:ID_Medicament,:Nom,:Description) ";
        $stmt = $DB->prepare($query);
        $stmt->bindParam(':ID_Medicament', $data['ID_Medicament'], PDO::PARAM_STR);
        $stmt->bindParam(':Nom', $data['Nom'], PDO::PARAM_STR);
        $stmt->bindParam(':Description', $data['Description'], PDO::PARAM_STR);
        $stmt->execute();


    }
    static public function update($data){
        $db = DB::connect();
        $query = " UPDATE `medicaments` SET `Nom`=:Nom ,`Description`=:Description WHERE ID_Medicament=:ID_Medicament";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':Nom', $data['Nom'], PDO::PARAM_STR);
        $stmt->bindParam(':Description', $data['Description'], PDO::PARAM_STR);
        $stmt->bindParam(':ID_Medicament', $data['ID_Medicament'], PDO::PARAM_STR);
        $stmt->execute();

    }
    static public function Delete($ID_Medicament){
        $db = DB::connect();
        $query = " DELETE FROM `medicaments` WHERE ID_Medicament = :ID_Medicament";
        $stmt = $db->prepare($query);
        $stmt->bindParam(':ID_Medicament', $ID_Medicament, PDO::PARAM_STR);
        $stmt->execute();
    }

    static public function getLastId(){
        $DB = DB::connect();
        $query = " SELECT MAX(ID_Medicament) as id FROM Medicaments ";
        $stmt = $DB->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch();
        return $row['id'];
    }

}

?>