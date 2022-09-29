<?php
	session_start();
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
	//Inserts into user_table new account/info 
	if (isset($_POST['UserName']) && isset($_POST['Password']) && isset($_POST['FirstName']) && isset($_POST['LastName']) && isset($_POST['AddressLine1']) && isset($_POST['AddressLine2']) && isset($_POST['City']) && isset($_POST['Telephone']) && isset($_POST['Mobile'])) {
		$n = $_POST['UserName'];
		$p = $_POST['Password'];
		$fn = $_POST['FirstName'];
		$ln = $_POST['LastName'];
		$a1 = $_POST['AddressLine1'];
		$a2 = $_POST['AddressLine2'];
		$c = $_POST['City'];
		$t = $_POST['Telephone'];
		$m = $_POST['Mobile'];
		$sql = "INSERT INTO user_table (UserName, Password, FirstName, LastName, AddressLine1, AddressLine2, City, Telephone, Mobile) VALUES ( '$n', '$p', '$fn' , '$ln', '$a1', '$a2', '$c', '$t', '$m')";
		if ($conn->query($sql) === TRUE) {
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
		<h2>Library Registration</h2>
	</header>
	<div class="main">
		<h4>Register Details:</h4>
		<div class="register">
			<form method="post">
			<p>Username:<br>
			<input type="text" name="UserName"></p>
			<p>Password:<br>
			<input type="password" name="Password"></p>
			<p>Firstname:<br>
			<input type="text" name="FirstName"></p>
			<p>Lastname:<br>
			<input type="text" name="LastName"></p>
			<p>Address Line 1:<br>
			<input type="text" name="AddressLine1"></p>
			<p>:Addres Line 2:<br>
			<input type="text" name="AddressLine2"></p>
			<p>City:<br>
			<input type="text" name="City"></p>
			<p>Telephone:<br>
			<input type="number" name="Telephone"></p>
			<p>Mobile:<br>
			<input type="number" name="Mobile"></p>
			<p><input type="submit" value="register"/>
			<a href="login.php">Cancel</a></p>
			</form>
		</div>
	</div>
	<footer>
		<p>Site by: John Banares &copy; 2021</p>
	</footer>
</body>
</html>