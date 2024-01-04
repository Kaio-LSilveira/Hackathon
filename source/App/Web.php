<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Category;
use Source\Models\City;
use Source\Models\User;
use Source\Models\Adm;

class Web
{
    private $view;
    private $categories;
    private $cities;

    public function __construct()
    {
        $cities = new City();
        $this->cities = $cities->selectAll();

       // $categories = new Category();
        //$this->categories = $categories->selectAll();
        $this->view = new Engine(CONF_VIEW_WEB,'php');
    }

    public function home() : void
    {

        echo $this->view->render(
            "home",[
                "cities" => $this->cities
            ]
        );
    }

    public function about() : void
    {
        echo $this->view->render(
            "about",[
            "categories" => $this->categories
        ]);
    }

    public function register(?array $data) : void
    {
        if(!empty($data)){

            if(in_array("",$data)){
                $json = [
                    "message" => "Informe e-mail e senha para cadastrar!",
                    "type" => "warning"
                ];
                echo json_encode($json);
                return;
            }

            if(!is_email($data["email"])){
                $json = [
                    "message" => "Informe um e-mail válido!",
                    "type" => "warning"
                ];
                echo json_encode($json);
                return;
            }

            if(!isEqual($data["password"], $data["rptPassword"])){
                $json = [
                    "message" => "Senhas diferentes, informe senhas iguais!",
                    "type" => "warning"
                ];
                echo json_encode($json);
                return;
            }

            if(!hasValidLength($data["password"])){
                $json = [
                    "message" => "Informe uma senha válida!",
                    "type" => "warning"
                ];
                echo json_encode($json);
                return;
            }

            $user = new User(
                NULL,
                $data["email"],
                $data["password"]
            );

            if($user->findByEmail($data["email"])){
                $json = [
                    "message" => "Email já cadastrado!",
                    "type" => "error"
                ];
                echo json_encode($json);
                return;
            }

            if($user->insert()){
                $json = [
                    "email" => $data["email"],
                    "message" => "Registro efetuado com sucesso!",
                    "type" => "success"
                ];
                echo json_encode($json);
                return;
            } else {
                $json = [
                    "message" => "Falha ao efetuar registro, procure o suporte!",
                    "type" => "error"
                ];
                echo json_encode($json);
                return;
            }
        }

        echo $this->view->render(
            "register",[
            "eventName" => CONF_SITE_NAME
        ]);
    }

    public function login(?array $data) : void
    {
        if(!empty($data)){

            if(in_array("",$data)){
                $json = [
                    "message" => "Informe e-mail e senha para entrar!",
                    "type" => "warning"
                ];
                echo json_encode($json);
                return;
            }

            if(!is_email($data["email"])){
                $json = [
                    "message" => "Por favor, informe um e-mail válido!",
                    "type" => "warning"
                ];
                echo json_encode($json);
                return;
            }

            $user = new User();

            if(!$user->validate($data["email"],$data["password"])){
                $json = [
                    "message" => "Email e/ou Senha inválidos!",
                    "type" => "error"
                ];
                echo json_encode($json);
                return;
            }

            $json = [
                "email" => $user->getEmail(),
                "type" => "success"
            ];
            echo json_encode($json);
            return;

        }

        echo $this->view->render("login",[
            "eventName" => CONF_SITE_NAME
         ]);

    }

    public function admLogin(?array $data) : void
    {
        if(!empty($data)){

            if(in_array("",$data)){
                $json = [
                    "message" => "Informe e-mail e senha para entrar!",
                    "type" => "warning"
                ];
                echo json_encode($json);
                return;
            }

            if(!is_email($data["email"])){
                $json = [
                    "message" => "Por favor, informe um e-mail válido!",
                    "type" => "warning"
                ];
                echo json_encode($json);
                return;
            }

            $adm = new Adm();

            if(!$adm->validate($data["email"],$data["password"])){
                $json = [
                    "message" => "Email e/ou Senha inválidos!",
                    "type" => "error",
                    "email" => $data["email"],
                    "password" => $data["password"]
                ];
                echo json_encode($json);
                return;
            }

            $json = [
                "email" => $adm->getEmail(),
                "type" => "success"
            ];
            echo json_encode($json);
            return;

        }

        echo $this->view->render("admLogin",[
            "eventName" => CONF_SITE_NAME
         ]);


    }

   /* public function projectsByCategory(?array $data) : void
    {

        //var_dump($_SESSION["user"]);
        if(!empty($data["idCategory"])){
            $project = new Project();
            $projects = $project->findByCategory($data["idCategory"]);
        }

        echo $this->view->render(
            "projects",[
                "categories" => $this->categories,
                "projects" => $projects
            ]
        );

    }


    public function projectById(?array $data): void
    {
        var_dump($_SESSION["user"]);
        if(!empty($data["titleProject"])){
            $project = new Project($data["idProject"]);
            $project->findById();
        }

        echo $this->view->render(
            "projects",[
                "categories" => $this->categories,
                "project" => $project
            ]
        );
    }*/

    public function error(array $data) : void
    {
        echo $this->view->render("404", [
            "title" => "Erro {$data["errcode"]} | " . CONF_SITE_NAME,
            "error" => $data["errcode"]
        ]);
    }

}