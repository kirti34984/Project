<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Times New Roman, sans-serif;
            background-color: #ADD8E6; /* Light blue background color */
        }
        .container {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            background-color: #ffffff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 20px;
            background-color: #004080;
            color: white;
        }
        .navbar img {
            max-width: 50px;
            height: auto;
        }
        .navbar h1 {
            margin: 0;
            display: flex;
            align-items: center;
        }
        .navbar h1 span {
            margin-left: 10px;
        }
        .navbar nav {
            display: flex;
            gap: 20px;
        }
        .navbar nav a {
            color: white;
            text-decoration: none;
            font-size: 18px;
        }

        h1 {
            text-align: center;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
            font-size: 18px;
        }
        label {
            margin-bottom: 10px;
        }
        input[type="text"] {
            width: 80%;
            padding: 5px;
            font-size: 16px;
            margin-bottom: 20px;
        }
        input[type="submit"] {
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
            font-size: 16px;
        }
        .required {
            color: red;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>

<body>
    <header class="navbar">
        <h1>
            <img src="images/download.jpeg" alt="Logo"> 
            <span>Finances</span>
        </h1>
        <nav>
            <a href="index1.php">Home</a>
            <a href="Login1.html">Account Officer</a>
            <a href="Login2.html">Office Staff</a>
            <a href="index1.php#contact-section">Contact</a>
        </nav>
    </header>
    <div class="container">
        <h1>Delete Record</h1>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <label for="rperson">Resource Person Full Name:<span class="required">*</span></label>
            <input type="text" id="rperson" name="rperson">
            <input type="submit" value="Submit">
        </form>
        <p>
        <?php
        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Retrieve form data
            $rperson = $_POST['rperson']; 
        
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "bank"; // Replace with your actual database name
        
            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
        
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
        
            // Escape user input to prevent SQL injection
            $rperson = $conn->real_escape_string($rperson);
        
            // Delete query
            $sql = "DELETE FROM personal_details WHERE resource_person = '$rperson'";
        
            if ($conn->query($sql) === TRUE) {
                echo "<script>alert('Record deleted successfully');</script>";
    } else {
        echo "<div class='message'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }

        
            // Close connection
            $conn->close();
        }
        ?></p>
    </div>
</body>
</html>
