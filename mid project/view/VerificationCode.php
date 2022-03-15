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
	<title>Verification Code</title>
</head>
<body>
	<form action="../controller/VerificationCodeAction.php" method="post" novalidate>
		<fieldset>
			<h2>Verification Code</h2>
			<label for="code">Code:</label>
			<input type="text" name="code" id="code">	

		<br><br>

			<button>Enter</button>

		<br><br>

			<a href="../view/ForgottenPassword.php">Go Back</a>
		</fieldset>
	</form>

</body>
</html>