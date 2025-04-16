<?php
// add_vaccine_backend.php

// Database connection
$servername = "localhost"; // This should generally remain as 'localhost'
$username = "root"; // Default username for XAMPP
$password = ""; // Leave blank for XAMPP unless you have set a password
$dbname = "hospitalms"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$vaccineName = $_POST['vaccineName'];
$ageGroup = $_POST['ageGroup'];
$quantity = $_POST['quantity'];

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO vaccines (vaccine_name, age_group, quantity) VALUES (?, ?, ?)");
$stmt->bind_param("ssi", $vaccineName, $ageGroup, $quantity);

// Execute the statement
if ($stmt->execute()) {
    // Redirect to admin dashboard after a successful insert
    header("Location:admindshbrd.php?success=1");
    exit(); // Ensure no further code is executed
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
