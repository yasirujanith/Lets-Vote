<?php

class Vote {
    private $candidate_id;
    private $user_id;

    public function __construct($candidate_id, $user_id){
        $this->candidate_id = $candidate_id;
        $this->user_id = $user_id;
    }

    //getters
    public function getCandidateID(){
        return $this->candidate_id;
    }

    public function getUserID(){
        return $this->user_id;
    }

    
    //setters
    // public function setCandidateID($candidate_id){
    //     $this->candidate_id = $candidate_id;
    // }

}

?>