<?php
require_once 'mainController.php';

class MetasController
{
    protected $titleHome;


    protected $DescriptionHome;


    private $pageAtual;

    public function __construct(){
        $this->titleHome = "";

        $this->DescriptionHome = "";

        $this->pageAtual = new mainController();

    }

    public function setTitle(){
        switch($this->pageAtual->getPage()){

            case '404':
                return $this->title404;
            break;

            default:
                return $this->titleHome;
            break;

        }
    }

    public function setDescription(){
        switch($this->pageAtual->getPage()){

            case '404':
                return $this->Description404;
                break;

            default:
                return $this->DescriptionHome;
                break;

        }
    }

}