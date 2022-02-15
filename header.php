<?php
	include 'includes/db.inc.php';
?>


  <header class="" style="display: flex; background-color: #23467a; padding: 10px 25px; color: #ffffff;">
    <div style="display: flex; flex: 1; cursor: pointer;font-size: 16px; margin: 0 20px 0 0;">
      <img src="assets/logo/temp.png" alt="Website logo" height="55" style="margin-bottom: 6px; padding-right: 0">
      <div class="app-name">
        <span>Online Health</span><br>
        <span>Consultation Portal</span>
      </div> 
    </div>
    <div class="dropdown text-end" style="margin-top: 20px;">
      <input type="checkbox" id="dont-logout">
      <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false" style="color: #ffffff" >
        <strong style="color: #fff"><?php echo $name = $_SESSION["usernm"]; ?></strong>
      </a>
      <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1" style="">
        <!-- <li><input type="checkbox" id="click-logout"></li> -->
        <li><a href="login.php?logout" class="dropdown-item" for="click-logout">Logout</a></li>
      </ul>
    </div>
    <!-- <div class="logout-dialog" style="color: #000;">
      <h5>Logout</h5> 
      <hr style="width:100%; height: color: #ffffff;">
      <div class="logout-details">
        Are you sure you want to logout?
      </div>
      <div class='logout-btns'>
        <a href="" for="click-logout" id="lu-no">No</a>
        <a href="login.php?logout" id="lu-yes">Yes</a>
      </div>
    </div> -->

 
  </header>

