<?php

class SignIn {
    private $signin_email;
    private $signin_password;

    public function __construct($signin_email, $signin_password){
        $this->signin_email = $signin_email;
        $this->signin_password = $signin_password;
    }

    //getters
    public function getSignInEmail(){
        return $this->signin_email;
    }

    public function getSignInPassword(){
        return $this->signin_password;
    }

    
    //setters
    public function setSignInEmail($signin_email){
        $this->signin_email = $signin_email;
    }
    
    public function setSignInPassword($signin_password){
        $this->signin_password = $signin_password;
    }

}

?>