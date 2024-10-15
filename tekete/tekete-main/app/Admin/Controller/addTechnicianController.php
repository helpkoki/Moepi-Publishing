<?php
require_once '../Models/addTechnicianModel.php'; // Include the model file


class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function createUser($name, $surname, $email, $mobile, $level) {
        if ($this->userModel->insertUser($name, $surname, $email, $mobile, $level)) {
            // Redirect or load the success view
            echo "<script>alert('User created successfully!')</script>";
            
            // Redirect to the same page to avoid form resubmission
        //header("Location: ../Views/add_technician.php");
        //exit;
           
        } else {
            // Handle failure (load error view or show error message)
            echo "<script>alert('Failed to create user!')</script>";
            
            
        }
        // Redirect to the same page to avoid form resubmission
        header("Location: ../Views/add_technician.php");
        exit;
        
    }

    // This method handles form submission and calls createUser if POST request is detected
    public function handleFormSubmission() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Capture form data
            
            $name = $_POST['name'];
            $surname = $_POST['surname'];
            $email = $_POST['emailAddress'];
            $mobile = $_POST['cellNo'];
            $level =$_POST['level'];
            // Call createUser to handle the database insertion
            $this->createUser($name, $surname, $email, $mobile, $level);
 }
}
}
// If the form is submitted, instantiate the controller and process the form
$controller = new UserController();
$controller->handleFormSubmission();
