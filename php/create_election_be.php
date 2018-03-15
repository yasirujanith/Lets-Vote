<?php
session_start();
include_once 'model/election_details.php';
include_once 'model/user_id.php';
include_once 'model/committee.php';
include_once 'controller/election_controller.php';
include_once 'view/election_view.php';
include_once 'crud.php';



if(isset($_POST['electionName'])){
    $electionName = $_POST['electionName'];
    $instituteName = $_POST['instituteName'];
    $committeeCount = $_POST['committeeCount'];
    $date = $_POST['date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $admin_id = $_SESSION['user_id'];

    $election_details = new ElectionDetails(null, $electionName, $instituteName, $date, $start_time, $end_time, $committeeCount, $admin_id);
    $election_controller = new ElectionController($election_details);
    $election_view = new ElectionView($election_controller, $election_details);
    $response =  $election_view->addElection();
    if($response == 'true'){
        echo '1';
    }else{
        echo '0';
    }
}

if(isset($_POST['committeeName'])){
    $committeeName = $_POST['committeeName'];
    $candidateCount = $_POST['candidateCount'];
    $admin_id = $_SESSION['user_id'];

    $user_id = new UserID($admin_id);
    $election_controller = new ElectionController($user_id);
    $election_view = new ElectionView($election_controller, $user_id);
    $response =  $election_view->getElectionID();

    $election_id = $response;
    $committee = new Committee(null, $election_id, $committeeName, $candidateCount);
    $election_controller = new ElectionController($election_id);
    $election_view = new ElectionView($election_controller, $committee);
    $response =  $election_view->addCommittee();
    if($response == 'true'){
        echo '1';
    }else{
        echo '0';
    }
}


?>