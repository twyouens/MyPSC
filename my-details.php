<?php 
require_once('resources/autoload.php');

// check for data sharing
if($KT_user_exists == true){
  $text_sharing = "On";
  $sharing_action_button = "<a href='resources/data/process-user?p=remove'><button type='button' class='btn btn-danger'>Remove Consent</button></a>";
}else{
  $text_sharing = "Off";
  $sharing_action_button = "<a href='resources/data/process-user?p=add'><button type='button' class='btn btn-primary'>Agree and Share</button></a>";
}
?>
<!doctype html>
<html lang="en">

<head>
<title>MyPSC - My Details</title>
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
      <li class="nav-item">
        <a class="nav-link" href="timetable">Timetable</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="">My Details</a>
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
      <div class="col-sm-12">
        <h2 class="font-title">My Details</h2>
      </div>
    </div>
    <div class="row body-container-page">
        <div class="col-sm-3">
            <img src="resources/img/student.png" class="studenticon">
        </div>
        <div class="col-sm-9">
            <h2><?php echo $user_name?></h2>
            <h4 class="blue"><?php if($user_staff == false){echo "Student";}elseif($user_staff == true){echo "Staff";}?></h4>
        </div>
    </div>

    <div class="row body-container-page">
        <div class="col-sm-3">

        </div>
        <div class="col-sm-9">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="details-tab" data-toggle="tab" href="#details" role="tab" aria-controls="details" aria-selected="true">Details</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="courses-tab" data-toggle="tab" href="#courses" role="tab" aria-controls="courses" aria-selected="false">Courses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="friends-tab" data-toggle="tab" href="#friends" role="tab" aria-controls="friends" aria-selected="false">Friends</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="data-tab" data-toggle="tab" href="#data" role="tab" aria-controls="data" aria-selected="false">Data</a>
                </li>
            </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="details" role="tabpanel" aria-labelledby="details-tab"><br>
            <ul class="no-bullets">
           <p><span class="details-header">Full Name:</span><span class="details-info text-right"> <?php echo $user_name?></span></p>
           <p><span class="details-header">Username:</span><span class="details-info text-right"> <?php echo $user_username?></span></p>
           <p><span class="details-header">Email:</span><span class="details-info text-right"> <?php echo $user_email?></span></p>
           <p><span class="details-header">Candidate Number:</span><span class="details-info text-right"> <?php echo $user_candidate?></span></p>
           <p><span class="details-header">ULN:</span><span class="details-info text-right"> <?php echo $user_ULN?></span></p>
           <p><span class="details-header">DOB:</span><span class="details-info text-right"> <?php echo $user_dob?></span></p>
           <p><span class="details-header">Tutor Group:</span><span class="details-info text-right"> <?php echo $user_tutor?></span></p>
            </ul>
            </div>
            <div class="tab-pane fade" id="courses" role="tabpanel" aria-labelledby="courses-tab">My Courses
            <ul class="no-bullets">
           <p><span class="details-info text-right">[loading....]</span></p>
            </ul>

            </div>
            <div class="tab-pane fade" id="friends" role="tabpanel" aria-labelledby="friends-tab">
            <p>This tab shows the friends who are currently sharing their timetable with you.</p>
            <?php if($KT_user_friends == "true"){
              echo "<ul class='no-bullets'>";
            $getfriends = KT_friends_list($user_ID);
            $friendslist = json_decode($getfriends, true);
            foreach($friendslist as $friends) {
              if(empty($friends)){
                echo "<p class='error midgrey'><span class='align-middle'>No friends could be found. You can add them by going to my 'Timetable Friends' page.</span></p>";
              }else{
                $friend_firstname = $friends['friend_firstname'];
                $friend_lastname = $friends['friend_lastname'];
                $friend_fullname = "$friend_firstname $friend_lastname";
                echo "<p><span class='details-info text-right'>$friend_fullname</span></p>";
              }
            }
            echo "</ul>";
        }else{
          echo "<p class='error midgrey'><span class='align-middle'>No friends could be found because Friends service is not enabled.</span></p>";
        }
        ?>
            </div>
            <div class="tab-pane fade" id="data" role="tabpanel" aria-labelledby="data-tab">
                <p>MyPSC uses the College's data services for obtaining data about your timetable, basic information about you, room timetables and the free room service. MyPSC offers some other services for you to use,
                services like Friends Timetables and Train Times. These services use the Knoyle Technologies Data services to store your timetable, your home station, your name and your college email address.
                These services are turned off by default and to enable them you need to consent to using the data services. You can remove consent at any time, by clicking the "Remove Consent" button.</p>
                <div class="row">
                    <div class="col-sm-4 mycard shadow-sm">
                        <h3 class="font-title">Settings</h3>
                        <p class="lightgrey">Data sharing: <b><?php echo $text_sharing?></b></p>
                        <?php echo $sharing_action_button?>
                    </div>
                    <div class="col-sm-5 mycard shadow-sm">
                        <h3 class="font-title">What data is used?</h3>
                        <p class="lightgrey">Friends Timetable: <b>Full name, current Timetable & Email</b><br>
                        Train Times: <b>Full name, Home Train Station & Email</b><br></p>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </div>


    <div class="row body-container-page">
            <div class="col-sm-3"><br></div>
        </div>

</div>

</body>
</html>