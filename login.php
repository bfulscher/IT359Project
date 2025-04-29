<?php

/*
  This PHP script handles login form submissions by connecting to a local MySQL database (login_db).
  It checks if the submitted username and password match an entry in the 'users' table.
  If valid credentials are found, it displays a welcome message; otherwise, it shows an error.
  Note: This is for educational/demo purposes and lacks proper security measures (e.g., input sanitization).
*/

// Connects to the local MySQL database "login_db"
$mysqli = new mysqli("localhost", "root", "toor", "login_db");

// Checks for connection errors
if($mysqli->connect_error) {
	die("Connection failed: " . $my_sqli->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Check the credentials against the "users" table
	$result = $mysqli->query("SELECT * FROM users WHERE username='$username' AND password='$password'");

	if ($result->num_rows > 0) {
		echo "Login Successful! Welcome, $username.";
	} else {
		echo "Invalid username or password.";
	}
}
// Closes the database connection
$mysqli->close();
?>
