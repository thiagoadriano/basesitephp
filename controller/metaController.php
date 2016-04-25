<?php
require_once 'mainController.php';

class MetasController
{
    protected $title = "";
    private $description = "";
    private $pageAtual;
    private $default = array(
        'title' => "PlugTelecom - Soluções Simples para o seu negócio",
        'description' => "Soluções Simples para o seu negócio"
    );
    private $error = array(
        'page' => "404",
        'title' => "Página não encontrada - PlugTelecom",
        'description' => "Soluções Simples para o seu negócio"
    );
    private $infoPages = array(
        array(
            'page' => "home",
            'title' => "Início - PlugTelecom",
            'description' => "Soluções Simples para o seu negócio"
        )
    );

    public function __construct(){
        $this->pageAtual = new mainController();
        $this->setTitleDescription();
    }

    private function setTitleDescription()
    {
        for($i = 0; $i < count($this->infoPages); $i++){
            if($this->infoPages[$i]['page'] == $this->pageAtual->getPage()){
                $this->title = $this->infoPages[$i]['title'];
                $this->description = $this->infoPages[$i]['description'];
                return;
            }else if($this->pageAtual->getPage() == $this->error['page']){
                $this->title = $this->error['title'];
                $this->description = $this->error['description'];
                return;
            }
        }
        if($this->pageAtual->getExistsFile()){
            $this->title = $this->default['title'];
            $this->description = $this->default['description'];
        }else{
            $this->title = $this->error['title'];
            $this->description = $this->error['description'];
        }

    }

    public function getTitle(){
        return $this->title;
    }

    public function getDescription(){
        return $this->description;
    }

}