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

    public function deleteElection(){
        return $this->controller->deleteElection($this->model);
    }

    public function updateElection(){
        return $this->controller->updateElection($this->model);
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

    public function isVoted(){
        return $this->controller->isVoted($this->model);
    }

    public function addVote(){
        return $this->controller->addVote($this->model);
    }

    public function updateVote(){
        return $this->controller->updateVote($this->model);
    }
    
    public function getSelectedCandidateID(){
        return $this->controller->getSelectedCandidateID($this->model);
    }
    
    public function getCommittees(){
        return $this->controller->getCommittees($this->model);
    }

    public function getCommitteeDetails(){
        return $this->controller->getCommitteeDetails($this->model);
    }
    
    public function getTotalVotes(){
        return $this->controller->getTotalVotes($this->model);
    }
    
    public function getTotalElectionVotes(){
        return $this->controller->getTotalElectionVotes($this->model);
    }

    public function getCandidates(){
        return $this->controller->getCandidates($this->model);
    }

    public function getCandidateRank(){
        return $this->controller->getCandidateRank($this->model);
    }

    public function getCandidateDetails(){
        return $this->controller->getCandidateDetails($this->model);
    }

    public function getVotes(){
        return $this->controller->getVotes($this->model);
    }

    public function getElectionDetails(){
        return $this->controller->getElectionDetails($this->model);
    }

    public function deleteAllCommittees(){
        return $this->controller->deleteAllCommittees($this->model);
    }
    
    public function getCommitteeID(){
        return $this->controller->getCommitteeID($this->model);
    }
    
    public function updateCommittee(){
        return $this->controller->updateCommittee($this->model);
    }

    public function deleteCommitteeCandidates(){
        return $this->controller->deleteCommitteeCandidates($this->model);
    }
}
?>