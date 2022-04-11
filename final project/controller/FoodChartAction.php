<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Action</title>
</head>
<body>

	<?php 

		include "../model/userModel.php";

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

				insertCustomerLocation($address, $poBox, $phone);

				echo "<h3>Order Done!</h3>";
				echo '<a href="../view/WelcomePage.php">Home Page</a>';

			}

		}
	?>
	

</body>
</html>