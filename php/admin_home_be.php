<?php
include_once("php/crud.php");
session_start();
$crud=new crud();

$user_id=$_SESSION['user_id'];
$query_userdetails=($crud->getData("SELECT * FROM user_details WHERE user_id='$user_id'"));
if(!empty($query_userdetails)){
  $firstname=$query_userdetails[0]['firstname'];
  $lastname=$query_userdetails[0]['lastname'];
  $fullname=$firstname." ".$lastname;
}

$query_electiondetails=($crud->getData("SELECT * FROM election_details WHERE admin_id='$user_id'"));
$size = sizeof($query_electiondetails);



 