<?php
include('dbconn.php'); // database connection
session_start();

if(isset($_POST['username'])) {
	if(empty($_POST["username"]) || empty($_POST["password"])) {
			echo '<script>alert("Please fill out all fields.")</script>';
	} else {
        $username = mysqli_real_escape_string($connection, $_POST["username"]);
        $password = mysqli_real_escape_string($connection, $_POST["password"]);
        $query = "SELECT * FROM user_accounts WHERE username = '$username'";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)) {
				if(password_verify($password, $row["password"])) {
						// true;
						$_SESSION['loggedin'] = true;
						$_SESSION["username"] = $username;
						header("location:index.php");
				} else {
						// false;
						echo '<script>alert("Incorrect credentials")</script>';
				}
            }
        } else {
						echo '<script>alert("Incorrect credentials")</script>';
        }
    }
}
?>

<!DOCTYPE HTML>
<html>
<head>
		<title>PHP/MySQL Login Form</title>
		<link rel="stylesheet" href="css/style.css">
</head>
<body>
<form action="" method="POST">
  	<div class="container">
      	<h1>PHP Login Form</h1>

    		<label for="username"><b>Username <span style="color:red">*</span></b></label>
    		<input type="text" placeholder="Username" name="username" required>

    		<label for="password"><b>Password <span style="color:red">*</span></b></label>
    		<input type="password" placeholder="Password" name="password" required>

    		<button type="submit">Login</button>
  	</div>

  	<div class="container" style="background-color:#f1f1f1">
    		<button type="button" onclick="window.location.href='index.php'" class="cancelbtn">Cancel</button>
    		<span class="psw"><a href="#">Forgot password?</a></span>
  	</div>

</form>
</body>
</html>
