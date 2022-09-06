<?php
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirm_password = $_POST['confirm_password'];

	// Database connection
	$conn = new mysqli('localhost','root','new','new');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into prg(email, phone, username,password, confirm_password) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sisss", $email, $phone, $username, $password, $confirm_password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
			header(Location: "https://surya/login/login.php");
		$stmt->close();
		$conn->close();
	}
?>