<?php
include_once 'model/election_details.php';
include_once 'controller/election_controller.php';
include_once 'view/election_view.php';
include_once 'crud.php';


if(isset($_POST['election_id'])){
    $election_id = $_POST['election_id'];
    $election_details = new ElectionDetails($election_id, null, null, null, null, null, null, null);
    $election_controller = new ElectionController($election_details);
    $election_view = new ElectionView($election_controller, $election_details);
    $response = $election_view->deleteElection();
    if($response = 'true'){
        echo '1';
    }else{
        echo '0';
    }
}

?>