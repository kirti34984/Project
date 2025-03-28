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
$sql = "CREATE TABLE personal_details(
resource_person VARCHAR(50),
designation VARCHAR(50),
organization_name VARCHAR(50),
organization_city VARCHAR(50),
pan_card VARCHAR(50),
aadhar_card VARCHAR(50),
account_holder_name VARCHAR(50),
account_no INT,
bank_name VARCHAR(50),
branch_name VARCHAR(50),
ifsc_code INT, 
mobile_no INT,
email_id VARCHAR(50)
)";

if ($conn->query($sql) === TRUE) {
  echo "Table personal_details created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>