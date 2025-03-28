<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Times New Roman, sans-serif;
            background-color: #ADD8E6; /* Light blue background color */
            margin: 0;
            padding: 0;
        }
        .container {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            background-color: white;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
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
            font-size: 18px;
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"] {
            width: calc(100% - 150px);
            padding: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            width: 100px;
            padding: 10px;
            font-size: 16px;
            background-color: #004080;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #003366;
        }
        .required {
            color: red;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            text-align: center;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <header class="navbar">
        <h1>
            <img src="images/download.jpeg" alt="Logo"> <!-- Replace 'images/download.jpeg' with the path to your logo image -->
            <span>Finances</span>
        </h1>
        <nav>
            <a href="Home.html">Home</a>
            <a href="Login1.html">Account Officer</a>
            <a href="Login2.html">Office Staff</a>
            <a href="index.html#contact_section">Contact</a>
        </nav>
    </header>

    <div class="container">
        <h1>Search Record</h1><br>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <label for="search_query">Enter PAN Card No, Aadhar Card No or Resource Person Name:</label>
            <input type="text" id="search_query" name="search_query">
            <input type="submit" value="Search">
        </form>

        <?php
        // Database connection details
        $servername = "localhost"; // or your server name
        $username = "root";
        $password = "";
        $database = "bank";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $database);

        // Check connection and display error if any
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Function to search details based on PAN Card, Aadhar Card or Resource Person Name
        function searchDetails($conn, $search_query = null) {
            if ($search_query !== null) {
                // Escape user input to prevent SQL injection
                $search_query = $conn->real_escape_string($search_query);

                // Prepare the SQL query based on provided parameters
                $sql = "SELECT * FROM personal_details 
                        WHERE pan_card = '$search_query' 
                        OR aadhar_card = '$search_query' 
                        OR resource_person LIKE '%$search_query%'";

                // Execute the query
                $result = $conn->query($sql);

                // Check if any rows are returned
                if ($result->num_rows > 0) {
                    echo "<h2>Search Results:</h2>";
                    echo "<div style='overflow-x:auto;'>";
                    echo "<table>";
                    echo "<tr><th>Resource Person</th><th>Designation</th><th>Organization</th><th>City</th><th>PAN Card No</th><th>Aadhar Card No</th><th>Account Holder Name</th><th>Account No</th><th>Bank Name</th><th>Branch Name</th><th>IFSC Code</th><th>Mobile No</th><th>Email ID</th></tr>";

                    // Output each row as a table row
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row["resource_person"]."</td>"; 
                        echo "<td>".$row["designation"]."</td>"; 
                        echo "<td>".$row["organization_name"]."</td>"; 
                        echo "<td>".$row["organization_city"]."</td>";   
                        echo "<td>".$row["pan_card"]."</td>"; 
                        echo "<td>".$row["aadhar_card"]."</td>"; 
                        echo "<td>".$row["account_holder_name"]."</td>"; 
                        echo "<td>".$row["account_no"]."</td>"; 
                        echo "<td>".$row["bank_name"]."</td>"; 
                        echo "<td>".$row["branch_name"]."</td>";   
                        echo "<td>".$row["ifsc_code"]."</td>"; 
                        echo "<td>".$row["mobile_no"]."</td>"; 
                        echo "<td>".$row["email_id"]."</td>"; 
                        echo "</tr>";
                    }

                    // Close the HTML table
                    echo "</table>";
                    echo "</div>";
                } else {
                    echo "<p>No record found.</p>";
                }
            } else {
                echo "<p>Please enter a search query.</p>";
            }
        }

        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $search_query = $_POST["search_query"];
            searchDetails($conn, $search_query);
        }

        // Close connection
        $conn->close();
        ?>
    </div>
</body>
</html>
