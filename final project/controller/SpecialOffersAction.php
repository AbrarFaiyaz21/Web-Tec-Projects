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

	include "../model/userModel.php";

		$item_id = $foodName1 = $foodName2 = $foodName3 = $foodPrice = "";
		$userid = $_SESSION['id'];

		if (isset($_GET['id'])) {		
			$special_item_id = $_GET['id'];

			$arr1 = foodMenu();

			if ($special_item_id === "s1") {
				$foodName1 = $arr1[0]['food_name'];
				$foodPrice1 = $arr1[0]['food_price'];
				$foodName2 = $arr1[6]['food_name'];
				$foodPrice2 = $arr1[6]['food_price'];
				$foodName3 = $arr1[9]['food_name'];
				$foodPrice3 = $arr1[9]['food_price'];

			}
			if ($special_item_id === "s2") {
				$foodName1 = $arr1[1]['food_name'];
				$foodPrice1 = $arr1[1]['food_price'];
				$foodName2 = $arr1[2]['food_name'];
				$foodPrice2 = $arr1[2]['food_price'];
				$foodName3 = $arr1[9]['food_name'];
				$foodPrice3 = $arr1[9]['food_price'];

			}
			if ($special_item_id === "s3") {
				$foodName1 = $arr1[5]['food_name'];
				$foodPrice1 = $arr1[5]['food_price'];
				$foodName2 = $arr1[6]['food_name'];
				$foodPrice2 = $arr1[6]['food_price'];
				$foodName3 = $arr1[8]['food_name'];
				$foodPrice3 = $arr1[8]['food_price'];

			}

			$foodName = $foodName1."+".$foodName2."+".$foodName3;
			$foodPrice = (int)(($foodPrice1)+($foodPrice2)+($foodPrice3)-(((($foodPrice1)+($foodPrice2)+($foodPrice3))*5)/100));

			insertFoodChart($foodName, $foodPrice, $userid);

			header("LOCATION: ../view/FoodChart.php");
		}

?>
</body>
</html>