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
    <link href="assets/css/brands.css" rel="stylesheet">

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

  
  <body>
    <header>
      <div class="logo">
        <a href="index.php">     
          <img src="assets/logo/temp.png" alt="Website logo" height="55" style="margin-bottom: 6px; padding-right: 0">
        </a>
        <div style="margin-top: 5px;">
          <a href="index.php">
            <span class="up">Community Health</span><br>
            <span>Center App</span>
          </a>
        </div>
      </div>
      <span class="divider"></span>
      <div class="login-btn">
        <a href="login.php"><button>Login</button></a>
      </div>      
    </header>    

      <div class="form-container container rounded-3 g-5" style="margin-top: 5%; margin-bottom: 5%; width: 70%; box-shadow: 0 7px 50px 0 rgba(0, 0, 0, 0.29); min-height: 640px;">
                  
          <div class="row container-fluid py-4">
              <h2 style="color: #23467a;">Register</h2>
              <div class="d-flex justify-content-between align-items-end flex-wrap">           
                <!-- Select Classification if Patient/Doctor then show fields of which was selected-->
                <div class="col-3 select" style="width: 240px;"> 
                    <select class="form-select" id="classification" onchange="selectChange(event)">
                          <option value="0" disabled selected>Select your classification</option> 
                          <option value="1">Patient</option>
                          <option value="2">Doctor</option>
                    </select>
                </div>

                <div class="app-buttons-reg"  >
                  Or register with:
                  <div style="padding-top: 5px;">
                  <button class="facebook" style="padding: 0 20px 0 5px; margin-right: 5px; width: 140px;"><span class="fa-brands fa-facebook" style="margin: 10px"></span><span>Facebook</span></button>
                  <button class="google" style="padding: 0 20px 0 0; width: 140px; height: 42px;"><img src="assets/icons/google.png" alt="Google logo" width="17px" style="margin: 0 10px 3px 0"><span>Google</span></button>

                  </div>
                </div>

              </div>

              <hr class="my-4">

              <!-- Patient Registration Form -->

              <div id="patient" hidden="true">
              <form action="includes/register_patient.inc.php" method="post">

                  <div class="row g-2 main-form">

                      <div class="col-sm-9 user-inputs">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Juan Dela Cruz" required>
                      </div>

                      <div class="col-3 user-inputs">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" required name="gender" id="gender">
                            <option value="Male" selected>Male</option>
                            <option value="Female"> Female</option>
                        </select>
                      </div>

                      <div class="col-5 user-inputs">
                        <label for="birthday" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="birthday" name="birthday" required >
                      </div>

                      <div class="col-3 user-inputs">
                        <label for="senior-citizen" class="form-label">Are you a senior citizen?</label><br>
                        <div style="display: flex;">
                          <input type="radio" name="radio" class="options" required >
                          <div style="margin-top: 8px;"><label for="senior-citizen" class="form-label">Yes</label></div>
                          <input type="radio" name="radio" class="options" style="margin-left: 20px;" required >
                          <div style="margin-top: 8px;"><label for="senior-citizen" class="form-label" style="" >No </label></div>
                        </label>
                        </div>  
                      </div>

                      <div class="col-4 user-inputs">
                        <label for="contactnum" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contactnum" name="contactnum" placeholder="09XX XXX XXXX" required >
                      </div>

                      <div class="col-12 user-inputs">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" name="address" id="address" style="resize:none; height:20px" placeholder="Please enter your full address" required></textarea>
                      </div>

                      <div class="col-sm-6 user-inputs">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="ex.juandelacruz@gmail.com" required>
                      </div>

                      <div class="col-6 user-inputs">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Please enter your password" required >
                      </div>

                      <hr class="my-4">

                      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap form-bottom" style="margin-top: 5px;">
                          <div class="to-login-container" style="display: flex; justify-content:left; align-items: left; margin-top: 30px;">Already have an account?&nbsp;&nbsp;<a href="login.php">Login here</a></div>  
                          
                          <div style="display: flex; justify-content:right; align-items: right;">
                            <button class=" btn btn-primary btn-lg" type="submit" name="submit" style="width: 200px">Register</button>
                          </div>
                      </div>

                  </div>
                </form>
                </div>

                <!-- Doctor Registration Form -->

                <div id="doctor" hidden="true">
                <form action="includes/register_doctor.inc.php" method="post">

                  <div class="row g-2 main-form">

                      <div class="col-sm-9 user-inputs">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Dr. Juan Dela Cruz" required>
                      </div>

                      <div class="col-3 user-inputs">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select" required name="gender" id="gender">
                            <option value="Male" selected>Male</option>
                            <option value="Female"> Female</option>
                        </select>
                      </div>

                      <div class="col-4 user-inputs">
                        <label for="birthday" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" id="birthday" name="birthday" required >
                      </div>  
                      
                      <div class="col-4 user-inputs">
                        <label for="contactnum" class="form-label">Contact Number</label>
                        <input type="text" class="form-control" id="contactnum" name="contactnum" placeholder="09XX XXX XXXX" required >
                      </div>

                      <div class="col-4 user-inputs" style="margin-bottom: 20px">
                        <label for="specialization" class="form-label">Specialization</label>
                        <select class="form-select" required name="specialization" id="specialization">
                            <option value="Pediatrician" selected>Pediatrician</option>
                            <option value="Obstetrician" >Obstetrician/Gynecologist</option>
                            <option value="Cardiologist" >Cardiologist</option>
                            <option value="Dentist" >Dentist</option>
                            <option value="Ophthalmologist" >Ophthalmologist</option>
                        </select>
                      </div>

                      <div class="col-12 user-inputs" style="margin-top: -10px">
                        <label for="address" class="form-label">Address</label>
                        <textarea class="form-control" name="address" id="address" style="resize:none; height:20px" placeholder="Please enter your full address" required></textarea>
                      </div>                      

                      <div class="col-6 user-inputs">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="ex.juandelacruz@gmail.com" required>
                      </div>

                      <div class="col-6 user-inputs"  style="margin-bottom: 14px">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Please enter your password" required >
                      </div>                   

                      <hr class="my-2">

                      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap form-bottom" style="margin-top: 20px;">  
                          <div class="to-login-container" style="display: flex; justify-content:left; align-items: left; margin-top: 30px;">Already have an account?&nbsp;&nbsp;<a href="login.php">Login here</a></div>  

                          <div style="display: flex; justify-content:right; align-items: right">
                            <button class=" btn btn-primary btn-lg" type="submit" name="submit" style="width: 200px">Register</button>
                          </div>
                      </div>

                  </div>
                </form>
                </div>
              </div>

      </div>
    <footer class="footer">
      <div class="footer-left">
        <div class="logo">
          <a href="index.php">     
            <img src="assets/logo/temp.png" alt="Website logo" style="margin: 0 0 15px -15px; padding-right: 0">
          </a>
          <div style="margin-top: 15px;">
            <a href="index.php">
              <span class="up">Community Health</span><br>
              <span>Center App</span>
            </a>
          </div>
        </div>          
      </div>
      <ul class="footer-right">
        <li>
          <h3>Quick Links</h3>
          <ul class="box">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Contact Us</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms and Conditions</a></li>
          </ul>
        </li>
        <li>
          <h3>Contact</h3>
          <ul class="box">
            <li><a href="#">Address here...</a></li>
            <li><a href="#">Address here...</a></li>
            <li><a href="#"><i class="fa fa-phone-square"></i>&nbsp;Phone: 0912 345 6789</a></li>
            <li><a href="#"><i class="fa fa-envelope"></i>&nbsp;Email: communityhealthcenterapp@gmail.com</a></li>
          </ul>
        </li>
      </ul>
      <div class="footer-bottom">
        <p>All rights reserved by &copy; Community Health Center App 2022</p>
      </div>
    </footer>  
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
