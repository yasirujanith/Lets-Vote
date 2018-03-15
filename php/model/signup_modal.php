<?php

class SignUpModalDetails {
    private $election_name;
    private $institute;
    private $email;

    public function __construct($election_name, $institute, $email){
        $this->election_name = $election_name;
        $this->institute = $institute;
        $this->email = $email;
    }

    //getters
    public function getElectionName(){
        return $this->election_name;
    }

    public function getInstitute(){
        return $this->institute;
    }

    public function getEmail(){
        return $this->email;
    }

    
    //setters
    public function setElectionName($election_name){
        $this->election_name = $election_name;
    }

    public function setInstitute($institute){
        $this->institute = $institute;
    }

    public function setEmail($email){
        $this->email = $email;
    }

}

?>