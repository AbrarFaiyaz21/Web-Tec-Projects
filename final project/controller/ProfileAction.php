<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Profile Action</title>
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

		$username = test($_POST['uName']);
		$id = $_SESSION['id'];
		$dbUsername = checkUsername($username);

		if (empty($username)) {
			echo "<h3>Please fill up the username</h3>";
		}
		else if($dbUsername) {
			echo "<h3>this username is unavailable</h3>";
		}
		else{
			updateProfile($id);
			$_SESSION['username'] = $username;
			echo "<h4>Profile updated successfully</h4>";
		}

	}
?>
</body>
</html>