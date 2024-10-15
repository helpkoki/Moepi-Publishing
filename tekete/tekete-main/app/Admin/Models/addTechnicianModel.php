<?php
   //session_start();
   require_once '../../../config/database.php';

   class UserModel {
    private $connection;

    public function __construct() {
        global $connection; // Use the global $connection variable
        $this->connection = $connection;
    }

    public function insertUser($first_name, $last_name, $email, $mobile, $level) {
        // Escape user inputs to prevent SQL injection
        $first_name = mysqli_real_escape_string($this->connection, $first_name);
        $last_name = mysqli_real_escape_string($this->connection, $last_name);
        $email = mysqli_real_escape_string($this->connection, $email);
        $mobile = mysqli_real_escape_string($this->connection, $mobile);
        $level = mysqli_real_escape_string($this->connection, $level);

        // Prepare SQL query
        $query = "INSERT INTO technician (first_name, last_name, email, mobile, level) VALUES ('$first_name', '$last_name', '$email', '$mobile', '$level')";

        // Execute the query
        if (mysqli_query($this->connection, $query)) {
            return true;
        } else {
            echo "Error: " . mysqli_error($this->connection);
            return false;
}
}
}

        