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
	<h2>Special Offers</h2>
 
<?php 

	include "../model/userModel.php";

	$arr1 = foodMenu();


	if ($arr1 === NULL) {
			echo "No record(s) found";
		}
		else {
			echo "<table border='1' class = 'form1'>";
			echo "<thead>";
			echo "<tr>";
			echo "<th>Food Photo</th>";
			echo "<th>Food Name</th>";
			echo "<th>Discount</th>";
			echo "<th>Discount Food Price(Taka)</th>";
			echo "<th>Action(s)</th>";
			echo "</tr>";
			echo "</thead>";
			echo "<tbody>";

				echo "<tr>";
				echo "<td>" . '<img src="images/SpicyRamen.jpeg" width="80" height="75">' . "+" . '<img src="images/momos.jpg" width="80" height="75">' . "+" . '<img src="images/Drinks.jpg" width="80" height="75">' . "</td>";
				echo "<td style='text-align:center'>" . $arr1[0]['food_name'] . "+" . $arr1[6]['food_name'] . "+" . $arr1[9]['food_name'] . "</td>";
				echo "<td style='text-align:center'>" . 5 . "%" . "</td>";
				echo "<td style='text-align:center'>" . (int)(($arr1[0]['food_price'])+($arr1[6]['food_price'])+($arr1[9]['food_price'])-(((($arr1[0]['food_price'])+($arr1[6]['food_price'])+($arr1[9]['food_price']))*5)/100)) . "</td>";
				echo "<td>" . "<a href='../controller/SpecialOffersAction.php?id=" . "s1" . "'>Add to Chart</a>" . "</td>";
				echo "</tr>";

				////////////////////////////////////////

				echo "<tr>";
				echo "<td>" . '<img src="images/NagaBlastBurger.png" width="80" height="75">' . "+" . '<img src="images/CreamyCheesePasta.jpg" width="80" height="75">' . "+" . '<img src="images/Drinks.jpg" width="80" height="75">' . "</td>";
				echo "<td style='text-align:center'>" . $arr1[1]['food_name'] . "+" . $arr1[2]['food_name'] . "+" . $arr1[9]['food_name'] . "</td>";
				echo "<td style='text-align:center'>" . 5 . "%" . "</td>";
				echo "<td style='text-align:center'>" . (int)(($arr1[1]['food_price'])+($arr1[2]['food_price'])+($arr1[9]['food_price'])-(((($arr1[1]['food_price'])+($arr1[2]['food_price'])+($arr1[9]['food_price']))*5)/100)) . "</td>";
				echo "<td>" . "<a href='../controller/SpecialOffersAction.php?id=" . "s2" . "'>Add to Chart</a>" . "</td>";
				echo "</tr>";

				////////////////////////////////////////

				echo "<tr>";
				echo "<td>" . '<img src="images/SeaFoodSoup.jpg" width="80" height="75">' . "+" . '<img src="images/momos.jpg" width="80" height="75">' . "+" . '<img src="images/ChikenChap.jpg" width="80" height="75">' . "</td>";
				echo "<td style='text-align:center'>" . $arr1[5]['food_name'] . "+" . $arr1[6]['food_name'] . "+" . $arr1[8]['food_name'] . "</td>";
				echo "<td style='text-align:center'>" . 5 . "%" . "</td>";
				echo "<td style='text-align:center'>" . (int)(($arr1[5]['food_price'])+($arr1[6]['food_price'])+($arr1[8]['food_price'])-(((($arr1[5]['food_price'])+($arr1[6]['food_price'])+($arr1[8]['food_price']))*5)/100)) . "</td>";
				echo "<td>" . "<a href='../controller/SpecialOffersAction.php?id=" . "s3" . "'>Add to Chart</a>" . "</td>";
				echo "</tr>";

				////////////////////////////////////////////////

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