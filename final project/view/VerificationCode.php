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
	<link rel="stylesheet" type="text/css" href="css/forgotten.css">
	<script src="js/verificationPage.js"></script>
</head>
<body>
	<form action="../controller/VerificationCodeAction.php" method="post" onsubmit="return validation(this)" novalidate>
		<fieldset>
			<h2>Verification Code</h2>
			<label for="code">Code:</label>
			<input type="text" name="code" id="code">	
			<span id="err1"></span>

		<br><br>

			<button>Enter</button>

		<br><br>

			<a href="../view/ForgottenPassword.php">Go Back</a>
		</fieldset>
	</form>

	<p id="msg"></p>

</body>
</html>