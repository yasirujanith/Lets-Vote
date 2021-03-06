<?php
require 'php/admin_home_be.php';
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>LetsVote</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/create_election.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" style="font-size:25px">LETS VOTE</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#'.$committee_id.'" style="font-size:15px" ><?php echo $fullname; ?></a>
            </li>
            <li class="nav-item">
              <div style="padding:0px 5px;">
                <span class="badge badge-info text-white" style="height:40px; padding:12px 20px; font-size:15px;">ADMIN</span>
              </div>
            </li>
          </ul>
        </div>

      </div>
    </nav>
    <header class="text-center text-uppercase text-white">
      <h1 style="font-size:45px"><strong>Let's Create a <span class="header_highlight">New election</span></strong></h1>
      <hr>
      <h3 style="font-size:20px"><strong>Enter the details of the overall election</strong></h3>
      <br>
    </header>

    <div class="container text-white" style="width:1000px">
      <div class="row">
        <div class="col-sm-6">
          <div class="form-group">
            <label for="election_name">Election Name :</label>
            <input type="text" class="form-control" id="election_name">
          </div>
        </div>
        <div class="col-sm-6">
          <div class="form-group">
            <label for="date">Institute Name :</label>
            <input type="text" class="form-control" id="institute_name">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-3">
          <div class="form-group">
            <label for="election_name">Committee Count :</label>
            <input type="number" class="form-control" id="committee_count" min="1">
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label for="date">Commencing Date :</label>
            <input type="date" class="form-control" id="date" min="<?php echo date('Y-m-d'); ?>">
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label for="date">From :</label>
            <input type="time" class="form-control" id="start_time">
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label for="date">To :</label>
            <input type="time" class="form-control" id="end_time">
          </div>
        </div>
        
      </div>
      <hr class="light mb-5">
      <div class="text-center">
        <a class="btn btn-primary btn-xl" id="registerButton" >Register Parties / Committees</a>
        <!-- data-toggle="modal" data-target="#partyModal" -->
      </div>
    </div>


    <!-- party model -->
    <div class="modal fade" id="modalCommittee">
      <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header modal-header-success">
            <h5 class="modal-title">Enter Name and Nominee Count for each Party / Committee</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <!-- Modal body -->
          <div class="modal-body modal-body-success">
            <form action="/action_page.php">
              <div class="modal-body edit-content">
                    
              </div>            
            </form>
          </div>
          <!-- Modal footer -->
          <div class="modal-footer modal-footer-success">
            <button type="submit" class="btn btn-primary js-scroll-trigger" id="btn_submit">Submit</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  
    
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
  <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/creative.min.js"></script>

  <script>
    var isElectionAdded = false;
    $(document).ready(function(){
      $('#registerButton').click(function(){
        var electionName = document.getElementById("election_name").value;
        var instituteName = document.getElementById("institute_name").value;
        var committeeCount = document.getElementById("committee_count").value;
        var date = document.getElementById("date").value;
        var start_time = document.getElementById("start_time").value;
        var end_time = document.getElementById("end_time").value;

        var start_date = new Date(date);
        var current_date = new Date();
        var date_difference = (start_date - current_date)/3600000;
        //console.log(date_difference); 

        var start_datetime = new Date("7/20/2018 " + start_time);
        var end_datetime = new Date("7/20/2018 " + end_time);
        var time_difference = (end_datetime-start_datetime)/3600000;
        //console.log('time : '+(time_difference));
        // console.log(electionName);
        // console.log(instituteName);
        // console.log(committeeCount);
        // console.log(date);
        // console.log(start_time);
        // console.log(end_time);
        if(isElectionAdded == false){
          if(electionName != '' && instituteName != '' && committeeCount != '' && date != '' && start_time != '' && end_time != ''){
             if(time_difference > 0 && date_difference>=0){ 
              console.log('start');
              $.ajax({
                url: "php/create_election_be.php",
                method: "POST",
                data: {electionName: electionName, instituteName: instituteName, committeeCount: committeeCount, date: date, start_time: start_time, end_time: end_time},
                success: function(data){
                  console.log(data);
                  if(data == 1){
                    isElectionAdded = true;
                    $("#modalCommittee").modal("toggle");
                  }else{
                    alert('There must have been some error. Try again shortly.')
                  }
                }
              });
             }else{
               alert("Invalid Election Period.")
             }
          }else{
            alert('filling in all data required is mandatory');
          }
        }else{
          $("#modalCommittee").modal("toggle");
        }
      });

      ///////////modal-data-passing//////////////////////////////////////
      $('#modalCommittee').on('show.bs.modal', function(e) {
        var $modal = $(this);
        var committeeCount = document.getElementById("committee_count").value;
        //console.log(committeeCount);
        $.ajax({
          cache: false,
          method: 'POST',
          url: 'php/committeeCount_modalBody.php',
          data: {committeeCount : committeeCount},
          success: function(data) {
              $modal.find('.edit-content').html(data);
          }
        });
      });
      ////////////////////////////////////////////////////////////////////

      $('#btn_submit').click(function(){
        var committeeCount = document.getElementById("committee_count").value;
        var isSuccess = true;
        var isFilled = true;
        var promises = [];
        for(var i=0; i<committeeCount; i++){
          committeeName = $('#committee_name'+i).val();
          candidateCount = $('#count'+i).val();
          if(committeeName == '' || candidateCount == ''){
            isFilled = false;
          }  
        }
        if(isFilled == true){
          for(var i=0; i<committeeCount; i++){
            committeeName = $('#committee_name'+i).val();
            candidateCount = $('#count'+i).val();
            console.log(committeeName+": "+candidateCount);
            var request = $.ajax({
              url: "php/create_election_be.php",
              method: "POST",
              data: {committeeName:committeeName, candidateCount:candidateCount},
              success: function(data){
                console.log(data);
                if(data == 0){
                  isSuccess = false;
                }
              }
            });
            promises.push(request);
          }
          $.when.apply(null, promises).done(function(){
            if(isSuccess == true){
              window.location.href = "http://localhost/letsvote/assign_nominees.php";
            }else{
              window.location.href = "http://localhost/letsvote/create_election.php";
            }
          });
        }else{
          alert('fill all the committee details')
        }
      });

    });
  </script>

  </body>

</html>
