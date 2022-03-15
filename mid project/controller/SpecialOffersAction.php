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
		$item_id = $foodName1 = $foodName2 = $foodName3 = $foodPrice = "";
		if (isset($_GET['id'])) {		
			$special_item_id = $_GET['id'];
			var_dump($item_id);

			$handle = fopen(FILENAME1, "r");
			$fr = fread($handle, filesize(FILENAME1));
			$arr1 = json_decode($fr);
			$fc = fclose($handle);

			if ($special_item_id === "s1") {
				$foodName1 = $arr1[0]->foodName;
				$foodPrice1 = $arr1[0]->foodPrice;
				$foodName2 = $arr1[6]->foodName;
				$foodPrice2 = $arr1[6]->foodPrice;
				$foodName3 = $arr1[9]->foodName;
				$foodPrice3 = $arr1[9]->foodPrice;

			}
			if ($special_item_id === "s2") {
				$foodName1 = $arr1[1]->foodName;
				$foodPrice1 = $arr1[1]->foodPrice;
				$foodName2 = $arr1[2]->foodName;
				$foodPrice2 = $arr1[2]->foodPrice;
				$foodName3 = $arr1[9]->foodName;
				$foodPrice3 = $arr1[9]->foodPrice;

			}
			if ($special_item_id === "s3") {
				$foodName1 = $arr1[5]->foodName;
				$foodPrice1 = $arr1[5]->foodPrice;
				$foodName2 = $arr1[6]->foodName;
				$foodPrice2 = $arr1[6]->foodPrice;
				$foodName3 = $arr1[8]->foodName;
				$foodPrice3 = $arr1[8]->foodPrice;

			}

			
			$handle = fopen(FILENAME2, "r");
			$arr2 = NULL;
			$size = filesize(FILENAME2);
			//var_dump($size);

			if($size > 0){
				$fr = fread($handle, $size);
				$arr2 = json_decode($fr);
				fclose($handle);
			}

			$handle = fopen(FILENAME2, "w");
			if($arr2 === NULL){
				$data = array('item_id' => $special_item_id, 'foodName' => $foodName1."+".$foodName2."+".$foodName3, 'foodPrice' => (int)(($foodPrice1)+($foodPrice2)+($foodPrice3)-(((($foodPrice1)+($foodPrice2)+($foodPrice3))*5)/100)));
				$data = array($data);
				$data = json_encode($data);
				$fw = fwrite($handle, $data);
				//var_dump($data);
				header("LOCATION: ../view/FoodChart.php");
			}
			else{
				$data = array('item_id' => $special_item_id, 'foodName' => $foodName1."+".$foodName2."+".$foodName3, 'foodPrice' => (int)(($foodPrice1)+($foodPrice2)+($foodPrice3)-(((($foodPrice1)+($foodPrice2)+($foodPrice3))*5)/100)));
				$arr2[] = $data;
				$data = json_encode($arr2);	
				//$data = explode('}', $data);	
				//var_dump($data);				
				$fw = fwrite($handle, $data);
				header("LOCATION: ../view/FoodChart.php");
			}
			fclose($handle);
		}

?>
</body>
</html>