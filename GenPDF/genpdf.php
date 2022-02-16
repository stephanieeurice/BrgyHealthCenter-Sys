<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Patient's Prescription </title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">




</head>
	<body>


		<div class="container mt=5">

				<form action="createpdf.php" method ="post" class="offset-md-1">
					<h1>Prescription </h1>
					<p>Fill out the details below for the patient's prescription. </p>

					<div class="row mb-2">
							<div class="col-lg-6">
								<input type="text" name="fname" placeholder="First Name" class="form-control" required>
							</div>
							
							<div class="col-lg-6">
								<input type="text" name="lname" placeholder="Last Name" class="form-control" require>
							</div>
					</div>

					<div class="row mb-2">
							<div class="col-lg-6">
								<input type="text" name="email" placeholder="Email" class="form-control" require>
							</div>
							
							<div class="col-lg-6">
								<input type="tel" name="number" placeholder="Contact Number" class="form-control" require>
							</div>
					</div>



					<div class="mb-2">
						<textarea name="message" rows="10" placeholder="Medical Prescription" class="form-control" require></textarea>
					</div>

					<div class="mb-2">
						<button type="submit" class="btn btn-success btn-lg btn-block"> Generate PDF </button>
					</div>


				<form>



	</body>	
</html>