<?php
include('dbconn.php'); // database connection

if($_SERVER['REQUEST_METHOD'] == "POST") {
		$username = mysqli_real_escape_string($connection, $_POST['username']);
		$password = mysqli_real_escape_string($connection, $_POST['password']);
		$email = mysqli_real_escape_string($connection, $_POST['email']);
  	$password = password_hash($password, PASSWORD_DEFAULT);
		if(empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["email"])) {
				echo '<script>alert("Please fill out all fields.")</script>';
		} else {
				$sql = "INSERT INTO user_accounts (username, password, email) values ('$username', '$password', '$email')";
				$result = mysqli_query($connection, $sql);
				echo "Account created successfully!";
		}
}

?>

<!DOCTYPE HTML>
<html>
<head>
		<title>PHP/MySQL Registration Form</title>
		<link rel="stylesheet" href="css/style.css">
</head>
<body>
<form action="" method="POST">
		<div class="container">

				<label for="username"><b>Username <span style="color:red">*</span></b></label>
				<input type="text" placeholder="Username" name="username" required>

				<label for="password"><b>Password <span style="color:red">*</span></b></label>
				<input type="password" placeholder="Password" name="password" required>

				<label for="email"><b>Email <span style="color:red">*</span></b></label>
				<input type="text" placeholder="Email" name="email" required>

				<button type="submit">Register</button>

				<p align="center">Already have an account? <a href="login.php">Login</a></p>
		</div>

		<div class="container" style="background-color:#f1f1f1">
				<button type="button" onclick="window.location.href='/index'" class="cancelbtn">Annuleer</button>
  	</div>
</form>
</body>
</html>
