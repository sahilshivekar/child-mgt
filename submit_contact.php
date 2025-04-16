<?php
include 'db.php'; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and escape it to prevent SQL injection
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $message = $conn->real_escape_string($_POST['message']);

    // SQL query to insert the message into the 'contact_messages' table
    $insert_sql = "INSERT INTO contact_messages (name, email, message) VALUES ('$name', '$email', '$message')";

    if ($conn->query($insert_sql) === TRUE) {
        // Redirect to home.php with a success message
        echo "<script>alert('Message sent successfully!'); window.location.href='home.php';</script>";
        exit(); // Ensure the script stops after the redirection
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error sending message: " . $conn->error . "</div>";
    }
}

$conn->close(); // Close the database connection
?>
