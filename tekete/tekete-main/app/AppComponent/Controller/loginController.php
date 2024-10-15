<?php
session_start();
include_once('../../../config/database.php');
include_once('../Models/StarSession.php');

if (isset($_POST['login'])) {
    $email = $_POST['emailAddress'];
    $Password = $_POST['password'];
    $status = $_POST['status'];
    $adminNumber = $_POST['emailAddress'];// the input name is emailAddress but the is a js that change the type from email to text and the label to Admin No this change help with decreasing number of page 


    //checks what kind of a user  a person is and calls the propera function to deal with it
    switch ($status) {
        case "admin":
           // echo "Status $status";
           adminLogin();
        // update();
          
            break;
        case "Technician":
            echo "Status $status";
            technicianLogin(); 
            break;
        case "User":
            usersLogin();
            echo "Status $status";
            break;
        default:
            echo "Invalid status!";
            break;
    }

}

// Admin Login Function
function adminLogin()
{
    global $connectionObject, $adminNumber, $Password;

    $hashedPassword = md5($Password);

    // Ensure session is started
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_POST['login'])) {
        // Debug: Check admin number and password
       // echo "Admin Number: $adminNumber <br>";
       // echo "Password: $Password <br>";

        // Use prepared statement to prevent SQL injection
        $stmt = $connectionObject->prepare("SELECT * FROM company WHERE admin_no = ?");
        $stmt->bind_param("s", $adminNumber);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            // Debug: Show stored password hash
            echo "Stored Password Hash: " . $row['password'] . "<br>";

            // Verify hashed password
            if ($hashedPassword ==$row['password']) {
                $_SESSION['admin_no'] = $adminNumber;
                $_SESSION['user'] = "1"; // Assuming "1" indicates admin user
                //echo "Login successful, redirecting...<br>";
                echo "<script>window.location.href='../../Admin/Views/DashBoard'</script>";
            } else {
                echo "Invalid login credentials<br>";
                // showAlertAndRedirect("Invalid login credentials", "../Views/login_page.php");
            }
        } else {
            showAlertAndRedirect("No user found", "../Views/login_page.php");
        }
    }
}



//i want to check something
function update()
{
    global $connectionObject, $adminNumber, $Password;
    $hashedPassword = md5($Password);

    $stmt = $connectionObject->prepare("UPDATE company SET password=? WHERE admin_no=?");
    $stmt->bind_param("ss", $hashedPassword, $adminNumber);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Password updated successfully!";
    } else {
        echo "Failed to update password.";
    }

}

// User Login Function
function usersLogin()
{
    global $connection, $email, $Password;
    $hashedPassword = md5($Password);
    // Use prepared statements to avoid SQL injection
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = mysqli_prepare($connection, $query);

    // Bind the email to the query
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    // Get the result
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    // Check if the user exists and verify the password
    if ($user && $user['password']== $hashedPassword) {
        // Set session variables
        startSession( $user['first_name'] , $user['last_name'], $email);

        // Redirect to user dashboard
        header("Location: ../../User/Views/log_ticket.php");
        exit();
    } else {
        showAlertAndRedirect("Incorrect password or email", "../views/login_page.php");
    }
}


// Technician Login Function
function technicianLogin()
{
    global $connection, $email, $Password;

    // Hash the password using md5()
    $hashedPassword = md5($Password);

    $check = "SELECT * FROM technician WHERE email = '$email' AND password = '$hashedPassword'";
    $result = mysqli_query($connection, $check);
    $rows = mysqli_num_rows($result);

    if ($rows > 0) {
        $_SESSION['email'] = $email;
        $_SESSION['user'] = '1';
        // Redirect to technician dashboard
        header("Location: ../technician/loggedTech.php");
        exit();
    } else {
        showAlertAndRedirect("Incorrect password or email", "../views/login_page.php");
    }
}

// Function to display SweetAlert and redirect
function showAlertAndRedirect($message, $redirectUrl)
{
    echo '<script type="text/javascript">
                        function loadSweetAlert(callback) {
                            var script = document.createElement("script");
                            script.src = "https://unpkg.com/sweetalert/dist/sweetalert.min.js";
                            script.onload = function () {
                                if (callback) callback();
                            };
                            document.head.appendChild(script);
                        }

                        // Function to handle success redirection with SweetAlert
                        function showSuccessAlert() {
                            loadSweetAlert(function() {
                                swal({
                                    title: "ERROR",
                                    text: "' . $message . '",
                                    icon: "warning",
                                    button: true,
                                    dangerMode: true,
                                }).then((redirect) => {
                                    if (redirect) {
                                      window.location.href = "' . $redirectUrl . '";
                                    }
                                });
                            });
                        }

                        window.onload = function() {
                            showSuccessAlert();
                        };
                    </script>';
}


function welcome($redirectUrl)
{
    echo '<script type="text/javascript">
                        function loadSweetAlert(callback) {
                            var script = document.createElement("script");
                            script.src = "https://unpkg.com/sweetalert/dist/sweetalert.min.js";
                            script.onload = function () {
                                if (callback) callback();
                            };
                            document.head.appendChild(script);
                        }

                        // Function to handle success redirection with SweetAlert
                        function showSuccessAlert() {
                            loadSweetAlert(function() {
                                swal({
                                    title: "Welcome to TEKETE",
                                    text: "",
                                    icon: "success",
                                    button: true,
                                }).then((redirect) => {
                                    if (redirect) {
                                        window.location.href = "' . $redirectUrl . '";
                                    }
                                });
                            });
                        }

                        window.onload = function() {
                            showSuccessAlert();
                        };
                    </script>';
}
?>