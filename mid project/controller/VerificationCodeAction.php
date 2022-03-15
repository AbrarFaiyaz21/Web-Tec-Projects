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
			define("FILENAME", "../model/EmailVerification.json");
			$handle = fopen(FILENAME, "r");
			$size = filesize(FILENAME);
			$arr1 = NULL;

			if($size > 0){
				$fr = fread($handle, $size);
				$arr1 = json_decode($fr);

				for ($i=0; $i <count($arr1) ; $i++) { 
					if(+$code === $arr1[$i]->verificationCode and $_SESSION['tmpEmail'] === $arr1[$i]->email ){
						$flag = true;
						header('Location: ../view/FchangePassword.php');
					}
				}

				if ($flag === false) {
						echo "<h3>worng code</h2>";
						echo '<a href = "../view/VerificationCode.php">Go Back</a>';
				}
				fclose($handle);



			}
		}
	}
	

?>
</body>
</html>