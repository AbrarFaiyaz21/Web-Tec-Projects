<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Change Password Action</title>
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
			echo "<h2>Please fill up the form properly</h2>";
			echo '<a href = "../view/FchangePassword.php">Go Back</a>';
		}
		else{
			
			if($newPassword === $confirmPassword){

				$statement = changePassword($id);

		 		if ($statement) {
		 			$flag = true;
		 			echo "<h3>Password changed successfully</h3>";
		 			echo '<a href = "../view/login.php">log in</a>';
		 		}
			}
			else{
				echo "<h2>Password didn't match</h2>";
				echo '<a href = "../view/FchangePassword.php">Go Back</a>';

			}
		}
		if($flag === true){
			session_unset();
			session_destroy();
		}
	}
?>
</body>
</html>