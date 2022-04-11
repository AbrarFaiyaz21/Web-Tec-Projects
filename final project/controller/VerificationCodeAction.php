<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Verification Code Action</title>
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

		$code = test($_POST['code']);
		

		if (empty($code)) {
			echo "<h2>Please fill up the form properly</h2>";
			echo '<a href = "../view/VerificationCode.php">Go Back</a>';
		}
		else{
			$statement = verification($_SESSION['tmpEmail'],+$code);

			if ($statement) {
				header('Location: ../view/FchangePassword.php');
			}
			else{
				echo "<h3>worng code</h2>";
				echo '<a href = "../view/VerificationCode.php">Go Back</a>';
			}


		}
	}
	

?>
</body>
</html>