<?php 

	include "db.php";

	function registration(){
		$conn = getConnection();

		$stmt = $conn->prepare("INSERT INTO registration (firstname, lastname, gender, dob, phone, email, username, password) VALUES (?, ?, ? , ? , ? , ? , ? , ?)");
		$stmt->bind_param("ssssssss", $firstname, $lastname, $gender, $dob, $phone, $email, $username, $pass);

		$firstname = $_POST['fName'];
		$lastname  = $_POST['lName'];
	 	$gender  = $_POST['gender'];
	 	$dob = $_POST['dob'];
		$phone = $_POST['phone'];
		$email = $_POST['email'];
		$username = $_POST['uName'];
		$pass = $_POST['pass'];
		$res = $stmt->execute();

		$stmt->close();
		$conn->close();
		return $res;
		
	}

	////////////////////////////////////////////////////////////////////////////////////////////

	function login($username, $pass){
		$conn = getConnection();
		$stmt = $conn->prepare("SELECT * FROM registration WHERE username = ? AND password = ?");
		$stmt->bind_param("ss",$username, $pass);
		$stmt->execute();
		$result = $stmt->get_result();
		while ($row = $result->fetch_assoc()) {
   		 	$_SESSION['id'] = $row['Id'];
   		 	$_SESSION['firstname'] = $row['firstname'];
   		 	$_SESSION['lastname'] = $row['lastname'];
   		 	$_SESSION['gender'] = $row['gender'];
		 	$_SESSION['dob'] = $row['dob'];
			$_SESSION['phone'] = $row['phone'];
			$_SESSION['email'] = $row['email'];
			$_SESSION['username'] = $row['username'];
			$_SESSION['password'] = $row['password'];
		}
		if ($result->num_rows > 0) {
			$stmt->close();
			$conn->close();
			return true;
		}
		else{
			$stmt->close();
			$conn->close();
			return false;
		}
	}

	//////////////////////////////////////////////////////////////////////////////////////////

	function insertCode(){
		$conn = getConnection();
		$stmt = $conn->prepare("INSERT INTO verification (email, code) VALUES (?, ?)");
		$stmt->bind_param("ss", $email, $code);

		$email = $_POST['email'];
		$code = rand(1000,9999);
		$stmt->execute();
	}

	///////////////////////////////////////////////////////////////////////////////////////////

	function forgottenPassword($email){
		$conn = getConnection();
		$stmt = $conn->prepare("SELECT Id,email,password FROM registration WHERE email = ?");
		$stmt->bind_param("s",$email);
		$stmt->execute();
		$result = $stmt->get_result();
		while ($row = $result->fetch_assoc()) {
			$_SESSION['tmpId'] = $row['Id'];
			$_SESSION['tmpEmail'] = $row['email'];
			$_SESSION['tmpPassword'] = $row['password'];
		}
		if ($result->num_rows > 0) {
			$stmt->close();
			$conn->close();
			return true;
		}
		else{
			$stmt->close();
			$conn->close();
			return false;
		}
	}

	///////////////////////////////////////////////////////////////////////////////////////////////////////

	function verification($email,$code){
		$conn = getConnection();
		$stmt = $conn->prepare("SELECT * FROM verification WHERE email = ? AND code = ?");
		$stmt->bind_param("ss",$email,$code);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows > 0) {
			$stmt->close();
			$conn->close();
			return true;
		}
		else{
			$stmt->close();
			$conn->close();
			return false;
		}
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	function changePassword($id){
		$conn = getConnection();
		$stmt = $conn->prepare("UPDATE registration SET password=? WHERE Id=?");
		$stmt->bind_param("si",$pass,$id);
		$pass = $_POST['newPass'];
		$res = $stmt->execute();

		$stmt->close();
		$conn->close();
		return $res;
		
	}

	//////////////////////////////////////////////////////////////////////////////////////////////////////

	function foodMenu(){
		$conn = getConnection();
		$stmt = $conn->prepare("SELECT * FROM foodmenu");
		$stmt->execute();
		$result = $stmt->get_result();

		$arr = NULL;

		while ($row = $result->fetch_assoc()) {
   		 	$data = array('id' => $row['Id'], 'food_name' => $row['food_name'], 'food_price' => $row['food_price']);
			$arr[] = $data;
		}

		$stmt->close();
		$conn->close();
		return $arr;
	}

	///////////////////////////////////////////////////////////////////////////////////////////////////////

	function insertFoodChart($foodName, $foodPrice,$userid){
		$conn = getConnection();
		$stmt = $conn->prepare("INSERT INTO foodchart (food_name, food_price, user_id) VALUES (?, ?, ?)");
		$stmt->bind_param("sii", $foodName, $foodPrice, $userid);

		$stmt->execute();

		return 0;
	}

	////////////////////////////////////////////////////////////////////////////////////////////////////////

	function checkFoodChart($userid){
		$conn = getConnection();
		$stmt = $conn->prepare("SELECT * FROM foodchart WHERE user_id = ?");
		$stmt->bind_param("i",$userid);
		$stmt->execute();
		$result = $stmt->get_result();

		$arr = NULL;

		while ($row = $result->fetch_assoc()) {
   		 	$data = array('id' => $row['Id'], 'food_name' => $row['food_name'], 'food_price' => $row['food_price']);
			$arr[] = $data;
		}

		$stmt->close();
		$conn->close();
		return $arr;
		
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////

	function deleteFoodChart($id){
		$conn = getConnection();
		$stmt = $conn->prepare("DELETE FROM foodchart WHERE Id = ?");
		$stmt->bind_param("i", $id);

		$stmt->execute();

		return 0;
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	function insertCustomerLocation($address, $pobox, $phone, $userid){
		$conn = getConnection();
		$stmt = $conn->prepare("INSERT INTO customerlocation (address, pobox, phone, user_id) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("ssss", $address, $pobox, $phone, $userid);

		$stmt->execute();

		return 0;
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	function updateProfile($id){
		$conn = getConnection();
		$stmt = $conn->prepare("UPDATE registration SET username=? WHERE Id=?");
		$stmt->bind_param("si",$username,$id);
		$username = $_POST['uName'];
		$stmt->execute();
	}

	/////////////////////////////////////////////////////////////////////////////////////////////////////

	function checkUsername($username){
		$conn = getConnection();
		$stmt = $conn->prepare("SELECT * FROM registration WHERE username = ?");
		$stmt->bind_param("s",$username);
		$stmt->execute();
		$result = $stmt->get_result();

		if ($result->num_rows > 0) {
			$stmt->close();
			$conn->close();
			return true;
		}
		else{
			$stmt->close();
			$conn->close();
			return false;
		}
		
	}

?>