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
		
		//Output book table to user by word searched
		if(isset($_SESSION['word'])) {
			$n = $conn->real_escape_string($_SESSION['word']);
			$sql = "SELECT * FROM book_table WHERE BookTitle LIKE '%$n%' OR Author LIKE '%$n%' ";
			//echo $sql;
			$result = $conn->query($sql);
			if ($result->num_rows> 0) {
				//out data of each row
				echo "<table border='1'>";
				while($row = $result->fetch_assoc()) {
				echo "<tr><td>";
				echo "ISBN: ";
				echo (htmlentities($row["ISBN"]));
				echo ("</td><td>");
				echo "BookTitle: ";
				echo (htmlentities($row["BookTitle"]));
				echo ("</td><td>");
				echo "Author: ";
				echo (htmlentities($row["Author"]));
				echo ("</td><td>");
				echo "Edition: ";
				echo (htmlentities($row["Edition"]));
				echo ("</td><td>");
				echo "Year: ";
				echo (htmlentities($row["Year"]));
				echo ("</td><td>");
				echo "CategoryID: ";
				echo (htmlentities($row["CategoryID"]));
				echo ("</td><td>\n");
				echo ('<a href="reserve.php?id='.htmlentities($row["ISBN"]).'">Reserve</a>  ');
				echo ("</td></tr>\n");
				}
			}
		}
		echo "Login as: " . $_SESSION["UserName"] . "<br>";
		//Output book table to user by categories
		if (isset($_SESSION['Category'])) {
			$n = $conn->real_escape_string($_SESSION['Category']);
			$sql = "SELECT * FROM book_table WHERE CategoryID = '$n' ";
			//echo $n;
			$result = $conn->query($sql);
			if ($result->num_rows> 0) {
				//out data of each row
				echo "<table border='1'>";
				while($row = $result->fetch_assoc()) {
				echo "<tr><td>";
				echo "ISBN: ";
				echo (htmlentities($row["ISBN"]));
				echo ("</td><td>");
				echo "BookTitle: ";
				echo (htmlentities($row["BookTitle"]));
				echo ("</td><td>");
				echo "Author: ";
				echo (htmlentities($row["Author"]));
				echo ("</td><td>");
				echo "Edition: ";
				echo (htmlentities($row["Edition"]));
				echo ("</td><td>");
				echo "Year: ";
				echo (htmlentities($row["Year"]));
				echo ("</td><td>");
				echo "CategoryID: ";
				echo (htmlentities($row["CategoryID"]));
				echo ("</td><td>\n");
				echo ('<a href="reserve.php?id='.htmlentities($row["ISBN"]).'">Reserve</a>  ');
				echo ("</td></tr>\n");
				}
			}
		}
		$conn->close();
		?>
		<p><a href="main.php">Search Again</a><p>
	</div>
	<!--
	<footer>
		<p>Site by: John Banares &copy; 2021</p>
	</footer>
	-->
</body>
</html>