<?php
session_start();

if(isset($_POST['electionID'])){
    $_SESSION['election_id'] = $_POST['electionID']; 
}
?>
