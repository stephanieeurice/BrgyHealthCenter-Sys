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
    <title>Dashboard</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <style>

      li a
      { 
        font-size:18px;
      }

    </style>
  </head>
  <body onload="loginSuccess()">
     
    <?php include 'header.php'?>

    <main>

          <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-light" style="width: 280px; ">
              <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item" style="margin-top:20px">
                    <a href="patient_dashboard.php" class="nav-link" style="color: black">
                        <img src="assets/icons/dashboard.png" height="20px">  Dashboard
                    </a>
                </li>
                <li class="nav-item" style="margin-top:10px">
                    <a href="#" class="nav-link " style="color: #308aba">
                        <img src="assets/icons/apt.png" height="20px">  Set Appointment
                    </a>
                </li>
              </ul>
          </div>

        <div class="b-example-divider" style="width: 25px"></div>

        <div class="container-fluid" style="padding-left:30px;margin-top: -15px">
        
          <div class="border-bottom">  
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">  
              <h2 style="margin-top: 35px;margin-bottom: 15px">Set an Appointment</h2>
            </div>
            <p class="text-muted" style="margin-top:-12px">Set a new doctor's appointment</p>
          </div>

            <form action="includes/appointment.inc.php" method="post">

                  <div class="row g-3" style="margin-top: 5px">

                      <div class="col-3">
                        <label for="patient_id" class="form-label">Patient ID</label>
                        <input type="text" class="form-control" id="patient_id" name="patient_id" value='<?php echo $id = $_SESSION["userid"]; ?>' required readonly>
                      </div>

                      <div class="col-9">
                        <label for="state_condition" class="form-label">State your condition</label>
                        <textarea class="form-control" name="state_condition" id="state_condition" style="resize:none; height:20px" required></textarea>
                      </div>

                      <div class="col-6">
                        <label for="apt_date" class="form-label">Appointment Date</label>
                        <input type="date" class="form-control" id="apt_date" name="apt_date" min="" required >
                      </div>

                      <div class="col-6">
                        <label for="apt_time" class="form-label">Appointment Time</label>
                        <input type="time" class="form-control" id="apt_time" name="apt_time" required>
                      </div>

                      <hr class="my-4">

                      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap ">  
                          <div style="display: flex; justify-content:left; align-items: left">
                            <input type="reset" class="btn btn-secondary btn-lg" type="button" style="width: 100px" value="Clear">
                          </div>

                          <div style="display: flex; justify-content:right; align-items: right">
                            <button class=" btn btn-primary btn-lg" type="submit" name="submit" style="width: 200px">Submit</button>
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
