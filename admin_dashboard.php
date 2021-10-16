<?php
  session_start();
  include 'includes/db.inc.php';

  //Select specific datas for viewing of table, inner join for fetching data from foreign key
  $results = mysqli_query($conn, "SELECT apt.id, pt.name, apt.date_submitted, apt.state_condition, apt.apt_date, apt.apt_time FROM appointment apt INNER JOIN patient pt ON apt.patient_id = pt.id");
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/logo/temp.png" >
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/custom/dashboard.css" rel="stylesheet">
    <link href="assets/custom/sidebars.css" rel="stylesheet">
    <title>Admin Dashboard</title>

    <style>

      li a
      { 
        font-size:18px;
      }

    </style>
  </head>
  <body>
     
    <?php include 'header.php'?>

    <main>

          <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-light" style="width: 280px; ">
              <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item" style="margin-top:20px">
                    <a href="#" class="nav-link" style="color: #308aba">
                        <img src="assets/icons/dashboard.png" height="20px">  Dashboard
                    </a>
                </li>
                <li class="nav-item" style="margin-top:10px">
                    <a href="admin_registration.php" class="nav-link " style="color: black">
                        <img src="assets/icons/accounts.png" height="20px">  Manage Accounts
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
            <p class="text-muted" style="margin-top:-12px">Track all patients appointments</p>
          </div>

          <div class="table-responsive" style="margin-top:10px">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">Apt ID</th>
                  <th scope="col">Patient Name</th>
                  <th scope="col">Date Issued</th>
                  <th scope="col">State Condition</th>
                  <th scope="col">Appointment Date</th>
                  <th scope="col">Appointment Time</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($row = mysqli_fetch_array($results)) { ?>
                    <tr>
                      <td><?php echo $row['id']; ?></td>
                      <td><?php echo $row['name']; ?></td>
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

</html>
