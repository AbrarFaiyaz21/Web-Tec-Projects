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
	$flag = false;

	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		function test($data){
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$newPassword = test($_POST['newPass']);
		$confirmPassword = test($_POST['confirmPass']);

		if (empty($newPassword) or empty($confirmPassword)) {
			echo "<h2>Please fill up the form properly</h2>";
			echo '<a href = "../view/FchangePassword.php">Go Back</a>';
		}
		else{
			define("FILENAME", "../model/users.json");
			$handle = fopen(FILENAME, "r");
			$size = filesize(FILENAME);

			if($size > 0){
				$fr = fread($handle, $size);
				$arr1 = json_decode($fr);

				for ($i=0; $i <count($arr1) ; $i++){
					if($_SESSION['tmpId'] === $arr1[$i]->id){
						if($newPassword === $confirmPassword){
							$arr1[$i]->password = $newPassword;
							$arr1[$i]->confirmPassword = $confirmPassword;
							echo "<h3>Password changed successfully</h3>";
							$flag = true;
							echo '<a href = "../view/login.php">log in</a>';
						}
						else{
							echo "<h2>Password didn't match</h2>";
							echo '<a href = "../view/FchangePassword.php">Go Back</a>';

						}
							
					}
				}
				if($flag === true){
					session_unset();
					session_destroy();
				}


			fclose($handle);

			$handle = fopen(FILENAME, "w");
				$arr1 = json_encode($arr1);
				$fw = fwrite($handle, $arr1);
			fclose($handle);
				}



		}
	}
?>
</body>
</html>