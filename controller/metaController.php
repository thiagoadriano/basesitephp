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
        if($this->setTitleHome()) return;
        if($this->searchMetaPage()) return;
        if($this->setDefault()) return;
    }

    private function setTitleHome()
    {
        if($this->pageAtual->getPage() == ""){
            $this->searchMetaPage('home');
            return true;
        }
    }

    private function searchMetaPage($search = ""){
        $metodo = $search != "" ? $search : $this->pageAtual->getPage();
        for($i = 0; $i < count($this->infoPages); $i++){
            if($this->infoPages[$i]['page'] == $metodo){
                if($this->title == "") {
                    $this->setTitle($this->infoPages[$i]);
                    $this->setDesc($this->infoPages[$i]);
                    return true;
                }
            }
            if($search == ""){
                if($this->pageAtual->getPage() == $this->error['page']){
                    if($this->title == ""){
                        $this->title = $this->error['title'];
                        $this->description = $this->error['description'];
                        return true;
                    }
                }
            }
        }
    }

    private function setDefault(){
        if($this->pageAtual->getExistsFile()){
            if($this->title == ""){
                $this->title = $this->default['title'];
                $this->description = $this->default['description'];
                return true;
            }
        }else{
            if($this->title == "") {
                $this->title = $this->error['title'];
                $this->description = $this->error['description'];
                return true;
            }
        }
    }

    private function setTitle($info){
        if($info['title'] == ""){
            $this->title = $this->default['title'];
        }else{
            $this->title = $info['title'];
        }
    }

    private function setDesc($info){
        if($info['description'] == ""){
            $this->description = $this->default['description'];
        }else{
            $this->description = $info['description'];
        }
    }

    public function getTitle(){
        return $this->title;
    }

    public function getDescription(){
        return $this->description;
    }

}