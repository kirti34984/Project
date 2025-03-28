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
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $email = $_POST["email"];
    $subject=$_POST["subject"];
    $message = $_POST["message"];
    
    $sql = "INSERT INTO contact (first_name, last_name, email, subject, message)
    VALUES ('$fname', '$lname', '$email','$subject','$message')";

if ($conn->query($sql) === TRUE) {
    // Echo JavaScript to display an alert
    echo "<script>alert('New record created successfully');</script>";
} else {
    echo "<div class='message'>Error: " . $sql . "<br>" . $conn->error . "</div>";
}
}
// Close the database connection
$conn->close();
?>
