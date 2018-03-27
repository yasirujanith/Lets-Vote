<?php

include_once 'model/candidate.php';
include_once 'controller/election_controller.php';
include_once 'view/election_view.php';
include_once 'crud.php';
session_start();


// if(isset($_POST['committeeID'])){
//     $committeeID = $_POST['committeeID'];
//     $candidate_name = $_POST['candidateName'];
//     echo $candidate_name;
//     $candidate = new Candidate(null, $committeeID, $candidate_name);
//     $election_controller = new ElectionController($candidate);
//     $election_view = new ElectionView($election_controller, $candidate);
//     $response = $election_view->addCandidate();
//     if($response == 'true'){
//         echo '1';
//     }else{
//         echo '0';
//     }
// }

if(isset($_FILES["image"]["name"])){
    $candidate_name = $_POST["candidateName"];
    $committeeID = $_POST["committeeID"];
    // echo $committeeID." ".$candidate_name." ".$imageName;

    //adding candidate details
    $candidate = new Candidate(null, $committeeID, $candidate_name);
    $election_controller = new ElectionController($candidate);
    $election_view = new ElectionView($election_controller, $candidate);
    $response = $election_view->addCandidate(); //'true' or 'false'
    $candidate_id = $response;

    //uploading photo
    $p_name=$_FILES['image']['name'];
    $p_size=$_FILES['image']['size'];
    $p_type=$_FILES['image']['type'];
    $p_temp_name=$_FILES['image']['tmp_name'];
    $p_extention=strtolower(substr($p_name,strpos($p_name,'.')+1));
    $p_max_size=40000000;
    //echo $p_name." ".$p_size." ".$candidate_id;
    if(isset($p_name)){
        if(!empty($p_name)){
            if(($p_extention=='jpg' || $p_extention=='jpeg')&&($p_type=='image/jpeg')&&($p_size<=$p_max_size)){
                $location = '../img/profpics';
                if(is_dir($location)==false){
                    mkdir("$location", 0700);// Create directory if it does not exist
                }
                $p_id = $candidate_id;
                $new_p_name=$p_id.'.'.$p_extention;

                if (move_uploaded_file($p_temp_name, "$location/" .$new_p_name)) {
                    echo 'success';
                }else{
                    echo 'failed';
                    $candidate = new Candidate($candidate_id, null, null);
                    $election_controller = new ElectionController($candidate);
                    $election_view = new ElectionView($election_controller, $candidate);
                    $response = $election_view->deleteCandidate();
                    if($response == 'true'){
                        echo 'deleted';
                    }else{
                        echo 'failed';
                    }
                }
            }else{
                $candidate = new Candidate($candidate_id, null, null);
                $election_controller = new ElectionController($candidate);
                $election_view = new ElectionView($election_controller, $candidate);
                $response = $election_view->deleteCandidate();
                if($response == 'true'){
                    echo 'deleted';
                }else{
                    echo 'failed';
                }
            }   
        }
    }


  }



?>