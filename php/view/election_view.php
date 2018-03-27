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

    public function getCandidateCount(){
        return $this->controller->getCandidateCount($this->model);
    }

    public function addCandidate(){
        return $this->controller->addCandidate($this->model);
    }

    public function deleteCandidate(){
        return $this->controller->deleteCandidate($this->model);
    }

    public function getSavedCandidates(){
        return $this->controller->getSavedCandidates($this->model);
    }

    public function isKeyExists(){
        return $this->controller->isKeyExists($this->model);
    }

    public function addElectionKey(){
        return $this->controller->addElectionKey($this->model);
    }

    public function getElection(){
        return $this->controller->getElection($this->model);
    }
}
?>