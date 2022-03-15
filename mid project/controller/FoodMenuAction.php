<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Food Menu Action</title>
</head>
<body>
<?php 
	define("FILENAME1", "../model/FoodMenuData.json");
	define("FILENAME2", "../model/FoodChartData.json");
		$item_id = $foodName = $foodPrice = "";
		if (isset($_GET['id'])) {		
			$item_id = $_GET['id'];
			$handle = fopen(FILENAME1, "r");
			$fr = fread($handle, filesize(FILENAME1));
			$arr1 = json_decode($fr);
			$fc = fclose($handle);

			for ($i = 0; $i < count($arr1); $i++) {
				if ($item_id === $arr1[$i]->item_id) {
					$foodName = $arr1[$i]->foodName;
					$foodPrice = $arr1[$i]->foodPrice;
				}
			}

			$handle = fopen(FILENAME2, "r");
			$arr2 = NULL;
			$size = filesize(FILENAME2);
			var_dump($size);

			if($size > 0){
				$fr = fread($handle, $size);
				$arr2 = json_decode($fr);
				fclose($handle);
			}

			$handle = fopen(FILENAME2, "w");
			if($arr2 === NULL){
				$data = array('item_id' => $item_id, 'foodName' => $foodName, 'foodPrice' => $foodPrice);
				$data = array($data);
				$data = json_encode($data);
				$fw = fwrite($handle, $data);
				//var_dump($data);
				header("LOCATION: ../view/FoodChart.php");
			}
			else{
				$data = array('item_id' => $item_id, 'foodName' => $foodName, 'foodPrice' => $foodPrice);
				$arr2[] = $data;
				$data = json_encode($arr2);						
				$fw = fwrite($handle, $data);
				//var_dump($data);
				header("LOCATION: ../view/FoodChart.php");
			}
			fclose($handle);
		}

?>
</body>
</html>