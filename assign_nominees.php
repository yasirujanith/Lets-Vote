<?php
include_once 'php/assign_nominees_initials.php';
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
      <?php
        for($x=0; $x<$count; $x++){
          $committee_name = $query_committeedetails[$x]['committee_name'];
          $candidate_count = $query_committeedetails[$x]['candidate_count'];
          $committee_id = $query_committeedetails[$x]['committee_id'];

          //echo $committee_name;
          echo '
          <div class="col-sm-4">
            <div class="card mb-4" style="width:350px; height:250px;">
              <div class="card-body text-center">
                <h4 class="card-title" style="text-align:center;">'.$committee_name.'</h4>
                <hr class="light">
                <p class="card-text">'.$candidate_count.' candidates are competing in this committee.</p>
              </div>
              <div class="card-footer mx-auto">
                  <button class="btn btn-primary" id="addCandidateButton" onClick="gotoNode('.$committee_id.')">Add Nominees</button>
              </div>
            </div>
          </div>
          ';
        }
      ?>
      </div>
      <hr class="mb-4">
      <div class="container text-white text-center text-uppercase">
          <h3 style="font-size:20px"><strong>Voter count for the Election</strong></h3><br>
          <div class="row">
              <div class="col-sm-5"></div>
              <div class="col-sm-2">
                  <div class="form-group text-uppercase mb-4">
                      <!-- <label for="election_name">VOTER COUNT FOR THE ELECTION</label> -->
                      <input type="number" class="form-control" id="voter_count">
                  </div>
              </div>
          </div>
          <div class="text-center mb-5">
              <button type="button" class="btn btn-primary btn-index btn-lg"  id="addEmailsButton" name="addEmailsButton" data-toggle="modal" data-target="#modalAddEmails">ADD VOTER DETAILS</button>
          </div>
      </div>
    </div>

    <!-- modal to assign nominees -->
    <div class="modal fade" id="nomineeModal">
      <div class="modal-dialog modal-lg" style="width:1250px;">
        <div class="modal-content edit-content">
          
        </div>
      </div>
    </div>

    <!-- modal to assign voter details -->
    <div class="modal fade" id="modalAddEmails">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title">Enter Voter Details</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
          <form action="/action_page.php">
            <div class="modal-body edit-content">
                  
            </div>            
          </form>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary js-scroll-trigger" id="btn_submit">Submit</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->

    <!-- Custom scripts for this template -->
    <script src="js/creative.min.js"></script>

    <script>
      var committeeID;
      function gotoNode(ID){
        committeeID = ID;
        //console.log(committeeID);
        $("#nomineeModal").modal("toggle");
      }

      function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
              $('#imageDisplay'+id).attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
      }

      function addSettings(savedCount, candidateCount){
        var isSuccess = true;
        var promises = [];
        for(var i=savedCount; i<candidateCount; i++){   
          formdata = new FormData();      
          var file = document.getElementById('profilePicture'+i).files[0];
          var candidateName = $('#name'+i).val();
          // console.log(candidateName);
          if (formdata) {
            formdata.append("image", file);
            formdata.append("candidateName", candidateName);
            formdata.append("committeeID", committeeID);
            var request = $.ajax({
                url: "php/assign_nominees_be.php",
                type: "POST",
                data: formdata,
                processData: false,
                contentType: false,
                success:function(data){
                  if(data == 'deleted'){
                    isSuccess = false;
                  }
                }
            });
            promises.push(request);
          }
        }
        $.when.apply(null, promises).done(function(){
          if(isSuccess == true){
            $("#nomineeModal").modal("toggle");
          }else{
            alert('image/s is/are not compatible, try again!')
            $("#nomineeModal").modal("toggle");
          }
        });
      }

      //creating the assign nominee modal - data passing
      $(document).ready(function(){
        $('#nomineeModal').on('show.bs.modal', function(e) {
          var $modal = $(this);
          console.log(committeeID);
          $.ajax({
            cache: false,
            method: 'POST',
            url: 'php/nomineeModal_body.php',
            data: {committeeID : committeeID},
            success: function(data) {
                $modal.find('.edit-content').html(data);
            }
          });
        });

        $('#addEmailsButton').click(function(){
          $('#modalAddEmails').modal("toggle");
        });

      //modal-data-passing -> voter detail modal
      $('#modalAddEmails').on('show.bs.modal', function(e) {
        var $modal = $(this);
        var voterCount = document.getElementById("voter_count").value;
        //console.log(voterCount);
        $.ajax({
          cache: false,
          method: 'POST',
          url: 'php/voterCount_modalBody.php',
          data: {voterCount : voterCount},
          success: function(data) {
              $modal.find('.edit-content').html(data);
          }
        });
      });

      $('#btn_submit').click(function(){
        var isSuccess = true;
        var promises = [];
        var voterCount = document.getElementById("voter_count").value;
        var isFilled = true;
        for(var i=0; i<voterCount; i++){
          voterName = $('#voter_name'+i).val();
          email = $('#email'+i).val();
          if(voterName == '' || email == ''){
            isFilled = false;
          }  
        }
        //console.log("is filled: "+isFilled);
        if(isFilled == true){
          for(var i=0; i<voterCount; i++){
            voterName = $('#voter_name'+i).val();
            email = $('#email'+i).val();
            //console.log(voterName+": "+email);
            var request = $.ajax({
              url: "php/add_voters_be.php",
              method: "POST",
              data: {voterName:voterName, email:email},
              success: function(data){
                console.log(data);
                if(data != 11){
                  isSuccess = false;
                }
              }
            });
            promises.push(request);
          }
          $.when.apply(null, promises).done(function(){
            if(isSuccess == true){
              alert("e-mail adding success");
            }else{
              alert('There must have been some error. try again!');
            }
          });

        }else{
          alert('fill all the voter details')
        }
      });

    
      });

    </script>

  </body>

</html>
