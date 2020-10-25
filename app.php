<?php

$alert = $_GET['alert'];
switch ($alert) {
    case "staff":
        $alertmessage = "<div class='alert alert-danger alert-dismissible fade show' role='alert' id='nostaff'>
        <strong>Error!</strong> The account you signed in with is registerd as a staff member, which we currently don't support.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span></button></div>";
    break;
    case "error":
        $alertmessage = "<div class='alert alert-danger alert-dismissible fade show' role='alert' id='noticket'>
        <strong>Error!</strong> There was an error when trying to complete your request.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span></button></div>";
    break;
    case "invalidcode":
        $alertmessage = "<div class='alert alert-danger alert-dismissible fade show' role='alert' id='noticket'>
        <strong>Error!</strong> The code you provided is not valid Please contact an administrator to obtain an anonymous sign up code.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span></button></div>";
    break;
    case "nosignup":
        $alertmessage = "<div class='alert alert-danger alert-dismissible fade show' role='alert' id='noticket'>
        <strong>Sorry!</strong> We are not currently taking any more registrations for the MyPSC app.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span></button></div>";
    break;
    case "success":
        $alertmessage = "<div class='alert alert-success alert-dismissible fade show' role='alert' id='success'>
        <strong>Success!</strong> Your request has been recieved and we have now emailed you a link to the app to your college email address.
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span></button></div>";
    break;
    default:
        $alertmessage = "";
}
?>
<!doctype html>
<html lang="en">

<head>
<title>MyPSC - App Register</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="resources/css/app.css">
<link rel="stylesheet" href="https://use.typekit.net/vfa7odm.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d30a3a9e8d.js" crossorigin="anonymous"></script>
</head>

<body class="body">
<nav <?php echo $styleNavShow?>class="navbar navbar-expand-md bg-dark navbar-dark navbar">
  <a class="navbar-brand" href="/"><img src="resources/img/psclogo.svg" alt="Logo" style="width:60px;"></a>
  <h1 class="font-title white nav-item">MyPSC</h1>
</nav> 

<div class="container">
    <div class="row body-container-page">
        <div class="col col-sm-12 mycard shadow-sm">
                <h2 class='font-title'>App Register<a data-toggle='modal' data-target='#anonSignUp' class='float-right'><button type='button' class='btn btn-secondary'><i class="fas fa-user-secret"></i></button></a></h2><?php echo $alertmessage?><p>Welcome, MyPSC now has an iOS app! It is currently in BETA and so you need to sign up for the app. You can do so by clicking the button below, where it will ask you verify you are part of the college and then you will be emailed a link to download the app.</p><div><a href='resources/data/app-signup'><button type='button' class='btn btn-primary btn-lg btn-block'>Sign up for BETA</button></a></div>
        </div>
    </div>

  <div class="row body-container-page">
    
  </div>
</div>

<div class="modal fade" id="anonSignUp" tabindex="-1" role="dialog" aria-labelledby="anonSignUp" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title darkgrey" id="addFriend">Manual Sign up:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="darkgrey">If you have been given a sign-up code, please enter in the box below.</p>
        <form method="GET">
          <div class="form-group">
            <label for="share_pin" class="col-form-label darkgrey">Code:</label>
            <input type="text" class="form-control" id="anon_code" name="anon_code">
            <input type="hidden" id="stage" name="stage" value="anon">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" formaction="resources/data/app-signup" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
</body>
</html>