<?php
  session_start();
  include 'includes/db.inc.php';

  //Select specific datas for viewing of table, inner join for fetching data from foreign key
  $results = mysqli_query($conn, "SELECT apt.id, pt.name, apt.date_submitted, apt.state_condition, apt.apt_date, apt.apt_time, apt.apt_action FROM appointment apt INNER JOIN patient pt ON apt.patient_id = pt.id");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  <!-- for side navigation icons -->

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!--sweetalert cdn-->

    <title>Doctor Dashboard</title>

  </head>
  <body>
     
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
            <span>someone@email.com</span>
          </div>
        </div> 
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav_item" style="padding: 0 20px">
            <a href="doctor_dashboard.php" class="nav-link" style="color: #ffffff;">
            <i class="fa fa-th-large"></i> Dashboard
            </a>
          </li>
          <li class="nav_item" style="padding: 0 20px">
            <a href="doctor_message.php" class="nav-link" style="color: #ffffff;">
            <i class="fa fa-envelope"></i> Messages
            </a>
          </li>
          <li class="nav_item">
              <a href="doctor_profile.php" class="nav-link " style="color: #ffffff;">
              <i class="fa fa-user"></i> Profile
              </a>
          </li>
          <li class="nav_item active">
              <a href="doctor_settings.php" class="nav-link " style="color: #23467a; font-weight: 500;">
              <i class="fa fa-cog"></i> Settings
              </a>
          </li>
          <div class="logout">
            <a href="login.php?logout">Logout</a>
          </div>
        </ul>
      </div>

        <div class="b-example-divider" style="width: 25px"></div>

        <div class="container-fluid" style="padding-left:30px;margin-top: -15px">
          <div class="border-bottom">  
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">  
              <h2 style="margin-top: 35px;margin-bottom: 15px; color: #23467a;">Settings</h2>
            </div>
            <p class="text-muted" style="margin-top:-12px">Change some options based on your preferences</p>

        </div>
    </main>

  </body>

  <script>
    const clickAction = (e) => {
    const buttonUID = e.target.getAttribute('uid')
    Swal.fire({
      title: 'Appointment Approval',
      text: 'Accept, Decline or Delete Appointment.',
      confirmButtonText: 'Cancel',
      html: `
        <form id="approvalForm" action="includes/appointmentaction.php" method="post">
          <div style="display: flex; flex-direction: column; justify-content: center; align-items: center;">
            <select name="action" id="action" class='btn btn-info m-3' required>
              <option value="" selected disabled hidden>Choose Action</option>
              <option value="Accepted">Accept</option>
              <option value="Declined">Decline</option>
              <option value="Deleted">Delete</option>
            </select>
            <textarea class='form-control' name="remarks" rows="4" cols="50" placeholder='Remarks/Comments' maxlength=99></textarea>
            <input type="text" value='${buttonUID}' name='id' hidden>
            <input type="text" value='${new Date()}' name='actionDate' hidden >
            <input type="submit" name='submit' value='Submit' class='btn btn-primary m-3' >
          </div>
        </form>
      `
      })
    }

    const actionButtons = document.querySelectorAll('#actionButton')
    actionButtons.forEach((e) => {
      e.addEventListener('click', clickAction)
    })
  </script>

  <script src="assets/js/bootstrap.bundle.min.js"></script>

</html>
