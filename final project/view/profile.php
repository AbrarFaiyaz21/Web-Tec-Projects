<?php 
	session_start();
	if(!isset($_SESSION['id'])){
		header("LOCATION: ../view/login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile</title>
	<script src="js/profile.js"></script>
</head>
<body>
	<?php
		include "../view/include/header.php";  
	?>

	<br><br>

	<form name="form4" id="form4" action="../controller/ProfileAction.php" method="post" onsubmit="validation(this);return false" novalidate>
		<fieldset>
			<legend>Profile</legend>
			<label for="id">ID:</label>
			<input type="text" name="id" id="id" value="<?php echo $_SESSION['id'] ?>" readonly>

			<br><br>

			<label for="uName">User Name:</label>
			<input type="text" name="uName" id="uName" value="<?php echo $_SESSION['username'] ?>">
			<span id="err1"></span>

			<br><br>
			
			<button>Update</button>

	</fieldset>
	</form>

	<p id="msg"></p>

	<?php 
		echo "<br><br>";

		include "../view/include/footer.php";
	?>
</body>
</html>