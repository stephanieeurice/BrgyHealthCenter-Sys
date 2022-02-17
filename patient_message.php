<?php
  //starts session 
  session_start();
	include 'includes/db.inc.php';

  //get SESSION userid from LOGGING IN
  $id = $_SESSION["userid"];

  if(!isset($_SESSION['unique_id'])) {
    header("location: login.php");
  }
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
    <link href="assets/custom/message.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   

    <title>Messages</title>

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
            <li class="nav_item" style="padding: 0 20px">
            <a href="patient_dashboard.php" class="nav-link" style="color: #ffffff;">
            <i class="fa fa-th-large"></i> Dashboard
            </a>
          </li>
          <li class="nav_item">
              <a href="patient_appointment.php" class="nav-link " style="color: #ffffff;">
              <i class="fa fa-plus-circle"></i> Set Appointment
              </a>
          </li>
          <li class="nav_item active">
              <a href="patient_messages.php" class="nav-link " style="color: #23467a; font-weight: 500;">
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
              <h2 style="margin-top: 35px;margin-bottom: 15px; color: #23467a;">Messages</h2>
            </div>
            <p class="text-muted" style="margin-top:-12px">Have a conversation with your doctor.</p>
          </div>

          <div class="d-flex justify-content-center h-100">
            <section class="users">
                <header>
                    <?php
                        $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);
                        $sql2 = mysqli_query($conn , "SELECT * FROM doctor WHERE unique_id = {$user_id}");
                        if (mysqli_num_rows($sql2) > 0) {
                            $row2 = mysqli_fetch_assoc($sql2);
                        }
                    ?>
                    <a href="patient_messages.php"><i class="fa fa-arrow-left"></i></a>
                    <img class="-1" id="avatar" src="assets/images/avatar_female.png" alt="User Avatar" height="55" width="55">
                    <div class="details">
                        <span><?php echo $row2['name'] ?></span>
                        <p><?php echo $row2['status'] ?></p>
                    </div>
                </header>
            </section>
            <section class="chat-area" style="background: #f7f7f7;">
              <header style="display: flex; justify-content: space-between; align-items: flex-end; padding: 25px 10px;">
                <div style="display: flex;">
                  <img class="-1" id="avatar" src="assets/images/avatar_female.png" alt="User Avatar" height="55" width="55">
                  <div class="details">
                    <span><?php echo $row2['name'] ?></span>
                    <p><?php echo $row2['status'] ?></p>
                  </div>
                </div>
                <!-- <div style="align-self: center; margin-bottom: 5px;">
                  <input type="checkbox" id="click">
                  <label for="click" id="zoom-btn"><i class="fa fa-video-camera"></i></label>
                </div> -->
              </header>
              <div class="chat-box">
                
              </div>
              <form action="#" class="typing-area">
                <input type="text" name="outgoing_id" value="<?php echo $_SESSION['unique_id']; ?>" hidden>
                <input type="text" name="incoming_id" value="<?php echo $user_id; ?>" hidden>
                <input type="text" name="message" placeholder="Enter message...">
                <button style="background: #23467a; color: #ffffff;"><i class="fa fa-paper-plane"></i></button>
              </form>
            </section>
          </div>
        
        </div>
    </main>

  </body>

  <script>

  </script>

  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/custom/alert.js"></script>
  <script src="assets/custom/chat_patients.js"></script>

</html>
