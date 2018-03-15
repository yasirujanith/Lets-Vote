<?php

class HomepageSettings {
    private $fullname;
    private $election_name;
    private $institute;

    public function __construct($fullname, $election_name, $institute){
        $this->fullname = $fullname;
        $this->election_name = $election_name;
        $this->institute = $institute;
    }

    //getters
    public function getFullName(){
        return $this->fullname;
    }

    public function getElectionName(){
        return $this->election_name;
    }

    public function getInstitute(){
        return $this->institute;
    }

    //setters
    public function setFullName($fullname){
        $this->fullname = $fullname;
    }

    public function setElectionName($election_name){
        $this->election_name = $election_name;
    }

    public function setInstitute($institute){
        $this->institute = $institute;
    }

}

?>