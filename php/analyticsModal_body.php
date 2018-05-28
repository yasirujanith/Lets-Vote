<?php

include_once 'model/pin.php';
include_once 'model/committee.php';
include_once 'model/candidate.php';
include_once 'model/vote.php';
include_once 'controller/election_controller.php';
include_once 'view/election_view.php';
include_once 'crud.php';
session_start();


if(isset($_POST['committeeID'])){
    $committee_id = $_POST['committeeID'];
    $candidate_id = $_POST['candidateID'];

    $candidate = new Candidate($candidate_id, null, null);
    $election_controller = new ElectionController($candidate);
    $election_view = new ElectionView($election_controller, $candidate);
    $candidate_det = $election_view->getCandidateDetails();
    $candidate_name = $candidate_det->getCandidateName();

    $committee = new Committee($committee_id, null, null, null);
    $election_controller = new ElectionController($committee);
    $election_view = new ElectionView($election_controller, $committee);
    $committee_det = $election_view->getCommitteeDetails();
    $committee_name = $committee_det->getCommitteeName();

    $total_committee_votes = $election_view->getTotalVotes();
    $total_election_votes = $election_view->getTotalElectionVotes();

}  

function getCandidates($committee_id){
    $candidate = new Candidate(null, $committee_id, null);
    $election_controller = new ElectionController($candidate);
    $election_view = new ElectionView($election_controller, $candidate);
    $response = $election_view->getCandidates();
    return $response;
}

function getVoteCount($candidate_id){
    $vote = new Vote($candidate_id, null);
    $election_controller = new ElectionController($vote);
    $election_view = new ElectionView($election_controller, $vote);
    $vote_det = $election_view->getVotes();
    $vote_count = sizeof($vote_det);
    return $vote_count;
}

$candidate_arr = [];
$vote_arr = [];
$candidate_set = getCandidates($committee_id);
for($x=0; $x<sizeof($candidate_set); $x++){
    $name = $candidate_set[$x]['candidate_name'];
    $id = $candidate_set[$x]['candidate_id'];
    $count = getVoteCount($id);
    array_push($candidate_arr, $name);
    array_push($vote_arr, $count);
}

function getRank($committee_id, $candidate_id){
    $rank = -1;
    $candidate = new Candidate(null, $committee_id, null);
    $election_controller = new ElectionController($candidate);
    $election_view = new ElectionView($election_controller, $candidate);
    $response = $election_view->getCandidateRank();
    $size = sizeof($response);
    $rank = 1;
    if($candidate_id == $response[0]['candidate_id']){
        return $rank;
    }
    for($x=1; $x<$size; $x++){
        $id = $response[$x]['candidate_id'];
        if($response[$x]['vote'] != $response[$x-1]['vote']){
            $rank+=1;
        }
        if($id == $candidate_id){
            return $rank;
        }
    }
    return -1;
}


?>

<!-- Modal Header -->
<div class="modal-header modal-header-success">
    <!-- <h4 class="modal-title">Extended Election Analytics</h4> -->
    <button type="button" class="close" data-dismiss="modal">&times;</button><br>
</div>
<!-- Modal body -->
<div class="modal-body modal-body-success">
    <div class="container">
        <div class="row">
            <div class="col-sm-3" style="text-align:center;">
                <img src="img/profpics/<?php echo $candidate_id; ?>.jpg" class="rounded-circle" alt="Cinque Terre" style="height:160px; width:160px;">
            </div>
            <div class="col-sm-5 text-uppercase">
                <br>
                <h3><?php echo $candidate_name; ?></h3>
                <h4>For <?php echo $committee_name; ?></h4>
            </div>
            <div class="col-sm-3" style="text-align:center; border: 5px solid #aaa; padding-top:15px;">
                <h3><?php 
                    $vote_count = getVoteCount($candidate_id);
                    if($vote_count == 1){ 
                        echo $vote_count.' VOTE'; 
                    } else { 
                        echo $vote_count.' VOTES'; 
                    } 
                ?></h3>
                <h4>out of</h4>
                <h3><?php echo $total_committee_votes; ?> VOTES</h3>
            </div>
        </div>
        <br><hr class="mb-3">
        <div style="margin:0 0 12px 0">
            <h6>CANDIDATE COMPARISON - GRAPHICAL REPRESENTATIONS</h6>
        </div>
        <div>
            <?php
                $candidate_set = getCandidates($committee_id);
                $size = sizeof($candidate_set);
                for($x=0; $x<$size; $x++){
                    $temp_candidate_id = $candidate_set[$x]['candidate_id'];
                    $vote_count = getVoteCount($temp_candidate_id);
                    $percentage = $vote_count/$total_committee_votes*100;
                    $percentage = round($percentage, 2);
                    echo '
                        <div class="row">
                            <div class="col-sm-1"></div>                            
                            <div class="col-sm-1">
                                <img src="img/profpics/'.$temp_candidate_id.'.jpg" class="rounded-circle" alt="Cinque Terre" style="height:50px; width:50px; padding:2px;">
                            </div>
                            <div class="col-sm-9" style="padding:12px;">
                                <div class="progress skill-bar ">
                                    <div class="progress-bar" role="progressbar" aria-valuenow="'.$percentage.'" aria-valuemin="0" aria-valuemax="100">
                                    ';
                                    if($percentage>5){
                                        echo '<span class="skill"><i class="val">'.$percentage.'%</i></span>';
                                    }else{
                                        echo '<span class="skill">votes<i class="val">'.$percentage.'%</i></span>';
                                    }
                                    echo '
                                    </div>
                                </div>
                            </div>
                        </div>                    
                    ';
                }
            ?>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-5">    
                <canvas id="doughnutChart"></canvas>      
            </div>
            <div class="col-sm-5">
                <div style="text-align:center; border: 5px solid #aaa; padding:20px;">
                    <?php
                        $vote_count = getVoteCount($candidate_id);
                        $percentage = $vote_count/$total_committee_votes*100;
                        $percentage = round($percentage, 2);
                        echo '
                            <h1>'.$percentage.'%</h1>
                            <h5 class="text-uppercase">Committee Votes</h5>
                        ';
                    ?>
                </div>
                <div style="margin: 5px 0 0 0;">
                    <div style="text-align:center; border: 5px solid #aaa; padding:20px;">
                        <?php
                            $vote_count = getVoteCount($candidate_id);
                            $percentage = $vote_count/$total_election_votes*100;
                            $percentage = round($percentage, 2);
                            echo '
                                <h1>'.$percentage.'%</h1>
                                <h5 class="text-uppercase">Election Votes</h5>
                            ';
                        ?>
                    </div>
                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
        <br>
        <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10" style="text-align:center; border: 5px solid #aaa; padding:20px;">
                <div>
                    <?php
                        $candidate_rank = getRank($committee_id, $candidate_id);
                        if($candidate_rank != -1){
                            echo '<h2>'.$candidate_name.' is ranked '.$candidate_rank;
                            if($candidate_rank==1){
                                echo 'st';
                            }else if($candidate_rank==2){
                                echo 'nd';
                            }else if($candidate_rank==3){
                                echo 'rd';
                            }else{
                                echo 'th';
                            }
                            echo ' in the committee. </h2>';
                        }else{
                            echo '<h2>No one has voted for '.$candidate_name.'</h2>';
                        }
                    ?>
                </div>
            </div>
            <div class="col-sm-1"></div>
        </div>
    </div>    
</div>

<!-- Modal footer -->    
<div class="modal-footer modal-footer-success">
    <button type="button" class="btn btn-secondary btn-x1" data-dismiss="modal">Close</button>
</div>

<script>
    $(document).ready(function() {
        $('.progress .progress-bar').css("width",
                function() {
                    return $(this).attr("aria-valuenow") + "%";
                }
        )
    });

    var ctxD = document.getElementById("doughnutChart").getContext('2d');
    console.log('pie chart initiation');
    var candidate_arr = <?php echo json_encode($candidate_arr); ?>;
    var vote_arr = <?php echo json_encode($vote_arr); ?>;
    console.log(candidate_arr);
    console.log(vote_arr);
    var myLineChart = new Chart(ctxD, {
        type: 'doughnut',
        data: {
            labels: candidate_arr,
            datasets: [
                {
                    data: vote_arr,
                    backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                    hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
                }
            ]
        },
        options: {
            responsive: true
        }    
    });
</script>
    


