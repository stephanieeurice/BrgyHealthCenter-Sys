<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/logo/temp.png" >
    <title>Register</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/custom/login.css" rel="stylesheet">
    <link href="assets/custom/heroes.css" rel="stylesheet">

    <style>

      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .left-align
      {
          align-items: left;
          justify-content: left;
          display: flex
      }

      .center-align
      {
          align-items: center;
          justify-content: center;
          display: flex
      }

      #hideValuesOnSelect {
      display: none;
      }
    </style>
  </head>

  <body class="text-center" style="background-image: linear-gradient(145deg, #23467a , #36a7e3); background-size: 100%; background-repeat: no-repeat;">
      <div class="container rounded-3 g-5" style="box-shadow: 0 7px 50px 0 rgba(0, 0, 0, 0.29); height: 600px; background-color:#F2F2F2">
                  
          <div class="row container-fluid">
              <div>  
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">  
                  <h2 style="margin-bottom: 15px">Register</h2>
                  <div class="btn-toolbar mb-2 mb-md-0 row">
                    <h6 style="margin-left:-50px;margin-top:20px">Login with:</h6>
                    <div class="btn-group me-2">
                      <img src="assets/icons/fb.png" height="50px">
                      <img src="assets/icons/google.png" height="50px" style="margin-left:10px">
                    </div>
                  </div>
                </div>

      <!-- Select Classification if Patient/Doctor then show fields of which was selected-->

                  <div class="col-3" style="margin-top: -20px"> 
                      <select class="form-select" id="classification" onchange="selectChange(event)">
                            <option value="0" disabled selected>Select your classification</option> 
                            <option value="1">Patient</option>
                            <option value="2">Doctor</option>
                      </select>
                  </div>

              </div>

              <hr class="my-4">

      <!-- Patient Registration Form -->

              <div id="patient" hidden="true">
              <form action="includes/register_patient.inc.php" method="post">

                  <div class="row g-3" >

                      <div class="col-sm-4">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                      </div>

                      <div class="col-4">
                        <label for="birthday" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="birthday" name="birthday" required >
                      </div>

                      <div class="col-4">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" required name="gender" id="gender">
                            <option value="Male" selected>Male</option>
                            <option value="Female"> Female</option>
                        </select>
                      </div>

                      <div class="col-9">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" name="address" id="address" style="resize:none; height:20px" required></textarea>
                      </div>

                      <div class="col-3">
                        <label for="contactnum" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contactnum" name="contactnum" required >
                      </div>

                      <div class="col-sm-6">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                      </div>

                      <div class="col-6">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required >
                      </div>

                      <hr class="my-4">

                      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap ">  
                          <div style="display: flex; justify-content:left; align-items: left">
                            <a href="login.php" style="text-decoration: none;"><button class=" btn btn-secondary btn-lg" type="button" style="width: 100px">Back</button></a>
                          </div>

                          <div style="display: flex; justify-content:right; align-items: right">
                            <button class=" btn btn-primary btn-lg" type="submit" name="submit" style="width: 200px">Register</button>
                          </div>
                      </div>

                  </div>
                </form>
                </div>

      <!-- Doctor Registration Form -->

                <div id="doctor" hidden="true">
                <form action="includes/register_doctor.inc.php" method="post">

                  <div class="row g-3" >

                      <div class="col-sm-4">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                      </div>

                      <div class="col-4">
                        <label for="birthday" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="birthday" name="birthday" required >
                      </div>

                      <div class="col-4">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" required name="gender" id="gender">
                            <option value="Male" selected>Male</option>
                            <option value="Female"> Female</option>
                        </select>
                      </div>

                      <div class="col-9">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" name="address" id="address" style="resize:none; height:20px" required></textarea>
                      </div>

                      <div class="col-3">
                        <label for="contactnum" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contactnum" name="contactnum" required >
                      </div>

                      <div class="col-sm-4">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                      </div>

                      <div class="col-4">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required >
                      </div>

                      <div class="col-4" style="margin-bottom: 20px">
                        <label for="specialization" class="form-label">Specialization</label>
                        <select class="form-select" required name="specialization" id="specialization">
                            <option value="Pediatrician" selected>Pediatrician</option>
                            <option value="Obgyn" >Obstetrician/Gynecologist</option>
                            <option value="Cardiologist" >Cardiologist</option>
                            <option value="Dentist" >Dentist</option>
                            <option value="Ophthalmologist" >Ophthalmologist</option>
                        </select>
                      </div>

                      <hr class="my-2">

                      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap ">  
                          <div style="display: flex; justify-content:left; align-items: left">
                            <a href="login.php" style="text-decoration: none;"><button class=" btn btn-secondary btn-lg" type="button" style="width: 100px">Back</button></a>
                          </div>

                          <div style="display: flex; justify-content:right; align-items: right">
                            <button class=" btn btn-primary btn-lg" type="submit" name="submit" style="width: 200px">Register</button>
                          </div>
                      </div>

                  </div>
                </form>
                </div>
              </div>

      </div>
  </body>

  <script type="text/javascript">

       function selectChange(e) {
        if(e.target.value == "1"){
          document.getElementById("patient").hidden = false;
          document.getElementById("doctor").hidden = true;
        }
        else if(e.target.value == "2"){
          document.getElementById("patient").hidden = true;
          document.getElementById("doctor").hidden = false;
        }
      }
  </script>

</html>
