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
	<title>E-RESTAURANT</title>
	<link rel="stylesheet" type="text/css" href="css/homepage.css">
</head>
<body>
<?php 
	include "../view/include/header.php"; 

	echo "<br><br>";

	include "../view/include/footer.php";
?>
</body>
</html>