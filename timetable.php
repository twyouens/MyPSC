<?php 
require_once('resources/autoload.php');
?>
<!doctype html>
<html lang="en">

<head>
<title>MyPSC - Timetable</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="../resources/css/app.css">
<link rel="stylesheet" href="https://use.typekit.net/vfa7odm.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d30a3a9e8d.js" crossorigin="anonymous"></script>
</head>

<body class="body">
<nav <?php echo $styleNavShow?>class="navbar navbar-expand-md bg-dark navbar-dark navbar">
  <a class="navbar-brand" href="../"><img src="../resources/img/psclogo.svg" alt="Logo" style="width:60px;"></a>
  <h1 class="font-title white nav-item">MyPSC</h1>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav mr-auto">
       
    </ul>
    <ul class="navbar-nav">
    <li class="nav-item">
        <a class="nav-link" href="/">Home</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="">Timetable</a>
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
        <a class="dropdown-item" href="?logout=true"><i class="fas fa-sign-out-alt"></i> Logout</a>
      </div>
    </li>    
    </ul>
  </div>  
</nav> 

<div class="container">
  <div class="row body-container-page">
      <div class="col-sm-9">
        <h2 class="font-title">My Timetable</h2>
      </div>
      <div class="col-sm-3">
        <h5>Friends Timetables</h5>
        <a href="timetable-friends"><button type="button" class="btn btn-primary">Open</button></a>
      </div>
  </div>
  <div class="row body-container-page">
      <div class="col-sm-12">
        <p>This function allows you to see your college timetable for the current week. If you want to see your friends timetables, click the open button at the top.</p>
      </div>
  </div>
  <div class="row body-container-page">
    <div class="col-sm-12">
    <div class="table-responsive">
    <table class='table table-color-auto table-striped'>
    <thead>
    <tr>
      <th scope='col'>Start</th>
      <th scope='col'>End</th>
      <th scope='col'>Lesson</th>
      <th scope='col'>Teacher</th>
      <th scope='col'>Room</th>
      <th scope='col'>Alerts</th>
    </tr>
  </thead>
  <tbody>
  <?php 
           $gettimetable = PSC_get_Timetable($PSC_Token);
           $timetablearray = json_decode($gettimetable, true);
           foreach($timetablearray['timetable'] as $table) {
             if(empty($table)){
               echo "Nothing is scheduled for you today.";
             }else{
             $lesson_title = $table['Title'];
             $lesson_start = date("D G:i",$table['Start']);
             $lesson_end = date("G:i",$table['End']);
             $lesson_staff = $table['Staff'];
             $lesson_room = $table['Room'];
            echo "<tr>
            <th scope='row'>$lesson_start</th>
            <td>$lesson_end</td>
            <td>$lesson_title</td>
            <td>$lesson_staff</td>
            <td>$lesson_room</td>
            <td></td>
          </tr>";
             }
            }
           ?>

  </tbody></table></div>
    </div>
  </div>

  
  <div class="row body-container-page">
            <div class="col-sm-3"><br></div>
        </div>

</div>

</body>
</html>