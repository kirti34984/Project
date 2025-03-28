<!DOCTYPE html>
<html>
<body style="background-color:blue;">
<div class="col-6 col-xl-2">
            <h1 class="mb-0 site-logo">
              <a href="index.html" class="h2 mb-0" style="display: flex; align-items: center;">
                <img src="images/download.jpeg" height="50px" width="50px" style="margin-right: 10px;">
                <span style="color: white;" style="flex: 1;">Finances<span class="text-primary">.</span></span>
            </a>
          </div>
</body>
</html>


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

    $rperson = $_POST["rperson"];
    $design = $_POST["design"];
    $organi = $_POST["organi"];
    $city=$_POST["city"];
    $pno = $_POST["pno"];
    $ano = $_POST["ano"];
    $aname = $_POST["aname"];
    $accno = $_POST["accno"];
    $bname = $_POST["bname"];
    $brname = $_POST["brname"];
    $icode = $_POST["icode"];
    $mno = $_POST["mno"];
    $eid = $_POST["eid"];

    $sql = "INSERT INTO personal_details (resource_person, designation, organization_name, organization_city, pan_card, aadhar_card,account_holder_name, account_no, bank_name, branch_name, ifsc_code, mobile_no, email_id)
    VALUES ('$rperson', '$design', '$organi','$city','$pno','$ano','$aname', '$accno', '$bname','$brname','$icode','$mno','$eid')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
