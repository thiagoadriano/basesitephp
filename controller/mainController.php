<?php

class mainController
{
    private $page = "";
    private $URL = "";
    private $pageInit = "";
    private $pageExplode = array();

    public  function __construct()
    {
        $this->pageInit = $_SERVER['REQUEST_URI'];
        $this->pageExplode = explode('/', preg_replace('%^(.*)\?.*$%','$1',$this->pageInit));
        $this->page = end($this->pageExplode);
    }
    public function getPage()
    {
        return $this->page;
    }

    public function updatePage()
    {
        require $this->exixtsPage();
    }

    public function getURL()
    {
        echo $this->URL;
    }

    private function exixtsPage()
    {
        if (file_exists('views/' . $this->page . '.php')) {
            return 'views/' . $this->page . '.php';
        } else {
            return 'views/404.php';
        }
    }
}