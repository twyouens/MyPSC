<?php
require_once('resources/autoload.php');
?>
<!doctype html>
<html lang="en">

<head>
<title>MyPSC - Home</title>
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
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mr-auto">
       
    </ul>
    <ul class="navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="timetable">Timetable</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="my-details">My Details</a>
      </li>  
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle mr-sm-2" href="#" id="navbardrop" data-toggle="dropdown">Tools</a>
      <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="tools/free-room" target="_blank">Free Room</a>
        <a class="dropdown-item" href="tools/room-timetable" target="_blank">Room Timetable</a>
        <a class="dropdown-item" href="tools/trains">Train Times</a>
      </div>
    </li> 
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle mr-sm-2" href="#" id="navbardrop" data-toggle="dropdown"><div class="accountcircle"><?php $inital1 = $user_fname[0]; $inital2 = $user_lname[0]; echo "$inital1$inital2"?></div></a>
      <div class="dropdown-menu dropdown-menu-right">
        <a class="dropdown-item" href="https://admin.psc.knoyletechnologies.co.uk/" target="_blank"><i class="fas fa-tools"></i> Admin</a>
        <a class="dropdown-item" href="?logout=true"><i class="fas fa-sign-out-alt"></i> Logout</a>
      </div>
    </li>    
    </ul>
  </div>  
</nav> 

<div class="container">
  <div class="row body-container-page">
      <div class="col-sm-12">
        <div class="jumbotron">
          <h1 class="display-4 font-title">Welcome!</h1>
          <p class="lead">Welcome to the Peter Symonds College MyPSC. This service is currently for students to access functions from the main Intranet.</p>
          <hr class="my-4">
          <p>If you need help or something doesn’t work please contact me.</p>
          <a><button class="btn btn-primary btn-lg">Contact</button></a> 
        </div>
    </div>
  </div>

  <div class="row body-container-page">
      <div class="col-sm-4 mycard shadow-sm">
         <h3 class="font-title">My Timetable</h3>
         <ul class="no-bullets">
           <?php 
           $gettimetableToday = PSC_get_Timetable_Today($PSC_Token);
           $timetablearray = json_decode($gettimetableToday, true);
           foreach($timetablearray['timetable'] as $table) {
             if(empty($table)){
               echo "Nothing is scheduled for you today.";
             }else{
             $lesson_title = $table['Title'];
             $lesson_start = $table['Start'];
             $lesson_end = $table['End'];
             $lesson_staff = $table['Staff'];
            echo "<li class='item-today'>$lesson_title</li>";
             }
            }
           ?>
         </ul>
         <div class="mycardfooter"><a href="timetable"><i class="fas fa-calendar-alt"></i> <span class="blue">View Full Timetable</span></a></div>
        </div>
        <div class="col-sm-4 mycard shadow-sm">
         <h3 class="font-title">Who's free now?</h3>
         <p class="error midgrey"><span class="align-middle">No friends could be found :(</span></p>
         <div class="mycardfooter"><a href="timetable/friends/"><i class="fas fa-user-friends"></i> <span class="blue">View Friends</span></a></div>
        </div>
      <div class="col-sm-4 mycard shadow-sm">
         <h3 class="font-title">Useful links</h3>
         <ul class="no-bullets">
           <li class="item"><a href="https://intranet.psc.ac.uk/h" class="blue" target="_blank">Student Intranet</a></li>
           <li class="item"><a href="https://classroom.google.com/h" class="blue" target="_blank">Google Classroom</a></li>
           <li class="item"><a href="https://filr.psc.ac.uk/" class="blue" target="_blank">Filr</a></li>
           <li class="item"><a href="https://webmail.psc.ac.uk/" class="blue" target="_blank">College Email <span class="badge badge-pill badge-danger">New</span></a></li>
        </div>
  </div>
  <div class="row body-container-page">
            <div class="col-sm-3"><br></div>
        </div>
  <div class="row body-container-page">
        <div class="col-sm-4 mycard shadow-sm">
         <h3 class="font-title">Student Notices</h3>
         <p class="error midgrey"><span class="align-middle">No notices could be found. This will only work on College Wi-Fi.</span></p>
         <div class="mycardfooter"><a href="https://intranet.psc.ac.uk/news/browser.php"><i class="fas fa-bullhorn"></i> <span class="blue">View All</span></a></div>
        </div>
      <div class="col-sm-4 mycard shadow-sm">
         <h3 class="font-title">Going Home</h3>
         <p class="error midgrey"><span class="align-middle">Check back later for recommendations.</span></p>
         <div class="mycardfooter"><a href="tools/trains"><i class="fas fa-train"></i> <span class="blue">Open Train Times</span></a></div>
        </div>
        
  </div>
  <div class="row body-container-page">
            <div class="col-sm-3"><br></div>
        </div>

</div>

</body>
</html>
