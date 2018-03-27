<?php

class Candidate {
    private $candidate_id;
    private $committee_id;
    private $candidate_name;

    public function __construct($candidate_id, $committee_id, $candidate_name){
        $this->candidate_id = $candidate_id;
        $this->committee_id = $committee_id;
        $this->candidate_name = $candidate_name;
    }

    //getters
    public function getCandidateID(){
        return $this->candidate_id;
    }
    public function getCommitteeID(){
        return $this->committee_id;
    }
    public function getCandidateName(){
        return $this->candidate_name;
    }

    //setters
    public function setCandidateID($candidate_id){
        $this->candidate_id = $candidate_id;
    }

}

?>