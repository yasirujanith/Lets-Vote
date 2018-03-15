<?php
include_once '../model/pin.php';
include_once '../model/user_details.php';
include_once '../model/signin.php';
include_once '../controller/user_controller.php';
include_once '../view/index_view.php';

//$crud = new crud();
session_start();

if(isset($_POST['pin_value'])){
    $pin_value=$_POST['pin_value'];
    $pin = new Pin($pin_value);
    $user_controller = new UserController($pin);
    $index_view = new IndexView($user_controller, $pin);
    $response =  $index_view->confirmPin();
    if($response == '1'){
        echo '1';
    }else if($response == '2'){
        echo '2';
    }else{
        echo '3';
    }
}

if(isset($_POST['firstname'])){
    $election_id=$_SESSION['election_id'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $email=$_POST['email'];
    $telephone=$_POST['telephone'];
    $password=$_POST['password'];
    $user_details = new UserDetails(null, $election_id, $firstname, $lastname, $email, $telephone, $password, 'false');
    $user_controller = new UserController($user_details);
    $index_view = new IndexView($user_controller, $user_details);
    $response = $index_view->insertUserDetails();
    if($response == 'true'){
        echo '1';
    }else{
        echo '2';
    }
}

if(isset($_POST['signin_email'])){
    $email=$_POST['signin_email'];
    $password=$_POST['signin_password'];
    $signin = new SignIn($email, $password);
    $user_controller = new UserController($signin);
    $index_view = new IndexView($user_controller, $signin);
    $response = $index_view->signIn();
    if($response == 'voter'){
        echo '1';
    }else if($response == 'admin'){
        echo '2';
    }else{
        echo '3';
    }
}
?>
