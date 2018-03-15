<?php
class IndexView {
    private $model;
    private $controller;

    public function __construct($controller,$model){
        $this->controller = $controller;
        $this->model = $model;
    }

    public function confirmPin(){
        return $this->controller->confirmPin($this->model);
    }

    public function insertUserDetails(){
        return $this->controller->insertUserDetails($this->model);
    }

    public function signIn(){
        return $this->controller->signIn($this->model);
    }

    public function signupModalDetailSetting(){
        return $this->controller->signupModalDetailSetting($this->model);
    }

    public function getUserDetails(){
        return $this->controller->getUserDetails($this->model);
    }

}
?>

