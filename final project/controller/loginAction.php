<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Action</title>
	<link rel="stylesheet" type="text/css" href="../view/css/homepage.css">
</head>
<body>
<?php
	$flag = false;

    include "../model/userModel.php";

	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		function test($data){
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$username = test($_POST['uName']);
		$pass = test($_POST['pass']);

		if(!empty($_POST["rememberMe"])) {
			setcookie ("uName",$username,time()+ (60 * 10), "/"); //10mins
			setcookie ("pass",$pass,time()+ (60 * 10), "/");
		} else {
			setcookie("uName","");
			setcookie("pass","");
		}

		if (empty($username) or empty($pass)) {
			echo "<h3>Please fill up the form properly</h3>";
			echo '<a href = "../view/login.php">Go Back</a>';
		}
		else{

			$status = login($username, $pass);


			if ($status) {
						header('Location: ../view/WelcomePage.php');
				}
			else {
					echo "<h3>invalid user name or password</h3>";
					echo '<a href="../view/login.php">login</a> '.' | '.' <a href="../view/registration.html">Create account</a>';
				}

		}
	}

?>


</body>
</html>