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

    <title>Dashboard</title>

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
          <li class="nav_item active" style="padding: 0 20px">
            <a href="patient_dashboard.php" class="nav-link" style="color: #23467a; font-weight: 700; font-size: 20px;">
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
              <h2 style="margin-top: 35px;margin-bottom: 15px; color: #23467a; ">Appointments</h2>
            </div>
            <p class="text-muted" style="margin-top:-12px">Track your appointments</p>
          </div>

          <div class="table-responsive" style="margin-top:10px">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">Apt ID</th>
                  <th scope="col">Date Issued</th>
                  <th scope="col">State Condition</th>
                  <th scope="col">Appointment Date</th>
                  <th scope="col">Appointment Time</th>
                </tr>
              </thead>
              <tbody>

                <!-- Fetch Data Rows from db -->

                <?php while ($row = mysqli_fetch_array($results)) { ?>
                    <tr>
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo date('Y-m-d', strtotime($row['date_submitted'])); ?></td>
                      <td><?php echo $row['state_condition']; ?></td>
                      <td><?php echo $row['apt_date']; ?></td>
                      <td><?php echo $row['apt_time']; ?></td>
                    </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>


          <div style="text-align: right; margin-top: 100px;">
            <a href="patient_appointment.php">
              <button style="padding: 10px 20px; border: none; border-radius: 0.5rem; width: 190px; background-color:#23467a; color: #fff;" >
              <i class="fa fa-plus-circle" style="font-size: 19px; margin-right: 10px;"></i><span>Set an appointment</span>
              </button>
            </a>
          </div>

        </div>
    </main>

  </body>

  <script>

  </script>

  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/custom/alert.js"></script>

</html>
