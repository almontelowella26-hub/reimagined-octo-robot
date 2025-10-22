<?php
// db_conn.php — Database Connection
$servername = "localhost";
$username = "root";       // default user in WAMP
$password = "";           // leave blank if no password
$dbname = "attendance_system"; // make sure this DB exists in phpMyAdmin

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
