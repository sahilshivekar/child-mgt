<?php
session_start(); // Start session to access logged-in user's information
include 'db.php'; // Include your database connection

// Check if the hospital is logged in (you may have your own authentication mechanism)
if (!isset($_SESSION['hospital_name'])) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit();
}

// Get the logged-in hospital name
$hospital_name = $_SESSION['hospital_name'];

// Fetch appointments for the logged-in hospital
$appointments = [];
$appointment_sql = "SELECT appointments.id, children.name AS child_name, appointments.appointment_date, appointments.mobile_number 
                    FROM appointments 
                    JOIN children ON appointments.child_id = children.id 
                    WHERE appointments.hospital_name = '$hospital_name'"; // Filter by the logged-in hospital
$appointment_result = $conn->query($appointment_sql);

if ($appointment_result && $appointment_result->num_rows > 0) {
    while ($row = $appointment_result->fetch_assoc()) {
        $appointments[] = $row;
    }
}

// Handle appointment deletion
if (isset($_GET['delete_id'])) {
    $delete_id = intval($_GET['delete_id']);
    $delete_sql = "DELETE FROM appointments WHERE id = $delete_id AND hospital_name = '$hospital_name'"; // Ensure only the hospital can delete its own appointments

    if ($conn->query($delete_sql) === TRUE) {
        echo "<script>alert('Appointment deleted successfully!'); window.location.href='hospital_appointments.php';</script>";
        exit();
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error deleting appointment: " . $conn->error . "</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hospital Appointments</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        header, footer {
            background-color: #007bff; /* Primary color */
            color: white;
            text-align: center;
            padding: 1rem;
        }
        footer {
            background-color: #343a40; /* Dark color */
        }
        .content {
            flex: 1;
            padding: 20px;
        }
        .appointment-details {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            margin-bottom: 15px;
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

    <header>
        <h1>Your Appointments</h1>
    </header>

    <div class="content">
        <div class="container mt-3">
            <?php if (!empty($appointments)): ?>
                <?php foreach ($appointments as $appointment): ?>
                    <div class="appointment-details">
                        <h4>Appointment Details</h4>
                        <p><strong>Child Name:</strong> <?php echo htmlspecialchars($appointment['child_name']); ?></p>
                        <p><strong>Appointment Date:</strong> <?php echo htmlspecialchars($appointment['appointment_date']); ?></p>
                        <p><strong>Mobile Number:</strong> <?php echo htmlspecialchars($appointment['mobile_number']); ?></p>
                        <a href="hospital_appointments.php?delete_id=<?php echo $appointment['id']; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this appointment?');">Delete Appointment</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class='alert alert-warning' role='alert'>No appointments found for this hospital.</div>
            <?php endif; ?>
        </div>
    </div>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Children Management System. All rights reserved.</p>
    </footer>

</body>
</html>

<?php
$conn->close(); // Close the database connection
?>
