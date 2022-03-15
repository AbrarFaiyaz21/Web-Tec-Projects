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
	$flag = false;

	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		function test($data){
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$userName = test($_POST['uName']);

		if (empty($userName)) {
			echo "<h2>Please fill up the username</h2>";
			echo '<a href = "../view/profile.php">Go Back</a>';
		}
		else{
			define("FILENAME", "../model/users.json");
			$handle = fopen(FILENAME, "r");
			$size = filesize(FILENAME);

			if($size > 0){
				$fr = fread($handle, $size);
				$arr1 = json_decode($fr);

				for ($i=0; $i <count($arr1) ; $i++){
					if($_SESSION['id'] === $arr1[$i]->id){
							$arr1[$i]->userName = $userName;
							echo "<h3>Profile updated successfully</h3>";
							echo '<a href = "../view/welcomePage.php">Home Page</a>';
					}
				}
			}
			fclose($handle);

			$handle = fopen(FILENAME, "w");
				$arr1 = json_encode($arr1);
				$fw = fwrite($handle, $arr1);
			fclose($handle);



		}
	}
?>
</body>
</html>