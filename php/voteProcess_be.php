<?php
session_start();
include_once 'model/vote.php';
include_once 'controller/election_controller.php';
include_once 'view/election_view.php';
include_once 'crud.php';

$userID = $_SESSION['user_id'];

if(isset($_POST['candidateID'])){
    $candidateID = $_POST['candidateID'];
    $vote = new Vote($candidateID, $userID);
    $election_controller = new ElectionController($vote);
    $election_view = new ElectionView($election_controller, $vote);
    $isVoted =  $election_view->isVoted();
    if($isVoted == 'true'){
        echo 'voted';
        $response =  $election_view->updateVote();
        if($response == 'true'){
            echo '1';
        }else{
            echo '0';
        }
    }else{
        $response =  $election_view->addVote();
        if($response == 'true'){
            echo '1';
        }else{
            echo '0';
        }
    }
}

?>