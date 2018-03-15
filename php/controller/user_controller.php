<?php
include_once '../crud.php';
include_once '../model/signup_modal.php';

class UserController {
    private $model;
    private $pin_value;
    private $crud;
    private $signup_modal;
    private $homepage_settings;

    public function __construct($model){
        $this->model = $model;
        $this->crud = new crud();
    }

    public function confirmPin($model){
        $this->pin_value = $model->getPin();
        
        $query_electionkey=($this->crud->getData("SELECT * FROM election_keys WHERE election_key='$this->pin_value'"));
        if(!empty($query_electionkey)){
            $election_id=$query_electionkey[0]['election_id'];
            $email=$query_electionkey[0]['email'];
            $_SESSION['election_id'] = $election_id;
            $query_userdetails=($this->crud->getData("SELECT * FROM user_details WHERE email='$email'"));
            if(empty($query_userdetails)){
                return '1';
            }else{
                return '2';
            }
        }else{
            return '3';
        }
    }

    public function insertUserDetails($model){
        $election_id = $model->getElectionID();
        $firstname = $model->getFirstName();
        $lastname = $model->getLastName();
        $email = $model->getEmail();
        $telephone = $model->getTelephone();
        $password = $model->getPassword();

        $query_add_userdetails=($this->crud->execute("INSERT INTO user_details(election_id, firstname, lastname, email, telephone, password, is_admin) VALUES('$election_id','$firstname','$lastname','$email','$telephone','$password','false')"));
        if($query_add_userdetails==true){
            $query_userdetails=($this->crud->getData("SELECT * FROM user_details WHERE email='$email'"));
            if(!empty($query_userdetails)){
                $user_id=$query_userdetails[0]['user_id'];
                $_SESSION['user_id']=$user_id;
            }
            return 'true';
        }else{
            return 'false';
        }
    }

    public function signIn($model){
        $email = $model->getSignInEmail();
        $password = $model->getSignInPassword();

        $query_userdetails=($this->crud->getData("SELECT * FROM user_details WHERE email='$email'"));
        if(!empty($query_userdetails)){
            $password_db=$query_userdetails[0]['password'];
            $is_admin=$query_userdetails[0]['is_admin'];
            $user_id=$query_userdetails[0]['user_id'];
            if($password == $password_db){
                $_SESSION['user_id']=$user_id;
                if($is_admin == 'false'){
                    return 'voter';   
                }else{
                    return 'admin';
                }
            }else{
                return 'invalid';
            }
        }else{
            return 'invalid';
        }
    }

    public function signupModalDetailSetting($model){
        $pin_value = $model->getPin();

        $query_electionKeys=($this->crud->getData("SELECT * FROM election_keys WHERE election_key='$pin_value'"));
        if(!empty($query_electionKeys)){
            $election_id=$query_electionKeys[0]['election_id'];
            $email=$query_electionKeys[0]['email'];
            $query_electionDetails=($this->crud->getData("SELECT * FROM election_details WHERE election_id='$election_id'"));
            if(!empty($query_electionDetails)){
                $election_name=$query_electionDetails[0]['election_name'];
                $institute=$query_electionDetails[0]['institute'];
                $this->signup_modal = new SignUpModalDetails($election_name, $institute, $email);
                return $this->signup_modal;
            }
        }
    }
}
?>