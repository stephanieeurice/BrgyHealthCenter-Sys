<?php

// CHECK IF ACCOUNT EXIST (ADMIN, DOCTOR, PATIENT)
function userExists($conn, $auth, $email) {

	if ($auth == "Patient")
	{
		$sql = "SELECT * FROM patient WHERE email = ?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ../login.php?error=stmtfailed");
			exit();
		}

		mysqli_stmt_bind_param($stmt, "s", $email);
		mysqli_stmt_execute($stmt);

		$resultData = mysqli_stmt_get_result($stmt);

		if ($row = mysqli_fetch_assoc($resultData)){
			return $row;
		}
		else {
			$result = false;
			return $result;
		}

		mysqli_stmt_close($stmt);
	}	

	else if ($auth == "Doctor")
	{
		$sql = "SELECT * FROM doctor WHERE email = ?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ../login.php?error=stmtfailed");
			exit();
		}

		mysqli_stmt_bind_param($stmt, "s", $email);
		mysqli_stmt_execute($stmt);

		$resultData = mysqli_stmt_get_result($stmt);

		if ($row = mysqli_fetch_assoc($resultData)){
			return $row;
		}
		else {
			$result = false;
			return $result;
		}

		mysqli_stmt_close($stmt);
	}

	else if ($auth == "Admin")
	{
		$sql = "SELECT * FROM admin WHERE email = ?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: ../login.php?error=stmtfailed");
			exit();
		}

		mysqli_stmt_bind_param($stmt, "s", $email);
		mysqli_stmt_execute($stmt);

		$resultData = mysqli_stmt_get_result($stmt);

		if ($row = mysqli_fetch_assoc($resultData)){
			return $row;
		}
		else {
			$result = false;
			return $result;
		}

		mysqli_stmt_close($stmt);
	}

}

//LOGS IN THE USER (IF CORRECT PASSWORD) THEN PASSES THE USER DATA ON SESSION
function loginUser($conn, $email, $password, $auth) {
	$userExists = userExists($conn, $auth, $email);	

	if($userExists === false) {
		header("location: ../login.php?error=wronglogin");
		exit();
	}

	$pwdHashed = $userExists['password'];

	if ($password !== $pwdHashed) {
		header("location: ../login.php?error=wrongpassword");
		exit();
	}
	else if ($password === $pwdHashed) {

		if ($auth == "Patient")
		{
			session_start();
			$sql2 = mysqli_query($conn, "SELECT * FROM patient WHERE email = '{$email}' AND password = '{$password}'");
			$row2 = mysqli_fetch_assoc($sql2);
			$_SESSION["unique_id"] = $row2["unique_id"];
			
			$_SESSION["userem"] = $userExists["email"];
			$_SESSION["userid"] = $userExists["id"];
			$_SESSION["usernm"] = $userExists["name"];
			$_SESSION["userauth"] = $auth;
			header("location: ../patient_dashboard.php");
			exit();
		}

		else if ($auth == "Doctor")
		{
			session_start();
			$sql2 = mysqli_query($conn, "SELECT * FROM doctor WHERE email = '{$email}' AND password = '{$password}'");
			$row2 = mysqli_fetch_assoc($sql2);
			$_SESSION["unique_id"] = $row2["unique_id"];

			$_SESSION["userem"] = $userExists["email"];
			$_SESSION["userid"] = $userExists["id"];
			$_SESSION["usernm"] = $userExists["name"];
			$_SESSION["userauth"] = $auth;
			header("location: ../doctor_dashboard.php");
			exit();
		}
		else if ($auth == "Admin")
		{
			session_start();
			$sql2 = mysqli_query($conn, "SELECT * FROM admin WHERE email = '{$email}' AND password = '{$password}'");
			$_SESSION["userem"] = $userExists["email"];
			$_SESSION["userid"] = $userExists["id"];
			$_SESSION["usernm"] = $userExists["name"];
			$_SESSION["userauth"] = $auth;
			header("location: ../admin_dashboard.php");
			exit();
		}


	}
}

