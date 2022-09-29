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
		//deletes the row in reserve_table where ISBN is equal to the id variable gotten from post variable
		if ( isset($_POST['delete']) && isset($_POST['id']) ) {
			$id = $conn -> real_escape_string($_POST['id']);
			$sql = "DELETE FROM reserve_table WHERE ISBN = '$id' ";
			$sql1 = "Update book_table SET Reservation = 0 WHERE ISBN = '$id'";
			echo "<pre>\n$sql\n</pre>\n";
			$conn -> query($sql);
			$conn -> query($sql1);
			echo 'Success - <a href="main.php">Continue...</a>';
			return;
		}
		$id = $conn -> real_escape_string($_GET['id']);
		$sql = "SELECT ISBN FROM reserve_table WHERE ISBN = '$id'";
		$result = $conn -> query($sql);
		$row = $result -> fetch_assoc();
		echo "<p>Confirm: Cancelling Reservation for: ". $row["ISBN"] . "</p>\n";
		echo ('<form method="post"><input type="hidden" ');
		echo ('name="id" value="'.htmlentities($row["ISBN"]).'">'."\n");
		echo ('<input type="submit" value="Delete" name="delete">');
		echo ('<a href="main.php">Cancel</a>');
		echo("\n</form>\n");
		
		$conn->close();
		?>
		
	</div>
	<footer>
		<p>Site by: John Banares &copy; 2021</p>
	</footer>
</body>
</html>



