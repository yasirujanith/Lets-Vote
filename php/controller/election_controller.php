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

    public function getElection($model){
        $election_id = $model->getElectionID();
        $query_electiondetails=($this->crud->getData("SELECT * FROM election_details WHERE election_id='$election_id'"));
        if(!empty($query_electiondetails)){
            $election_name=$query_electiondetails[0]['election_name'];
            $institute=$query_electiondetails[0]['institute'];
            $date=$query_electiondetails[0]['date'];
            $start_time=$query_electiondetails[0]['start_time'];
            $end_time=$query_electiondetails[0]['end_time'];
            $committee_count=$query_electiondetails[0]['committee_count'];
            $admin_id=$query_electiondetails[0]['admin_id'];

            $election_details = new ElectionDetails($election_id, $election_name, $institute, $date, $start_time, $end_time, $committee_count, $admin_id); 
            return $election_details;
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

    public function getCandidateCount($model){
        $committee_id = $model->getPin();
        $query_committeedetails=($this->crud->getData("SELECT * FROM committee WHERE committee_id='$committee_id'"));
        if(!empty($query_committeedetails)){
            $election_id = $query_committeedetails[0]['election_id'];
            $committee_name = $query_committeedetails[0]['committee_name'];
            $candidate_count = $query_committeedetails[0]['candidate_count'];
            $committee =  new Committee($committee_id, $election_id, $committee_name, $candidate_count);
            return $committee;
        }else{
            return 'error';
        }
    }

    public function addCandidate($model){
        $committee_id = $model->getCommitteeID();
        $candidate_name = $model->getCandidateName();
        $query_add_candidatedetails=($this->crud->execute("INSERT INTO candidate(committee_id, candidate_name) VALUES('$committee_id','$candidate_name')"));
        if($query_add_candidatedetails==true){
            $query_candidatedetails=($this->crud->getData("SELECT * FROM candidate WHERE committee_id='$committee_id' order by candidate_id desc"));
            if(!empty($query_candidatedetails)){
                $candidate_id = $query_candidatedetails[0]['candidate_id'];
                return $candidate_id;
            }
        }
    }

    public function deleteCandidate($model){
        $candidate_id = $model->getCandidateID();
        $query_delete_candidatedetails=($this->crud->execute("DELETE FROM candidate WHERE candidate_id='$candidate_id'"));
        if($query_delete_candidatedetails==true){
            return 'true';
        }else{
            return 'false';
        }
    }

    public function getSavedCandidates($model){
        $committee_id = $model->getPin();
        $candidateArray = array();
        $count=0;
        $query_getcount = ($this->crud->getData("SELECT COUNT(committee_id) AS count FROM candidate WHERE committee_id='$committee_id' GROUP BY committee_id"));
        if(!empty($query_getcount)){
            $count = $query_getcount[0]['count'];
        }
        $query_candidatedetails=($this->crud->getData("SELECT * FROM candidate WHERE committee_id='$committee_id'"));
        if(!empty($query_candidatedetails)){
            for($x=0; $x<$count; $x++){
                $candidate_id = $query_candidatedetails[$x]['candidate_id'];
                $candidate_name = $query_candidatedetails[$x]['candidate_name'];
                $candidate = new Candidate($candidate_id, $committee_id, $candidate_name);
                array_push($candidateArray, $candidate);
            }
            return $candidateArray;
        }else{
            return $candidateArray;
        }   
    }

    public function isKeyExists($model){
        $election_key = $model->getElectionKey();
        $query_keydetails=($this->crud->getData("SELECT * FROM election_keys WHERE election_key='$election_key'"));
        if(!empty($query_keydetails)){
            return 'true';
        }else{
            return 'false';
        }
    }

    public function addElectionKey($model){
        $election_id = $model->getElectionID();
        $email = $model->getEmail();
        $election_key = $model->getElectionKey();
        $query_add_keydetails=($this->crud->execute("INSERT INTO election_keys(election_id, email, election_key) VALUES('$election_id','$email','$election_key')"));
        if($query_add_keydetails==true){
            return 'true';
        }else{
            return 'false';
        }
    }
}   
?>