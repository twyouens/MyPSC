<?php
require_once('resources/autoload.php');
if($KT_user_exists == true){
  $friends_message = "<p class='error midgrey'><span class='align-middle'>No friends could be found :(</span></p>";
  $transport_message = "<p class='error midgrey'><span class='align-middle'>Check back later for recommendations.</span></p>";
}else{
  $friends_message = "<p class='error midgrey'><span class='align-middle'>Data sharing is not turned on. Go to My Details to get started.</span></p>";
  $transport_message = "<p class='error midgrey'><span class='align-middle'>Data sharing is not turned on. Go to My Details to get started.</span></p>";
}

if($KT_user_verified == "true"){
  $show_feedback = "true";
}
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<script src="/resources/scripts/ajax.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d30a3a9e8d.js" crossorigin="anonymous"></script>
</head>

<body class="body">
<nav <?php echo $styleNavShow?>class="navbar navbar-expand-md bg-dark navbar-dark navbar">
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
        <a class="dropdown-item" href="tools/free-room">Free Room</a>
        <a class="dropdown-item" href="tools/room-timetable">Room Timetable</a>
        <a class="dropdown-item" href="tools/trains">Train Times</a>
      </div>
    </li> 
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle mr-sm-2" href="#" id="navbardrop" data-toggle="dropdown"><div class="accountcircle"><?php $inital1 = $user_fname[0]; $inital2 = $user_lname[0]; echo "$inital1$inital2"?></div></a>
      <div class="dropdown-menu dropdown-menu-right">
        <?php if(KT_show_admin() == "true"){echo "<a class='dropdown-item' href='https://admin.psc.knoyletechnologies.co.uk/' target='_blank'><i class='fas fa-tools'></i> Admin</a>";}?>
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
          <h1 class="display-4 font-title darkgrey">Welcome!</h1>
          <p class="lead darkgrey">Welcome to the Peter Symonds College MyPSC. This service is currently for students to access functions from the main Intranet.</p>
          <hr class="my-4 darkgrey">
          <p class=" darkgrey">If you need help or something doesn’t work please contact me.</p>
          <a href="mailto:mypsc@knoyletechnologies.co.uk"><button class="btn btn-primary btn-lg">Contact</button></a> 
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
           $lessons = $timetablearray['timetable'];
           if(empty($lessons)){
            echo "<p>Woohoo! Nothing is scheduled for you today.</p>";
           }else{
            foreach($lessons as $table) {
              if(empty($table)){
              }else{
              $lesson_title = formatLessonName($table['Title']);
              $lesson_start = date("G:i",$table['Start']);
              $lesson_end = $table['End'];
              $lesson_staff = $table['Staff'];
             echo "<li class='item-today'>$lesson_start:  $lesson_title</li>";
              }
             }
           }
           ?>
         </ul>
         <div class="mycardfooter"><a href="timetable"><i class="fas fa-calendar-alt"></i> <span class="blue">View Full Timetable</span></a></div>
        </div>
        <div class="col-sm-4 mycard shadow-sm">
         <h3 class="font-title">Who's free now?</h3>
         <?php echo $friends_message?>
         <div class="mycardfooter"><a href="timetable-friends"><i class="fas fa-user-friends"></i> <span class="blue">View Friends</span></a></div>
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
         <p class="error midgrey"><span class="align-middle">No notices could be found. Feature coming soon, please refer to development notes for update.</span></p>
         <div class="mycardfooter"><a href="https://intranet.psc.ac.uk/news/browser.php"><i class="fas fa-bullhorn"></i> <span class="blue">View on Intranet</span></a></div>
        </div>
      <div class="col-sm-4 mycard shadow-sm">
         <h3 class="font-title">Going Home</h3>
         <?php echo $transport_message?>
         <div class="mycardfooter"><a href="tools/trains"><i class="fas fa-train"></i> <span class="blue">Open Train Times</span></a></div>
        </div>
        <?php
        if($show_navbar == "false"){

        }else{
          echo "<div class='col-sm-4 mycard shadow-sm'>
          <h3 class='font-title'>MyPSC App <span class='badge badge-pill badge-danger'>New</span></h3>
          <p>MyPSC now has a app for your phone. It is currently in BETA development, but allows you to access MyPSC right of your home screen. To get it, please go to the link bellow and sign-up for the BETA. [Currently only avaliable for iOS users.]</p>
          <div class='mycardfooter'><a href='app'><span class='blue'>Get App</span></a></div>
         </div>";
        }
        ?>
        
  </div>
  <div class="row body-container-page">
            <?php
        if($show_feedback == "true"){
          if(KT_allow_feedback() == "true"){
            echo "
            <div class='col-sm-4 shadow-sm mycard'>
          <h3 class='font-title'>MyPSC Feedback</h3>
          <p>Thank you for using MyPSC, if you have some feedback for the development team, please press the button below and leave some feedback.</p>
          <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#submitFeedback'>Leave Feedback</button>
         </div>";
          }else{
            echo "<div class='col-sm-4 shadow-sm'><br></div>";
          }
        }else{
          echo "<div class='col-sm-4 shadow-sm'><br></div>";
        }
        if($KT_user_verified == "true"){
          echo "
            <div class='col-sm-4 shadow-sm mycard'>
          <h3 class='font-title'>MyPSC Development</h3>
          <p>MyPSC isn't perfect, we would like you to know the known issues/ bugs that we are working on. You can view these by clicking the button bellow.</p>
          <button type='button' class='btn btn-primary devnotes' data-toggle='modal' data-target='#notesModal'>Current Issues</button>
         </div>";
        }
        ?>
        </div>

</div>
<?php 
if($show_feedback == "true"){
  echo "
  <div class='modal fade' id='submitFeedback' tabindex='-1' role='dialog' aria-labelledby='submitFeedback' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title darkgrey' id='submitFeedback'>Submit Feedback:</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body'>
        <p class='darkgrey'>To leave feedback, please enter the page/function that you are using and then describe the issue/ comment in the description field. Thank you!</p>
        <p class='darkgrey'>NOTE: We may not get back to you, but your request has been logged.</p>
        <form method='POST' action='resources/data/process-feedback'>
        <input type='hidden' name='p' value='add'>
          <div class='form-group'>
            <label for='page' class='col-form-label darkgrey'>Page/ Function:</label>
            <input type='text' class='form-control' id='page' name='page'>
          </div>
          <div class='form-group'>
            <label for='description' class='col-form-label darkgrey'>Description:</label>
            <textarea class='form-control' id='description' rows='3' name='description'></textarea>
          </div>
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>
        <button type='submit' class='btn btn-primary'>Submit Feedback</button>
        </form>
      </div>
    </div>
  </div>
</div>
  ";
}else{

}

if($KT_user_verified == "true"){
  echo "
  <div class='modal fade' id='notesModal' tabindex='-1' role='dialog' aria-labelledby='notesModal' aria-hidden='true'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <h5 class='modal-title darkgrey' id='submitFeedback'>Current Issues:</h5>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
          <span aria-hidden='true'>&times;</span>
        </button>
      </div>
      <div class='modal-body ajax-dump'>
        
      </div>
      <div class='modal-footer'>
        <button type='button' class='btn btn-secondary' data-dismiss='modal'>Cancel</button>
        </form>
      </div>
    </div>
  </div>
</div>
  ";
}else{

}
?>
</body>
</html>