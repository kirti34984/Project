<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bank";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE contact(
first_name VARCHAR(50),
last_name VARCHAR(50),
email VARCHAR(50),
subject  VARCHAR(50),
message VARCHAR(50)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table  contact created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>