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
                <div class="col-sm-4">
                    <input type="text" placeholder="firstname" class="form-control" id="voter_name'.$x.'">
                    <span id="firstname_span'.$x.'" style="color: rgba(211, 0, 0, 0.712); font-size:13px;"></span>
                </div>
                <div class="col-sm-8">
                    <input type="email" placeholder="e-mail" class="form-control" id="email'.$x.'">
                    <span id="email_span'.$x.'" style="color: rgba(211, 0, 0, 0.712); font-size:13px;"></span>
                </div>
            </div>
        </div>
    </div>
    ';
}
    echo'
        <div class="text-center">   
            <span id="alert_span" style=" font-size:16px;"></span>
        </div>
        ';
?>