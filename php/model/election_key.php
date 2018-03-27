<?php

class ElectionKey {
    private $election_id;
    private $email;
    private $election_key;

    public function __construct($election_id, $email, $election_key){
        $this->election_id = $election_id;
        $this->email = $email;
        $this->election_key = $election_key;
    }

    //getters
    public function getElectionID(){
        return $this->election_id;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getElectionKey(){
        return $this->election_key;
    }

    
    //setters
    public function setEmail($email){
        $this->email = $email;
    }

}

?>