<?php
require 'php/getAnalytics_initials.php';
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
    <link href="css/get_analytics.css" rel="stylesheet">

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
            <?php
              for($x=0; $x<$committee_count; $x++){
                $committee_id = $committee_set[$x]['committee_id'];
                $committee_name = $committee_set[$x]['committee_name'];
                echo '
                  <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#'.$committee_id.'" style="font-size:15px" >'.$committee_name.'</a>
                  </li>
                ';
              }
            ?>
            <li class="nav-item">
              <div style="padding:0px 5px;">
                <a href="http://localhost/letsvote/index.php"><span class="badge badge-warning text-white" style="height:40px; padding:12px 20px; font-size:15px; background-color: rgba(255, 187, 0, 0.820); ">SIGNOUT</span></a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <header class="text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-12 mx-auto">
              <div class="col-lg-10 mx-auto">
                  <h2 class="text-uppercase" style="font-size:2rem; font-weight:300;">               
                      <br><strong><?php echo $institute; ?></strong>
                  </h2>
                <h1 class="text-uppercase" style="font-size:3.5rem; font-weight:500;">
                  <strong><?php echo $election_name; ?></strong>
                </h1>
                <hr class="mb-3" style="width:250px">
              </div>
              <h1 class="text-uppercase">               
                  <strong>let's get <span class="header_highlight">analytics</span></strong>
                  <hr class="mb-5" style="width:250px">
              </h1>
          </div>
          <div class="col-lg-11 mx-auto text-uppercase">
            <p class="text-faded mb-2" style="font-size:25px; font-weight:300;"><strong>time allocated for your election is now over</strong></p>
            <p class="text-faded mb-5" style="font-size:25px; font-weight:300;"><strong>Now you can view the <span class="header_highlight">statistics</span> of the  <?php echo $election_name; ?></strong></p>
            <form>
              <a class="btn btn-primary btn-xl js-scroll-trigger" href="#<?php echo $committee_set[0]['committee_id']; ?>" style="font-size:20px; font-weight:600;">let's proceed</a>
            </form>
            <br><br><br>
          </div>
        </div>
      </div>
    </header>
    <?php
      for($x=0; $x<$committee_count; $x++){
        $committee_id = $committee_set[$x]['committee_id'];
        $committee_name = $committee_set[$x]['committee_name'];
        $candidate_set = getCandidates($committee_id);
        $candidate_count = sizeof($candidate_set);
        //echo 'count: '.$candidate_count;
        $total_votes = 0;
        for($y=0; $y<$candidate_count; $y++){
          $candidate_id = $candidate_set[$y]['candidate_id'];
          $votes = getVotes($candidate_id);
          $vote_count = sizeof($votes);
          $total_votes += $vote_count;
        }
        echo '
          <section class="text-center text-white d-flex" id="'.$committee_id.'">
            <div class="container my-auto">
              <div class="row">
                <div class="col-lg-10 mx-auto">
                  <h2 class="text-uppercase" style="font-size:2rem; font-weight:300;">               
                      <br><strong>'.$committee_name.' - statistical report</strong>
                  </h2>
                  <br>
                </div>
              </div>
              <div class="row">
            ';
            
        for($y=0; $y<$candidate_count; $y++){
          $candidate_name = $candidate_set[$y]['candidate_name'];
          $candidate_id = $candidate_set[$y]['candidate_id'];
          $votes = getVotes($candidate_id);
          $vote_count = sizeof($votes);
          //echo $name.' '.$id.' '.$vote_count.' | ';

          echo '
                <div class="col-sm-4">
                  <div class="card mb-4" style="width:350px; height:440px;">
                    <div class="card-body">
                      <h4 class="card-title" style="text-align:center;">'.$candidate_name.'</h4>
                      <hr class="light mb-4" style="width:120px">
                      <div class="form-group">
                        <div class="container" style="text-align:center;">
                            <img src="img/profpics/'.$candidate_id.'.jpg" class="rounded-circle" alt="Cinque Terre" style="height:170px; width:170px;">
                        </div><br>
                        <h1 class="text-uppercase">';
                        if($vote_count!=1){               
                          echo '<strong><span class="header_highlight">'.$vote_count.' Votes</span></strong>';
                        }else{
                          echo '<strong><span class="header_highlight">'.$vote_count.' Vote</span></strong>';
                        }
                        echo '
                        </h1>
                      </div>
                    </div>
                    <div class="card-footer mx-auto">
                        <a class="btn btn-primary" id="statButton" onClick="getStats('.$committee_id.','.$candidate_id.');">More Stats</a>
                    </div>
                  </div>
                </div>
          ';
        }
              
        echo '
              </div>
              <br><br>
            </div>
          </section>
        ';
      }
    ?>

    <!-- modal to show analytics -->
    <div class="modal fade" id="analyticsModal">
      <div class="modal-dialog modal-lg" style="width:1250px;">
        <div class="modal-content edit-content">

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>

    <script>
        var committeeID;
        var candidateID;
        function getStats(comID, canID){
            committeeID = comID;
            candidateID = canID;
            $("#analyticsModal").modal("toggle");
        }

        $(document).ready(function(){
            $('#analyticsModal').on('show.bs.modal', function(e) {
                var $modal = $(this);
                console.log(committeeID);
                console.log(candidateID);
                $.ajax({
                    cache: false,
                    method: 'POST',
                    url: 'php/analyticsModal_body.php',
                    data: {committeeID : committeeID, candidateID : candidateID },
                    success: function(data) {
                        $modal.find('.edit-content').html(data);
                    }
                });
            });
        });

    </script>

</html>
