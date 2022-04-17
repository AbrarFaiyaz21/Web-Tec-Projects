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
	<link rel="stylesheet" type="text/css" href="css/forgotten.css">
	<script src="js/fChangePassword.js"></script>
</head>
<body>
	<form  action="../controller/FchangePasswordAction.php" method="post" onsubmit="validation(this); return false;" novalidate>
		<fieldset>
			<h2>Change Password</h2>

			<label for="newPass">New Password*:</label>
			<input type="text" name="newPass" id="newPass">
			<span id="err1"></span>

			<br><br>

			<label for="confirmPass">Confirm Password*:</label>
			<input type="text" name="confirmPass" id="confirmPass">
			<span id="err2"></span>

			<br><br>

			<input type="submit">

			<br><br>

			<a href="../view/VerificationCode.php">Go Back</a>

	</fieldset>
	</form>

	<p id="msg"></p>
</body>
</html>