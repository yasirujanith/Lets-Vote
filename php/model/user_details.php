<?php

class UserDetails {
    private $user_id;
    private $election_id;
    private $firstname;
    private $lastname;
    private $email;
    private $telephone;
    private $password;
    private $is_admin;

    public function __construct($user_id, $election_id, $firstname, $lastname, $email, $telephone, $password, $is_admin){
        $this->user_id = $user_id;
        $this->election_id = $election_id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->telephone = $telephone;
        $this->password = $password;
        $this->is_password = $is_admin;
    }

    //getters
    public function getUserID(){
        return $this->user_id;
    }

    public function getElectionID(){
        return $this->election_id;
    }

    public function getFirstName(){
        return $this->firstname;
    }

    public function getLastName(){
        return $this->lastname;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getTelephone(){
        return $this->telephone;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getIsAdmin(){
        return $this->is_admin;
    }

    //setters
    public function setUserID($user_id){
        $this->user_id = $user_id;
    }

    public function setElectionID($election_id){
        $this->election_id = $election_id;
    }

    public function setFirstName($firstname){
        $this->firstname = $firstname;
    }

    public function setLastName($lastname){
        $this->lastname = $lastname;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setTelephone($telephone){
        $this->telephone = $telephone;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setIsAdmin($is_admin){
        $this->is_admin = $is_admin;
    }
}

?>