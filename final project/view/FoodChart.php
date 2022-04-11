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
	<title>Food Chart</title>
</head>
<body>
	<?php
			include "../view/include/header.php";  
	?>

	<form action="../controller/FoodChartAction.php" method="post" novalidate>
		<h1>Food Chart</h1>
		<?php 

			include "../model/userModel.php";

			$totalPrice = 0;
			$flag = false;
			$arr1 = checkFoodChart(); 

				if ($arr1 === NULL) {
					echo "No Data(s) Found";
				}
				else{
					echo "<table border='1'>";
					echo "<thead>";
					echo "<tr>";
					echo "<th>Food Name</th>";
					echo "<th>Food Price(Taka)</th>";
					echo "<th>Action(s)</th>";
					echo "</tr>";
					echo "</thead>";
					echo "<tbody>";

					for ($i = 0; $i < count($arr1); $i++) {
						echo "<tr>";
						echo "<td>" . $arr1[$i]['food_name'] . "</td>";
						echo "<td style='text-align:center'>" . $arr1[$i]['food_price'] . "</td>";
						echo "<td style='text-align:center'>" . "<a href='CancelFoodItem.php?id=" .  $arr1[$i]['id'] . "'>Cancel</a>" . "</td>";
						echo "</tr>";
						$totalPrice = $totalPrice + (int)$arr1[$i]['food_price'];
						$flag = true;

					}

					echo "<tr>";
						echo "<td>" . "Total Cost" . "</td>";
						echo "<td style='text-align:center' colspan='3'>" . $totalPrice . "</td>";
						echo "</tr>";

					echo "</tbody>";
					echo "</table>";
				}
			if ($flag === true) {
				echo "<br><br>";
				echo "<h3>Add delevery/billing address</h3>";

				echo '<table width="700px" class="form">';

				echo '<tr height="40px">';

                    echo '<td width="120px">';
                        echo '<label for = "address">Street Address*: </label>';
                    echo '</td>';
                    echo '<td>';
                        echo '<input type = "text" name = "address" id = "address">';
                    echo '</td>';
                echo '</tr>';

                ////////////////////////////////////

                echo '<tr height="40px">';

                    echo '<td width="120px">';
                        echo '<label for = "poBox">P.O Box No*: </label>';
                    echo '</td>';
                    echo '<td>';
                        echo '<input type = "text" name = "poBox" id = "poBox">';
                    echo '</td>';
                echo '</tr>';

                ///////////////////////////////////////

                echo '<tr height="40px">';

                    echo '<td width="120px">';
                        echo '<label for = "phone">Phone No*: </label>';
                    echo '</td>';
                    echo '<td>';
                        echo '<input type="tel" name="phone" id="phone" placeholder="01XXX-XXXXXX" pattern="{0}{1}[0-9]{3}-[0-9]{6}">';
                    echo '</td>';
                echo '</tr>';

                echo '</table>';

				echo '<input type="submit" name="Order" value="Order">';
			}

		?>
		
	</form>

	<?php 
		echo "<br><br>";

		include "../view/include/footer.php";
	?>
	
</body>
</html>