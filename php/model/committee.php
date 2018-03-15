<?php

class Committee {
    private $committee_id;
    private $election_id;
    private $committee_name;
    private $candidate_count;

    public function __construct($committee_id, $election_id, $committee_name, $candidate_count){
        $this->committee_id = $committee_id;
        $this->election_id = $election_id;
        $this->committee_name = $committee_name;
        $this->candidate_count = $candidate_count;
    }

    //getters
    public function getCommitteeID(){
        return $this->committee_id;
    }
    public function getElectionID(){
        return $this->election_id;
    }
    public function getCommitteeName(){
        return $this->committee_name;
    }
    public function getCandidateCount(){
        return $this->candidate_count;
    }

    
    //setters
    public function setCommitteeID($committee_id){
        $this->committee_id = $committee_id;
    }

}

?>