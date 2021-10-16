<?php
  session_start();
  include 'includes/db.inc.php';

  $results = mysqli_query($conn, "SELECT * FROM doctor_reg");

  // When a Registration is Accepted (From doctor_reg table to doctor table then delete the one from the doctor_reg)
  if (isset($_GET['accept']))
    {
      $id = $_GET['accept'];

      $rec1 = mysqli_query($conn, "SELECT * FROM doctor_reg");
      $record1 = mysqli_fetch_array($rec1);

      $email = $record1['email'];
      $password = $record1['password'];
      $name = $record1['name'];
      $address = $record1['address'];
      $birthday = $record1['birthday'];
      $gender = $record1['gender'];
      $contactnum = $record1['contactnum'];
      $specialization = $record1['specialization'];


      $query = "INSERT INTO doctor (email, password, name, address, birthday, gender, contactnum, specialization) VALUES ('$email','$password', '$name','$address','$birthday','$gender', '$contactnum','$specialization')";
      mysqli_query($conn, $query);

      $remove =  "DELETE FROM doctor_reg WHERE id=$id";
      mysqli_query($conn, $remove);

      header('location: admin_registration.php?regsuccess');
      }

  // When declined, the data row will be deleted
  if (isset($_GET['decline']))
    {
      $id = $_GET['decline'];

      mysqli_query($conn, "DELETE FROM doctor_reg WHERE id=$id");
      header('location: admin_registration.php?delsuccess');
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
    <title>Manage Accounts</title>

    <style>

      li a
      { 
        font-size:18px;
      }

    </style>
  </head>
  <body>

    <?php
        if (isset($_GET["regsuccess"])) {
            echo "<div class='alert alert-success alert-dismissible'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
              Registration successfully accepted.
              </div>";
        }
        if (isset($_GET["delsuccess"])) {
            echo "<div class='alert alert-success alert-dismissible'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
              Registration successfully declined.
              </div>";
        }
    ?>
     
    <?php include 'header.php'?>

    <main>

          <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-light" style="width: 280px; ">
              <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item" style="margin-top:20px">
                    <a href="admin_dashboard.php" class="nav-link" style="color: black">
                        <img src="assets/icons/dashboard.png" height="20px">  Dashboard
                    </a>
                </li>
                <li class="nav-item" style="margin-top:10px">
                    <a href="#" class="nav-link " style="color: #308aba">
                        <img src="assets/icons/accounts.png" height="20px">  Manage Accounts
                    </a>
                </li>
              </ul>
          </div>

        <div class="b-example-divider" style="width: 25px"></div>

        <div class="container-fluid" style="padding-left:30px;margin-top: -15px">
        
          <div class="border-bottom">  
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center">  
              <h2 style="margin-top: 35px;margin-bottom: 15px">Registration</h2>
            </div>
            <p class="text-muted" style="margin-top:-12px">Manage pending doctors accounts</p>
          </div>

          <div class="table-responsive" style="margin-top:10px">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">Email</th>
                  <th scope="col">Name</th>
                  <th scope="col">Address</th>
                  <th scope="col">Birthday</th>
                  <th scope="col">Gender</th>
                  <th scope="col">Contact No.</th>
                  <th scope="col">Specialization</th>
                  <th scope="col" colspan="2">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($row = mysqli_fetch_array($results)) { ?>
                    <tr>
                      <td><?php echo $row['email']; ?></td>
                      <td><?php echo $row['name']; ?></td>
                      <td><?php echo $row['address']; ?></td>
                      <td><?php echo $row['birthday']; ?></td>
                      <td><?php echo $row['gender']; ?></td>
                      <td><?php echo $row['contactnum']; ?></td>
                      <td><?php echo $row['specialization']; ?></td>

                      <!-- After accepting or rejecting, the admin could email the doctor of the news of their account -->
                      <td><a onclick="location.href='mailto:<?php echo $row['email']; ?>?subject=Doctor Registration Confirmation&body=Hi <?php echo $row['name']; ?>! Your Account has been accepted. You may now access the Online Health Consultation Portal. Have a good day!';" href="admin_registration.php?accept=<?php echo $row['id']; ?>" target="_self">Accept</a></td>

                      <td><a onclick="location.href='mailto:<?php echo $row['email']; ?>?subject=Doctor Registration Confirmation&body=Hi <?php echo $row['name']; ?>! We regret to inform you that your Account has been declined. For any inquiries, you may contact this email! Have a good day.';" href="admin_registration.php?decline=<?php echo $row['id']; ?>" target="_self">Decline</a></td>

                    </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>

        </div>
    </main>

  </body>

  <script>

  </script>

  <script src="assets/js/bootstrap.bundle.min.js"></script>
  <script src="assets/custom/alert.js"></script>

</html>
