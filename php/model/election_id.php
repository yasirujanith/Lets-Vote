<?php

class ElectionID {
    private $election_id;

    public function __construct($election_id){
        $this->election_id = $election_id;
    }

    //getters
    public function getElectionID(){
        return $this->election_id;
    }

    
    //setters
    public function setElectionID($election_id){
        $this->election_id = $election_id;
    }

}

?>