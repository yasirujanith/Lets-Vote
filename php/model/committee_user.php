<?php

class Committee_User {
    private $committeeID;
    private $userID;

    public function __construct($committeeID, $userID){
        $this->committeeID = $committeeID;
        $this->userID = $userID;
    }

    //getters
    public function getCommitteeID(){
        return $this->committeeID;
    }

    public function getUserID(){
        return $this->userID;
    }

    
    //setters
    // public function setCommitteeID($committeeID){
    //     $this->committeeID = $committeeID;
    // }

}

?>