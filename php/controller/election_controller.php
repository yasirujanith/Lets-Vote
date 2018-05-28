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

    public function deleteElection($model){
        $election_id = $model->getElectionID();
        
        $query_delete_election=($this->crud->execute("DELETE from election_details WHERE election_id='$election_id'"));
        if($query_delete_election==true){
            return 'true';
        }else{
            return 'false';
        }
    }

    public function updateElection($model){
        $electionID = $model->getElectionID();
        $electionName = $model->getElectionName();
        $institute = $model->getInstitute();
        $committeeCount = $model->getCommitteeCount();
        $date = $model->getDate();
        $start_time = $model->getStartTime();
        $end_time = $model->getEndTime();
        
        $query_update_electiondetails=($this->crud->execute("UPDATE election_details SET election_name='$electionName', institute='$institute', date='$date', start_time='$start_time', end_time='$end_time', committee_count='$committeeCount' WHERE election_id='$electionID'"));
        if($query_update_electiondetails==true){
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
        $committee_id = $model->getCommitteeID();
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
    
    public function deleteCommitteeCandidates($model){
        $committee_id = $model->getCommitteeID();
        $query_delete_candidates=($this->crud->execute("DELETE FROM candidate WHERE committee_id='$committee_id'"));
        if($query_delete_candidates==true){
            return 'true';
        }else{
            return 'false';
        }
    }

    public function getSavedCandidates($model){
        $committee_id = $model->getCommitteeID();
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

    public function isVoted($model){
        $candidate_id = $model->getCandidateID();
        $user_id = $model->getUserID();
        $query_votedetails=($this->crud->getData("SELECT * FROM candidate INNER JOIN vote WHERE vote.candidate_id = candidate.candidate_id AND committee_id = (SELECT committee_id FROM candidate WHERE candidate_id='$candidate_id') AND user_id='$user_id'"));
        if(!empty($query_votedetails)){
            return 'true';
        }else{
            return 'false';
        }
    }

    public function addVote($model){
        $candidate_id = $model->getCandidateID();
        $user_id = $model->getUserID();
        $query_add_vote=($this->crud->execute("INSERT INTO vote(candidate_id, user_id) VALUES('$candidate_id','$user_id')"));
        if($query_add_vote==true){
            return 'true';
        }else{
            return 'false';
        }
    }

    public function updateVote($model){
        $candidate_id = $model->getCandidateID();
        $user_id = $model->getUserID();
        $query_getcommittee=($this->crud->getData("SELECT * FROM candidate WHERE candidate_id='$candidate_id'"));
        $committee_id = $query_getcommittee[0]['committee_id'];
        $query_getExistingCandidateID = ($this->crud->getData("SELECT * FROM candidate INNER JOIN vote WHERE candidate.candidate_id=vote.candidate_id AND committee_id = '$committee_id'"));
        $existing_candidate_id = $query_getExistingCandidateID[0]['candidate_id'];
        $query_update_vote=($this->crud->execute("UPDATE vote SET candidate_id = '$candidate_id' WHERE candidate_id = '$existing_candidate_id' AND user_id='$user_id'"));
        if($query_update_vote==true){
            return 'true';
        }else{
            return 'false';
        }
    }

    public function getSelectedCandidateID($model){
        $committee_id = $model->getCommitteeID();
        $user_id = $model->getUserID();
        $query_candidateid=($this->crud->getData("SELECT * FROM candidate INNER JOIN vote WHERE candidate.candidate_id = vote.candidate_id AND committee_id = '$committee_id' AND user_id='$user_id'"));
        if(!empty($query_candidateid)){
            return $query_candidateid[0]['candidate_id'];
        }else{
            return 'empty';
        }
    }

    public function getCommittees($model){
        $election_id = $model->getElectionID();
        $query_committees=($this->crud->getData("SELECT * FROM committee WHERE election_id='$election_id'"));
        if(!empty($query_committees)){
            return $query_committees;
        }else{
            return 'empty';
        }
    }
    
    public function getCommitteeID($model){
        $election_id = $model->getElectionID();
        $committee_name_before = $model->getCommitteeName();
        $query_committeeid=($this->crud->getData("SELECT * FROM committee WHERE election_id='$election_id' AND committee_name='$committee_name_before'"));
        if(!empty($query_committeeid)){
            return $query_committeeid[0]['committee_id'];
        }else{
            return 'error';
        }
    }
    
    public function updateCommittee($model){
        $committee_id = $model->getCommitteeID();
        $committee_name = $model->getCommitteeName();
        $candidate_count = $model->getCandidateCount();
        $query_updatecommittee=($this->crud->execute("UPDATE committee SET committee_name='$committee_name', candidate_count='$candidate_count' WHERE committee_id='$committee_id'"));
        if(!empty($query_updatecommittee)){
            return 'true';
        }else{
            return 'false';
        }
    }

    public function deleteAllCommittees($model){
        $election_id = $model->getElectionID();
        $query_response=($this->crud->execute("DELETE FROM committee WHERE election_id='$election_id'"));
        if(!empty($query_response)){
            return $query_response;
        }else{
            return 'empty';
        }
    }

    public function getCommitteeDetails($model){
        $committee_id = $model->getCommitteeID();
        $query_committee=($this->crud->getData("SELECT * FROM committee WHERE committee_id='$committee_id'"));
        if(!empty($query_committee)){
            $election_id = $query_committee[0]['election_id'];
            $committee_name = $query_committee[0]['committee_name'];
            $candidate_count = $query_committee[0]['candidate_count'];
            return new Committee($committee_id, $election_id, $committee_name, $candidate_count);
        }else{
            return 'empty';
        }
    }

    public function getTotalVotes($model){
        $committee_id = $model->getCommitteeID();
        $query_votes=($this->crud->getData("SELECT * FROM candidate INNER JOIN vote WHERE candidate.candidate_id=vote.candidate_id AND committee_id='$committee_id'"));
        return sizeof($query_votes);
    }
    
    public function getTotalElectionVotes($model){
        $committee_id = $model->getCommitteeID();
        $query_committee=($this->crud->getData("SELECT * FROM committee WHERE committee_id='$committee_id'"));
        if(!empty($query_committee)){
            $election_id = $query_committee[0]['election_id'];
            $query_votes = ($this->crud->getData("SELECT * FROM committee NATURAL JOIN candidate NATURAL JOIN vote WHERE election_id='$election_id'"));
            return sizeof($query_votes);    
        }
        
    }

    public function getCandidates($model){
        $committee_id = $model->getCommitteeID();
        $query_candidates=($this->crud->getData("SELECT * FROM candidate WHERE committee_id='$committee_id'"));
        if(!empty($query_candidates)){
            return $query_candidates;
        }else{
            return 'empty';
        }
    }

    public function getCandidateRank($model){
        $committee_id = $model->getCommitteeID();
        $query_candidatesrank=($this->crud->getData("SELECT committee_id, vote.candidate_id, count(vote.candidate_id) AS vote FROM vote INNER JOIN candidate WHERE vote.candidate_id=candidate.candidate_id AND committee_id='$committee_id' GROUP BY vote.candidate_id ORDER BY vote DESC;"));
        if(!empty($query_candidatesrank)){
            return $query_candidatesrank;
        }else{
            return 'empty';
        }
    }

    public function getCandidateDetails($model){
        $candidate_id = $model->getCandidateID();
        $query_candidate=($this->crud->getData("SELECT * FROM candidate WHERE candidate_id='$candidate_id'"));
        if(!empty($query_candidate)){
            $committee_id = $query_candidate[0]['committee_id'];
            $candidate_name = $query_candidate[0]['candidate_name'];
            return new Candidate($candidate_id, $committee_id, $candidate_name);
        }else{
            return 'empty';
        }
    }

    public function getVotes($model){
        $candidate_id = $model->getCandidateID();
        $query_votes=($this->crud->getData("SELECT * FROM vote WHERE candidate_id='$candidate_id'"));
        return $query_votes;
    }

    public function getElectionDetails($model){
        $election_id = $model->getElectionID();
        $query_election=($this->crud->getData("SELECT * FROM election_details WHERE election_id='$election_id'"));
        if(!empty($query_election)){
            $election_name = $query_election[0]['election_name'];
            $institute = $query_election[0]['institute'];
            $date = $query_election[0]['date'];
            $start_time = $query_election[0]['start_time'];
            $end_time = $query_election[0]['end_time'];
            $committee_count = $query_election[0]['committee_count'];
            $admin_id = $query_election[0]['admin_id'];
            return new ElectionDetails($election_id, $election_name, $institute, $date, $start_time, $end_time, $committee_count, $admin_id);
        }
    }
}   
?>