<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Forgotten Password Action</title>
</head>
<body>
<?php 
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
			echo "<h2>Please fill up the form properly</h2>";
			echo '<a href = "../view/ForgottenPassword.php">Go Back</a>';
		}
		else{
			define("FILENAME", "../model/users.json");
			$handle = fopen(FILENAME, "r");
			$size = filesize(FILENAME);
			$arr1 = NULL;

			if($size > 0){
				$fr = fread($handle, $size);
				$arr1 = json_decode($fr);

				for ($i=0; $i <count($arr1) ; $i++) { 
					if($email === $arr1[$i]->email){
						$_SESSION['tmpEmail'] = $arr1[$i]->email;
						$_SESSION['tmpPassword'] = $arr1[$i]->password;
						$_SESSION['tmpId'] = $arr1[$i]->id;
						$flag = true;
						header("LOCATION: ../view/VerificationCode.php");
					}
				}
			}

			if ($flag === false) {
					echo "Error: There is no account of this email.";
					echo "<br><br>";
					echo '<a href = "../view/ForgottenPassword.php">Try again</a>';
				}
			fclose($handle);

		}

	}

?>
</body>
</html>