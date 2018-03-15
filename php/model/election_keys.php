<?php

class ElectionKeys {
    private $election_id;
    private $email;
    private $election_key;

    public function __construct($election_id, $name, $election_key){
        $this->election_id = $election_id;
        $this->name = $name;
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
    public function setElectionID($election_id){
        $this->election_id = $election_id;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setElectionKey($election_key){
        $this->election_key = $election_key;
    }
}

?>