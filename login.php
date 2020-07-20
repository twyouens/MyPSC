<?php if(!isset($_COOKIE['PSCToken'])) {
     $logged_in = false;
} else {
     $logged_in = true;
}?>
<!doctype html>
<html lang="en">

<head>
<title>MyPSC - Login</title>
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
<nav class="navbar navbar-expand-md bg-dark navbar-dark navbar">
  <a class="navbar-brand" href=""><img src="resources/img/psclogo.svg" alt="Logo" style="width:60px;"></a>
  <h1 class="font-title white nav-item">MyPSC</h1>
</nav> 

<div class="container">
    <div class="row body-container-page">
        <div class="col col-sm-12 mycard shadow-sm">
            <?php if($logged_in == false){
                echo "<h2 class='font-title'>Log in</h2><p>Welcome, MyPSC now requires you to Log in to use the service. To do this, you need to click the button below. This will redirect you to the Peter Symonds College Data service, where you need to login with your college username and password. You will also be asked to agree to sharing your data with MyPSC.</p><div><a href='resources/data/psc-auth'><button type='button' class='btn btn-primary btn-lg btn-block'>Log in</button></a></div>";
            }else{
                echo "<h2 class='font-title'>Log in</h2><p>Welcome, You are already logged in to MyPSC. To back home, press the button bellow.</p><div><a href='/'><button type='button' class='btn btn-primary btn-lg btn-block'>Home</button></a></div>";
            }
            ?>
        </div>
    </div>

  <div class="row body-container-page">
    
  </div>
</div>

</body>
</html>