<?php

class Pin {
    private $pin_value;

    public function __construct($pin_value){
        $this->pin_value = $pin_value;
    }

    //getters
    public function getPin(){
        return $this->pin_value;
    }

    
    //setters
    public function setPin($pin_value){
        $this->pin_value = $pin_value;
    }

}

?>