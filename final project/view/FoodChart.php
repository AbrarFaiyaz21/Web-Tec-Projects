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
	<script src="js/foodChartOrder.js"></script>
</head>
<body>
	<?php
			include "../view/include/header.php";  
	?>

	<form action="../controller/FoodChartAction.php" method="post" onsubmit="validation(this); return false;" novalidate>
		<h2>Food Chart</h2>
		<?php 

			include "../model/userModel.php";

			$userid = $_SESSION['id'];
			$totalPrice = 0;
			$flag = false;
			$arr1 = checkFoodChart($userid); 

				if ($arr1 === NULL) {
					echo "No Data(s) Found";
				}
				else{
					echo "<table border='1' class = 'form1'>";
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

				echo '<table width="300px" class="form2">';

				echo '<tr height="40px">';

                    echo '<td width="120px" style="text-align:center" colspan="3">';
                        echo '<h4>Add delevery/billing address</h4>';
                    echo '</td>';
                echo '</tr>';

                ////////////////////////////////////

				echo '<tr height="40px">';

                    echo '<td width="120px">';
                        echo '<label for = "address">Street Address*: </label>';
                    echo '</td>';
                    echo '<td>';
                        echo '<input type = "text" name = "address" id = "address">';
                        echo '<span id="err1"></span>';
                    echo '</td>';
                echo '</tr>';

                ////////////////////////////////////

                echo '<tr height="40px">';

                    echo '<td width="120px">';
                        echo '<label for = "poBox">P.O Box No*: </label>';
                    echo '</td>';
                    echo '<td>';
                        echo '<input type = "text" name = "poBox" id = "poBox">';
                        echo '<span id="err2"></span>';
                    echo '</td>';
                echo '</tr>';

                ///////////////////////////////////////

                echo '<tr height="40px">';

                    echo '<td width="120px">';
                        echo '<label for = "phone">Phone No*: </label>';
                    echo '</td>';
                    echo '<td>';
                        echo '<input type="tel" name="phone" id="phone" placeholder="01XXXXXXXXX" pattern="{0}{1}[0-9]{3}[0-9]{6}">';
                        echo '<span id="err3"></span>';
                    echo '</td>';
                echo '</tr>';

                echo '<tr height="40px">';

                    echo '<td width="120px">';
                        echo '<input type="submit" name="Order" value="Order">';
                    echo '</td>';
                echo '</tr>';

                ///////////////////////////////////////

                echo '</table>';

				
			}

		?>
		
	</form>

	<p id="msg"></p>

	<?php 
		echo "<br><br>";

		include "../view/include/footer.php";
	?>
	
</body>
</html>