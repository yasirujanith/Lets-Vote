<?php
session_start();
include_once 'model/election_details.php';
include_once 'model/committee.php';
include_once 'controller/election_controller.php';
include_once 'view/election_view.php';
include_once 'crud.php';


if(isset($_POST['electionID'])){
    $electionID = $_POST['electionID'];
    $_SESSION['election_id'] = $electionID;
    $election_details = new ElectionDetails($electionID, null, null, null, null, null, null, null);
    $election_controller = new ElectionController($election_details);
    $election_view = new ElectionView($election_controller, $election_details);
    $response =  $election_view->getElectionDetails();

    $election_name = $response->getElectionName();
    $institute = $response->getInstitute();
    $date = $response->getDate();
    $start_time = $response->getStartTime();
    $end_time = $response->getEndTime();
    $committee_count = $response->getCommitteeCount();

    $details_arr = [$election_name, $institute, $committee_count, $date, $start_time, $end_time];
    echo json_encode($details_arr);
}

if(isset($_POST['electionDup1ID'])){
    $electionID = $_POST['electionDup1ID'];
    $election_details = new ElectionDetails($electionID, null, null, null, null, null, null, null);
    $election_controller = new ElectionController($election_details);
    $election_view = new ElectionView($election_controller, $election_details);
    $response =  $election_view->deleteAllCommittees();
    echo $response;
}

if(isset($_POST['committeeName'])){
    $election_id = $_POST['electionDup0ID'];
    $committeeName = $_POST['committeeName'];
    $candidateCount = $_POST['candidateCount'];

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

if(isset($_POST['electionName'])){
    $electionID = $_POST['election_id'];
    $electionName = $_POST['electionName'];
    $instituteName = $_POST['instituteName'];
    $committeeCount = $_POST['committeeCount'];
    $date = $_POST['date'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];

    $election_details = new ElectionDetails($electionID, $electionName, $instituteName, $date, $start_time, $end_time, $committeeCount, null);
    $election_controller = new ElectionController($election_details);
    $election_view = new ElectionView($election_controller, $election_details);
    $response =  $election_view->updateElection();
    if($response == 'true'){
        echo '1';
    }else{
        echo '0';
    }
}

if(isset($_POST['committeeNameDup2'])){
    $committeeNameBefore = $_POST['committeeNameBefore'];
    $candidateCountBefore = $_POST['candidateCountBefore'];
    $committeeName = $_POST['committeeNameDup2'];
    $candidateCount = $_POST['candidateCount'];
    $electionID = $_POST['electionDup2ID'];

    $committee = new Committee(null, $electionID, $committeeNameBefore, null);
    $election_controller = new ElectionController($committee);
    $election_view = new ElectionView($election_controller, $committee);
    $committeeID =  $election_view->getCommitteeID();
    // echo $committeeName.' '.$committeeID;

    if($candidateCountBefore > $candidateCount){
        echo $committeeID;
        $committee = new Committee($committeeID, null, null, null);
        $election_controller = new ElectionController($committee);
        $election_view = new ElectionView($election_controller, $committee);
        $response = $election_view->deleteCommitteeCandidates();    
    }

    $committee = new Committee($committeeID, $electionID, $committeeName, $candidateCount);
    $election_controller = new ElectionController($committee);
    $election_view = new ElectionView($election_controller, $committee);
    $response = $election_view->updateCommittee();
    if($response == 'true'){
        echo '1';
    }else{
        echo '0';
    }


}
    
?>