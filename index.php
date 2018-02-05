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
    <link href="css/index.css" rel="stylesheet">

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
              <a class="nav-link" style="font-size:15px" data-toggle="modal" data-target="#modalSignIn">SIGN IN AS VOTER</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="modal" data-target="#modalSignIn" style="font-size:15px">SIGN IN AS ADMIN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="modal" data-target="#modalHelp" style="font-size:15px">GUIDELINES</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="modal" data-target="#modalHelp" style="font-size:15px">CONTACT US</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <header class="text-center text-white d-flex">
      <div class="container my-auto">
        <div class="row">
          <div class="col-lg-10 mx-auto">
              <h1 class="text-uppercase" style="font-size:3.7rem; font-weight:500;">               
                  <br><strong>Lets-Vote</strong>
              </h1>
            <h2 class="text-uppercase" style="font-size:2.1rem; font-weight:300;">
              <strong>the ideal platform to hold all your elections</strong>
            </h2>
            <hr class="mb-4">
          </div>
          <div class="col-lg-8 mx-auto">
            <p class="text-faded mb-2" style="font-size:1.4rem; font-weight:350;"><strong>Haven't signed into your <span class="header_highlight">profile</span> yet?</strong></p>
            <p class="text-faded mb-4" style="font-size:1.4rem; font-weight:350;"><strong>Use the <span class="header_highlight">pin number</span> that we've been sent to you to sign up for your voting profile!</strong></p>
            <form>
              <input type="text" style="width:300px; height:50px; font-size:18px" class="form-control col-lg-8 mx-auto pin" id="pin_value" placeholder="Enter your pin number here"><br>
              <a class="btn btn-primary btn-xl" data-toggle="modal" data-target="#modalSignUp">Sign Up</a>
            </form>
          </div>
        </div>
      </div>
    </header>

        <!-- Help Modal -->
    <div class="modal fade" id="modalHelp">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Guidelines</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
              <ul>
                <li>Initially, sign up to your profile through the pin number we have sent to you via e-mail.</li><br>
                <li>Then you will automatically be logged into your profile or if not you can manually log into your manually from the main menu.</li><br>
                <li>After logging into your account, you can proceed in the voting process.</li><br>
                <li>You will be able to see the analytics of the election through your profile after the completion of voting process.</li>
              </ul>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
      
          </div>
        </div>
      </div>

      <!-- Sign Up Modal -->
    <div class="modal fade" id="modalSignUp">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title mb-3">Signing Up</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <form action="/action_page.php">
              <div class="modal-body">
                <!-- Alert Box -->
                <div class="alert alert-success alert-dismissable fade show">
                    <button type="button" class="close" data-dismiss="alert" style="padding-bottom: 0px">&times;</button>
                    <p>Registering Election: General Election-2018</p>
                </div>
                <div class="form-group">
                  <div class="row" >
                    <div class="form-group col-sm-6 mb-1">
                      <label for="firstname">First Name:</label>
                      <input type="text" class="form-control" id="firstname">
                    </div>
                    <div class="form-group col-sm-6">
                      <label for="lastname">Last Name:</label>
                      <input type="text" class="form-control" id="lastname">
                    </div>
                  </div>
                </div>  
                <div class="form-group">
                  <label for="email">Email address:</label>
                  <input type="email" class="form-control" id="email">
                </div>
                <div class="form-group">
                  <label for="pwd">Password:</label>
                  <input type="password" class="form-control" id="pwd">
                </div>
                <div class="form-group">
                    <label for="pwd">Confirm Password:</label>
                    <input type="password" class="form-control" id="con_pwd">
                </div>
              </div>
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="submit" class="btn btn-primary" style="float:right;">Submit</button>  
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>

        <!-- Signin Modal -->
      <div class="modal fade" id="modalSignIn">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">Signing In</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <form action="/action_page.php">
                  <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" id="email">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="pwd">
                  </div>
                  <div class="form-check text-center">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox"> Remember me
                    </label>
                  </div>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
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
