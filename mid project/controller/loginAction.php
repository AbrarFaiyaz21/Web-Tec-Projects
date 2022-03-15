<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Action</title>
</head>
<body>
<?php
	$flag = false;

	if ($_SERVER['REQUEST_METHOD'] === "POST") {
		function test($data){
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$username = test($_POST['uName']);
		$password = test($_POST['pass']);

		if(!empty($_POST["rememberMe"])) {
			setcookie ("uName",$username,time()+ (60 * 10), "/"); //10mins
			setcookie ("pass",$password,time()+ (60 * 10), "/");
		} else {
			setcookie("uName","");
			setcookie("pass","");
		}

		if (empty($username) or empty($password)) {
			echo "<h2>Please fill up the form properly</h2>";
			echo '<a href = "../view/login.php">Go Back</a>';
		}
		else{
			define("FILENAME", "../model/users.json");
			$handle = fopen(FILENAME, "r");
			$size = filesize(FILENAME);
			$arr1 = NULL;

			if($size > 0){
				$fr = fread($handle, $size);
				$arr1 = json_decode($fr);

				for ($i=0; $i <count($arr1) ; $i++) { 
					if($username === $arr1[$i]->userName and $password === $arr1[$i]->password){
						$flag = true;
						$_SESSION['id'] = $arr1[$i]->id;
						$_SESSION['firstname'] = $arr1[$i]->firstname;
						$_SESSION['lastname'] = $arr1[$i]->lastname;
						$_SESSION['gender'] = $arr1[$i]->gender;
						$_SESSION['dob'] = $arr1[$i]->dob;
						$_SESSION['phone'] = $arr1[$i]->phone;
						$_SESSION['email'] = $arr1[$i]->email;
						$_SESSION['userName'] = $arr1[$i]->userName;
						$_SESSION['password'] = $arr1[$i]->password;
						$_SESSION['confirmPassword'] = $arr1[$i]->confirmPassword;
						
						header('Location: ../view/WelcomePage.php');
					}
				}
				if ($flag === false) {
						echo "<h3>invalid user name or password</h3>";;
						echo '<a href="../view/login.php">Go Back</a>';
					}
				
			}
			else{
				echo "<h3>Please create an account first</h3>";
				echo "To create an account " . '<a href="../view/registration.html">Click here</a>';
			}
			fclose($handle);



		}
	}

?>


</body>
</html>