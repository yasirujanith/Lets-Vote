<?php

include_once 'model/pin.php';
include_once 'model/committee.php';
include_once 'model/candidate.php';
include_once 'controller/election_controller.php';
include_once 'view/election_view.php';
include_once 'crud.php';
session_start();

if(isset($_POST['committeeID'])){
    $committeeID=$_POST['committeeID'];
    $pin = new Pin($committeeID);
    $election_controller = new ElectionController($pin);
    $election_view = new ElectionView($election_controller, $pin);

    //getting elected candidate
    $candidate_id = $election_view->getSelectedCandidateID(); 
    $response = $election_view->getCandidateCount();
    //$candidate_count = $response->getCandidateCount();
    $committee_name = $response->getCommitteeName();

    $response = $election_view-> getSavedCandidates();
    $candidate_count = sizeof($response);
    
}

?>

<!-- Modal Header -->
<div class="modal-header modal-header-success">
    <h3 class="modal-title" style="font-weight:600;"><?php echo $committee_name;?></h3>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
</div>
<!-- Modal body -->
<div class="modal-body modal-body-success">
    <br>
    <div class="container text-white">
        <div class="row">
            <?php         
                for($x=0; $x<$candidate_count; $x++){
                    $id = $response[$x]->getCandidateID();
                    $name = $response[$x]->getCandidateName();
                    if($id == $candidate_id){
                        echo '
                            <div class="col-sm-6">
                                <div id="candidateCard'.$x.'" class="card mb-4" style="width:350px; background-color: rgba(255, 187, 0, 0.534);">
                                    <div class="card-body">
                                        <!-- <h4 class="card-title" style="text-align:center;">Nominee 01</h4> -->
                                        <!-- <hr class="light"> -->
                                        <div class="container">
                                            <form action="/action_page.php">
                                                <div class="form-group">
                                                    <div class="container" style="text-align:center;">
                                                        <img src="img/profpics/'.$id.'.jpg" class="rounded-circle" alt="Cinque Terre" style="height:170px; width:170px;">
                                                    </div>
                                                    <hr class="light mb-4">
                                                    <input type="text" class="form-control" id="name" value="'.$name.'" readonly="true" style="text-align:center;">
                                                <!-- <br> -->
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-footer mx-auto">
                                        <button class="btn btn-primary" onClick="selectVoter('.$id.','.$x.','.$candidate_count.');">vote now</button>
                                    </div>
                                </div>
                            </div>
                        ';
                    }else{
                        echo '
                            <div class="col-sm-6">
                                <div id="candidateCard'.$x.'" class="card mb-4" style="width:350px;">
                                    <div class="card-body">
                                        <!-- <h4 class="card-title" style="text-align:center;">Nominee 01</h4> -->
                                        <!-- <hr class="light"> -->
                                        <div class="container">
                                            <form action="/action_page.php">
                                                <div class="form-group">
                                                    <div class="container" style="text-align:center;">
                                                        <img src="img/profpics/'.$id.'.jpg" class="rounded-circle" alt="Cinque Terre" style="height:170px; width:170px;">
                                                    </div>
                                                    <hr class="light mb-4">
                                                    <input type="text" class="form-control" id="name" value="'.$name.'" readonly="true" style="text-align:center;">
                                                <!-- <br> -->
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="card-footer mx-auto">
                                        <button class="btn btn-primary" onClick="selectVoter('.$id.','.$x.','.$candidate_count.');">vote now</button>
                                    </div>
                                </div>
                            </div>
                        ';
                    }
                }
            ?>
        </div>
    </div>  
</div>
<!-- Modal footer -->
<?php
    echo '
        <div class="modal-footer modal-footer-success">
            <button type="button" class="btn btn-primary btn-x1" style="width:110px; height:40px" onClick="saveVoter();">Save</button>
            <button type="button" class="btn btn-secondary btn-x1" data-dismiss="modal" style="width:110px; height:40px">Close</button>
        </div>
    ';
?>
