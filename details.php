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
    <script>
        function validateForm() {
            let isValid = true;
            let requiredFields = ['rperson', 'design', 'organi', 'city', 'pno', 'ano', 'aname', 'accno', 'bname', 'brname', 'icode', 'mno', 'eid'];

            // Reset styles for all fields
            requiredFields.forEach(function(field) {
                document.getElementById(field).style.border = '';
            });

            // Validate required fields
            requiredFields.forEach(function(field) {
                let input = document.getElementById(field);
                if (input.value.trim() === '') {
                    isValid = false;
                    input.style.border = '2px solid red';
                }
            });

            // Validate PAN Card No
            let pan = document.getElementById('pno').value;
            if (!validatePAN(pan)) {
                isValid = false;
                document.getElementById('pno').style.border = '2px solid red';
            }

            // Validate Aadhar Card No
            let aadhar = document.getElementById('ano').value;
            if (!validateAadhar(aadhar)) {
                isValid = false;
                document.getElementById('ano').style.border = '2px solid red';
            }

            // Validate Email
            let email = document.getElementById('eid').value;
            if (!validateEmail(email)) {
                isValid = false;
                document.getElementById('eid').style.border = '2px solid red';
            }

            // Validate Mobile No
            let mobile = document.getElementById('mno').value;
            if (!validateMobile(mobile)) {
                isValid = false;
                document.getElementById('mno').style.border = '2px solid red';
            }

            // Validate IFSC Code
            let ifsc = document.getElementById('icode').value;
            if (!validateIFSC(ifsc)) {
                isValid = false;
                document.getElementById('icode').style.border = '2px solid red';
            }

            return isValid;
        }

        function validatePAN(pan) {
            let re = /^[A-Z]{5}[0-9]{4}[A-Z]{1}$/;
            return re.test(pan);
        }

        function validateAadhar(aadhar) {
            let re = /^\d{12}$/;
            return re.test(aadhar);
        }

        function validateEmail(email) {
            let re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return re.test(email);
        }

        function validateMobile(mobile) {
            let re = /^\d{10}$/;
            return re.test(mobile);
        }

        function validateIFSC(ifsc) {
            let re = /^[A-Z]{4}0[A-Z0-9]{6}$/;
            return re.test(ifsc);
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
        <h1> Details Form</h1>
        <form action="" method="POST" onsubmit="return validateForm();">
            <label for="rperson">Resource Person Full Name:<span class="required">*</span></label>
            <input type="text" id="rperson" name="rperson">
            
            <label for="design">Designation:<span class="required">*</span></label>
            <input type="text" id="design" name="design">
            
            <label for="organi">Organization Name and City:<span class="required">*</span></label>
            <input type="text" id="organi" name="organi" placeholder="Organization Name">
            <input type="text" id="city" name="city" placeholder="City">
              
            <label for="pno">PAN Card No:<span class="required">*</span></label>
            <input type="text" id="pno" name="pno">

            <label for="ano">Aadhar Card No:<span class="required">*</span></label>
            <input type="text" id="ano" name="ano">

            <label for="aname">Account Holder Name:<span class="required">*</span></label>
            <input type="text" id="aname" name="aname">

            <label for="accno">Account No:<span class="required">*</span></label>
            <input type="text" id="accno" name="accno">

            <label for="bname">Bank Name:<span class="required">*</span></label>
            <input type="text" id="bname" name="bname">

            <label for="brname">Branch Name:<span class="required">*</span></label>
            <input type="text" id="brname" name="brname">

            <label for="icode">IFSC Code:<span class="required">*</span></label>
            <input type="text" id="icode" name="icode">

            <label for="mno">Mobile No:<span class="required">*</span></label>
            <input type="text" id="mno" name="mno">

            <label for="eid">Email Id:<span class="required">*</span></label>
            <input type="email" id="eid" name="eid">

            <input type="submit" value="Submit">
        </form>
        <?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capture form data
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

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "bank";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into database
    $sql = "INSERT INTO personal_details (resource_person, designation, organization_name, organization_city, pan_card, aadhar_card, account_holder_name, account_no, bank_name, branch_name, ifsc_code, mobile_no, email_id)
            VALUES ('$rperson', '$design', '$organi', '$city', '$pno', '$ano', '$aname', '$accno', '$bname', '$brname', '$icode', '$mno', '$eid')";

    if ($conn->query($sql) === TRUE) {
        // Echo JavaScript to display an alert
        echo "<script>alert('New record created successfully');</script>";
    } else {
        echo "<div class='message'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }

    // Close connection
    $conn->close();
}
?>

</body>
</html>
