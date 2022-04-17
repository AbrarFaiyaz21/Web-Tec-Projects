<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forgotten Password Action</title>
	<link rel="stylesheet" type="text/css" href="../view/css/forgotten.css">
</head>
<body>
<?php 
	
	include "../model/userModel.php";

	$flag = false;
	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		function test($data){
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$email = test($_POST['email']);

		if (empty($email)) {
			echo "<h3>Please fill up the form properly</h3>";
			echo '<a href = "../view/ForgottenPassword.php">Go Back</a>';
		}
		else{
			$statement = forgottenPassword($email);

			if($statement){
				header("LOCATION: ../view/VerificationCode.php");
			}
			else{
				echo "<h3>Error: There is no account of this email.</h3>";
					echo "<br><br>";
					echo '<a href = "../view/ForgottenPassword.php">Try again</a>';
				}

		}

	}

?>
</body>
</html>