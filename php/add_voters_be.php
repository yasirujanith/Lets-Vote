<?php
session_start();
include_once 'model/election_key.php';
include_once 'model/election_details.php';
include_once 'controller/election_controller.php';
include_once 'view/election_view.php';
include_once 'crud.php';

//PHPMailer imports
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader
require '../vendor/autoload.php';
    

if(isset($_POST['voterName'])){
    $voter_name = $_POST['voterName'];
    $email = $_POST['email'];
    $election_id = $_SESSION['election_id'];
    // echo $election_id;
    $isUnique = false;
    while($isUnique == false){
        $key = generateRandomString(10);
        //echo $key;
        $election_key = new ElectionKey($election_id, $email, $key);
        $election_controller = new ElectionController($election_key);
        $election_view = new ElectionView($election_controller, $election_key);
        $response = $election_view->isKeyExists(); //'true' or 'false'
        if($response == 'false'){
            $isUnique = true;
        }
    }
    
    $election = $election_view->getElection();  //getting election details
    $election_name = $election->getElectionName();
    $institute = $election->getInstitute();
    $date = $election->getDate();
    $start_time = $election->getStartTime();
    $end_time = $election->getEndTime();
    $start_time = date('h:i a', strtotime($start_time));
    $end_time = date('h:i a', strtotime($end_time));
    //adding key to the database
    $response = $election_view->addElectionKey();
    if($response == 'true'){
        sendEmail($voter_name, $email, $election_name, $institute, $date, $start_time, $end_time, $key);
        echo '1';
    }else{
        echo '0';
    }
}

function generateRandomString($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

function sendEmail($voter_name, $email, $election_name, $institute, $date, $start_time, $end_time, $key){
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        //$mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'letsvoteteam@gmail.com';                 // SMTP username
        $mail->Password = 'Letsvote@12345';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
    
        //Recipients
        $mail->setFrom('letsvoteteam@gmail.com', 'Admin from LetsVote');
        $mail->addAddress($email);     // Add a recipient
        // $mail->addAddress('ellen@example.com');               // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
    
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
        
        $body = '
            <p>Dear '.$voter_name.',</p>
            <p>You have been assinged as a voter in the election <strong>'.$election_name.' ('.$institute.')</strong> which is conducted via LetsVote platform.</p>
            <p>The election will be commenced on <strong>'.$date.'</strong> from <strong>'.$start_time.'</strong> to <strong>'.$end_time.'</strong> and you will not be able to vote for the election outside of this time range.</p>
            <p>Use the Pin number <u><strong>'.$key.'</strong></u> to create your voter account via our website www.letsvote.com</p>
            <p>Your participation in the voting process is highly appreciated.</p>
            <p>Thank you,</p>
            <p>Team LetsVote</p>        
        ';
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Regarding the '.$election_name.' ('.$institute.')';
        $mail->Body    = $body;
        $mail->AltBody = strip_tags($body);
    
        $mail->send();
        echo '1';
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }
}
?>