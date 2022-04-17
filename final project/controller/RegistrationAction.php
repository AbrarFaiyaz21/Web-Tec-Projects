<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Action</title>
	<link rel="stylesheet" type="text/css" href="../view/css/homepage.css">
</head>
<body>
	<?php

		$firstnameErr = $lastnameErr  = $genderErr = $dobErr = $religionErr = $presentAddressErr = $emailErr = $personalWebsiteLinkErr = $usernameErr = $passErr = $confirmPassErr = $matchErr = "";
		

		$firstname = $lastname  = $gender = $dob = $religion = $presentAddress = $permanentAddress = $phone = $email = $personalWebsiteLink = $username = $pass = $confirmPass = $id = "";

		$isChecked = false;
		$isValid = true;
		$flag = false;

		include "../model/userModel.php";

		if ($_SERVER['REQUEST_METHOD'] === "POST") {
	 		function test($data){
	 			$data = trim($data);
	 			$data = stripslashes($data);
	 			$data = htmlspecialchars($data);

	 			return $data;
	 		}

		 	$firstname = test($_POST['fName']);
		 	$lastname  = test($_POST['lName']);

		 	if (isset($_POST['gender'])) {
		 		$gender  = test($_POST['gender']);
		 	}
		 	else
		 	{
		 		$gender  = NULL;
		 	}

		 	$dob = test($_POST['dob']);
		 	$phone = test($_POST['phone']);
		 	$email = test($_POST['email']);
		 	$username = test($_POST['uName']);
		 	$pass = test($_POST['pass']);
		 	$confirmPass = test($_POST['confirmPass']);

		 	$today = date("Y-m-d");
	  		$diff = date_diff(date_create($dob), date_create($today));
	  		$diff = (int)$diff->format('%y');

		 	$isChecked = true;

		 	if (empty($firstname)) {
		 		$isValid = false;
		 		echo "<h3>Error: Please enter your first name</h3>";
		 	}
		 	if (empty($lastname)) {
		 		$isValid = false;
		 		echo "<h3>Error: Please enter your last name</h3>";
		 	}
		 	if (empty($gender)) {
		 		$isValid = false;
		 		echo "<h3>Error: Please select a gender</h3>";
		 	}
		 	if (empty($dob)) {
		 		$isValid = false;
		 		echo "<h3>Error: Please insert your birth date</h3>";
		 	}
		 	else if ($diff<18) {
					$isValid = false;
					echo "<h3>Error: You need to be 18 years of age and older</h3>";
			}
		 	if(!empty($phone) and !preg_match('/^[0][1][0-9]{3}[0-9]{6}/i', $phone)) {
		 		$isValid = false;
	  			echo "<h3>Error: Invalid phone number</h3>";
			}
		 	if (empty($email)) {
		 		$isValid = false;
		 		echo "<h3>Error: Please enter your email address</h3>";
		 	}
		 	else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					$isValid = false;
	  				echo "<h3>Error: Please check your email again</h3>";
			}
			if (empty($username)) {
		 		$isValid = false;
		 		echo "<h3>Error: Please enter your user name</h3>";
		 	}
		 	if (empty($pass)) {
		 		$isValid = false;
		 		echo "<h3>Error: Please enter your password</h3>";
		 	}
		 	if (empty($confirmPass)) {
		 		$isValid = false;
		 		echo "<h3>Error: Please enter your password for confirmation</h3>";
		 	}
		 	else if($pass !== $confirmPass)
		 	{
		 		$isValid = false;
		 		echo "<h3>Error: Password are not matching</h3>";
		 	}

		}

	 if($isChecked and $isValid) {

	 	$status = registration();
		insertCode();

		if($status){
			header('location: ../view/login.php');			
		}else{
			header('location: ../view/registration.html');
			//echo "Something is wrong";
		}

		//echo "Record: " . $firstname . " " . $lastname . " " . " Inserted Sucessfully";
	}
			

	?>
	<a href="../view/registration.html">Go back </a>
	
</body>
</html>