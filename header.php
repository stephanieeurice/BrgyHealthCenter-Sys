<?php
	include 'includes/db.inc.php';
?>


  <header class="p-3 border-bottom" style="display: flex; background-color: #23467a; padding: 10px 5%; color: #ffffff;">
    <div style="display: flex; flex: 1; cursor: pointer;font-size: 16px; margin: 0 20px 0 20px;">
      <a href="patient_dashboard.php">     
        <img src="assets/logo/temp.png" alt="Website logo" height="55" style="margin-bottom: 6px; padding-right: 0">
      </a>
      <div style="margin-top: 5px; text-align: left; font-size: 16px; font-weight: 500;">
        <span>Online Health</span><br>
        <span>Consultation Portal</span>
      </div> 
    </div>
    <div class="dropdown text-end" style="margin-top: 20px;">
      <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false" style="color: #fff">
        <!--img src="https://emoji.gg/assets/emoji/8229_KannaPog.png" alt="" width="32" height="32" class="rounded-circle me-2"-->
        <strong style="color: #fff"><?php echo $name = $_SESSION["usernm"]; ?></strong>
      </a>
      <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li  style="color:#23467a;"><a class="dropdown-item" href="login.php?logout">Sign out</a></li>
      </ul>
    </div>

 
  </header>

