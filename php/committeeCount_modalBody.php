<?php
session_start();

if(isset($_POST['committeeCount'])){
    $committee_count=$_POST['committeeCount'];
}
?>


<?php
for($x=0; $x<$committee_count; $x++){
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
?>
 
   