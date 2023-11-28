<?php
// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Database connection parameters
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ic_dbcsv";

    // Create a connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the uploaded file
    $file = $_FILES['file']['tmp_name'];

    // Check if a file is selected
    if ($file) {
        // Read the file
        $handle = fopen($file, "r");

         // Skip the first 5 rows
         for ($i = 0; $i < 6; $i++) {
            fgetcsv($handle, 1000, ",");
        }

        // Loop through each row in the CSV file
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            // Extract data from the CSV
            $date = $data[1];
            $academicYear = $data[2];
            $session = $data[3];
            $allotedCategory = $data[4];
            $voucherType = $data[5];
            $voucherNo = $data[6];
            $rollNo = $data[7];
            $feeCategory = $data[10];
            $faculty = $data[11];
            $program = $data[12];
            $department = $data[13];
            $batch = $data[14];
            $feeHead = $data[16];
            $paidAmount = $data[18];

            // Insert data into the database
            $sql = "INSERT INTO entrymod (date, academicYear, session, allotedCategory, voucherType, voucherNo, rollNo, feeCategory, faculty, program, department, batch, feeHead,	paidAmount) VALUES ('$date', '$academicYear', '$session', '$allotedCategory', ' $voucherType', '$voucherNo', ' $rollNo', '$feeCategory', '$faculty', '$program', '$department', '$batch', '$feeHead', '$paidAmount')";

            // Execute the query
            $conn->query($sql);
        }

        // Close the file handle
        fclose($handle);

        // Close the database connection
        $conn->close();

        echo "Data imported successfully!";
    } else {
        echo "Please select a file!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV Import</title>
	<style>input[type="submit"] {
    background: #000;
    color: #FFF;
    padding: 5px;
    border: 2px solid;
    width: 234px;
    margin-top: 20px;
}  
form {
    margin: 0 auto;
    text-align: center;
    margin-top: 130px;
    background: #ccc;
    width: 35%;
    padding: 84px 44px;
    border: 3px dotted darkblue;
}


 </style>
	
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="file">Choose a CSV file:</label>
        <input type="file" name="file" id="file" accept=".csv">
        <br>
        <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>
