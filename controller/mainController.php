<?php

class mainController
{
    private $page = "";
    private $URL = "";
    private $pageInit = "";
    private $pageExplode = array();
    private $dir = "";
    private $fileExists = false;

    public  function __construct()
    {
        $this->pageInit = $_SERVER['REQUEST_URI'];
        $this->pageInit = preg_replace('%^(.*)\?.*$%','$1',$this->pageInit);
        $this->pageInit = preg_replace('%/$%', '', $this->pageInit);
        $this->pageInit = preg_replace('%^/%', '', $this->pageInit);
        $this->pageExplode = explode('/', $this->pageInit);
        $this->page = end($this->pageExplode);
        $this->checkExistsFile();
    }
    public function getPage()
    {
        return $this->page;
    }

    public function updatePage()
    {
        if($this->page == ""){
            require 'views/home.php';
        }else{
            require $this->existsPage();
        }
    }

    public function getURL()
    {
        echo $this->URL;
    }

    private function existsPage()
    {
        if ($this->fileExists) {
            return $this->dir . $this->page . '.php';
        } else {
            return 'views/404.php';
        }
    }

    private function checkExistsFile()
    {
        $this->dir = $this->prepareDir();
        if (file_exists($this->dir . $this->page . '.php')) {
            $this->fileExists = true;
        }
    }

    private function prepareDir()
    {
        $dirReturn = "views/";
        if (count($this->pageExplode) > 1) {
            for ($i = 0; $i < count($this->pageExplode) - 1; $i++) {
                $dirReturn .= $this->pageExplode[$i] . "/";
            }
        }
        return $dirReturn;
    }

    public function getExistsFile(){
        return $this->fileExists;
    }
}