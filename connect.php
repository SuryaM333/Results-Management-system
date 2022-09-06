<?php
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$username = $_POST['username'];
	$Gender = $_POST['Gender'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];

	// Database connection
	$conn = new mysqli('localhost','root','new','new');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(email, phone, username, Gender, password, confirm_password) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sissss", $email, $phone, $username, $Gender, $password, $confirm_password );
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>