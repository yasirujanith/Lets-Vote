<?php
class ElectionView {
    private $model;
    private $controller;

    public function __construct($controller, $model){
        $this->controller = $controller;
        $this->model = $model;
    }

    public function addElection(){
        return $this->controller->addElection($this->model);
    }

    public function getElectionID(){
        return $this->controller->getElectionID($this->model);
    }

    public function addCommittee(){
        return $this->controller->addCommittee($this->model);
    }
}
?>