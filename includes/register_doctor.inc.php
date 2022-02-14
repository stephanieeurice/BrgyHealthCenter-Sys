
<!-- INSERTS DATA TO DOCTOR_REG TABLE-->

<?php 
	
		$name = "";
		$birthday = "";
		$gender = "";
		$address = "";
		$email = "";
		$password = "";
		$contactnum = "";
		$specialization = "";

	include 'db.inc.php';

	if (isset($_POST['submit']))
	{	
		$name = $_POST['name'];
		$birthday = $_POST['birthday'];
		$gender = $_POST['gender'];
		$address = $_POST['address'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$contactnum = $_POST['contactnum'];
		$specialization = $_POST['specialization'];

		$status = "Active now";
        $random_id = rand(time(), 10000000);
		$birthday = date('Y-m-d', strtotime($birthday));
		$query = "INSERT INTO doctor_reg (email, password, name, address, birthday, gender, contactnum, specialization, unique_id, status) VALUES ('$email','$password', '$name','$address','$birthday','$gender','$contactnum', '$specialization','$random_id','$status')";
		mysqli_query($conn, $query);
		header('location: ../login.php?register_doctor');
	}