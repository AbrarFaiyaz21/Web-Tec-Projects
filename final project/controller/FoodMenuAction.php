<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Food Menu Action</title>
</head>
<body>
<?php 
	
	include "..//model/userModel.php";

		$item_id = $foodName = $foodPrice = "";
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

			//var_dump($foodName);
			//var_dump($foodPrice);

			insertFoodChart($foodName, $foodPrice);
			header("LOCATION: ../view/FoodChart.php");

		}

?>
</body>
</html>