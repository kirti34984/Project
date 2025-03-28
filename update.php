<!DOCTYPE html>
<html>
<head>
    <style>
         body {
            font-family: 'Times New Roman', sans-serif;
            background-color: #ADD8E6; /* Light blue background color */
            margin: 0;
            padding: 0;
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
        .container {
            width: 50%;
            margin: 40px auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
        input[type="text"], input[type="email"] {
            width: calc(100% - 10px);
            padding: 5px;
            font-size: 16px;
            margin-bottom: 10px;
        }
        input[type="submit"] {
            width: 100px;
            padding: 10px;
            font-size: 16px;
            margin-top: 10px;
        }
        .required {
            color: red;
        }
        .message {
            margin-top: 20px;
            padding: 10px;
            border: 1px solid #004080;
            background-color: #f0f8ff;
            color: #004080;
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
            <a href="index1.html">Home</a>
            <a href="Login1.html">Account Officer</a>
            <a href="Login2.html">Office Staff</a>
            <a href="index1.html#contact-section">Contact</a>
        </nav>
    </header>

    <div class="container">
        <h1>Update Details Form</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="rperson">Resource Person Full Name:<span class="required">*</span></label>
            <input type="text" id="rperson" name="rperson" required><br><br>
            
            <label for="design">Designation:<span class="required">*</span></label>
            <input type="text" id="design" name="design" required><br><br>
            
            <label for="organi">Organization Name and City:<span class="required">*</span></label>
            <input type="text" id="organi" name="organi" placeholder="Organization Name" required>
            <input type="text" id="city" name="city" placeholder="City" required><br><br>
              
            <label for="pno">PAN Card No:<span class="required">*</span></label>
            <input type="text" id="pno" name="pno" required><br><br>

            <label for="ano">Aadhar Card No:<span class="required">*</span></label>
            <input type="text" id="ano" name="ano" required><br><br>

            <label for="aname">Account Holder Name:<span class="required">*</span></label>
            <input type="text" id="aname" name="aname" required><br><br>

            <label for="accno">Account No:<span class="required">*</span></label>
            <input type="text" id="accno" name="accno" required><br><br>

            <label for="bname">Bank Name:<span class="required">*</span></label>
            <input type="text" id="bname" name="bname" required><br><br>

            <label for="brname">Branch Name:<span class="required">*</span></label>
            <input type="text" id="brname" name="brname" required><br><br>

            <label for="icode">IFSC Code:<span class="required">*</span></label>
            <input type="text" id="icode" name="icode" required><br><br>

            <label for="mno">Mobile No:<span class="required">*</span></label>
            <input type="text" id="mno" name="mno" required><br><br>

            <label for="eid">Email Id:<span class="required">*</span></label>
            <input type="email" id="eid" name="eid" required><br><br>

            <input type="submit" value="Submit">
        </form>
    </div>

    <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bank";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve form data
    $rperson = $_POST['rperson'];
    $design = $_POST['design'];
    $organi = $_POST['organi'];
    $city = $_POST['city'];
    $pno = $_POST['pno'];
    $ano = $_POST['ano'];
    $aname = $_POST['aname'];
    $accno = $_POST['accno'];
    $bname = $_POST['bname'];
    $brname = $_POST['brname'];
    $icode = $_POST['icode'];
    $mno = $_POST['mno'];
    $eid = $_POST['eid'];

    // Update query
    $sql = "UPDATE personal_details SET 
                designation = '$design', 
                organization_name = '$organi', 
                organization_city = '$city', 
                pan_card = '$pno', 
                aadhar_card = '$ano', 
                account_holder_name = '$aname', 
                account_no = '$accno', 
                bank_name = '$bname', 
                branch_name = '$brname', 
                ifsc_code = '$icode', 
                mobile_no = '$mno', 
                email_id = '$eid' 
            WHERE resource_person = '$rperson'";

    if ($conn->query($sql) === TRUE) {
        // Echo JavaScript to display an alert
        echo "<script>alert('Record updated successfully');</script>";
    } else {
        echo "<p style='text-align:center;'>Error updating record: " . $conn->error . "</p>";
    }

    $conn->close();
}
?>

</body>
</html>
