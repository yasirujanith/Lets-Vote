<?php
include_once("../crud.php");
$crud=new crud();
session_start();

if(isset($_POST['pin_value'])){
    $pin_value=$_POST['pin_value'];
    $query_electionkey=($crud->getData("SELECT * FROM election_keys WHERE election_key='$pin_value'"));
    if(!empty($query_electionkey)){
        $election_id=$query_electionkey[0]['election_id'];
        $email=$query_electionkey[0]['email'];
        $_SESSION["election_id"]=$election_id;
        //to check whether the pin is used earlier
        $query_userdetails=($crud->getData("SELECT * FROM user_details WHERE email='$email'"));
        if(empty($query_userdetails)){
            echo '1';
        }else{
            echo '2';
        }
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
    $query_add_userdetails=($crud->execute("INSERT INTO user_details(election_id, firstname, lastname, email, telephone, password, is_admin) VALUES('$election_id','$firstname','$lastname','$email','$telephone','$password','false')"));
    if($query_add_userdetails==true){
        echo 'true';
    }else{
        echo 'false';
    }
}
?>
