<?php
  //starts session 
  session_start();
	include 'includes/db.inc.php';

  //get SESSION userid from LOGGING IN
  $id = $_SESSION["userid"];

  $results = mysqli_query($conn, "SELECT * FROM appointment apt WHERE apt.patient_id = $id");
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/logo/temp.png" >
	  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/custom/dashboard.css" rel="stylesheet">
    <link href="assets/custom/sidebars.css" rel="stylesheet">
    <link href="assets/custom/alert.css" rel="stylesheet">
    <link href="assets/custom/alert2.css" rel="stylesheet">
    <link href="assets/custom/main_style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   

    <title>Profle</title>

  </head>
  <body>
        <?php
        if (isset($_GET["success"])) {
            echo "<div class='alert alert-success alert-dismissible'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                Appointment Successfully Submitted.
                </div>";
        }
        ?>


    <!-- Calls header.php for header content -->

    <?php include 'header.php'?>
    <style>
    <?php include 'assets/custom/main_style.css'; ?>
    </style>

    <main>

      <!-- Sidebar -->
      
      <div class="d-flex flex-column flex-shrink-0 m-md-0 text-white" style="width: 310px; background-color: #23467a;">
        <div class="d-flex user_sn" style="padding: 20px 35px">
          <img class="-1" id="avatar" src="assets/images/avatar_female.png" alt="User Avatar" height="55" width="55">
          <div class="user_details_sn mt-3" >
            <span><?php echo $name = $_SESSION["usernm"]; ?></span>
            <span><?php echo $name = $_SESSION["userem"]; ?></span>
          </div>
        </div>        
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav_item" style="padding: 0 20px">
            <a href="patient_dashboard.php" class="nav-link" style="color: #ffffff;">
            <i class="fa fa-th-large"></i> Dashboard
            </a>
          </li>
          <li class="nav_item">
              <a href="patient_appointment.php" class="nav-link " style="color: #ffffff;">
              <i class="fa fa-plus-circle"></i> Set Appointment
              </a>
          </li>
          <li class="nav_item">
              <a href="patient_messages.php" class="nav-link " style="color: #ffffff;">
              <i class="fa fa-envelope"></i> Messages
              </a>
          </li>
          <li class="nav_item">
              <a href="patient_record.php" class="nav-link " style="color: #ffffff">
              <i class="fa fa-folder"></i> Records
              </a>
          </li>
          <li class="nav_item active">
              <a href="patient_profile.php" class="nav-link " style="color: #23467a; font-weight: 700; font-size: 20px;">
              <i class="fa fa-user"></i> Profile
              </a>
          </li>
          <li><hr class="dropdown-divider" style="color: #e1eaf7; height: 2px; margin: 10px"></li>
          <li class="nav_item">
              <a href="patient_covid_consultation.php" class="nav-link " style="color: #ffffff;">
              <i class="fa fa-check-square-o"></i> COVID-19 Consultation
              </a>
          </li>
          <li class="nav_item">
              <a href="patient_settings.php" class="nav-link " style="color: #ffffff;">
              <i class="fa fa-cog"></i> Settings
              </a>
          </li>
        </ul>
      </div>

        <div class="b-example-divider" style="width: 25px"></div>

        <div class="container-fluid" style="padding-left:30px;margin-top: -15px">
          <div class="border-bottom">  
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">  
              <h2 style="margin-top: 35px;margin-bottom: 15px; color: #23467a;">Profile</h2>
            </div>
            <p class="text-muted" style="margin-top:-12px">View and edit some of your profile information</p>
          </div>

          <form action="" method="post">

            <div class="row g-3" style="margin-top: 5px">
              <div class="d-flex" style="padding: 20px 35px">
                <img class="-1" id="avatar" src="assets/images/avatar_female.png" alt="User Avatar" height="150" width="150" style="border-radius: 75px; border: 2px solid #23467a;">
                <div class="user_details_sn" style="margin: 35px 0 0 20px;" >
                  <span style="color: #23467a; font-size: 20px;"><?php echo $name = $_SESSION["usernm"]; ?></span><br>
                  <span style="font-size: 16px;"><?php echo $name = $_SESSION["userem"]; ?></span> <br>
                  <a href="">
                    <button style="margin-top: 15px; text-align: center; padding: 10px 20px; border: none; border-radius: 0.5rem; background-color:#36a7e3; color: #fff;" >
                    <i style="font-size: 19px;"></i><span>Edit profile</span>
                    </button>
                  </a>  
                </div>
              </div>  

              <div class="col-5 user-details">
                <label for="name" class="form-label">Full Name</label><span class="required">*</span><br>
                <div class="user-data"><span><?php echo $name = $_SESSION["usernm"]; ?></span></div>
              </div>

              <div class="col-5 user-details">
                <label for="gender" class="form-label">Gender</label><span class="required">*</span>
                <select class="form-select" required name="gender" id="gender">
                    <option value="Male" selected>Male</option>
                    <option value="Female"> Female</option>
                </select>
              </div>

              <div class="col-5 user-details">
                <label for="birthday" class="form-label">Date of Birth</label><span class="required">*</span>
                <input type="text" class="form-control" id="birthday" name="birthday" placeholder="01/20/2000" required>
              </div>

              <!-- <div class="col-3 user-details">
                <label for="senior-citizen" class="form-label">Are you a senior citizen?</label><br>
                <div style="display: flex;">
                  <input type="radio" name="radio" class="options" required >
                  <div style="margin-top: 8px;"><label for="senior-citizen" class="form-label">Yes</label></div>
                  <input type="radio" name="radio" class="options" style="margin-left: 20px;" required >
                  <div style="margin-top: 8px;"><label for="senior-citizen" class="form-label" style="" >No </label></div>
                </label>
                </div>  
              </div> -->

              <div class="col-5 user-details">
                <label for="contactnum" class="form-label">Contact Number</label><span class="required">*</span>
                <input type="text" class="form-control" id="contactnum" name="contactnum" placeholder="09453859736" required >
              </div>

              <div class="col-5 user-details">
                <label for="address" class="form-label">Address</label><span class="required">*</span>
                <textarea class="form-control" name="address" id="address" style="resize:none; height:20px" placeholder="Concordia, Sta. Maria, Bulacan" required></textarea>
              </div>

              <div class="col-sm-5 user-details">
                <label for="email" class="form-label">Email Address</label><span class="required">*</span>
                <div class="user-data"><span><?php echo $email = $_SESSION["userem"]; ?></span></div>
              </div>

            </div>
          </form>


        </div>
    </main>

  </body>

  <script>

  </script>

  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/custom/alert.js"></script>

</html>
