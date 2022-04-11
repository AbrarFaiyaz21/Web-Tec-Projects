<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile Action</title>
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

		$username = test($_POST['uName']);
		$id = $_SESSION['id'];

		if (empty($username)) {
			echo "<h2>Please fill up the username</h2>";
			echo '<a href = "../view/profile.php">Go Back</a>';
		}
		else{
			updateProfile($id);
			$_SESSION['username'] = $username;
			echo "<h3>Profile updated successfully</h3>";
			echo '<a href = "../view/welcomePage.php">Home Page</a>';
		}

	}
?>
</body>
</html>