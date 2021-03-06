<?php
session_start();
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
              <a class="nav-link" style="font-size:15px" data-toggle="modal" data-target="#modalSignIn">SIGN IN</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="modal" data-target="#modalHelp" style="font-size:15px">GUIDELINES</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="modal" data-target="#modalAdminSignup" style="font-size:15px">CONTACT US</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <p id="demo"></p>
    
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
            <form method="post">
              <input type="text" style="width:300px; height:50px; font-size:18px" class="form-control col-lg-8 mx-auto pin" name="pin_value" id="pin_value" placeholder="Enter your pin number here"><br>
              <button type="button" class="btn btn-primary btn-index btn-lg" id="signup_button" name="submit_signup">Sign Up</button>
              
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
            <form>
              <div class="modal-body edit-content">
                
              </div>
              <!-- Modal footer -->
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="signupModal_submitButton" style="float:right;">Submit</button>  
                <button type="button" class="btn btn-secondary" id="close_button" data-dismiss="modal">Close</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      
      <!-- Admin Registering Modal -->
      <div class="modal fade" id="modalAdminSignup">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header modal-header-success">
              <h4 class="modal-title mb-3">REGISTERING NEW ADMIN</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body modal-body-success">
              <div class="form-group">
                <div class="row" >
                  <div class="col-sm-6">
                      <label for="firstname">First Name:</label>
                      <input type="text" class="form-control" id="signup_firstname">
                      <span id="firstname_span" style="color: rgba(211, 0, 0, 0.800); font-size:13px;"></span>
                  </div>
                  <div class="col-sm-6">
                      <label for="lastname">Last Name:</label>
                      <input type="text" class="form-control" id="signup_lastname">
                      <span id="lastname_span" style="color: rgba(211, 0, 0, 0.712); font-size:13px;"></span>
                  </div>
                </div>
              </div>  
              <div class="form-group">
                  <label for="email">Email address:</label>
                  <input type="email" class="form-control" id="signup_email">
                  <span id="email_span" style="color: rgba(211, 0, 0, 0.712); font-size:13px;"></span>
              </div>
              <div class="form-group">
                  <label for="email">Telephone Number:</label>
                  <input type="text" class="form-control" id="signup_telephone">
                  <span id="telephone_span" style="color: rgba(211, 0, 0, 0.712); font-size:13px;"></span>
              </div>
              <div class="form-group">
                  <label for="pwd">Password:</label>
                  <input type="password" class="form-control" id="signup_password">
                  <span id="password_span" style="color: rgba(211, 0, 0, 0.712); font-size:13px;"></span>
              </div>
              <div class="form-group">
                  <label for="pwd">Confirm Password:</label>
                  <input type="password" class="form-control" id="signup_confirm_password">
                  <span id="confirmpassword_span" style="color: rgba(211, 0, 0, 0.712); font-size:13px;"></span>
              </div>
            </div>
              <!-- Modal footer -->
            <div class="modal-footer modal-footer-success">
              <button type="button" class="btn btn-primary" id="regmodal_submitbtn" style="float:right;">Submit</button>  
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

        <!-- Signin Modal -->
      <div class="modal fade" id="modalSignIn">
        <div class="modal-dialog">
          <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header modal-header-success">
              <h4 class="modal-title">Signing In</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- Modal body -->
            <div class="modal-body modal-body-success">
                <form action="/action_page.php">
                  <div class="form-group">
                    <label for="email">Email address:</label>
                    <input type="email" class="form-control" id="signin_email">
                  </div>
                  <div class="form-group">
                    <label for="pwd">Password:</label>
                    <input type="password" class="form-control" id="signin_password">
                  </div>
                  <div class="form-check text-center">
                    <label class="form-check-label">
                      <input class="form-check-input" id="rememberme_checkbox" type="checkbox"> Remember me
                    </label>
                  </div>
                </form>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer modal-footer-success">
              <button type="button" class="btn btn-primary" id="signinModal_submitButton">Submit</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/jquery/jquery.cookie.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>
    
    <script>
      $(document).ready(function(){
        $("#signup_button").click(function(){
          var pin_value = document.getElementById("pin_value").value;
          if(pin_value!=''){              
            $.ajax({
              url: "php/index/index_be.php",
              method: "POST",
              data: {pin_value: pin_value},
              success: function(data){
                //console.log(data);
                if(data == 1){
                  $("#modalSignUp").modal("toggle");
                  $('#pin_value').val('');
                }else if(data == 2){
                  JSalert_key_used();
                  $('#pin_value').val('');
                }else{
                  JSalert_non_exist();
                  $('#pin_value').val('');
                }
              }
            });
          }else{
            //alert('Enter the pin number we have sent to you!');
            JSalert_empty_input();
          }
        });

        $("#signupModal_submitButton").click(function(){
          console.log('initiate');
          var firstname = $('#signup_firstname').val();
          var lastname = $('#signup_lastname').val();
          var email = $('#signup_email').val();
          var telephone = $('#signup_telephone').val();
          var password = $('#signup_password').val();
          var confirm_password = $('#signup_confirm_password').val();
          console.log(firstname +" "+ lastname+" "+email+" "+telephone+" "+password+" "+confirm_password);
          console.log(password == confirm_password);
          if(firstname!='' && lastname!='' && email!='' && telephone!='' && password!='' && confirm_password!=''){
            if(validationFunction(firstname, lastname, telephone, email, password) == true){
              if(password == confirm_password){
                $.ajax({
                    url: "php/index/index_be.php",
                    method: "POST",
                    data: {firstname:firstname, lastname:lastname, email:email, telephone:telephone, password:password},
                    success: function(data){
                      console.log(data);
                      if(data == 1){
                        //JSalert_useradding_success();
                        $("#modalSignUp").modal("toggle");
                        window.location.href = "http://localhost/letsvote/voter_home.php";
                      }else{
                        alert('user registration failed');
                      }
                    }
                });
              }else{
                document.getElementById('confirmpassword_span').innerText = "*passwords do not match";
              }
            }
          }else{
            alert('fill in all the fields')
          }
        });

        $("#regmodal_submitbtn").click(function(){
          var firstname = $('#signup_firstname').val();
          var lastname = $('#signup_lastname').val();
          var email = $('#signup_email').val();
          var telephone = $('#signup_telephone').val();
          var password = $('#signup_password').val();
          var confirm_password = $('#signup_confirm_password').val();
          console.log(firstname +" "+ lastname+" "+email+" "+telephone+" "+password+" "+confirm_password);
          console.log(password == confirm_password);
          
          if(firstname!='' && lastname!='' && email!='' && telephone!='' && password!='' && confirm_password!=''){
            if(validationFunction(firstname, lastname, telephone, email, password) == true){
              if(password == confirm_password){
                $.ajax({
                    url: "php/index/index_be.php",
                    method: "POST",
                    data: {firstnameDup1: firstname, lastname: lastname, email: email, telephone: telephone, password: password},
                    success: function(data){
                      console.log(data);
                      if(data == 1){
                        //JSalert_useradding_success();
                        $("#modalSignUp").modal("toggle");
                        window.location.href = "http://localhost/letsvote/admin_home.php";
                      }else{
                        alert('user registration failed');
                      }
                    }
                });
              }else{
                document.getElementById('confirmpassword_span').innerText = "*passwords do not match";
              }
            }
          }else{
            alert('fill in all the fields')
          }
          
        });

        $('#signinModal_submitButton').click(function(){
          var email = $('#signin_email').val();
          var password = $('#signin_password').val();
          if(email!='' && password!=''){
            console.log(email+' '+password);
            $.ajax({
                  url: "php/index/index_be.php",
                  method: "POST",
                  data: {signin_email:email, signin_password:password},
                  success: function(data){
                    console.log(data);
                    if(data == 1){
                      //$("#modalSignIn").modal("toggle");
                      $('#signin_email').val('');
                      $('#signin_password').val('');
                      window.location.href = "http://localhost/letsvote/voter_home.php";
                    }else if(data == 2){
                      $('#signin_email').val('');
                      $('#signin_password').val('');
                      window.location.href = "http://localhost/letsvote/admin_home.php";
                    }else{
                      alert('Invalid username or password. Try again!')
                    }
                    //remember me checkbox
                    if($('#rememberme_checkbox').val()){
                      //rememberMe(email, password);
                    }
                  }
            });
          }else{
            alert('Fill in all the fields');
          }

        });

      ///////////modal-data-passing//////////////////////////////////////
        $('#modalSignUp').on('show.bs.modal', function(e) {
          var $modal = $(this);
          var pin_value = document.getElementById("pin_value").value;
          //console.log(pin_value);
          $.ajax({
            cache: false,
            method: 'POST',
            url: 'php/index/signup_modal_body.php',
            data: {pin_value : pin_value},
            success: function(data) {
                $modal.find('.edit-content').html(data);
            }
          });
        })

        $('#modalSignIn').on('show.bs.modal', function(e) {
          //fillByMemory();
        })
      ////////////////////////////////////////////////////////////////////
      });

      ////////////////////JS-Alerts///////////////////////////////////////
      function JSalert_non_exist(){
        swal({
          title: "INVALID KEY", 
          text: "No election is registered in this key",
          icon: "error",
          dangerMode: true,
          button: "Try Again",
        });
      }
      function JSalert_key_used(){
        swal({
          title: "EXPIRED KEY", 
          text: "This key has been already used",
          icon: "error",
          dangerMode: true,
          button: "Try Again",
        });
      }
      function JSalert_empty_input(){
        swal({
          title: "INSERT KEY", 
          text: "Enter the pin value that we have sent to you",
          icon: "info",
          dangerMode: true,          
          button: "Try Again",
        }); 
      }
      function JSalert_useradding_success(){
        swal({
          title: "SUCCESS", 
          text: "User added successfully!",
          icon: "success",
          //dangerMode: true,
          button: "Proceed",
        });
      }
      //////////////////////////////////////////////////////////////////////

      // validation functionalities

      function validationFunction(firstname, lastname, telephone, email, password){
        var validated = true;
        var firstname_validated = inputAlphabet(firstname);
        if(firstname_validated == false){
          validated = false;
          //console.log(1);
          document.getElementById('firstname_span').innerText = "*invalid first name";
        }else{
          document.getElementById('firstname_span').innerText = "";
        }

        var lastname_validated = inputAlphabet(lastname);
        if(lastname_validated == false){
          validated = false;
          document.getElementById('lastname_span').innerText = "*invalid last name";
        }else{
          document.getElementById('lastname_span').innerText = "";
        }

        var telephone_validated = telephoneValidation(telephone);
        if(telephone_validated == false){
          validated = false;
          document.getElementById('telephone_span').innerText = "*invalid telephone number";
        }else{
          document.getElementById('telephone_span').innerText = "";
        }

        var email_validated = emailValidation(email);
        if(email_validated == false){
          validated = false;
          document.getElementById('email_span').innerText = "*invalid e-mail address";
        }else{
          document.getElementById('email_span').innerText = "";
        }

        var password_validated = lengthDefine(password, 8, 50);
        if(password_validated == false){
          validated = false;
          document.getElementById('password_span').innerText = "*must have more than 8 characters";
        }else{
          document.getElementById('password_span').innerText = "";
        }
        console.log('validated: '+validated);
        return validated;   
      }

      function inputAlphabet(inputtext){  
        var alphaExp = /^[a-zA-Z]+$/;
        if(inputtext.match(alphaExp)){
          return true;
        }else{
          return false;
        }
      }

      function lengthDefine(inputtext, min, max){
        var uInput = inputtext;
        if(uInput.length >= min && uInput.length <= max){
          return true;
        }else{
          return false;
        }
      }

      function telephoneValidation(inputtext){
        console.log(inputtext)
        var telephoneExp = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
        if(inputtext.match(telephoneExp)){
          return true;
        }else{
          return false;
        }
      }

      function emailValidation(inputtext){
        var emailExp = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if(inputtext.match(emailExp)){
          return true;
        }else{
          return false;
        }
      }
      ////////////////////////////////////////////////////////////////////////////////////////////
      // Remember Me Functionality in Sign In form
      function fillByMemory(){
        $('#signin_email').val(localStorage.email);
        $('#signin_password').val(localStorage.password);
        // if(!!$.cookie('email')){
        //   $('#signin_email').val($.cookie('email'));
        //   console.log('filling')
        // if(!!$.cookie('password')){
        //   $('#signin_password').val($.cookie('password'));
        // }
      }

      function rememberMe(email, password){
        console.log('email: '+ email);
        localStorage.email = email;
        localStorage.password = password;
          
        //$.cookie('email',$('#signin_email').val());
        //$.cookie('password',$('#signin_password').val());
      }

    </script>
  </body>

</html>
