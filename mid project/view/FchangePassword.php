<?php 
	session_start();
	if($_SESSION['tmpId'] === NULL){
		header("LOCATION: ../view/ForgottenPassword.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Change Password</title>
</head>
<body>
	<form  action="../controller/FchangePasswordAction.php" method="post" novalidate>
		<fieldset>
			<legend>Change Password</legend>

			<label for="newPass">New Password*:</label>
			<input type="text" name="newPass" id="newPass">

			<br><br>

			<label for="confirmPass">Confirm Password*:</label>
			<input type="text" name="confirmPass" id="confirmPass">

			<br><br>

			<input type="submit">

			<br><br>

			<a href="../view/VerificationCode.php">Go Back</a>

	</fieldset>
	</form>