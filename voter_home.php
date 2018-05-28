<?php
require 'php/voter_home_be.php';
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
    <link href="css/voter_home.css" rel="stylesheet">

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
    <header class="text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
              <h2 class="text-uppercase" style="font-size:2.1rem; font-weight:300;">               
                  <br><strong><?php echo $institute; ?></strong>
              </h2>
            <h1 class="text-uppercase" style="font-size:3.7rem; font-weight:500;">
              <strong><?php echo $election_name; ?></strong>
            </h1>
            <hr class="mb-5">
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-2" style="font-size:1.6rem; font-weight:380;"><strong>Your <span class="header_highlight">voting account</span> is now ready</strong></p>
            <p class="text-faded mb-5" style="font-size:1.6rem; font-weight:380;"><strong><span class="header_highlight">Analytics</span> won't be available until the election is over</strong></p>
            <form>
              <div class="container" style="width:400px">
                <?php
                  if($result==0){
                    echo '
                      <div class="col-sm-12">
                        <a class="btn btn-vote btn-xl" style="width:300px; font-size:20px; font-weight:450;"" id="btn_vote">VOTE NOW</a>
                      </div>
                      ';
                  }else if($result<0){
                    echo '
                      <div class="col-sm-12">
                        <a class="btn btn-primary btn-xl" style="width:300px; font-size:20px; font-weight:450;" id="btn_analytics">GET ANALYTICS</a>
                      </div>
                      ';
                  }else{
                    echo '
                      <div class="">
                        <span class="header_highlight">
                          <div class="col-sm-12" style="text-align:center; border: 5px solid #aaa; padding:20px;">
                            <h3>VOTING WILL BE AVAILABLE IN THE ARRANGED TIMESLOT</h3>
                          </div>                       
                        </span>
                      </div>
                    ';
                  }
                ?>
              </div>
            </form>
          </div>
        </div>
      </div>
    </header>

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
      $('#btn_vote').click(function(){
        window.location.href = "http://localhost/letsvote/vote_process.php";
      });
      $('#btn_analytics').click(function(){
        //console.log('hello');
        window.location.href = "http://localhost/letsvote/get_analytics.php";
      });
    </script>
  </body>

</html>
