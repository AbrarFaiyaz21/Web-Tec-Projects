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

	include "../model/userModel.php";

	$userid = $_SESSION['id'];
	$count = 0;
	$id_no = 0;
		if (isset($_GET['id'])) {		
			$item_id = $_GET['id'];
			$arr1 = checkFoodChart($userid);

			var_dump($arr1);

			deleteFoodChart($item_id);

			/*for ($i = 0; $i < count($arr1); $i++) {
				if ($item_id === $arr1[$i]['id']) {
					$id_no = $i;
					break;
				}
			}

			for ($i = 0; $i < count($arr1); $i++) {
				if ($id_no !== $i) {
					deleteFoodChart($arr1[$i]['Id']);
				}	
				
			}*/
			header("LOCATION: FoodChart.php");
		}
	?>
</body>
</html>