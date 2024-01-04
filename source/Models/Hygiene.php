<?php

namespace Source\Models;
use Source\Core\Connect;

class Hygiene {
    private $id;
    private $type;
    private $donated;
    private $goal;
    private $idCity;

    public function __construct($id = NULL, $type = NULL, $donated = null, $goal = null, $idCity = null){

        $this->id = $id;
        $this->type = $type;
        $this->donated = $donated;
        $this->goal = $goal;
        $this->idCity = $idCity;
        
    }

    public function selectById($idCity){
        {
            $query = "SELECT * FROM hygiene WHERE idCity = :idCity";
            $stmt = Connect::getInstance()->prepare($query);
            $stmt->bindParam(":idCity", $idCity);
            $stmt->execute();
    
            if ($stmt->rowCount() == 0) {
                return false;
            } else {
                $hygienes = $stmt->fetchAll(); // Fetch all rows as an associative array
                return $hygienes;
            }
        }
    }

    public function selectAll()
        {
            $query = "SELECT * FROM hygiene";
            $stmt = Connect::getInstance()->prepare($query);
            $stmt->execute();
    
            if ($stmt->rowCount() > 0) {
                $hygienes = $stmt->fetchAll(); // Fetch all rows as an associative array
                return $hygienes;
            }
        }


}