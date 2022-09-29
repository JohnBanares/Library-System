<?php
	session_start();
?>
<html>
<head>
	<link rel="stylesheet" href="Assets/site.css">
</head>
<body>
	<header>
		<h2>Reserve</h2>
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
		
		//checks whether the user can reserve the book or not. Reservation = 1 (cannot reserve), Reservation = 0 (can reserve)
		if ( isset($_POST['reserve']) && isset($_POST['id'])) {
			$id2 = $conn -> real_escape_string($_POST['id']);
			$check = "SELECT Reservation FROM book_table WHERE ISBN = '$id2'";
			$result2 = $conn -> query($check);
			if($result2->num_rows > 0) {
				while($row = $result2->fetch_assoc()) {
					if ($row['Reservation'] == 1) {
						header("Location: check_reserve.php");
					}
				}	
			}
		}
		//Inserts new row into the reserve_table (ISBN, UserName and Date) 
		if ( isset($_POST['reserve']) && isset($_POST['id']) ) {
			$id = $conn -> real_escape_string($_POST['id']);
			$t = date('Y-m-d');
			$a = $_SESSION["UserName"];
			$sql = "INSERT INTO reserve_table (ISBN, UserName, Date) VALUES ('$id','$a' ,'$t')";
			$sql1 = "Update book_table SET Reservation = 1 WHERE ISBN = '$id'";
			echo "<pre>\n$sql\n</pre>\n";
			$conn -> query($sql);
			echo "<pre>\n$sql1\n</pre>\n";
			$conn -> query($sql1);
			echo 'Success - <a href="main.php">Continue...</a>';
			return;
		}
		$id = $conn -> real_escape_string($_GET['id']);
		$sql = "SELECT ISBN, BookTitle FROM book_table WHERE ISBN='$id'";
		$result = $conn -> query($sql);
		$row = $result -> fetch_assoc();
		echo "<p>Confirm: Reserving ". $row["BookTitle"] . "</p>\n";
		echo ('<form method="post"><input type="hidden" ');
		echo ('name="id" value="'.htmlentities($row["ISBN"]).'">'."\n");
		echo ('<input type="submit" value="Reserve" name="reserve">');
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