<?php
class HomeView {
    private $model;
    private $controller;

    public function __construct($controller,$model){
        $this->controller = $controller;
        $this->model = $model;
    }

    public function setHomeDetails(){
        return $this->controller->setHomeDetails($this->model);
    }

    
}
?>

