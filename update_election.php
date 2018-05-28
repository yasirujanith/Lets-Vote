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
            <input type="number" class="form-control" id="committee_count">
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label for="date">Commencing Date :</label>
            <input type="date" class="form-control" id="date">
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
    // Adding initial details
    var electionID = localStorage.getItem("electionID");
    var former_committee_count;
    var post_committee_count;
    var committees = [];
    var candidate_count = [];
    console.log(electionID);
    $.ajax({
        url: "php/update_election_be.php",
        method: "POST",
        data: {electionID: electionID},
        dataType: "json",
        success: function(data){
            console.log(data);
            former_committee_count = data[2];
            document.getElementById("election_name").value = data[0];
            document.getElementById("institute_name").value = data[1];
            document.getElementById("committee_count").value = data[2];
            document.getElementById("date").value = data[3];
            document.getElementById("start_time").value = data[4];
            document.getElementById("end_time").value = data[5];
        }
    });

    // updating procedure
    $(document).ready(function(){
      $('#registerButton').click(function(){
        var electionName = document.getElementById("election_name").value;
        var instituteName = document.getElementById("institute_name").value;
        var committeeCount = document.getElementById("committee_count").value;
        var date = document.getElementById("date").value;
        var start_time = document.getElementById("start_time").value;
        var end_time = document.getElementById("end_time").value;
        post_committee_count = committeeCount;
        // console.log(electionName);
        // console.log(instituteName);
        // console.log(committeeCount);
        // console.log(date);
        // console.log(start_time);
        // console.log(end_time);
        if(electionName != '' && instituteName != '' && committeeCount != '' && date != '' && start_time != '' && end_time != ''){
          console.log('start');
          $.ajax({
            url: "php/update_election_be.php",
            method: "POST",
            data: {election_id: electionID, electionName: electionName, instituteName: instituteName, committeeCount: committeeCount, date: date, start_time: start_time, end_time: end_time},
            success: function(data){
                console.log(data);
                if(data == 1){
                    $("#modalCommittee").modal("toggle");
                }else{
                    alert('There must have been some error. Try again shortly.')
                }
            }
          });
        }else{
          alert('filling in all data required is mandatory');
        }
      });

      ///////////modal-data-passing//////////////////////////////////////
      $('#modalCommittee').on('show.bs.modal', function(e) {
        var $modal = $(this);
        $.ajax({
          cache: false,
          method: 'POST',
          url: 'php/committeeCount_modalBody_update.php',
          data: {electionID: electionID, former_committee_count : former_committee_count, post_committee_count: post_committee_count},
          success: function(data) {
              $modal.find('.edit-content').html(data);
              for(var i=0; i<former_committee_count; i++){
                committeeName = $('#committee_name'+i).val();
                candidateCount = $('#count'+i).val();
                committees.push(committeeName);
                candidate_count.push(candidateCount);
              }
          }
        });
      });
      ////////////////////////////////////////////////////////////////////

      $('#btn_submit').click(function(){
        var committeeCount = document.getElementById("committee_count").value;
        var isSuccess = true;
        var isFilled = true;
        var beforeCount = former_committee_count;
        var afterCount = post_committee_count;

        for(var i=0; i<afterCount; i++){
          committeeName = $('#committee_name'+i).val();
          candidateCount = $('#count'+i).val();
          if(committeeName == '' || candidateCount == ''){
            isFilled = false;
          }  
        }
        if(beforeCount > afterCount){
            promises = [];
            console.log('start updating: '+electionID);
            if(isFilled == true){
                $.ajax({
                    url: "php/update_election_be.php",
                    method: "POST",
                    data: {electionDup1ID: electionID},
                    success: function(data){
                        console.log('delete: '+data);
                        for(var i=0; i<afterCount; i++){
                          committeeName = $('#committee_name'+i).val();
                          candidateCount = $('#count'+i).val();
                          console.log(committeeName+": "+candidateCount);
                          var request = $.ajax({
                            url: "php/update_election_be.php",
                            method: "POST",
                            data: {electionDup0ID: electionID, committeeName:committeeName, candidateCount:candidateCount},
                            success: function(data){
                                console.log('Adding: '+data);
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
                    }
                });
                
            }else{
                alert('fill all the committee details')
            }
        }else{
            console.log(committees);
            
            if(isFilled == true){
                for(var i=0; i<beforeCount; i++){
                  committeeNameBefore = committees[i]
                  candidateCountBefore = candidate_count[i];
                  committeeName = $('#committee_name'+i).val();
                  candidateCount = $('#count'+i).val();
                  console.log(committeeNameBefore+" : "+committeeName+": "+candidateCount);
                  $.ajax({
                    url: "php/update_election_be.php",
                    method: "POST",
                    data: {electionDup2ID: electionID, committeeNameBefore: committeeNameBefore, candidateCountBefore: candidateCountBefore, committeeNameDup2: committeeName, candidateCount: candidateCount},
                    success: function(data){
                        console.log(data);
                        if(data == 0){
                          isSuccess = false;
                        }
                    }
                  });
                }

                promises = [];
                for(var i=beforeCount; i<afterCount; i++){
                  committeeName = $('#committee_name'+i).val();
                  candidateCount = $('#count'+i).val();
                  console.log(committeeName+": "+candidateCount);
                  var request = $.ajax({
                  url: "php/update_election_be.php",
                  method: "POST",
                  data: {electionDup0ID: electionID, committeeName: committeeName, candidateCount: candidateCount},
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
                      window.location.href = "http://localhost/letsvote/update_assign_nominees.php";
                  }else{
                      window.location.href = "http://localhost/letsvote/update_election.php";
                  }
                });
            }else{
                alert('fill all the committee details')
            }
        }
      });

    });
  </script>

  </body>

</html>
