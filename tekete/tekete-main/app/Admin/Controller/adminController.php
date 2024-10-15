

<?php
require_once '../Models/adminModel.php'; // Include the model file

// Check for active session
$admino = $_SESSION['admin_no'];
if (empty($admino)) {
    echo "<script>alert('Session expired');</script>";
    echo "<script>window.location.href='../adminLogin';</script>";
    exit();
}

$query = "SELECT date, first_name, last_name, mobile, email, os, department, description FROM users "; // You can modify this query as per your needs

$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Fetch the data into variables
    while($user = $result->fetch_assoc()) {
        $date = $user['date'];
        $name = $user['last_name'];
		$name = $user['first_name'];
        $phoneNo = $user['mobile'];
		$email = $user['email'];
        $operating_system = $user['os'];
		$department = $user['department'];
		$description = $user['description'];
		
    }
} else {
    echo "0 results";
 }
 
?>
