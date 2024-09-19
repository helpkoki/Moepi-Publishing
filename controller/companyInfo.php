<?php
// Include database configuration
include '../database/db_config.php';
session_start();

// Company name to search for
$company_name = isset($_POST['firstName']) ? $_POST['firstName'] : '';



// Prepare and execute the query
$sql = "SELECT * FROM company WHERE companyname = ?";
$stmt = mysqli_prepare($link, $sql);

// Check if preparation was successful
if ($stmt === false) {
    die("ERROR: Could not prepare query. " . mysqli_error($link));
}

// Bind parameters and execute the statement
mysqli_stmt_bind_param($stmt, 's', $company_name);
mysqli_stmt_execute($stmt);

// Get the result
$result = mysqli_stmt_get_result($stmt);

// Fetch and display the data
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        echo "Company ID: " . $row['companyid'] . "<br>";
        echo "Company Name: " . $row['companyname'] . "<br>";
        echo "Website Name: " . $row['websitename'] . "<br>";
        echo "Username: " . $row['username'] . "<br>";
        echo "URL: " . $row['url'] . "<br>";
    }
} else {
    echo "No records found.";
}

// Close the statement and connection
mysqli_stmt_close($stmt);
mysqli_close($link);
?>
