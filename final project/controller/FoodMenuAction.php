<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Food Menu Action</title>
	<link rel="stylesheet" type="text/css" href="../view/css/homepage.css">
</head>
<body>
<?php 
	
	include "..//model/userModel.php";

		$item_id = $foodName = $foodPrice = "";
		$userid = $_SESSION['id'];

		$arr1 = NULL;
		if (isset($_GET['id'])) {		
			$item_id = $_GET['id'];
			$arr1 = foodMenu();

			for ($i = 0; $i < count($arr1); $i++) {
				if (+$item_id === $arr1[$i]['id']) {
					$foodName = $arr1[$i]['food_name'];
					$foodPrice = $arr1[$i]['food_price'];
				}
			}

			insertFoodChart($foodName, $foodPrice, $userid);
			header("LOCATION: ../view/FoodChart.php");

		}

?>
</body>
</html>