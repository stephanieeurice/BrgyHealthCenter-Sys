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
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!--sweetalert cdn-->

    <title>Prescription</title>

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
            <span><?php echo $name = $_SESSION["userem"]; ?></span>
          </div>
        </div> 
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav_item" style="padding: 0 20px">
            <a href="doctor_dashboard.php" class="nav-link" style="color: #ffffff;">
            <i class="fa fa-th-large"></i> Dashboard
            </a>
          </li>
          <li class="nav_item">
              <a href="doctor_messages.php" class="nav-link " style="color: #ffffff;">
              <i class="fa fa-envelope"></i> Messages
              </a>
          </li>
          <li class="nav_item active">
              <a href="doctor_prescription.php" class="nav-link " style="color: #23467a; font-weight: 700; font-size: 20px;">
              <i class="fa fa-file-text"></i> Prescriptions
              </a>
          </li>
          <li class="nav_item">
              <a href="doctor_profile.php" class="nav-link " style="color: #ffffff;">
              <i class="fa fa-user"></i> Profile
              </a>
          </li>
          <li class="nav_item">
              <a href="doctor_settings.php" class="nav-link " style="color: #ffffff;">
              <i class="fa fa-cog"></i> Settings
              </a>
          </li>
        </ul>
      </div>

        <div class="b-example-divider" style="width: 25px"></div>

        <div class="container-fluid" style="padding-left:30px;margin-top: -15px">
          <div class="border-bottom">  
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">  
              <h2 style="margin-top: 35px;margin-bottom: 15px; color: #23467a;">Prescriptions</h2>
            </div>
            <p class="text-muted" style="margin-top:-12px">Fill out the details below for the patient's prescription </p>
        </div>
        <div class="mt-4" style="width: 100%; margin-left: -40px;">
			<form action="GenPDF/createpdf.php" method ="post" class="offset-md-1">
				<div class="row mb-2">
                    <div class="col-lg-6">
                        <label class="form-label">First Name</label><span class="required">*</span>
                        <input type="text" name="fname" class="form-control" required>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">Last Name</label><span class="required">*</span>    
                        <input type="text" name="lname" class="form-control" require>
                    </div>
				</div>
				<div class="row mb-2">
                    <div class="col-lg-6">
                        <label class="form-label">Email</label><span class="required">*</span>
                        <input type="text" name="email" class="form-control" require>
                    </div>
                    <div class="col-lg-6">
                        <label class="form-label">Contact Number</label><span class="required">*</span>
                        <input type="tel" name="number" class="form-control" require>
                    </div>
				</div>

				<div class="mb-2">
                    <label class="form-label">Medical Prescription</label><span class="required">*</span>
					<textarea name="message" rows="10" class="form-control" require></textarea>
				</div>
				<div class="mb-2">
					<!-- <button type="submit" class="btn btn-success btn-lg btn-block"> Generate PDF </button> -->
                    <button type="submit" class="genpdf-btn">Generate PDF</button>
				</div>
			<form>
        </div>    
                

        
    </main>

  </body>

  <script src="assets/js/bootstrap.bundle.min.js"></script>

</html>
