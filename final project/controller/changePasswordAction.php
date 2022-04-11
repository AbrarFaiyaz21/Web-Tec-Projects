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

		$id = $_SESSION['id'];
		$currentPassword = test($_POST['currentPass']);
		$newPassword = test($_POST['newPass']);
		$confirmPassword = test($_POST['confirmPass']);

		//var_dump($_SESSION['password']);

		if (empty($currentPassword) or empty($newPassword) or empty($confirmPassword)) {
			echo "<h2>Please fill up the form properly</h2>";
			echo '<a href = "../view/changePassword.php">Go Back</a>';
		}
		else{
			if($currentPassword === $_SESSION['password']){
				if($newPassword === $confirmPassword){
					$_SESSION['password'] = $newPassword;
					changePassword($id);
					echo "<h3>Password changed successfully</h3>";
					echo '<a href = "../view/welcomePage.php">Home Page</a>';
				}
				else{
					echo "Error: Password and confirm password didn't match";
					echo "<br><br>";
					echo '<a href = "../view/changePassword.php">Go Back</a>';
				}
					
			}
			else if ($currentPassword !== $_SESSION['password']) {
				echo "Error: Incorrect current password";
				echo "<br><br>";
				echo '<a href = "../view/changePassword.php">Go Back</a>';
			}
			/*else if($newPassword !== $confirmPassword) {
				echo "Error: Password and confirm password didn't match";
				echo "<br><br>";
				echo '<a href = "../view/changePassword.php">Go Back</a>';
			}*/
		}
	}
?>
</body>
</html>