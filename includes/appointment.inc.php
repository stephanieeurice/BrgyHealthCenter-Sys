
<!-- ADD APPOINTMENT TO DATABASE -->

<?php 
	
		$patient_id = "";
		$apt_date = "";
		$apt_time = "";
		$state_condition = "";

	include 'db.inc.php';

	if (isset($_POST['submit']))
	{	
		$patient_id = $_POST['patient_id'];
		$state_condition = $_POST['state_condition'];
		$apt_date = $_POST['apt_date'];
		$apt_time = $_POST['apt_time'];


		$apt_date = date('Y-m-d', strtotime($apt_date));
		$query = "INSERT INTO appointment (patient_id, state_condition, apt_date, apt_time) VALUES ('$patient_id','$state_condition', '$apt_date','$apt_time')";
		mysqli_query($conn, $query);
		header('location: ../patient_dashboard.php?success');
	}
