// add complaints
<?php
    $Name = $_POST['Name'];
    $Phone = $_POST['Phone'];
	$Department = $_POST['Department'];
	$Subject = $_POST['Subject'];
	$Location = $_POST['Location'];
	$conn = new mysqli('localhost','root','','cbp');
	if($conn->connect_error){
		die("Connection Failed : ". $conn->connect_error);
	} 
	else {
		$stmt = $conn->prepare("insert into complaints(Name,Phone,Department,Subject,Location) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sisss",$Name,$Phone,$Department,$Subject,$Location);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
        header("Location: mainpage.php");
		$stmt->close();
		$conn->close();
	}
?>