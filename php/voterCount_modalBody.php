<?php
session_start();

if(isset($_POST['voterCount'])){
    $voter_count=$_POST['voterCount'];
}
?>


<?php
for($x=0; $x<$voter_count; $x++){
    echo '
    <div class="form-group">
        <div class="container">
            <div class="row">
                <div class="col-sm-4"><input type="text" placeholder="Voter Name" class="form-control" id="voter_name'.$x.'"></div>
                <div class="col-sm-8"><input type="email" placeholder="E-Mail" class="form-control" id="email'.$x.'"></div>
            </div>
        </div>
    </div>
    ';
}
?>