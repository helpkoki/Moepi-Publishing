<?php
include '../database/db_config.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header('Content-Type: application/json'); // Ensure correct content-type is returned

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the companyname parameter is present
    if (!isset($_POST['companyname'])) {
        echo json_encode(['error' => 'Missing required parameter: companyname']);
        exit;
    }

    $company_name = $_POST['companyname'];

    // Prepare SQL query
    $sql = "SELECT * FROM company WHERE companyname = ?";
    $stmt = mysqli_prepare($link, $sql);

    if ($stmt === false) {
        echo json_encode(['error' => 'Failed to prepare SQL statement: ' . mysqli_error($link)]);
        exit;
    }

    mysqli_stmt_bind_param($stmt, 's', $company_name);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        $data = mysqli_fetch_assoc($result);

        if ($data) {
            echo json_encode($data); // Send the company data as JSON
        } else {
            echo json_encode(['error' => 'No data found for the specified company']);
        }
    } else {
        echo json_encode(['error' => 'Failed to execute SQL query']);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($link);
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
?>
