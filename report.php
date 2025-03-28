<?php
// Establish connection to your database
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

// Retrieve all records
$sql = "SELECT * FROM personal_details";
$result = $conn->query($sql);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["export"] == "excel") {
        // Export to Excel (CSV)
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="details.csv"');

        // Output CSV
        $output = fopen("php://output", "w");
        fputcsv($output, array('Resource Person', 'Designation', 'Organization', 'City', 'PAN Card No', 'Aadhar Card No', 'Account Holder Name', 'Account No', 'Bank Name', 'Branch Name', 'IFSC Code', 'Mobile No', 'Email ID'));
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                fputcsv($output, $row);
            }
        }
        fclose($output);
        echo "<script>alert('The file has been downloaded.');</script>";
        exit;
    } elseif ($_POST["export"] == "pdf") {
        // Output HTML to be printed as PDF
        echo '<html><head><style>';
        echo 'table { width: 100%; border-collapse: collapse; }';
        echo 'th, td { border: 1px solid black; padding: 8px; text-align: left; }';
        echo 'h2 { text-align: center; }'; // Centering the heading using CSS
        echo '</style></head><body>';
        echo '<h2>Account Report</h2>';
        echo '<table>';
        echo '<tr><th>Resource Person</th><th>Designation</th><th>Organization</th><th>City</th><th>PAN Card No</th><th>Aadhar Card No</th><th>Account Holder Name</th><th>Account No</th><th>Bank Name</th><th>Branch Name</th><th>IFSC Code</th><th>Mobile No</th><th>Email ID</th></tr>';

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row["resource_person"] . '</td>';
                echo '<td>' . $row["designation"] . '</td>';
                echo '<td>' . $row["organization_name"] . '</td>';
                echo '<td>' . $row["organization_city"] . '</td>';
                echo '<td>' . $row["pan_card"] . '</td>';
                echo '<td>' . $row["aadhar_card"] . '</td>';
                echo '<td>' . $row["account_holder_name"] . '</td>';
                echo '<td>' . $row["account_no"] . '</td>';
                echo '<td>' . $row["bank_name"] . '</td>';
                echo '<td>' . $row["branch_name"] . '</td>';
                echo '<td>' . $row["ifsc_code"] . '</td>';
                echo '<td>' . $row["mobile_no"] . '</td>';
                echo '<td>' . $row["email_id"] . '</td>';
                echo '</tr>';
            }
        }

        echo '</table>';
        echo '</body></html>';
        exit;
    }
}
?>
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
        h1, h2 {
            text-align: center;
        }
        .button-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
            align-items: center;
            font-size: 18px;
        }
        .export-section {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .export-section label {
            font-size: 18px;
            margin-right: 10px;
        }
        input[type="submit"], input[type="button"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #004080;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover, input[type="button"]:hover {
            background-color: #003366;
        }
    </style>
    <script>
        function downloadExcel() {
            document.getElementById('excel-form').submit();
            alert('The file has been downloaded.');
        }
    </script>
</head>
<body>
    <header class="navbar">
        <h1>
            <img src="images/download.jpeg" alt="Logo"> <!-- Replace 'images/download.jpeg' with the path to your logo image -->
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
        <h2>Print Report</h2>
        <div class="button-container">
            <div class="export-section">
                <label for="excel-button">Export to Excel</label>
                <form id="excel-form" method="post">
                    <input type="hidden" name="export" value="excel">
                    <input type="button" id="excel-button" value="Export" onclick="downloadExcel()">
                </form>
            </div>
            <div class="export-section">
                <label for="pdf-button">Export to PDF</label>
                <form method="post">
                    <input type="hidden" name="export" value="pdf">
                    <input type="submit" id="pdf-button" value="Export">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
