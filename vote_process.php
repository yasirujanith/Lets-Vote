<?php
include_once 'php/vote_process_initials.php';
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
    <link href="css/vote_process.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <div class = "row">
          <div><a class="navbar-brand js-scroll-trigger" style="font-size:25px">LETS VOTE</a></div>
          <div>
            <div style="padding:0px 5px;">
              <span class="badge badge-info text-white" style="height:40px; padding:12px 20px; font-size:15px;">VOTER</span>
            </div>
          </div>
        </div>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" style="font-size:15px" ><?php echo $fullname; ?></a>
            </li>
            <li class="nav-item">
              <div style="padding:0px 5px;">
                <a href="http://localhost/letsvote/index.php"><span class="badge badge-warning text-white" style="height:40px; padding:12px 20px; font-size:15px; background-color: rgba(255, 187, 0, 0.820); ">SIGNOUT</span></a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <header class="text-center text-uppercase text-white" style="padding-top: 20px;">
      <h1 style="font-size:45px"><strong>Now Let's<span class="header_highlight"> Vote</span></strong></h1>
      <hr>
      <h3 style="font-size:20px"><strong>Give your vote for a nominee in each committee</strong></h3>
      <br>
    </header>
    
    <div class="container text-white">
      <div class="row">
        <?php
          for($x=0; $x<$count; $x++){
            $committee_name = $query_committeedetails[$x]['committee_name'];
            $candidate_count = $query_committeedetails[$x]['candidate_count'];
            $committee_id = $query_committeedetails[$x]['committee_id'];

            //checking whether the committee voting has completed
            $query_isdone=($crud->getData("SELECT * FROM candidate INNER JOIN vote WHERE candidate.candidate_id = vote.candidate_id AND committee_id = '$committee_id' AND user_id='$user_id'"));
            if(!empty($query_isdone)){
              echo '
                <div class="col-sm-4">
                  <div class="card mb-4" style="width:350px; height:250px;">
                    <div class="card-body">
                      <h4 class="card-title" style="text-align:center;">'.$committee_name.'</h4>
                      <hr class="light">
                    ';
                    if($candidate_count>1){
                      echo '<p class="card-text text-center">'.$candidate_count.' candidates are competing in this committee</p>';
                    }else{
                      echo '<p class="card-text text-center">'.$candidate_count.' candidate is competing in this committee</p>';
                    }
                    echo '<p class="card-text text-center" style="font-size:15px"><strong><span class="header_highlight">ALREADY VOTED</span></strong></p>';
                    echo '
                    </div>
                    <div class="card-footer mx-auto">
                        <a class="btn btn-primary" id="voteButton" onClick="gotoNode('.$committee_id.')">change vote</a>
                    </div>
                  </div>
                </div>
              ';   
            }else{
              echo '
                <div class="col-sm-4">
                  <div class="card mb-4" style="width:350px; height:250px;">
                    <div class="card-body">
                      <h4 class="card-title" style="text-align:center;">'.$committee_name.'</h4>
                      <hr class="light">
                    ';
                    if($candidate_count>1){
                      echo '<p class="card-text text-center">'.$candidate_count.' candidates are competing in this committee</p>';
                    }else{
                      echo '<p class="card-text text-center">'.$candidate_count.' candidate is competing in this committee</p>';
                    }
                    echo '
                    </div>
                    <div class="card-footer mx-auto">
                        <a class="btn btn-primary" id="voteButton" onClick="gotoNode('.$committee_id.')">start voting</a>
                    </div>
                  </div>
                </div>
              ';    
            }
          }
        ?>
      </div>
    </div>

    <!-- modal to show nominees -->
    <div class="modal fade" id="candidateModal">
      <div class="modal-dialog modal-lg" style="width:1250px;">
        <div class="modal-content edit-content">
          
        </div>
      </div>
    </div>
    <hr>
    <div class="text-center text-uppercase">
      <button class="btn btn-primary" id="homeButton" style="font-size: 18px; height:50px; width: 270px;">proceed to home page</button>
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
      var committeeID;
      var candidateID;
      function gotoNode(ID){
        committeeID = ID;
        //console.log(committeeID);
        $("#candidateModal").modal("toggle");
      }

      function selectVoter(ID, card_id, candidateCount){
        candidateID = ID;
        console.log(candidateID);
        for(var x=0; x<candidateCount; x++){
          var div = document.getElementById('candidateCard'+x);
          if(x==card_id){
            div.style.backgroundColor = 'rgba(255, 187, 0, 0.534)';
          }else{
            div.style.backgroundColor = '#252223af';
          }
        }
      }

      function saveVoter(){
        console.log("id: "+candidateID);
        if(candidateID != null){
          $.ajax({
            url: "php/voteProcess_be.php",
            method: "POST",
            data: {candidateID: candidateID},
            success: function(data){
              console.log(data);
              $("#candidateModal").modal("toggle");
            }
          });
        }else{
          alert('select a candidate');
        }
      }

      $(document).ready(function(){
        $('#candidateModal').on('show.bs.modal', function(e) {
          //candidateID = null;
          var $modal = $(this);
          console.log(committeeID);
          $.ajax({
            cache: false,
            method: 'POST',
            url: 'php/voteProcess_modalBody.php',
            data: {committeeID : committeeID},
            success: function(data) {
                $modal.find('.edit-content').html(data);
            }
          });
        });
      });

      $("#homeButton").click(function(){
        window.location.href = "http://localhost/letsvote/voter_home.php";
      });
    </script>


  </body>

</html>
