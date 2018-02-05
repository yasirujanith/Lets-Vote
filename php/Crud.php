<?php
include_once 'DbConfig.php';

class Crud extends DbConfig{
    public function __construct(){
        parent::__construct();
    }
    
    public function getData($query){
        $result=$this->connection->query($query);
        if($result==false){
            return false;
        }
        
        $rows=array();
        while($row=$result->fetch_assoc()){
            $rows[]=$row;
        }
        return $rows;
    }
    
    public function execute($query){
        $result=$this->connection->query($query);
        if($result==false){
            echo "Error:Cannot execute the command";
            return false;
        }else{
            return true;
        }
    }
        
    public function escape_string($value){
        return $this->connection->real_escape_string($value);
    }
}