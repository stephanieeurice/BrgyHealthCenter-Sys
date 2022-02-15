<?php
  session_start();
	include 'includes/db.inc.php';
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/logo/temp.png" >
	  <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/custom/dashboard.css" rel="stylesheet">
    <link href="assets/custom/sidebars.css" rel="stylesheet">
    <link href="assets/custom/main_style.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Set appointment</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

  </head>
  <body onload="loginSuccess()">
     
    <?php include 'header.php'?>
    <style>
    <?php include 'assets/custom/main_style.css'; ?>
    </style>

    <main>

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
          <li class="nav_item active">
              <a href="patient_appointment.php" class="nav-link " style="color: #23467a; font-weight: 700; font-size: 20px;">
              <i class="fa fa-plus-circle"></i> Set Appointment
              </a>
          </li>
          <li class="nav_item">
              <a href="patient_messages.php" class="nav-link " style="color: #ffffff;">
              <i class="fa fa-envelope"></i> Messages
              </a>
          </li>
          <li class="nav_item">
              <a href="patient_record.php" class="nav-link " style="color: #ffffff;">
              <i class="fa fa-folder"></i> Records
              </a>
          </li>
          <li class="nav_item">
              <a href="patient_profile.php" class="nav-link " style="color: #ffffff;">
              <i class="fa fa-user"></i> Profile
              </a>
          </li>
          <li><hr class="dropdown-divider" style="color: #e1eaf7; height: 2px; margin: 10px"></li>
          <li class="nav_item">
              <a href="patient_appointment.php" class="nav-link " style="color: #ffffff;">
              <i class="fa fa-check-square-o"></i> COVID-19 Consultation
              </a>
          </li>
          <li class="nav_item">
              <a href="patient_appointment.php" class="nav-link " style="color: #ffffff;">
              <i class="fa fa-cog"></i> Settings
              </a>
          </li>
         </ul>
      </div>

        <div class="b-example-divider" style="width: 25px"></div>

        <div class="container-fluid" style="padding-left:30px;margin-top: -15px">
        
          <div class="border-bottom">  
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">  
              <h2 style="margin-top: 35px;margin-bottom: 15px; color: #23467a;">Set an Appointment</h2>
            </div>
            <p class="text-muted" style="margin-top:-12px">Set a new doctor's appointment</p>
          </div>

            <form action="includes/appointment.inc.php" method="post">

                  <div class="row g-3" style="margin-top: 5px">

                      <div class="col-3">
                        <label for="patient_id" style="font-weight: 500;" class="form-label">Patient ID</label>
                        <input type="text" class="form-control" id="patient_id" name="patient_id" value='<?php echo $id = $_SESSION["userid"]; ?>' required readonly>
                      </div>

                      <div class="col-9">
                        <label for="state_condition" style="font-weight: 500;" class="form-label">State your condition</label>
                        <textarea class="form-control" name="state_condition" id="state_condition" style="resize:none; height:20px" required></textarea>
                      </div>

                      <div class="col-6">
                        <label for="apt_date" style="font-weight: 500;" class="form-label">Appointment Date</label>
                        <input type="date" class="form-control" id="apt_date" name="apt_date" min="" required >
                      </div>

                      <div class="col-6">
                        <label for="apt_time" style="font-weight: 500;" class="form-label">Appointment Time</label>
                        <input type="time" class="form-control" id="apt_time" name="apt_time" required >
                      </div>

                      <hr class="my-4">

                      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap ">  
                          <div style="display: flex; justify-content:left; align-items: left">
                            <input type="reset" class="btn btn-secondary btn-lg" type="button" style="width: 100px" value="Clear">
                          </div>

                          <div style="display: flex; justify-content:right; align-items: right">
                            <button type="submit" name="submit" style="border: none; border-radius: 0.5rem; width: 120px; background-color:#23467a; color: #fff; font-size: 18px; " >Submit</button>
                            </button>
                          </div>
                      </div>

                  </div>
                </form>


        </div>

    </main>

  </body>

  <script>
     //Limits Date Selectable
     $(function(){
            var dtToday = new Date();
            
            var month = dtToday.getMonth() + 1;
            var day = dtToday.getDate();
            var year = dtToday.getFullYear();
            if(month < 10)
                month = '0' + month.toString();
            if(day < 10)
                day = '0' + day.toString();
            
            var maxDate = year + '-' + month + '-' + day;
            
            document.getElementById("apt_date").min = maxDate;
        });

  </script>

  <script src="assets/js/bootstrap.bundle.min.js"></script>

</html>
