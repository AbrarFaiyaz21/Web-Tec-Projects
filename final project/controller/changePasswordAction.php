<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Change Password Action</title>
	<link rel="stylesheet" type="text/css" href="../view/css/homepage.css">
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

		if (empty($currentPassword) or empty($newPassword) or empty($confirmPassword)) {
			echo "<h3>Please fill up the form properly</h3>";
		}
		else{
			if($currentPassword === $_SESSION['password']){
				if($newPassword === $confirmPassword){
					$_SESSION['password'] = $newPassword;
					changePassword($id);
					echo "<h4>Password changed successfully</h4>";
				}
				else{
					echo "<h3>Error: Password and confirm password didn't match</h3>";
				}
					
			}
			else if ($currentPassword !== $_SESSION['password']) {
				echo "<h3>Error: Incorrect current password</h3>";
			}
		}
	}
?>
</body>
</html>