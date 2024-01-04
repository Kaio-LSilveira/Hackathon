<?php

namespace Source\App;

use League\Plates\Engine;
use Source\Models\Clothes;
use Source\Models\Food;
use Source\Models\Hygiene;
use Source\Models\Material;

class Adm
{
    private $view;

    public function __construct()
    {
        if(empty($_SESSION["adm"]) || empty($_COOKIE["adm"])){
            header("Location:http://www.localhost/acme-manha/login");
        }
        setcookie("adm","Logado",time()+60*60,"/");
        $this->view = new Engine(CONF_VIEW_ADMIN,'php');
    }

    public function home () : void
    {
        $clothe = new Clothes();
        $food = new Food();
        $material = new Material();
        $hygiene = new Hygiene();

        $clothes = $clothe->selectById($_SESSION["adm"]["idCity"]);
        $foods = $food->selectById($_SESSION["adm"]["idCity"]);
        $materials = $material->selectById($_SESSION["adm"]["idCity"]);
        $hygienes = $hygiene->selectById($_SESSION["adm"]["idCity"]);

        $donatedC = 0;
        $goalC = 0;
        $donatedF = 0;
        $goalF = 0;
        $donatedM = 0;
        $goalM = 0;
        $donatedH = 0;
        $goalH = 0;

        foreach($clothes as $clothe){
            $donatedC += $clothe->donated;
            $goalC += $clothe->goal;
        }
        foreach($foods as $food){
            $donatedF += $food->donated;
            $goalF += $food->goal;
        }
        foreach($materials as $materials){
            $donatedM += $materials->donated;
            $goalM += $materials->goal;
        }
        foreach($hygienes as $hygiene){
            $donatedH += $hygiene->donated;
            $goalH += $hygiene->goal;
        }

        echo $this->view->render("home",[
            "donatedC" => $donatedC,
            "goalC" => $goalC,
            "donatedF" => $donatedF,
            "goalF" => $goalF,
            "donatedM" => $donatedM,
            "goalM" => $goalM,
            "donatedH" => $donatedH,
            "goalH" => $goalH,
        ]);
    }

}