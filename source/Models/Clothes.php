<?php

namespace Source\Models;
use Source\Core\Connect;

class Clothes {
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
            $query = "SELECT * FROM clothes WHERE idCity = :idCity";
            $stmt = Connect::getInstance()->prepare($query);
            $stmt->bindParam(":idCity", $idCity);
            $stmt->execute();
    
            if ($stmt->rowCount() == 0) {
                return false;
            } else {
                $clothes = $stmt->fetchAll(); // Fetch all rows as an associative array
                return $clothes;
            }
        }
    }

    public function selectAll()
        {
            $query = "SELECT * FROM clothes";
            $stmt = Connect::getInstance()->prepare($query);
            $stmt->execute();
    
            if ($stmt->rowCount() > 0) {
                $clothes = $stmt->fetchAll(); // Fetch all rows as an associative array
                return $clothes;
            }
        }

}