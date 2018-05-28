<?php
session_start();
include_once 'model/election_details.php';
include_once 'controller/election_controller.php';
include_once 'view/election_view.php';
include_once 'crud.php';


if(isset($_POST['former_committee_count'])){
    $election_id = $_POST['electionID'];
    $before_count=$_POST['former_committee_count'];
    $after_count=$_POST['post_committee_count'];

    $election_details = new ElectionDetails($election_id, null, null, null, null, null, null, null);
    $election_controller = new ElectionController($election_details);
    $election_view = new ElectionView($election_controller, $election_details);
    $response =  $election_view->getCommittees();
}
?>


<?php
if($before_count > $after_count){
    for($x=0; $x<$after_count; $x++){
        echo '
        <div class="form-group">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9"><input type="text" placeholder="committee / party name" class="form-control" id="committee_name'.$x.'"></div>
                    <div class="col-sm-3"><input type="number" placeholder="count" class="form-control" id="count'.$x.'"></div>
                </div>
            </div>
        </div>
        ';
    }
}else{
    for($x=0; $x<$before_count; $x++){
        $name = $response[$x]['committee_name'];
        $count = $response[$x]['candidate_count'];
        echo '
        <div class="form-group">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9"><input type="text" placeholder="committee / party name" class="form-control" value="'.$name.'" id="committee_name'.$x.'"></div>
                    <div class="col-sm-3"><input type="number" placeholder="count" class="form-control" value="'.$count.'" id="count'.$x.'"></div>
                </div>
            </div>
        </div>
        ';
    }

    for($x=0; $x<($after_count-$before_count); $x++){
        echo '
        <div class="form-group">
            <div class="container">
                <div class="row">
                    <div class="col-sm-9"><input type="text" placeholder="committee / party name" class="form-control" id="committee_name'.($x + $before_count).'"></div>
                    <div class="col-sm-3"><input type="number" placeholder="count" class="form-control" id="count'.($x + $before_count).'"></div>
                </div>
            </div>
        </div>
        ';
    }
}
?>
 
   