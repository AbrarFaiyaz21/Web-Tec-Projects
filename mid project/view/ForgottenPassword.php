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
	<title>Forgottent Password</title>
</head>
<body>
	<form name = "form5" id="form5" action="../controller/ForgottenPasswordAction.php" method = "post" novalidate>
		<fieldset>
			<h2>Forgotten Password</h2>
			<label for="email">Email:</label>
			<input type="email" name="email" id="email" placeholder="Enter your email address">

			<br><br>

			<button>Continue</button>

			<br><br>

			<a href="../view/login.php">Go Back</a>
		</fieldset>
	</form>
		
		
	

	<br><br>
</body>
</html>