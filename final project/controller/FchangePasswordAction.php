<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Change Password Action</title>
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

		$id = $_SESSION['tmpId'];
		$newPassword = test($_POST['newPass']);
		$confirmPassword = test($_POST['confirmPass']);

		if (empty($newPassword) or empty($confirmPassword)) {
			echo "<h3>Please fill up the form properly</h3>";
			echo '<a href = "../view/FchangePassword.php">Go Back</a>';
		}
		else{
			
			if($newPassword === $confirmPassword){

				$statement = changePassword($id);

		 		if ($statement) {
		 			$flag = true;
		 			echo "<h4>Password changed successfully</h4>";
		 			echo '<a href = "../view/login.php">log in</a>';
		 		}
			}
			else{
				echo "<h3>Password didn't match</h3>";
				echo '<a href = "../view/FchangePassword.php">Go Back</a>';

			}
		}
	}
?>
</body>
</html>