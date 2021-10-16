
<!-- LOGIN -->

<?php

if (isset($_POST["submit"])) {

	$email = $_POST["email"];
	$password = $_POST["password"];
	$auth = $_POST["auth"];

	require_once 'db.inc.php';
	require_once 'functions.inc.php';	

	loginUser($conn, $email, $password, $auth);
}

else {
	header("location: ../login.php");
	exit();
}