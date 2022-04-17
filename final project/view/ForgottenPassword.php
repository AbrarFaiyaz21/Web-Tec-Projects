<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forgottent Password</title>
	<link rel="stylesheet" type="text/css" href="css/forgotten.css">
	<script src="js/forgottenPassword.js"></script>
</head>
<body>
	<form name = "form5" id="form5" action="../controller/ForgottenPasswordAction.php" method = "post" onsubmit="return validation(this)" novalidate>
		<fieldset>
			<h2>Forgotten Password</h2>
			<label for="email">Email:</label>
			<input type="email" name="email" id="email" placeholder="Enter your email address">
			<span id="err1"></span>
            <br><br>

			<button>Continue</button>

			<br><br>

			<a href="../view/login.php">Go Back</a>
		</fieldset>
	</form>
<p id="msg"></p>
</body>
</html>