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
</head>
<body>
	<?php
		include "../view/include/header.php"; 
	?>

	<br><br>

	<form name="form3" id="form3" action="../controller/changePasswordAction.php" method="post" novalidate>
		<fieldset>
			<legend>Change Password</legend>
			<label for="currentPass">Current Password*:</label>
			<input type="text" name="currentPass" id="currentPass">

			<br><br>

			<label for="newPass">New Password*:</label>
			<input type="text" name="newPass" id="newPass">

			<br><br>

			<label for="confirmPass">Confirm Password*:</label>
			<input type="text" name="confirmPass" id="confirmPass">

			<br><br>

			<input type="submit">

	</fieldset>
	</form>

	<?php 
		echo "<br><br>";

		include "../view/include/footer.php";
	?>
</body>
</html>