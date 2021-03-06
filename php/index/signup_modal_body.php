<?php
include_once '../model/pin.php';
include_once '../model/signup_modal.php';
include_once '../controller/user_controller.php';
include_once '../view/index_view.php';
session_start();


if(isset($_POST['pin_value'])){
    $pin_value=$_POST['pin_value'];
    $pin = new Pin($pin_value);
    $user_controller = new UserController($pin);
    $index_view = new IndexView($user_controller, $pin);
    $response = $index_view->signupModalDetailSetting();
    $election_name = $response->getElectionName();
    $institute = $response->getInstitute();
    $email = $response->getEmail();
    
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
        <span id="firstname_span" style="color: rgba(211, 0, 0, 0.712); font-size:13px;"></span>
    </div>
    <div class="col-sm-6">
        <label for="lastname">Last Name:</label>
        <input type="text" class="form-control" id="signup_lastname">
        <span id="lastname_span" style="color: rgba(211, 0, 0, 0.712); font-size:13px;"></span>
    </div>
    </div>
</div>  
<div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="signup_email" value="<?php echo $email;?>">
    <span id="email_span" style="color: rgba(211, 0, 0, 0.712); font-size:13px;"></span>
</div>
<div class="form-group">
    <label for="email">Telephone Number:</label>
    <input type="text" class="form-control" id="signup_telephone">
    <span id="telephone_span" style="color: rgba(211, 0, 0, 0.712); font-size:13px;"></span>
</div>
<div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="signup_password">
    <span id="password_span" style="color: rgba(211, 0, 0, 0.712); font-size:13px;"></span>
</div>
<div class="form-group">
    <label for="pwd">Confirm Password:</label>
    <input type="password" class="form-control" id="signup_confirm_password">
    <span id="confirmpassword_span" style="color: rgba(211, 0, 0, 0.712); font-size:13px;"></span>
</div>

   