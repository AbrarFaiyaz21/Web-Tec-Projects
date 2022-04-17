<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registration Action</title>
	<link rel="stylesheet" type="text/css" href="../view/css/homepage.css">
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

			$userid = $_SESSION['id'];
			$address = test($_POST['address']);
			$poBox = test($_POST['poBox']);
			$phone = test($_POST['phone']);

			if (empty($address) or empty($poBox)) {
				$isValid = false;
				echo "<h3>Please fill up the form properly</h3>";
			}
			elseif(!empty($phone) and !preg_match('/^[0][1][0-9]{3}[0-9]{6}/i', $phone)) {
	 			$isValid = false;
  				echo "<h3>Error: Invalid phone number</h3>";
			}
			else {

				insertCustomerLocation($address, $poBox, $phone, $userid);

				echo "<h4>Order Done!</h4>";

			}

		}
	?>
	

</body>
</html>