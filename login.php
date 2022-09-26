<?php	
	$servername = "localhost";
	$username ="root";
	$password="";
	$dbname = "library";

	//create connection
	$conn = new mysqli($servername,$username,$password,$dbname);
	//check connection
	if($conn->connect_error) {
		die("Connection Failed: " . $conn->connect_error);
	}
	session_start();
	//frees any data inside global variable UserName
	unset($_SESSION["UserName"]);
	//Checks whether the username and passowrd is inside the user_table and after success stores username in global variable UserName.
	if (isset($_POST['UserName']) && isset($_POST['Password'])) {
		$n = $conn->real_escape_string($_POST['UserName']);
		$p = $conn->real_escape_string($_POST['Password']);
		$sql = "SELECT UserName, Password FROM user_table WHERE UserName = '$n' AND Password = '$p'";
		$result = $conn->query($sql);
		if ($result->num_rows> 0) {
			$_SESSION["UserName"] = $_POST["UserName"];
			header("Location: main.php");
		}
		else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}
	$conn->close();
?>
<html>
<head>
	<link rel="stylesheet" href="Assets/site.css">
</head>
<body>
	<header>
		<h2>Library Login</h2>
	</header>
	<div class="main">
	
		<h4>Please enter login details:</h4>
		<form method="post">
		<p>Username:
		<input type="text" name="UserName"></p>
		<p>Password:
		<input type="password" name="Password"></p>
		<p><input type="submit" value="login"/>
		</form>
		<hr>
		<h4>If you have not registered to the website.<h4>
		<h4>Please make an account</h4>
		<a href="register.php">
			<p><button>Register</button>
		</a>
			
	</div>
	<footer>
		<p>Site by: John Banares &copy; 2021</p>
	</footer>
</body>
</html>