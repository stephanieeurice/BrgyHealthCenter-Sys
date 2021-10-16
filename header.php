<?php
	include 'includes/db.inc.php';
?>

     <header class="p-3 border-bottom">
          <div class="container">
              <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <a href="#" class="d-flex align-items-center mb-2 mb-lg-0 text-dark text-decoration-none">
                  <img src="assets/logo/temp.png" height="40">
                </a>

                <h5 class="nav col-lg-auto me-lg-auto mb-2  mb-md-0 py-2">Online Health Consultation Portal</h5>

                <div class="dropdown text-end">
                  <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                    <!--img src="https://emoji.gg/assets/emoji/8229_KannaPog.png" alt="" width="32" height="32" class="rounded-circle me-2"-->
                    <strong style="color: #252626"><?php echo $name = $_SESSION["usernm"]; ?></strong>
                  </a>
                  <ul class="dropdown-menu text-small" aria-labelledby="dropdownUser1">
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="login.php?logout">Sign out</a></li>
                  </ul>
                </div>

                <!--div class="dropdown">
                <a href="#" class="d-flex align-items-center link-light text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="https://emoji.gg/assets/emoji/8229_KannaPog.png" alt="" width="32" height="32" class="rounded-circle me-2">
                  <strong style="color: white">Zyrah Avila</strong>
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                  <li><a class="dropdown-item" href="tenant_profile.html">Profile</a></li>
                  <li><a class="dropdown-item" href="tenant_settings.html">Settings</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="tenant_login.html">Sign out</a></li>
                </ul>
              </div-->



              </div>
          </div>
      </header>

