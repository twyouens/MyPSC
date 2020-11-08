<?php 
require_once('resources/autoload.php');

if($KT_user_exists == "true"){
  if($KT_user_friends == "true"){
    $service_action_button = "<a href='/resources/data/process-friends?p=disable'><button type='button' class='btn btn-danger'>Disable Function</button></a>";
    $text_service = "On";
    $field_share_pin = "<br><br>Share Pin: <br><input class='form-control' type='text' placeholder='$KT_user_pin' readonly>";
    $friends_card = "<div class='col-sm-4 mycard shadow-sm'> <h3 class='font-title'>My Friends <a data-toggle='modal' data-target='#addFriend' class='float-right blue'><i class='fas fa-plus'></i></a></h3> <p class='error midgrey'><span class='align-middle'>No friends could be found. You can add them by clicking the Plus button.</span></p></div>";
    $btnRefreshTimetable = "<br><a href='/resources/data/process-timetable?p=refresh'><button type='button' class='btn btn-primary'>Refresh Timetable</button></a><br>";
  }else{
    $text_service = "Off";
    $service_action_button = "<a href='/resources/data/process-friends?p=enable'><button type='button' class='btn btn-primary'>Enable Function</button></a>";
    $field_share_pin = "";
    $friends_card = "<div class='col-sm-4 mycard shadow-sm'> <h3 class='font-title'>My Friends</h3> <p class='error midgrey'><span class='align-middle'>No friends could be found because Friends service is not enabled.</span></p></div>";
    $btnRefreshTimetable = "";
  }
}else{
  $service_action_button = "Data Sharing is not enabled! Please got to My Details->Data to enabled Data sharing.";
  $field_share_pin = "";
  $btnRefreshTimetable = "";
}
switch ($_GET['alert']){
  case "success":
    $alerttoast = "
    <script>$(document).ready(function(){
      $('.toast').toast('show');
    });</script>
    <div role='alert' aria-live='assertive' aria-atomic='true' style='position: relative;'>
    <div class='toast' data-autohide='false' id='notification' style='position: absolute; top: 0; right: 0; '>
      <div class='toast-header'>
        <div style='background-color:#4FD328;' class='rounded mr-2' alt='...'></div>
        <strong class='mr-auto'>Data Sync</strong>
        <small>Just now</small>
        <button type='button' class='ml-2 mb-1 close' data-dismiss='toast' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='toast-body' style='z-index:2;'>
        Success! We have successfully synced your timetable. Your friends now see your latest timetable
      </div>
    </div>
  </div>";
  break;
  case "error":
    $alerttoast = "<div aria-live='polite' aria-atomic='true' style='position: relative;'>
    <div class='toast' style='position: absolute; top: 0; right: 0;'>
      <div class='toast-header'>
        <img src='...' class='rounded mr-2' alt='...'>
        <strong class='mr-auto'>Data Sync</strong>
        <small>Just now</small>
        <button type='button' class='ml-2 mb-1 close' data-dismiss='toast' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='toast-body'>
        Error! There was an error with your request. Please try again later.
      </div>
    </div>
  </div>";
  break;

  default:
}
?>
<!doctype html>
<html lang="en">

<head>
<title>MyPSC - Friends</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="../resources/css/app.css">
<link rel="stylesheet" href="https://use.typekit.net/vfa7odm.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="/resources/scripts/ajax.js" crossorigin="anonymous"></script>
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
        <a class="dropdown-item" href="?logout=true"><i class="fas fa-sign-out-alt"></i> Logout</a>
      </div>
    </li>    
    </ul>
  </div>  
</nav>
<?php echo $alerttoast?>
<div class="container">
  <div class="row body-container-page">
      <div class="col-sm-12">
        <h2 class="font-title">Friends Timetable</h2>
        <a href="timetable"><button type="button" class="btn btn-primary">Return</button></a>
        <p>This function allows you to share your timetable with your friends and they can share their’s with you. This is useful to see when your friends are free. To use this service you must consent to using Knoyle Technologies data services.</p>
      </div>
  </div>
    <div class="row body-container-page">
        <?php if($KT_user_friends == "true"){
          echo "<div class='col-sm-4 mycard shadow-sm'> <h3 class='font-title'>My Friends <a data-toggle='modal' data-target='#addFriend' class='float-right blue'><i class='fas fa-plus'></i></a></h3>";
            $getfriends = KT_friends_list($user_ID);
            $friendslist = json_decode($getfriends, true);
            if(isset($friendslist['no_friends'])){
              echo "<p class='error midgrey'><span class='align-middle'>No friends could be found. You can add them by clicking the Plus button.</span></p>";
            }else{
            foreach($friendslist as $friends) {
                $friend_firstname = $friends['friend_firstname'];
                $friend_lastname = $friends['friend_lastname'];
                $friend_fullname = "$friend_firstname $friend_lastname";
                $friend_ID = $friends['friend_id'];
                echo "<div class='card'>
                <div class='card-body darkgrey'>
                  $friend_fullname
                  <a data-id='$friend_ID'class='float-right blue'><i data-id='$friend_ID' class='fas fa-calendar-alt'></i></a> <button class='userinfo' data-id='$friend_ID'><i class='fas fa-calendar-alt'></i></button>
                  <a href='resources/data/process-friends?p=remove&friend_id=$friend_ID' class='float-right red'><i class='fas fa-trash-alt'></i></a>
                </div>
            </div>";
            }
            }
            echo "</div>";
        }else{
          echo "<div class='col-sm-4 mycard shadow-sm'> <h3 class='font-title'>My Friends</h3><p class='error midgrey'><span class='align-middle'>No friends could be found because Friends service is not enabled.</span></p></div>";
        }
        ?>
        <div class="col-sm-4 mycard shadow-sm">
            <h3 class="font-title">Settings</h3>
            <p class="lightgrey">Friends Service: <b><?php echo $text_service?></b></p>
              <?php echo $service_action_button?>
              <?php echo $field_share_pin?>
              <?php echo $btnRefreshTimetable?>
        </div>
        <div class="col-sm-4 mycard shadow-sm">
            <h3 class="font-title">Consent</h3>
            <p>By agreeing to using this service, you are granting Knoyle Technologies access  to part of your student data to be stored. You can withdraw consent at any time, go to Data under the My Details page.</p>
        </div>
    </div>
    <div class="row body-container-page">
        <div class="col-sm-6 mycard shadow-sm">
            <h3 class="font-title">Sharing</h3>
            <p>To share your timetable with your friends you must have consented to sharing data with Knoyle Technologies. Once you have done this you need to enable the function in the settings tab. This will now give you a pin. Share this pin with your friends. Note: you will need to log into MyPSC every week for your shared timetable to stay up to date.</p>
        </div>
        <div class="col-sm-6 mycard shadow-sm">
            <h3 class="font-title">Adding Friends</h3>
            <p>To add your friends you will need their pin. On the My Friends tab, click the plus button. A dialog window will appear asking for your friends pin and their firstname if they have verify on. Then, simply just press add and this will then add them and they will appear in the ‘My Friends’ list.</p>
        </div>
    </div>
</div>
<div class="modal fade" id="addFriend" tabindex="-1" role="dialog" aria-labelledby="addFriends" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title darkgrey" id="addFriend">Add Friend:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p class="darkgrey">To add a friend, please make sure they are a MyPSC user and have the Friend service enabled. Then enter their share pin below and their firstname:</p>
        <form method="POST" action="resources/data/process-friends">
        <input type="hidden" name="p" value="add">
          <div class="form-group">
            <label for="share_pin" class="col-form-label darkgrey">Share Pin:</label>
            <input type="text" class="form-control" id="sharepin" name="sharepin">
          </div>
          <div class="form-group">
            <label for="full_name" class="col-form-label darkgrey">Firstname:</label>
            <input type="text" class="form-control" id="firstname" name="firstname">
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Add Friend</button>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="friendModal" role="dialog">
    <div class="modal-dialog">
 
     <!-- Modal content-->
     <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title darkgrey">View Friend</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="data-friend model-body">

        </div>
 
      </div>
      <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
     </div>
    </div>
</div>
</body>
</html>