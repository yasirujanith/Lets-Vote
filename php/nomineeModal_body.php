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
    $response = $election_view->getCandidateCount();
    $candidate_count = $response->getCandidateCount();
    $committee_name = $response->getCommitteeName();

    $response = $election_view-> getSavedCandidates();
    $saved_count = sizeof($response);
    $left_count = $candidate_count - $saved_count;
    
}

?>

<!-- Modal Header -->
<div class="modal-header modal-header-success">
    <h4 class="modal-title"><?php echo $committee_name.' - Assign Nominees'; ?></h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button><br>
</div>
<!-- Modal body -->
<div class="modal-body modal-body-success">
    <div class="container text-white">
        <div class="row">
        <?php         
            for($x=0; $x<$saved_count; $x++){
                $id = $response[$x]->getCandidateID();
                $name = $response[$x]->getCandidateName();
                
                echo '
                <div class="col-sm-6">
                    <div class="card mb-4 modal-nominee-assign" style="width:350px">
                        <div class="card-body">
                            <div class="container">
                                <form action="/action_page.php">
                                    <div class="form-group">
                                        <label for="name">Nominee Name :</label>
                                        <input type="text" class="form-control" id="name'.$x.'" placeholder="Enter name" value="'.$name.'">
                                        <br>
                                        <label for="profilepicture">Nominee Photo :</label>
                                        <input type="file" class="form-control" id="profilePicture'.$x.'" name="profilepicture" onchange="readURL(this, '.$x.')">
                                        <hr class="light mb-4">
                                        <div class="container" style="text-align:center;">
                                            <img src="img/profpics/'.$id.'.jpg" id="imageDisplay'.$x.'" class="rounded-circle" alt="Cinque Terre" style="height:170px; width:170px;">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- <div class="card-footer mx-auto">
                            <a class="btn btn-primary" data-toggle="modal" data-target="#nomineeModal">save nominee</a>
                        </div> -->
                    </div>
                </div>
                ';
            }
            for($x=$saved_count; $x<$candidate_count; $x++){
                echo '
                <div class="col-sm-6">
                    <div class="card mb-4 modal-nominee-assign" style="width:350px">
                        <div class="card-body">
                            <div class="container">
                                <form action="/action_page.php">
                                    <div class="form-group">
                                        <label for="name">Nominee Name :</label>
                                        <input type="text" class="form-control" id="name'.$x.'" placeholder="Enter name">
                                        <br>
                                        <label for="profilepicture">Nominee Photo :</label>
                                        <input type="file" class="form-control" id="profilePicture'.$x.'" name="profilepicture" onchange="readURL(this, '.$x.')">
                                        <hr class="light mb-4">
                                        <div class="container" style="text-align:center;">
                                            <img src="img/profpics/default_profpic.jpg" id="imageDisplay'.$x.'" class="rounded-circle" alt="Cinque Terre" style="height:170px; width:170px;">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- <div class="card-footer mx-auto">
                            <a class="btn btn-primary" data-toggle="modal" data-target="#nomineeModal">save nominee</a>
                        </div> -->
                    </div>
                </div>
                ';
            }
            ?>
        </div>
    </div>    
</div>
<!-- Modal footer -->
<?php
    echo '
    <div class="modal-footer modal-footer-success">
        <button type="button" class="btn btn-primary btn-x1" id="saveButton" onClick="addSettings('.$saved_count.','.$candidate_count.')">Save Settings</button>
        <button type="button" class="btn btn-secondary btn-x1" data-dismiss="modal">Close</button>
    </div>
    ';
?>

