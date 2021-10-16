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
  </head>

  <body class="text-center" style="background-image: linear-gradient(145deg, #23467a , #36a7e3); background-size: 500px; background-repeat: no-repeat;">

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

          <div class="container rounded-3 " style="box-shadow: 0 7px 50px 0 rgba(0, 0, 0, 0.29)">
                  
                  <div class="row center-align">
                      
                      <div class="col-6 col-md-4 rounded-3" style="height: 500px">
                        <img src="assets/logo/temp.png" width="50%" style="margin:80px 30px 0px 0px">
                          <p class="py-4" style="margin-right:35px; text-align: center; color: white;line-height: 1.3; font-size: 15px">Brgy. Health Center App<br>Online Health Consultation Portal</p>
                      </div>

                      <div class="col-sm-6 col-md-8" >

                          <main class="form-signin" style="">

                              <!-- Form -->

                              <form action="includes/login.inc.php" method="post">
                                
                                <h2 class="h4 mb-3 fw-normal" style="margin-top: 40px">Log In</h2>

                                <div class="form-floating">
                                  <input type="text" class="form-control" id="email" name="email" placeholder="Email" required>
                                  <label for="email">Email</label>
                                </div>
                                <div class="form-floating">
                                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                                  <label for="password">Password</label>
                                </div>
                                <div>
                                  <select class="form-select" id="auth" name="auth">
                                    <option value="Patient" selected>Patient</option>
                                    <option value="Doctor">Doctor</option>
                                    <option value="Admin">Admin</option>
                                  </select>
                                </div>

                                <div class="checkbox mb-3" style="margin:20px">
                                  <label>
                                    <input type="checkbox" value="lsRememberMe" id="rememberMe"> Remember me
                                  </label>

                                </div>
                                <button class="w-100 btn btn-lg btn-primary" type="submit" name="submit" onclick="lsRememberMe()" >Sign in</button>
                                <a href="register.php" style="text-decoration: none;"><button class="w-100 btn btn-lg btn-secondary" style="margin-top:5px;color:black" type="button">Register</button></a>
                              </form>
                          </main>
                    </div>

                </div>
      </div>

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
