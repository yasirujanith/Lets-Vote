<?php

class UserID {
    private $user_id;

    public function __construct($user_id){
        $this->user_id = $user_id;
    }

    //getters
    public function getUserID(){
        return $this->user_id;
    }

    
    //setters
    public function setUserID($user_id){
        $this->user_id = $user_id;
    }

}

?>