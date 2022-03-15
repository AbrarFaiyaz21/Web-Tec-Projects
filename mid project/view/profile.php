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
</head>
<body>
	<?php
		include "../view/include/header.php";  
	?>

	<form name="form4" id="form4" action="../controller/ProfileAction.php" method="post" novalidate>
		<fieldset>
			<legend>Profile</legend>
			<label for="id">ID:</label>
			<input type="text" name="id" id="id" value="<?php echo $_SESSION['id'] ?>" readonly>

			<br><br>

			<label for="uName">User Name:</label>
			<input type="text" name="uName" id="uName">

			<br><br>
			
			<button>Update</button>

	</fieldset>
	</form>

	<?php 
		echo "<br><br>";

		include "../view/include/footer.php";
	?>
</body>
</html>