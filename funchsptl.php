<?php
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

if (isset($_POST['register'])) {
    $hospital_name = $_POST['hospital_name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $password = $_POST['password']; // Get the password as entered
    $cpassword = $_POST['cpassword']; // Get confirm password
    $hospital_type = $_POST['hospital_type'];

    // Validation flags
    $errors = [];

    // Validate Hospital Name
    if (empty($hospital_name)) {
        $errors[] = "Hospital name is required.";
    }

    // Validate Email
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "A valid email is required.";
    }

    // Validate Contact Number
    if (empty($contact) || !preg_match('/^[0-9]{10}$/', $contact)) {
        $errors[] = "A valid 10-digit contact number is required.";
    }

    // Validate Password
    if (empty($password)) {
        $errors[] = "Password is required.";
    } elseif ($password !== $cpassword) {
        $errors[] = "Passwords do not match.";
    }

    // If there are validation errors, show them
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<script>alert('$error');</script>";
        }
    } else {
        // Check if hospital is already registered
        $stmt = $conn->prepare("SELECT * FROM hospitals WHERE email = ? OR hospital_name = ?");
        $stmt->bind_param("ss", $email, $hospital_name);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            echo "<script>alert('Hospital is already registered. Please use a different email or hospital name.');</script>";
        } else {
            // Prepare SQL statement to insert new hospital
            $stmt = $conn->prepare("INSERT INTO hospitals (hospital_name, email, contact, password, hospital_type) VALUES (?, ?, ?, ?, ?)");
            // Store the password as it is (no hashing)
            $stmt->bind_param("sssss", $hospital_name, $email, $contact, $password, $hospital_type);

            if ($stmt->execute()) {
                // Show success alert and redirect to hospitaluser.php
                echo "<script>alert('Hospital registered successfully.'); window.location.href='hospitaluser.php';</script>";
            } else {
                echo "<script>alert('Error: " . $stmt->error . "');</script>";
            }
        }

        $stmt->close();
    }
}

// Close connection only if it is set
if (isset($conn) && $conn) {
    $conn->close();
}
?>
