<?php
	session_start();
?>
<html>
<head>
	<link rel="stylesheet" href="Assets/site.css">
</head>
<body>
	<header>
		<h2>Welcome</h2>
	</header>
	<div class="main">
		<nav>
			<ul>
				<li><a  href="main.php">Home:</a></li>			
				<li><a  href="reserve_view.php">View Reserved Books:</a></li>
				<li><a  href="logout.php">Logout</a></li>
			</ul>
		</nav>
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
		//shows whos logged in
		echo "Login as: " . $_SESSION["UserName"] . "<br>";

		//outputs books reserved by the user logged in
		$n = $_SESSION["UserName"];
		$sql = "SELECT * FROM reserve_table WHERE UserName = '$n' ";
		$result = $conn->query($sql);
		echo "<p>Your Book Reservations:</p>\n";
		if ($result->num_rows> 0) {
			//out data of each row
			echo "<table border='1'>";
			while($row = $result->fetch_assoc()) {
			echo "<tr><td>";
			echo "ISBN: ";
			echo (htmlentities($row["ISBN"]));
			echo ("</td><td>");
			echo "UserName: ";
			echo (htmlentities($row["UserName"]));
			echo ("</td><td>");
			echo "Date: ";
			echo (htmlentities($row["Date"]));
			echo ("</td><td>\n");
			echo ('<a href="delete.php?id='.htmlentities($row["ISBN"]).'">Delete Reservation</a>  ');
			echo ("</td></tr>\n");
			}
		}
		
	
		$conn->close();
		?>	
	</div>
	<!--
	<footer>
		<p>Site by: John Banares &copy; 2021</p>
	</footer>
	-->
</body>
</html>