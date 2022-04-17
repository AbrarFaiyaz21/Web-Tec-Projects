<?php 
	session_start();
	if(!isset($_SESSION['id'])){
		header("LOCATION: login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Change Password</title>
	<script src="js/changePassword.js"></script>
</head>
<body>
	<?php
		include "../view/include/header.php"; 
	?>

	<br><br>

	<form name="form3" id="form3" action="../controller/changePasswordAction.php" method="post" onsubmit="validation(this);return false;" novalidate>
		<fieldset>
			<legend>Change Password</legend>
			<label for="currentPass">Current Password*:</label>
			<input type="text" name="currentPass" id="currentPass">
			<span id="err1"></span>

			<br><br>

			<label for="newPass">New Password*:</label>
			<input type="text" name="newPass" id="newPass">
			<span id="err2"></span>

			<br><br>

			<label for="confirmPass">Confirm Password*:</label>
			<input type="text" name="confirmPass" id="confirmPass">
			<span id="err3"></span>

			<br><br>

			<input type="submit">

	</fieldset>
	</form>

	<p id="msg"></p>

	<?php 
		echo "<br><br>";

		include "../view/include/footer.php";
	?>
</body>
</html>