<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="assets/logo/temp.png" >
    <title>Log In</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/custom/alert.css" rel="stylesheet">
    <link href="assets/custom/login.css" rel="stylesheet">
    <link href="assets/custom/heroes.css" rel="stylesheet">
    <link href="assets/custom/alert2.css" rel="stylesheet">
    <link href="assets/css/brands.css" rel="stylesheet">

  </head>

  <body class="text-center" style="">
    <!-- Alerts -->
      <?php
        if (isset($_GET["error"])) {
            if ($_GET["error"] == "wronglogin") {
              echo "<div class='alert alert-danger alert-dismissible'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                Account doesn't exists!
                </div>";
            }
        else if ($_GET["error"] == "wrongpassword") {
            echo "<div class='alert alert-danger alert-dismissible'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            Incorrect login password!
            </div>";
                                    }
        }
        if (isset($_GET["logout"])) {
            echo "<div class='alert alert-success alert-dismissible'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                You have logged out.
                </div>";
            }
        if (isset($_GET["register"])) {
            echo "<div class='alert alert-success alert-dismissible'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                Account successfully registered.
                </div>";
        }
        if (isset($_GET["register_doctor"])) {
            echo "<div class='alert alert-success alert-dismissible'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                An admin will now evaluate your account. Please wait for a response on your email.
                </div>";
        }
        ?>
    
    <header>
      <div class="logo">
        <a href="index.php">     
          <img src="assets/logo/temp.png" alt="Website logo" height="55" style="margin-bottom: 6px; padding-right: 0">
        </a>
        <div class='app-name' style="margin-top: 5px; text-align: left;">
          <a href="index.php">
            <span>Community Health</span><br>
            <span>Center App</span>
          </a>
        </div> 
      </div>
      <span class="divider"></span>
      <div class="login-btn">
        <a href="login.php"><button>Login</button></a>
      </div>      
    </header>  
      
    <div class="container rounded-3" style="margin-top: 5%; margin-bottom: 5%; width: 70%; background-image: linear-gradient(145deg, #23467a , #36a7e3); background-size: 30%; background-repeat: no-repeat; box-shadow: 0 7px 50px 0 rgba(0, 0, 0, 0.29);">
                
      <div class="row center-align" >
                
        <div class="col-6 col-md-4 rounded-3" style="height: 500px; width: 30%;">
          <img src="assets/logo/temp.png" width="50%" style="margin:80px 0 0 0">
            <p class="app-long-name py-4" style="text-align: center; color: white;line-height: 1.3; font-size: 15px;">Community Health Center App<br>Online Health Consultation Portal</p>
        </div>

        <div class="col-sm-6 col-md-8" style="width: 70%;">

          <main class="form-signin" style="">

              <!-- Form -->

              <form action="includes/login.inc.php" method="post">
                
                <h3 class="h3 mb-3 fw-normal" style="margin-top: 40px; color: #23467a;">Login</h3>

                <div class="inputs" style="margin-top: 40px;">
                  <label for="email">Email</label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="someone@email.com" required>                                    
                </div>
                <div class="inputs">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Please enter your password" required>
                </div>
                <div style="margin-top: 30px;">
                  <select class="form-select" id="auth" name="auth">
                    <option value="Patient" selected>Patient</option>
                    <option value="Doctor">Doctor</option>
                    <option value="Admin">Admin</option>
                  </select>
                </div>

                <div class="others">
                  <div class="checkbox mb-3">
                    <label>
                      <input type="checkbox" value="lsRememberMe" id="rememberMe"> Remember me
                    </label>
                  </div>
                  <div class="checkbox mb-3">
                    <a href="">Forgot Password?</a>
                  </div>
                </div>
                
                <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit" onclick="lsRememberMe()" >Login</button>
                
              </form>
              <div class="divider-msg">Or login with</div>
              <div class="app-buttons">
                  <button class="facebook facebook-l" style="margin-right: 10px;"><span class="fa-brands fa-facebook"></span><span>Facebook</span></button>
                  <button class="google google-l"><span><img src="assets/icons/google.png" alt="Google logo" width="20px"></span><span>Google</span></button>
              </div>
              <div style="margin-bottom: 30px;">Don't have an account?&nbsp;&nbsp;<a href="register.php">Register here</a></div>
              <!-- inside nung <a href=""></a>
              <button class="w-100 btn btn-lg btn-secondary" style="margin-top:5px;color:black" type="button"></button> -->
          </main>
        </div>

      </div>
    </div>

    <footer class="footer">
      <div class="footer-left">
        <div class="logo">
          <a href="index.php">     
            <img src="assets/logo/temp.png" alt="Website logo" style="margin: 0 0 15px -15px; padding-right: 0">
          </a>
          <div style="margin-top: 15px; text-align: left;">
            <a href="index.php">
            <span class="up">Community Health</span><br>
            <span>Center App</span>
            </a>
          </div>
        </div>          
      </div>
      <ul class="footer-right" style="text-align: left;">
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
    
    //remember me checkbox stores email
    const rmCheck = document.getElementById("rememberMe"),
    emailInput = document.getElementById("username");

    if (localStorage.checkbox && localStorage.checkbox !== "") {
      rmCheck.setAttribute("checked", "checked");
      emailInput.value = localStorage.username;
    } else {
      rmCheck.removeAttribute("checked");
      emailInput.value = "";
    }

    function lsRememberMe() {
      if (rmCheck.checked && emailInput.value !== "") {
        localStorage.username = emailInput.value;
        localStorage.checkbox = rmCheck.value;
      } else {
        localStorage.username = "";
        localStorage.checkbox = "";
      }
    } 
  </script>

  <script src="assets/custom/alert.js"></script>

</html>
