// REGISTER INTO TABLE CALLED CLIENTS
<?php
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$gender = $_POST['gender'];
	$aadhar = $_POST['aadhar'];
	$city = $_POST['city'];
	$state = $_POST['state'];
	$password = $_POST['password'];

	$conn = new mysqli('localhost','root','','cbp');
	if($conn->connect_error){
		die("Connection Failed : ". $conn->connect_error);
	} 
	else {
		$stmt = $conn->prepare("insert into clients(first_name,last_name,email,gender,aadhar,city,state,password) values(?, ?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssssisss", $first_name, $last_name, $email, $gender, $aadhar, $city, $state, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
        header("Location: login.html");
		$stmt->close();
		$conn->close();
	}
?>