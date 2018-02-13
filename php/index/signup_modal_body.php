<?php
include_once("../crud.php");
$crud=new crud();

if(isset($_POST['pin_value'])){
    $pin_value=$_POST['pin_value'];
    $query_electionKeys=($crud->getData("SELECT * FROM election_keys WHERE election_key='$pin_value'"));
    if(!empty($query_electionKeys)){
        $election_id=$query_electionKeys[0]['election_id'];
        $email=$query_electionKeys[0]['email'];
        $query_electionDetails=($crud->getData("SELECT * FROM election_details WHERE election_id='$election_id'"));
        if(!empty($query_electionDetails)){
            $election_name=$query_electionDetails[0]['election_name'];
            $institute=$query_electionDetails[0]['institute'];
        }
    }
}
?>

<!-- Alert Box -->
<div class="alert alert-success alert-dismissable fade show">
    <button type="button" class="close" data-dismiss="alert" style="padding-bottom: 0px">&times;</button>
    <div class="edit-content-1">
        <div class="row" style="font-size:13px;">
            <div class="col-sm-5">
                <p>Registering Election: </p>
            </div>
            <div class="col-sm-7">
                <p class="mb-1"><?php echo $election_name; ?></p>
                <p>( <?php echo $institute;?> )</p>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <div class="row" >
    <div class="col-sm-6">
        <label for="firstname">First Name:</label>
        <input type="text" class="form-control" id="signup_firstname">
    </div>
    <div class="col-sm-6">
        <label for="lastname">Last Name:</label>
        <input type="text" class="form-control" id="signup_lastname">
    </div>
    </div>
</div>  
<div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="signup_email" value="<?php echo $email;?>">
</div>
<div class="form-group">
    <label for="email">Telephone Number:</label>
    <input type="email" class="form-control" id="signup_telephone">
</div>
<div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="signup_password">
</div>
<div class="form-group">
    <label for="pwd">Confirm Password:</label>
    <input type="password" class="form-control" id="signup_confirm_password">
</div>

   