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
    <title>Patient Dashboard</title>

    <style>
      li a
      { 
        font-size:18px;
      }

    </style>
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

    <main>

      <!-- Sidebar -->
      
          <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-light" style="width: 280px; ">
              <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item" style="margin-top:20px">
                    <a href="#" class="nav-link" style="color: #308aba">
                        <img src="assets/icons/dashboard.png" height="20px">  Dashboard
                    </a>
                </li>
                <li class="nav-item" style="margin-top:10px">
                    <a href="patient_appointment.php" class="nav-link " style="color: black">
                        <img src="assets/icons/apt.png" height="20px">  Set Appointment
                    </a>
                </li>
              </ul>
          </div>

        <div class="b-example-divider" style="width: 25px"></div>

        <div class="container-fluid" style="padding-left:30px;margin-top: -15px">
        
          <div class="border-bottom">  
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">  
              <h2 style="margin-top: 35px;margin-bottom: 15px">Appointments</h2>
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

        </div>
    </main>

  </body>

  <script>

  </script>

  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/custom/alert.js"></script>

</html>
