<?php
include_once '';
class Ticket
{
    private $db;

    // Constructor to initialize database connection
    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }

    public function logTicket($department, $description, $os, $attachment ,$user_id)
    {
        global $connection;

        // Prepare the SQL statement
        $sql = mysqli_prepare($this->db, "INSERT INTO incidents (date ,department, description, os, path,user_id) VALUES (NOW(),?, ?, ?, ? ,?)");

        if ($sql === false) {
            die("SQL prepare failed: " . mysqli_error($connection)); // Log error if preparation fails
        }

        // Bind parameters to the SQL statement
        mysqli_stmt_bind_param($sql, "ssssi", $department, $description, $os, $attachment , $user_id);

        // Execute the statement
        if (mysqli_stmt_execute($sql)) {
            return true;  // Return success
        } else {
            return false; // Log failure
        }
    }
}



?>