<?php 
	session_start();
	if(!isset($_SESSION['id'])){
		header("LOCATION: login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Delete Action</title>
</head>
<body>

	<h1>Delete Action</h1>

	<?php 
	$count = 0;
	$id_no = 0;
		define("FILENAME", "../model/FoodChartData.json");
		if (isset($_GET['id'])) {		
			$item_id = $_GET['id'];
			$handle = fopen(FILENAME, "r");
			$fr = fread($handle, filesize(FILENAME));
			$arr1 = json_decode($fr);
			$fc = fclose($handle);

			$handle = fopen(FILENAME, "w");
			$arr2 = array();
			for ($i = 0; $i < count($arr1); $i++) {
				if ($item_id === $arr1[$i]->item_id) {
					$id_no = $i;
					break;
				}
			}

			for ($i = 0; $i < count($arr1); $i++) {
				if ($id_no !== $i) {
					array_push($arr2, $arr1[$i]);
				}	
				
			}

			$data = json_encode($arr2);
			$fw = fwrite($handle, $data);
			$fc = fclose($handle);

			if ($fw) {
				header("LOCATION: FoodChart.php");
			}
		}
		else {
			die("Invalid Request");
		}
	?>

	

</body>
</html>