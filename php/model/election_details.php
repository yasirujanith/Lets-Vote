<?php

class ElectionDetails {
    private $election_id;
    private $election_name;
    private $institute;
    private $date;
    private $start_time;
    private $end_time;
    private $committee_count;
    private $admin_id;

    public function __construct($election_id, $election_name, $institute, $date, $start_time, $end_time, $committee_count, $admin_id){
        $this->election_id = $election_id;
        $this->election_name = $election_name;
        $this->institute = $institute;
        $this->date = $date;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
        $this->committee_count = $committee_count;
        $this->admin_id = $admin_id;
    }

    //getters
    public function getElectionID(){
        return $this->election_id;
    }

    public function getElectionName(){
        return $this->election_name;
    }

    public function getInstitute(){
        return $this->institute;
    }

    public function getDate(){
        return $this->date;
    }

    public function getStartTime(){
        return $this->start_time;
    }

    public function getEndTime(){
        return $this->end_time;
    }

    public function getCommitteeCount(){
        return $this->committee_count;
    }

    public function getAdminID(){
        return $this->admin_id;
    }

    //setters
    public function setElectionID($election_id){
        $this->election_id = $election_id;
    }

    public function setElectionName($election_name){
        $this->election_name = $election_name;
    }

    public function setInstitute($institute){
        $this->institute = $institute;
    }

    public function setDate($date){
        $this->date = $date;
    }

    public function setStartTime($start_time){
        $this->start_time = $start_time;
    }

    public function setEndTime($end_time){
        $this->end_time = $end_time;
    }

    public function setCommitteeCount($committee_count){
        $this->committee_count = $committee_count;
    }

    public function setAdminID($admin_id){
        $this->admin_id = $admin_id;
    }
}

?>