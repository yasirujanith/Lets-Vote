<?php

class ElectionController {
    private $model;
    private $crud;
    

    public function __construct($model){
        $this->model = $model;
        $this->crud = new crud();
    }

    public function addElection($model){
        $electionName = $model->getElectionName();
        $institute = $model->getInstitute();
        $committeCount = $model->getCommitteeCount();
        $date = $model->getDate();
        $start_time = $model->getStartTime();
        $end_time = $model->getEndTime();
        $admin_id = $model->getAdminID();
        
        $query_add_electiondetails=($this->crud->execute("INSERT INTO election_details(election_name, institute, date, start_time, end_time, committee_count, admin_id) VALUES('$electionName','$institute','$date','$start_time','$end_time','$committeCount','$admin_id')"));
        if($query_add_electiondetails==true){
            return 'true';
        }else{
            return 'false';
        }
    }

    public function getElectionID($model){
        $admin_id = $model->getUserID();
        $query_electiondetails=($this->crud->getData("SELECT * FROM election_details WHERE admin_id='$admin_id' ORDER BY election_id DESC"));
        if(!empty($query_electiondetails)){
            $election_id=$query_electiondetails[0]['election_id'];
            $_SESSION['election_id']=$election_id;
            return $election_id;
        }else{
            return 'error';
        }
    }

    public function addCommittee($model){
        $election_id = $model->getElectionID();
        $committee_name = $model->getCommitteeName();
        $candidate_count = $model->getCandidateCount();
        $query_add_committeedetails=($this->crud->execute("INSERT INTO committee(election_id, committee_name, candidate_count) VALUES('$election_id','$committee_name','$candidate_count')"));
        if($query_add_committeedetails==true){
            return 'true';
        }else{
            return 'false';
        }
    }
}
?>