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
    <link href="css/admin_home.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <div class = "row">
          <div><a class="navbar-brand js-scroll-trigger" style="font-size:25px">LETS VOTE</a></div>
          <div>
            <div style="padding:0px 5px;">
              <span class="badge badge-info text-white" style="height:40px; padding:12px 20px; font-size:15px;">ADMIN</span>
            </div>
          </div>
        </div>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
          <?php
            if($size != 0){
              echo '
                <li class="nav-item">
                  <a class="nav-link js-scroll-trigger" href="#createdElections" style="font-size:15px" >Created Elections</a>
                </li>
              ';
            }
          ?>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" style="font-size:15px" ><?php echo $fullname; ?></a>
            </li>
            <li class="nav-item">
              <div style="padding:0px 5px;">
                <a href="http://localhost/letsvote/index.php" id="logoutButton"><span class="badge badge-warning text-white" style="height:40px; padding:12px 20px; font-size:15px; background-color: rgba(255, 187, 0, 0.820); ">SIGNOUT</span></a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <header class="text-center text-white d-flex" style="padding-bottom:140px">
      <div class="container my-auto" style="padding: 0 0 0 0;">
        <div class="row">
          <div class="col-lg-10 mx-auto">
              <h1 class="text-uppercase" style="font-size:3.7rem; font-weight:500;">               
                  <br><strong>Welcome to <span class="header_highlight">Lets-Vote!</span></strong>
              </h1>
            <hr class="mb-5">
          </div>
          <div class="col-lg-10 mx-auto">
            <p class="text-faded mb-1" style="font-size:1.55rem; font-weight:380;"><strong>Your <span class="header_highlight">administrative account</span> has been created successfully</strong></p>
            <p class="text-faded mb-4" style="font-size:1.55rem; font-weight:380;"><strong>Now you can <span class="header_highlight">create</span> your own <span class="header_highlight">election</span></strong></p>
            <p class="text-faded mb-5" style="font-size:1.45rem; font-weight:380;"><strong><span class="header_highlight">Analytics</span> won't be available until the end of the election</strong></p>
            <form>
              <div class="container" style="width:400px">                
                <div class="col-sm-10">
                  <a class="btn btn-vote btn-xl" style="width:300px; font-size:20px; font-weight:500;"  id="btn_createElection">CREATE ELECTION NOW</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </header>

    <?php
      if($size != 0){
        echo '
        <section class="text-center text-white d-flex" id="createdElections" style="padding-top:30px;">
          <div class="container my-auto">
            <div class="row">
              <div class="col-lg-10 mx-auto">
                <h2 class="text-uppercase" style="font-size:2rem; font-weight:300;">               
                    <strong>elections created by you</strong>
                    <hr class="light mb-4" style="width:200px">
                </h2>
                <br>
              </div>
            </div>
            <div class="row">
            ';
              for($x=0; $x<$size; $x++){
                $election_id = $query_electiondetails[$x]['election_id'];
                $election_name = $query_electiondetails[$x]['election_name'];
                $institute = $query_electiondetails[$x]['institute'];
                $date = $query_electiondetails[$x]['date'];
                $start_time = $query_electiondetails[$x]['start_time'];
                $end_time = $query_electiondetails[$x]['end_time'];

                $current_date = date("Y-m-d");
                $date1=date_create($current_date);
                $date2=date_create($date);
                $diff=date_diff($date1,$date2);
                $result = (int)($diff->format("%R%a"));
                echo '
                  <div class="col-sm-4">
                    <div class="card mb-4 card-previous-elections" style="width:350px; height:380px;">
                      <div class="card-body">
                        <h4 class="card-title" style="text-align:center;">'.$election_name.'</h4>
                        <hr class="light mb-4" style="width:120px">
                        <div class="form-group">
                          <br>
                          <h5>'.$institute.'</h5>
                          <h5>on</h5>
                          <h5>'.$date.'</h5>
                          <h5>from '.$start_time.' to '.$end_time.' hrs</h5>      
                        </div>
                      </div>
                      <div class="card-footer mx-auto">
                ';
                if($result > 0){       
                echo '
                          <a class="btn btn-primary" style="width:90px" onClick="setAction('.$election_id.')" id="editButton">Edit</a>
                          <a class="btn btn-primary" style="width:90px" onClick="deleteElection('.$election_id.')" id="deleteButton">Delete</a>
                ';
                }else if($result < 0){       
                echo '
                          <a class="btn btn-primary" style="width:170px" onClick="getAnalytics('.$election_id.')" id="analyticsButton">Get Analytics</a>
                ';
                }else{
                echo '<span class="header_highlight">Await for Results</span>';
                }

                echo '
                      </div>
                    </div>
                  </div>
                  ';
              }
        echo '
            </div>
          </div>
        </section>
        ';
      }
    ?>

    <!-- Bootstrap core JavaScript -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>

    <script>
      var election_id;
      function setAction(id){
        election_id = id;
        console.log(election_id);
        localStorage.setItem("electionID", election_id);  
        window.location.href = "http://localhost/letsvote/update_election.php";
      }

      function deleteElection(id){
        election_id = id;
        if(confirm("Are you sure that you want to delete this election?")) {
          console.log(election_id);
          $.ajax({
            url: "php/admin_home_be2.php",
            method: "POST",
            data: {election_id: election_id},
            success: function(data){
              console.log(data);
              if(data == 1){
                alert('Election deletion successfull.')
                window.location.href = "http://localhost/letsvote/admin_home.php";
              }
            }
          });
        }  
      }

      function getAnalytics(id){
        election_id = id;
        console.log(election_id);
        localStorage.setItem("electionID", election_id);
        $.ajax({
            cache: false,
            method: 'POST',
            url: 'php/setElectionID.php',
            data: {electionID : election_id},
            success: function(data) {
        
            }
        });
        window.location.href = "http://localhost/letsvote/get_adminAnalytics.php";
      }

      $('#btn_createElection').click(function(){
        window.location.href = "http://localhost/letsvote/create_election.php";
      });
      $('#btn_getAnalytics').click(function(){
        //console.log('hello');
        window.location.href = "http://localhost/letsvote/get_analytics.php";
      });
    </script>

  </body>

</html>
