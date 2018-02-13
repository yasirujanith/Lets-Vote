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
        <!-- Navbar text-->
        <div class="row">
          <div class="col-sm-9" style="padding:0px 0px;">
            <span class="navbar-text text-white">Yasiru Samarasekara</span>
          </div>
          <div class="col-sm-3" style="padding:0px 5px;">
            <span class="badge badge-info text-white" style="height:40px; padding:12px 20px; font-size:15px;">Admin</span>
          </div>
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
            <input type="number" class="form-control" id="parties_count">
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
        <a class="btn btn-primary btn-xl" data-toggle="modal" data-target="#partyModal">Register Parties / Committees</a>
      </div>
    </div>


    <!-- party model -->
    <div class="modal fade" id="partyModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Enter Name and Nominee Count for each Party / Committee</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <form action="/action_page.php">
            <div class="form-group">
              <div class="container">
                <div class="row">
                  <div class="col-sm-9"><input type="text" placeholder="committee / party name" class="form-control" id="party_name"></div>
                  <div class="col-sm-3"><input type="number" placeholder="count" class="form-control" id="party_count"></div>
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="container">
                <div class="row">
                  <div class="col-sm-9"><input type="text" placeholder="committee / party name" class="form-control" id="party_name"></div>
                  <div class="col-sm-3"><input type="number" placeholder="count" class="form-control" id="party_count"></div>
                </div>
              </div>
            </div>
            <div class="form-group">
                <div class="container">
                  <div class="row">
                    <div class="col-sm-9"><input type="text" placeholder="committee / party name" class="form-control" id="party_name"></div>
                    <div class="col-sm-3"><input type="number" placeholder="count" class="form-control" id="party_count"></div>
                  </div>
                </div>
            </div>                  
          </form>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary js-scroll-trigger" href="#about">Submit</button>
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


  </body>

</html>
