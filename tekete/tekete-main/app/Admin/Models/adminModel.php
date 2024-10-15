<?php
   //session_start();
   require_once '../../../config/database.php';

   class AdminModel {
    private $connection;

    public function __construct() {
        global $connection; // Use the global $connection variable
        $this->connection = $connection;
    }

    public function insertIncidents($status, $priority, $technician, $tickno) {
        // Escape user inputs to prevent SQL injection
        $status = mysqli_real_escape_string($this->connection, $status);
        $priority = mysqli_real_escape_string($this->connection, $priority);
        $technician = mysqli_real_escape_string($this->connection, $technician);
        $tickno = mysqli_real_escape_string($this->connection, $tickno);
       

        // Prepare SQL query
        $query = "INSERT INTO incidents (status, priority, technician, tickno) VALUES ('$status', '$priority', '$technician', '$tickno')";

        // Execute the query
        if (mysqli_query($this->connection, $query)) {
            return true;
        } else {
            echo "Error: " . mysqli_error($this->connection);
            return false;
}
}
}
 