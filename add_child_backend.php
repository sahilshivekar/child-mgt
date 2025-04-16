<?php
// Database connection
$servername = "localhost"; // Replace with your server details
$username = "root";        // Replace with your DB username
$password = "";            // Replace with your DB password
$dbname = "hospitalms";     // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$childName = $_POST['childName'];
$bloodGroup = $_POST['bloodGroup'];
$childWeight = $_POST['childWeight'];
$birthDate = $_POST['birthDate'];

// Calculate age in years (or months, depending on your use case)
$birthDateObj = new DateTime($birthDate);
$today = new DateTime();
$ageInterval = $birthDateObj->diff($today);
$age = $ageInterval->y; // Age in years

// Prepare the SQL query to insert data into `children` table
$sql = "INSERT INTO children (name, age, blood_group, weight, birth_date) 
        VALUES ('$childName', '$age', '$bloodGroup', '$childWeight', '$birthDate')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "New child record added successfully!";
    header("Location: admin-panel.php"); // Redirect to the admin panel
    exit;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
