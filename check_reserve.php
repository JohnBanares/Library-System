<?php
	session_start();
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
		//prints back to user that book is reserved already
		echo "BOOK IS ALREADY RESERVED <br>";
		echo '<a href="main.php">Go Back</a>';
		?>
		
	</div>
	
	<footer>
		<p>Site by: John Banares &copy; 2021</p>
	</footer>
	
</body>
</html>