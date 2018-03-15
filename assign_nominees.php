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
    <link href="css/assign_nominees.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" style="font-size:25px">LETS VOTE</a>
        <!-- Navbar text-->
        <div class="row">
          <div class="col-sm-9" style="padding:0px 0px;">
            <span class="navbar-text text-white"><?php echo $fullname; ?></span>
          </div>
          <div class="col-sm-3" style="padding:0px 5px;">
            <span class="badge badge-info text-white" style="height:40px; padding:12px 20px; font-size:15px;">Admin</span>
          </div>
        </div>
      </div>
    </nav>
    <header class="text-center text-uppercase text-white">
      <h1 style="font-size:45px"><strong><span class="header_highlight">Nominee</span> Assignment</strong></h1>
      <hr>
      <h3 style="font-size:20px"><strong>Assign Nominee Details for each party / committee</strong></h3>
      <br>
    </header>
    
    <div class="container text-white">
      <div class="row">
        <div class="col-sm-4">
          <div class="card mb-4" style="width:350px; height:250px;">
            <div class="card-body">
              <h4 class="card-title" style="text-align:center;">Committee 01</h4>
              <hr class="light">
              <p class="card-text">Some example text. Some example text.</p>
            </div>
            <div class="card-footer mx-auto">
                <a class="btn btn-primary" data-toggle="modal" data-target="#nomineeModal">Add Nominees</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card mb-4" style="width:350px; height:250px;">
            <div class="card-body">
              <h4 class="card-title" style="text-align:center;">Committee 02</h4>
              <hr class="light">
              <p class="card-text">Some example text. Some example text.</p>
            </div>
            <div class="card-footer mx-auto">
                <a href="#" class="btn btn-primary">Add Nominees</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card mb-4" style="width:350px; height:250px;">
            <div class="card-body">
              <h4 class="card-title" style="text-align:center;">Committee 03</h4>
              <hr class="light">
              <p class="card-text">Some example text. Some example text.</p>
            </div>
            <div class="card-footer mx-auto">
                <a href="#" class="btn btn-primary">Add Nominees</a>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="card mb-4" style="width:350px; height:250px;">
            <div class="card-body">
              <h4 class="card-title" style="text-align:center;">Committee 04</h4>
              <hr class="light">
              <p class="card-text">Some example text. Some example text.</p>
            </div>
            <div class="card-footer mx-auto">
                <a href="#" class="btn btn-primary">Add Nominees</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- modal to assign nominees -->
    <div class="modal fade" id="nomineeModal">
        <div class="modal-dialog modal-lg" style="width:1250px;">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header modal-header-success">
              <h4 class="modal-title">Assign Nominees</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <br>
            </div>
            <!-- Modal body -->
            <div class="modal-body modal-body-success">
              <div class="container text-white">
                <div class="row">
                  <div class="col-sm-6">
                    <div class="card mb-4 modal-nominee-assign" style="width:350px">
                      <div class="card-body">
                        <!-- <h4 class="card-title" style="text-align:center;">Nominee 01</h4> -->
                        <!-- <hr class="light"> -->
                        <div class="container">
                          <form action="/action_page.php">
                            <div class="form-group">
                              <label for="name">Nominee Name :</label>
                              <input type="text" class="form-control" id="name" placeholder="Enter name">
                              <br>
                              <label for="profilepicture">Nominee Photo :</label>
                              <input type="file" class="form-control" id="profilepicture" name="profilepicture" >
                              <hr class="light mb-4">
                              <div class="container" style="text-align:center;">
                                <img src="img/default_profpic.jpg" class="rounded-circle" alt="Cinque Terre" style="height:170px; width:170px;">
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                      <div class="card-footer mx-auto">
                          <a class="btn btn-primary">save nominee</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="card mb-4 modal-nominee-assign" style="width:350px">
                      <div class="card-body">
                        <!-- <h4 class="card-title" style="text-align:center;">Nominee 01</h4> -->
                        <!-- <hr class="light"> -->
                        <div class="container">
                          <form action="/action_page.php">
                            <div class="form-group">
                              <label for="name">Nominee Name :</label>
                              <input type="text" class="form-control" id="name" placeholder="Enter name">
                              <br>
                              <label for="profilepicture">Nominee Photo :</label>
                              <input type="file" class="form-control" id="profilepicture"  name="profilepicture">
                              <hr class="light mb-4">
                              <div class="container" style="text-align:center;">
                                <img src="img/default_profpic.jpg" class="rounded-circle" alt="Cinque Terre" style="height:170px; width:170px;">
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                      <div class="card-footer mx-auto">
                          <a class="btn btn-primary" data-toggle="modal" data-target="#nomineeModal">save nominee</a>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="card mb-4 modal-nominee-assign" style="width:350px">
                      <div class="card-body">
                        <!-- <h4 class="card-title" style="text-align:center;">Nominee 01</h4> -->
                        <!-- <hr class="light"> -->
                        <div class="container">
                          <form action="/action_page.php">
                            <div class="form-group">
                              <label for="name">Nominee Name :</label>
                              <input type="text" class="form-control" id="name" placeholder="Enter name">
                              <br>
                              <label for="profilepicture">Nominee Photo :</label>
                              <input type="file" class="form-control" id="profilepicture"  name="profilepicture" >
                              <hr class="light mb-4">
                              <div class="container" style="text-align:center;">
                                <img src="img/default_profpic.jpg" class="rounded-circle" alt="Cinque Terre" style="height:170px; width:170px;">
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                      <div class="card-footer mx-auto">
                          <a class="btn btn-primary" data-toggle="modal" data-target="#nomineeModal">save nominee</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>  
            </div>
            <!-- Modal footer -->
            <div class="modal-footer modal-footer-success">
              <button type="button" class="btn btn-primary btn-x1" data-dismiss="modal">Save Settings</button>
              <button type="button" class="btn btn-secondary btn-x1" data-dismiss="modal">Close</button>
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
