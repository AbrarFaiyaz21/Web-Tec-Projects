<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Action</title>
</head>
<body>

	<?php 
		if ($_SERVER['REQUEST_METHOD'] === "POST") {

			function test($data) {
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			$address = test($_POST['address']);
			$poBox = test($_POST['poBox']);
			$phone = test($_POST['phone']);

			if (empty($address) or empty($poBox)) {
				$isValid = false;
				echo "<h3>Please fill up the form properly</h3>";
				echo '<a href="../view/FoodChart.php">Food Chart</a>';
			}
			elseif(!empty($phone) and !preg_match('/^[0][1][0-9]{3}-[0-9]{6}/i', $phone)) {
	 			$isValid = false;
  				echo "<h3>Error: Invalid phone number</h3>";
				echo "<br><br>";
				echo '<a href="../view/FoodChart.php">Food Chart</a>';
			}
			else {
				define("FILENAME", "../model/CustomerLocation.json");
				$handle = fopen(FILENAME, "r");
				$arr1 = NULL;
				$size = filesize(FILENAME);
				if ($size > 0) {

					$fr = fread($handle, $size);
					$arr1 = json_decode($fr);
					$fc = fclose($handle);
				}

				
				

				$handle = fopen(FILENAME, "w");
				if ($arr1 === NULL) {
					$data = array('address' => $address, 'poBox' => $poBox, 'phone' => $phone);
					$data = array($data);
					$data = json_encode($data);
					$fw = fwrite($handle, $data);
				}
				else {
					$data = array('address' => $address, 'poBox' => $poBox, 'phone' => $phone);
					$arr1[] = $data;
					$data = json_encode($arr1);
					$fw = fwrite($handle, $data);
				}
				$fc = fclose($handle);

				if ($fw) {
					echo "<h3>Order Done!</h3>";
					echo '<a href="../view/WelcomePage.php">Home Page</a>';
				}

			}

		}
	?>
	

</body>
</html>