<?php

namespace Source\Models;

use Source\Core\Connect;

class City {
    private $id;
    private $cep;
    private $country;
    private $state;
    private $name;

    public function __construct($id = NULL, $cep = NULL, $country = null, $state = null, $name = null){

        $this->id = $id;
        $this->cep = $cep;
        $this->country = $country;
        $this->state = $state;
        $this->name = $name;        
    }

    public function selectById(){
        {
            $query = "SELECT * FROM city WHERE name = :name";
            $stmt = Connect::getInstance()->prepare($query);
            $stmt->bindParam(":name",$this->name);
            $stmt->execute();
    
            if ($stmt->rowCount() == 0) {
                return false;
            } else {
                $food = $stmt->fetchAll(); // Fetch all rows as an associative array
                return $food;
            }
        }
    }

    public function selectAll()
    {
        $query = "SELECT * FROM city";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }


}
