<?php
session_start();

include_once 'model/election_details.php';
include_once 'model/committee.php';
include_once 'model/candidate.php';
include_once 'model/vote.php';
include_once 'controller/election_controller.php';
include_once 'view/election_view.php';
include_once 'crud.php';

$user_id = $_SESSION['user_id'];


if(isset($_POST['electionID'])){
    $election_id = $_POST['electionID'];

    $election = new ElectionDetails($election_id, null, null, null, null, null, null, null);
    $election_controller = new ElectionController($election);
    $election_view = new ElectionView($election_controller, $election);
    $election_details =  $election_view->getElection();
    $election_name = $election_details->getElectionName();
    $institute = $election_details->getInstitute();

    $committee = new Committee(null, $election_id, null, null);
    $election_controller = new ElectionController($committee);
    $election_view = new ElectionView($election_controller, $committee);
    $committee_set = $election_view->getCommittees();
    $committee_count = sizeof($committee_set);
}

function getCandidates($committee_id){
    $candidate = new Candidate(null, $committee_id, null);
    $election_controller = new ElectionController($candidate);
    $election_view = new ElectionView($election_controller, $candidate);
    $response = $election_view->getCandidates();
    return $response;
}

function getVotes($candidate_id){
    $vote = new Vote($candidate_id, null);
    $election_controller = new ElectionController($vote);
    $election_view = new ElectionView($election_controller, $vote);
    $response = $election_view->getVotes();
    return $response;
}

?>