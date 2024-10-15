<?php

class DatabaseAPI
{
    private $connectionObject;

    // Constructor to initialize the connection
    public function __construct($host, $username, $password, $dbname)
    {
        $this->connectionObject = new mysqli($host, $username, $password, $dbname);

        // Check if the connection was successful
        if ($this->connectionObject->connect_error) {
            die("Connection failed: " . $this->connectionObject->connect_error);
        }
    }

    // Function to fetch all rows from a specific table
    public function getAll($table)
    {
        $query = "SELECT * FROM $table";
        $result = $this->connectionObject->query($query);

        if ($result->num_rows > 0) {
            // Fetch all data as an associative array
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    //Function to fetch a specific record by ID
    // public function getById($table, $id)
    // {
    //     $query = "SELECT * FROM $table WHERE id = $id";
    //     $result = $this->connectionObject->query($query);

    //     if ($result->num_rows > 0) {
    //         return $result->fetch_assoc();
    //     } else {
    //         return null;
    //     }
    // }

    // Updated getById function
    public function getById($table, $id_column, $id)
    {
        $query = "SELECT * FROM $table WHERE $id_column = ?";
        $stmt = $this->connectionObject->prepare($query);
        $stmt->bind_param('i', $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc();
        } else {
            return null;
        }
    }

    // Function to fetch data with a specific condition
    public function getByCondition($table, $condition)
    {
        $query = "SELECT * FROM $table WHERE $condition";
        $result = $this->connectionObject->query($query);

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    // New function to execute a custom query
    public function executeQuery($query)
    {
        $result = $this->connectionObject->query($query);

        if ($result === false) {
            return false;
        }

        if ($result === true) {
            return true;
        }

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
    
    //technician
    public function getEscalatedTickets() {

        $query = "SELECT i.*, 
            u.first_name as fname, 
            u.last_name as lname,
            u.mobile as mobile,
            u.email as email,
            t.first_name as tname,
            t.last_name as tsurname
            FROM incidents i
            LEFT JOIN users u ON i.technician_id = u.user_id 
            LEFT JOIN technician t ON i.technician_id = t.technician_id
            WHERE i.status = 'Escalate' 
            ORDER BY i.date DESC";

        return $this->executeQuery($query);
    }

    public function getIncidentById($id)
    {
        return $this->getById('incidents', 'tick_id', $id);
    }

    public function getCompletedTickets() {

        $query = "SELECT i.*, 
            u.first_name as fname, 
            u.last_name as lname,
            u.mobile as mobile,
            u.email as email,
            i.priority as priority,
            t.first_name as tname,
            t.last_name as tsurname
            FROM incidents i
            LEFT JOIN users u ON i.technician_id = u.user_id 
            LEFT JOIN technician t ON i.technician_id = t.technician_id
            WHERE i.status = 'Completed' 
            ORDER BY i.date DESC";

        return $this->executeQuery($query);
    }


    // Destructor to close the connection
    public function __destruct()
    {
        $this->connectionObject->close();
    }
}

// Example usage
$api = new DatabaseAPI('localhost', 'root', '', 'tekete');

// Fetch all rows from the 'users' table
// $users = $api->getAll('users');
// print_r($users);

// Fetch a user by ID (e.g., user with ID 1)
// $user = $api->getById('users', 1);
// print_r($user);

// Fetch a user by ID (e.g., user with ID 1)
// $user = $api->getById('users', 'user_id', 1);
// print_r($user);

// Fetch incidents with a specific condition (e.g., priority is 'Low')
// $lowPriorityIncidents = $api->getByCondition('incidents', "priority = 'Low'");
// print_r($lowPriorityIncidents);

?>