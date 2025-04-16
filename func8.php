<?php
// Start session at the top of the file
session_start();

// Enable error reporting for debugging
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Database configuration
$servername = "localhost"; 
$username = "root"; // Default XAMPP username
$password = ""; // Default XAMPP password
$dbname = "hospitalms"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the login form is submitted
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format.";
        header("Location: Hospitallogin.php?error=" . urlencode($error));
        exit();
    } else {
        // Prepare SQL statement to fetch the hospital
        $stmt = $conn->prepare("SELECT * FROM hospitals WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if a matching hospital is found
        if ($result->num_rows > 0) {
            $hospital = $result->fetch_assoc();

            // Verify the password
            if ($hospital['password'] === $password) { // Store the password as plain text
                // Start a session and store user info
                $_SESSION['hospital_name'] = $hospital['hospital_name']; // Store hospital name
                $_SESSION['email'] = $hospital['email']; // Store email if needed

                // Redirect to hospitalboard.php
                header("Location: hospitalboard.php");
                exit(); // Important to stop script execution
            } else {
                $error = "Invalid email or password.";
                header("Location: Hospitallogin.php?error=" . urlencode($error));
                exit();
            }
        } else {
            $error = "No account found with that email.";
            header("Location: Hospitallogin.php?error=" . urlencode($error));
            exit();
        }
    }
}

// Close connection
$conn->close();
?>
