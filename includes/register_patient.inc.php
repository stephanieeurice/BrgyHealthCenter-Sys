
<!-- INSERTS DATA TO DOCTOR TABLE-->

<?php 
	
		$name = "";
		$birthday = "";
		$gender = "";
		$address = "";
		$email = "";
		$password = "";
		$contactnum = "";

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

		$birthday = date('Y-m-d', strtotime($birthday));
		$query = "INSERT INTO patient (email, password, name, address, birthday, gender, contactnum) VALUES ('$email','$password', '$name','$address','$birthday','$gender','$contactnum')";
		mysqli_query($conn, $query);
		header('location: ../login.php?register');
	}