<?php
include_once("php/crud.php");
session_start();
$crud=new crud();

$user_id = $_SESSION['user_id'];
$election_id = $_SESSION['election_id'];
$query_committeedetails = ($crud->getData("SELECT * FROM committee WHERE election_id='$election_id'"));
$query_electiondetails = ($crud->getData("SELECT * FROM election_details WHERE election_id='$election_id'"));
$count = $query_electiondetails[0]['committee_count'];

$query_userdetails = ($crud->getData("SELECT * FROM user_details WHERE user_id='$user_id'"));
if(!empty($query_userdetails)){
  $firstname = $query_userdetails[0]['firstname'];
  $lastname = $query_userdetails[0]['lastname'];
  $fullname = $firstname." ".$lastname;
}