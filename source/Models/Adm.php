<?php

namespace Source\Models;

use Source\Core\Connect;

class Adm
{
    private $id;
    private $email;
    private $cpf;
    private $cnpj;
    private $password;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

     /**
     * @return int|null
     */
    public function getEmail(): ?int
    {
        return $this->email;
    }

    /**
     * @param int|null $email
     */
    public function setEmail(?int $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    /**
     * @param string|null $cpf
     */
    public function setCpf(?string $cpf): void
    {
        $this->cpf = $cpf;
    }
    
    /**
     * @return string|null
     */
    public function getCnpj(): ?string
    {
        return $this->cnpj;
    }

    /**
     * @param string|null $cnpj
     */
    public function setCnpj(?string $cnpj): void
    {
        $this->cnpj = $cnpj;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    public function __construct(
        int $id = NULL,
        string $email = NULL,
        string $cpf = NULL,
        string $cnpj = NULL,
        string $password = NULL
    )
    {
        $this->id = $id;
        $this->email = $email;
        $this->cpf = $cpf;
        $this->cnpj = $cnpj;
        $this->password = $password;
    }

    public function selectAll ()
    {
        $query = "SELECT * FROM admin";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return false;
        } else {
            return $stmt->fetchAll();
        }
    }

    public function validate (string $email, string $password) : bool
    {
        $query = "SELECT * FROM admin WHERE email LIKE :email";
        $stmt = Connect::getInstance()->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        if($stmt->rowCount() == 0){
            return false;
        }

        $adm = $stmt->fetch();
        if($password == $adm->password){
            $arrayAdm = [
                 "id" => $adm->id,
                 "email" => $adm->email,
                 "idCity" => $adm->idCity
            ];
        
            $_SESSION["adm"] = $arrayAdm;
            setcookie("adm","Logado",time()+60*60,"/");
            return true;
            } else {
                return false;
            }
        } 

    }