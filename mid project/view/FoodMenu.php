<?php 
	session_start();
	if(!isset($_SESSION['id'])){
		header("LOCATION: ../view/login.php");
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Food Menu</title>
</head>
<body>

	<?php
		include "../view/include/header.php";  
	?>
	<h1>Food Menu</h1>
 
<?php 

	define("FILENAME", "../model/FoodMenuData.json");
			$handle = fopen(FILENAME, "r");
			$arr1 = NULL;
			$size = filesize(FILENAME);
			if ($size > 0) {
				$fr = fread($handle, $size);
				$arr1 = json_decode($fr);
				$fc = fclose($handle);
			}


	if ($arr1 === NULL) {
			echo "No record(s) found";
		}
		else {
			echo "<table border='1'>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>Food Photo</th>";
			echo "<th>Food Name</th>";
			echo "<th>Food Price(Taka)</th>";
			echo "<th>Action(s)</th>";
			echo "</tr>";
			echo "</thead>";
			echo "<tbody>";

				echo "<tr>";
				echo "<td>" . '<img src="images/SpicyRamen.jpeg" width="80" height="75">' . "</td>";
				echo "<td style='text-align:center'>" . $arr1[0]->foodName . "</td>";
				echo "<td style='text-align:center'>" . $arr1[0]->foodPrice . "</td>";
				echo "<td>" . "<a href='../controller/FoodMenuAction.php?id=" . $arr1[0]->item_id . "'>Add to Chart</a>" . "</td>";
				echo "</tr>";

				////////////////////////////////////////

				echo "<tr>";
				echo "<td>" . '<img src="images/NagaBlastBurger.png" width="80" height="75">' . "</td>";
				echo "<td style='text-align:center'>" . $arr1[1]->foodName . "</td>";
				echo "<td style='text-align:center'>" . $arr1[1]->foodPrice . "</td>";
				echo "<td>" . "<a href='../controller/FoodMenuAction.php?id=" . $arr1[1]->item_id . "'>Add to Chart</a>" . "</td>";
				echo "</tr>";

				////////////////////////////////////////

				echo "<tr>";
				echo "<td>" . '<img src="images/CreamyCheesePasta.jpg" width="80" height="75">' . "</td>";
				echo "<td style='text-align:center'>" . $arr1[2]->foodName . "</td>";
				echo "<td style='text-align:center'>" . $arr1[2]->foodPrice . "</td>";
				echo "<td>" . "<a href='../controller/FoodMenuAction.php?id=" . $arr1[2]->item_id . "'>Add to Chart</a>" . "</td>";
				echo "</tr>";

				////////////////////////////////////////

				echo "<tr>";
				echo "<td>" . '<img src="images/FuchkaPlatter.jpeg" width="80" height="75">' . "</td>";
				echo "<td style='text-align:center'>" . $arr1[3]->foodName . "</td>";
				echo "<td style='text-align:center'>" . $arr1[3]->foodPrice . "</td>";
				echo "<td>" . "<a href='../controller/FoodMenuAction.php?id=" . $arr1[3]->item_id . "'>Add to Chart</a>" . "</td>";
				echo "</tr>";

				////////////////////////////////////////

				echo "<tr>";
				echo "<td>" . '<img src="images/ChickenTikka.jpg" width="80" height="75">' . "</td>";
				echo "<td style='text-align:center'>" . $arr1[4]->foodName . "</td>";
				echo "<td style='text-align:center'>" . $arr1[4]->foodPrice . "</td>";
				echo "<td>" . "<a href='../controller/FoodMenuAction.php?id=" . $arr1[4]->item_id . "'>Add to Chart</a>" . "</td>";
				echo "</tr>";

				////////////////////////////////////////

				echo "<tr>";
				echo "<td>" . '<img src="images/SeaFoodSoup.jpg" width="80" height="75">' . "</td>";
				echo "<td style='text-align:center'>" . $arr1[5]->foodName . "</td>";
				echo "<td style='text-align:center'>" . $arr1[5]->foodPrice . "</td>";
				echo "<td>" . "<a href='../controller/FoodMenuAction.php?id=" . $arr1[5]->item_id . "'>Add to Chart</a>" . "</td>";
				echo "</tr>";

				////////////////////////////////////////

				echo "<tr>";
				echo "<td>" . '<img src="images/momos.jpg" width="80" height="75">' . "</td>";
				echo "<td style='text-align:center'>" . $arr1[6]->foodName . "</td>";
				echo "<td style='text-align:center'>" . $arr1[6]->foodPrice . "</td>";
				echo "<td>" . "<a href='../controller/FoodMenuAction.php?id=" . $arr1[6]->item_id . "'>Add to Chart</a>" . "</td>";
				echo "</tr>";

				////////////////////////////////////////

				echo "<tr>";
				echo "<td>" . '<img src="images/Shorma.jpg" width="80" height="75">' . "</td>";
				echo "<td style='text-align:center'>" . $arr1[7]->foodName . "</td>";
				echo "<td style='text-align:center'>" . $arr1[7]->foodPrice . "</td>";
				echo "<td>" . "<a href='../controller/FoodMenuAction.php?id=" . $arr1[7]->item_id . "'>Add to Chart</a>" . "</td>";
				echo "</tr>";

				////////////////////////////////////////

				echo "<tr>";
				echo "<td>" . '<img src="images/ChikenChap.jpg" width="80" height="75">' . "</td>";
				echo "<td style='text-align:center'>" . $arr1[8]->foodName . "</td>";
				echo "<td style='text-align:center'>" . $arr1[8]->foodPrice . "</td>";
				echo "<td>" . "<a href='../controller/FoodMenuAction.php?id=" . $arr1[8]->item_id . "'>Add to Chart</a>" . "</td>";
				echo "</tr>";

				////////////////////////////////////////

				echo "<tr>";
				echo "<td>" . '<img src="images/Drinks.jpg" width="80" height="75">' . "</td>";
				echo "<td style='text-align:center'>" . $arr1[9]->foodName . "</td>";
				echo "<td style='text-align:center'>" . $arr1[9]->foodPrice . "</td>";
				echo "<td>" . "<a href='../controller/FoodMenuAction.php?id=" . $arr1[9]->item_id . "'>Add to Chart</a>" . "</td>";
				echo "</tr>";

				////////////////////////////////////////

				echo "</tbody>";
				echo "</table>";
		}

?>
	<?php 
		echo "<br><br>";

		include "../view/include/footer.php";
	?>
</body>
</html>